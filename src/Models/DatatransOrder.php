<?php

namespace GoodPayments\Datatrans\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class DatatransOrder extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_name',
        'category_name',
        'timezone_name',
        'datatrans_day',
        'datatrans_time',
        'client_name',
        'phone_num',
        'client_email',
        'client_comment',
        'datatrans_payment',
        'status'
    ];
}
