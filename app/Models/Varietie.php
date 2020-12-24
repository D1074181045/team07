<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

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
        "find_date",
        "land_date",
        "created_at",
        "updated_at"
    ];

    public function scopeSource($query, $source) {
        $query->join('somatotypes', 'varieties.somatotype_id', '=', 'somatotypes.somatotype_id')
            ->where('varieties.source', $source)
            ->select('id', 'name', 'varieties.somatotype_id', 'somatotype', 'source', 'avg_life', 'find_date', 'land_date')
            ->orderBy('id');
    }

    public function scopeAllSource($query) {
        $query->groupby('source')
            ->select('source');
    }

    public function scopeAllData($query) {
        $query->join('somatotypes', 'varieties.somatotype_id', '=', 'somatotypes.somatotype_id')
//            ->where("somatotypes.deleted_at", null)
            ->select('id', 'name', 'varieties.somatotype_id', 'somatotype', 'source', 'avg_life', 'find_date', 'land_date')
            ->orderBy('id');
    }

    public function scopeType($query, $somatotype_id) {
        $query->join('somatotypes', 'varieties.somatotype_id', '=', 'somatotypes.somatotype_id')
            ->where('varieties.somatotype_id', $somatotype_id)
            ->select('id', 'name', 'varieties.somatotype_id', 'somatotype', 'source', 'avg_life', 'find_date', 'land_date')
            ->orderBy('id');
    }

    public function scopeAllSomatotypes($query) {
        $query->join('somatotypes', 'varieties.somatotype_id', '=', 'somatotypes.somatotype_id')
            ->groupby('somatotype')
            ->select('somatotype');
    }
}
