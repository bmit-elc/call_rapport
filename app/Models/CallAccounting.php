<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallAccounting extends Model
{
    use HasFactory;
    protected $table='callaccounting';

    protected $fillable = [
        'SubscriberName', 'DialledNumber', 'Date', 'Time', 'RingingDuration', 'CallDuration', 'Type', 'CallType'
    ];
}