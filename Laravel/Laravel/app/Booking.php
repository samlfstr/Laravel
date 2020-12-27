<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /* This is how do we overwrite the table name*/
    protected $table = "bookings";
}
