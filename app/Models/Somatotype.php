<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Somatotype extends Model
{
    use HasFactory;

    protected $primaryKey = "somatotype_id";
    protected $fillable = [
        'somatotype',
        'avg_height',
        'avg_weight'
    ];
}
