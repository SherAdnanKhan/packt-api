<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebhookURL extends Model
{
    use HasFactory;

    protected $table = 'webhook_url';

    protected $fillable = [
        'user_id'
    ];

    protected $casts = [
        'canary' => 'boolean',
        'status' => 'boolean'
    ];
}
