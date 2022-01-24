<?php

namespace GoodPayments\Datatrans\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class DatatransMerchant extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'merchant_name',
        'merchant_id',
        'merchant_percent',
        'merchant_own',
        'own_id'
    ];
}
