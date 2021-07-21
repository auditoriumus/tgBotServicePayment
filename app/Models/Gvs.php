<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gvs extends Model
{
    use HasFactory;

    protected string $table = 'gvses';

    protected array $fillable = [
        'value'
    ];
}
