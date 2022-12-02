<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;


    public function shipments()
    {
        return $this->hasMany(Shipment::class, 'c_id');
    }
    public function asBuyer()
    {
        return $this->hasMany(Agreement::class, 'b_id');
    }
    public function asSeller()
    {
        return $this->hasMany(Agreement::class, 's_id');
    }
}

