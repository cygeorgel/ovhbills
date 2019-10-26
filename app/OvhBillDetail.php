<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OvhBillDetail extends Model
{
    protected $guarded = [];

    protected $dates = ['periodStart', 'periodEnd'];

    public function bill()
    {
        return $this->belongsTo(OvhBill::class);
    }
}
