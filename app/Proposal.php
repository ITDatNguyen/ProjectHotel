<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Sets the relationship between a Proposal and a User.
class Proposal extends Model
{
    protected $fillable = ['CompanyName', 'CompanyEmail', 'HQAddress', 'Vision', 'ImagePath', 'image_cm', 'phone_number', 'country_code'];
    public function user()
    {

        return $this->belongsTo(User::class);

    }

}
