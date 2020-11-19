<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Varietie extends Model
{
    use HasFactory;
//    use SoftDeletes;
//
//    protected $dates = ['deleted_at'];
    protected $fillable = [
        "name",
        "somatotype_id",
        "source",
        "avg_life",
        "created_at",
        "updated_at"
    ];

}
