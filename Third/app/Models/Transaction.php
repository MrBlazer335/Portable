<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\DataReceiver;


class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'category',
        'date',
        'amount',
        'comment',
        'bank',
        'created_at'
    ];


    protected $hidden = [
        'user_id'
    ];
}
