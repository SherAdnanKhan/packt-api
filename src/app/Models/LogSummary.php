<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSummary extends Model
{
    use HasFactory;

    protected $table = 'log_summary';

    protected $fillable = [
        'user_id',
        'summary'
    ];

    protected $casts = [
        'summary' => 'array'
    ];
}
