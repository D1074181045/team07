<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varietie extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "somatotype_id",
        "source",
        "avg_life",
        "created_at",
        "updated_at"
    ];
}
