<?php

namespace App\Http\Controllers;
use Stripe\Stripe;
use Config;
use App\Hotel;
use App\Reservation;
use App\Room;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;
use PDF;

class ReservationController extends Controller
{
    //Shows the User their Reservation Details before confirmation.
    public function index(Hotel $hotel, Room $room, Request $request)
    {

        if (Auth::check()) {

            $UID = Auth::id();
            $FirstDate = $request->session()->get('checkin');

            $SecDate = $request->session()->get('checkout');

            $CheckIn = strtotime($FirstDate);
            $CheckInStr = date('F jS Y', $CheckIn);

            $CheckOut = strtotime($SecDate);
            $CheckOutStr = date('F jS Y', $CheckOut);

            $Difference = strtotime($SecDate) - strtotime($FirstDate);
            $StayDuration = $Difference / 86400;

            $Price = $room->Price;
            $TotalCost = $StayDuration * $Price;

            $ProtectedCost = Crypt::encrypt($TotalCost);

            return view('hotels.booking', compact('hotel', 'room', 'CheckInStr', 'CheckOutStr', 'FirstDate', 'SecDate', 'StayDuration', 'TotalCost', 'ProtectedCost', 'UID'));
        } else {
            return redirect('/login');
        }
    }
    public function store(Hotel $hotel, Room $room, Request $request, Reservation $reservation, $first, $sec, $protectedCost)
    {
        $uid = Auth::id();
        $user = User::find($uid);
        $email = $user->email;
        $hotel = $room->hotel;
        $hotelid = $hotel->id;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $totalcost = Crypt::decrypt($protectedCost);
        $reservation = new Reservation;
        $reservation->hotel_id = $hotelid;
        $reservation->room_id = $room->id;
        $reservation->guestFirstName = $request->firstname;
        $reservation->guestlastName = $request->lastname;
        $reservation->checkIn = $first;
        $reservation->checkOut = $sec;
        $reservation->totalPrice = $totalcost;
        $user->addReservation($reservation);

        return redirect('/home');

        $tien = $reservation->totalPrice;
        
        return view('hotels.paypal', compact('tien','email','hotel'));

    }
    public function show(User $user, Reservation $reservation)
    {
        $uid = Auth::id();
        $user = User::find($uid);
        $email = $user->email;
        $reservations = $user->reservations->sortBy('CheckIn');
        return view('myreservations', compact('reservations'));
    }
    public function destroy(Reservation $reservation)
    {
        $id = $reservation->id;
        $reservation = Reservation::find($id);
        $reservation->delete();
        return back();
    }

    public function pdfview(Request $request, Reservation $reservation)
    {
        $uid = Auth::id();
        $id = $reservation->id;
        $room = $reservation->room;
        $hotel = $room->hotel;
        $hotelphoto = $hotel->photos->first();
        $reservation = Reservation::where('id', '=', $id)->with('room')->get();
        // $pdf = PDF::loadview('pdfview', compact('reservation', 'hotel', 'hotelphoto'));
        // return $pdf->stream('pdfview.pdf');
         return view('pdfview',compact('reservation','hotel','hotelphoto'));
    }

    public function storePayment(Request $request)
    {
        
        $pay = $request->money;
        $email = $request->emailuser;
        $hotel = $request->infor;
        Mail::send('mailfb', array("name"=>'',"email"=>'',"content"=>'Bạn đã đặt phòng tại khách sạn 
            chi tiết xem tại website
        '), function($message) use($email){
            $message->to($email)->subject('Thông báo đặt phòng!')->from('hotelbookingdanang@gmail.com', 'OYO.com')
            ->sender('hotelbookingdanang@gmail.com', 'OYO.com');
        });
        \Stripe\Stripe::setApiKey("sk_test_AjKoauWz7orJbCOdHku4OFO9");
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' =>strrev($pay),
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
        ]);
        return view('hotels.payment');
    }
    
}
