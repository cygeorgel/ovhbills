<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OvhBill extends Model
{
    protected $guarded = [];

    protected $dates = ['documentDate'];

    public function details()
    {
        return $this->hasMany(OvhBillDetail::class);
    }
}
