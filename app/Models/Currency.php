<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_code',
        'char_code',
        'nominal',
        'name',
        'value',
        'vunit_rate',
    ];
}
