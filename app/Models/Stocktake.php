<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Stocktake extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'location',
        'doc_no',
        'doc_date',
        'description',
        'product_name',
        'code',
        'quantity_available',
        'new_quantity',
        'quantity_adjusted',
        'remark',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
