<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function approvedByLevel1()
    {
        return $this->belongsTo(User::class, 'approved_by_level_1');
    }

    public function approvedByLevel2()
    {
        return $this->belongsTo(User::class, 'approved_by_level_2');
    }
}
