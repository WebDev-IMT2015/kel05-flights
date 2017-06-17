<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
    	'buyer_name',
        'buyer_address',
        'buyer_phone',
        'buyer_ktp_passport',
        'flight_id'
    ];

    public function flights() 
    {
    	return $this->belongsTo('Flight');
    }



}
