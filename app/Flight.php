<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
    	'flight_code',
        'flight_source',
        'flight_destination',
        'capacity',
        'departure_time',
        'arrival_time',
        'price'
    ];

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'departure_time',
        'arrival_time'
    ];
}
