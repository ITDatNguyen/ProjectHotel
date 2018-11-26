<?php

namespace App\Http\Controllers;

use App\Proposal;
use App\User;
use Auth;
use Authy\AuthyApi as AuthyApi;
use DB;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Session;
use Mail;
use Twilio\Rest\Client;

class ProposalController extends Controller
{

    // Checks to see if a user has pending proposals and Shows them the Proposal form.
    public function index(Proposal $proposal)
    {
        if (Auth::check()) {
            $UserId = Auth::id();
            $User = User::find($UserId);
            $User->load('proposals');
            return view('apply.becomePartner', compact('User'));
        } else {
            return redirect('/login');
        }
    }

    // Stores the Submitted Proposal in the database.
    public function store(Request $request, User $user, AuthyApi $authyApi)
    {
        $values = $request->all();
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $fileName2 = $image->getClientOriginalName();
            $filename = time() . $fileName2;
            $file = $request->file('file');
            $file->move('upload', $filename);
        }
        if ($request->hasFile('file_cm')) {
            $image2 = $request->file('file_cm');
            $fileName3 = $image2->getClientOriginalName();
            $filename4 = time() . $fileName3;
            $file4 = $request->file('file_cm');
            $file4->move('upload', $filename4);
        }
        // $user->addProposal(new Proposal($request->all()));
        DB::beginTransaction();
        $newUser = new Proposal($values);
        $newUser->ImagePath = $filename;
        $newUser->image_cm = $filename4;
        // $newUser->addProposal();
        $user->addProposal($newUser);
        // DD($newUser->phone_number);
        // DD($newUser->country_code);
        $authyUser = $authyApi->registerUser(
            $newUser->CompanyEmail,
            $newUser->phone_number,
            $newUser->country_code
        );
        if ($authyUser->ok()) {
            $newUser->authy_id = $authyUser->id();
            $newUser->save();
            $request->session()->flash(
                'status',
                "User created successfully"
            );
            $sms = $authyApi->requestSms($newUser->authy_id);
            DB::commit();
            // return redirect()->route('user-show-verify');
            return view('apply.aftersubmit', compact('request'));
        } else {
            $errors = $this->getAuthyErrors($authyUser->errors());
            DB::rollback();
            // return view('newUser', ['errors' => new MessageBag($errors)]);
        }
        // return view('apply.aftersubmit', compact('request'));

    }

    public function profile(Proposal $proposal)
    {
        if (Auth::check()) {
            $UserId = Auth::id();
            $User = User::find($UserId);
            $proposal = $User->proposals;
            return view('profile', compact('proposal'));
        } else {
            return redirect('/login');
        }
    }

    public function verify(Request $request, Authenticatable $user, AuthyApi $authyApi, Client $client)
    {
        $token = $request->input('token');
        $verification = $authyApi->verifyToken($user->proposals->authy_id, $token);
        if ($verification->ok()) {
            $user->proposals->verified = true;
            $user->proposals->save();
            $UserId = Auth::id();
            $User = User::find($UserId);
            $proposal = $User->proposals;
            $email = $proposal->CompanyEmail;
            // $this->sendSmsNotification($client, $user);
            Mail::send('mail', array("name" => '', "email" => '', "content" => 'Bạn đã đăng ký làm đối tác với OYO.com'), function ($message) use ($email) {
                $message->to($email)->subject('Thông báo đăng ký!')->from('hotelbookingdanang@gmail.com', 'OYO.com')
                    ->sender('hotelbookingdanang@gmail.com', 'OYO.com');
            });
            Session::flash('success', 'Đối tác mới đã được tạo');
            return view('/profile', compact('proposal'));
            // return redirect()->route('user-index');

        } else {
            // $errors = $this->getAuthyErrors($verification->errors());
            $request->session()->flash('error', "Mã xác minh sai!");
            return view('apply.aftersubmit');
        }
    }
    private function getAuthyErrors($authyErrors)
    {
        $errors = [];
        foreach ($authyErrors as $field => $message) {
            array_push($errors, $field . ': ' . $message);
        }
        return $errors;
    }
    // public function verifyResend(Request $request, Authenticatable $user,
    //     AuthyApi $authyApi) {
    //     $sms = $authyApi->requestSms($user->proposals->authy_id);
    //     if ($sms->ok()) {
    //         $request->session()->flash(
    //             'status',
    //             'Verification code re-sent'
    //         );
    //         return back();
    //     } else {
    //         $errors = $this->getAuthyErrors($sms->errors());
    //         return view('verifyUser', ['errors' => new MessageBag($errors)]);
    //     }
    // }
    public function show(Proposal $proposal)
    {
        $Proposals = Proposal::all();
        return view('adminM.PartnerRequests', compact('Proposals'));
    }

    // Removes the Proposal
    public function destroy(Request $request, Proposal $proposal)
    {
        $Id = $proposal->id;
        $Proposal = $proposal->find($Id);
        $Proposal->delete();
        return back();
    }

    public function status(Proposal $proposal, user $user)
    {
        $user->load('proposals');
        return view('apply.status', compact('user'));
    }
    private function sendSmsNotification($client, $user)
    {
        $twilioNumber = config('services.twilio')['number'] or die(
            "TWILIO_NUMBER is not set in the environment"
        );
        $messageBody = 'You did it! Signup complete :)';

        $client->messages->create($user->fullNumber(), // Phone number which receives the message
            [
                "from" => $twilioNumber, // From a Twilio number in your account
                "body" => $messageBody,
            ]
        );
    }
}
