<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Somatotype extends Model
{
    use HasFactory;
//    use SoftDeletes;
//
//    protected $dates = ['deleted_at'];
    protected $primaryKey = "somatotype_id";
    protected $fillable = [
        'somatotype',
        'avg_height',
        'avg_weight'
    ];

    public function scopeFatType($query) {
        $query->where('avg_weight', '>=', 20);
    }

    public function Varieties() {
        return $this->hasMany('App\Models\Varietie', 'somatotype_id', 'somatotype_id');
    }

    public function delete() {
        $this->Varieties()->delete();
        return parent::delete();
    }
}
