<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'payer',
        'account_name_id',
        'date',
        'amount',
        'type',
        'method',
        'category',
        'note',
    ];
}
