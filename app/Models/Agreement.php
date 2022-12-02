<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function seller()
    {
        return $this->belongsTo(Company::class, 's_id');
    }

    public function buyer()
    {
        return $this->belongsTo(Company::class, 'b_id');
    }

    public function shipment()
    {
        return $this->belongsTo(Shipment::class, 'sh_id');
    }
    public function payment()
    {
        return $this->hasOne(Payment::class, 'a_id');
    }

}

