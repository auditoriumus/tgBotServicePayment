<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hvs extends Model
{
    use HasFactory;

    protected string $table = 'hvses';

    protected array $fillable = [
        'value'
    ];
}
