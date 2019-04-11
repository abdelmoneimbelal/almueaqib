<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    protected $casts = [
        'phone' => 'array',
        'ardy' => 'array'

    ];

    public function products()
    {
        return $this->hasMany('\Product');
    }
    public function orders()
    {
        return $this->hasMany('\Order');
    }
    public function cities()
    {
        return $this->belongsTo(City::class);

    }
    public function receipts()
    {
        return $this->hasMany('\Receipt');
    }
    public function catchs()
    {
        return $this->hasMany('\Catchs');
    }
}//end of model
