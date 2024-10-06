<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // The table associated with the model
    protected $table = 'transactions';

    // Define the fillable properties that can be mass assigned
    protected $fillable = [
        'trans_user_id',
        'trans_date',
        'amount',
        'type',
        'created_at',
        'updated_at'
    ];

    // If you want to disable auto-maintaining the timestamps
    public $timestamps = true;

    // Define custom date formats for the model (optional)
    protected $casts = [
        'trans_date' => 'datetime:Y-m-d',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    // Additional relationships or scopes can be added here
}

