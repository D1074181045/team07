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
    public function scopeAllData($query) {
        $query->join('somatotypes', 'varieties.somatotype_id', '=', 'somatotypes.somatotype_id')
//            ->where("somatotypes.deleted_at", null)
            ->select('id', 'name', 'varieties.somatotype_id', 'somatotype', 'source', 'avg_life', 'find_date', 'land_date')
            ->orderBy('id');
    }

    public function Somatotype() {
        return $this->belongsTo('App\Models\Somatotype', 'somatotype_id', 'somatotype_id');
    }

    public function scopeSource($query, $source) {
        $query->where('varieties.source', $source)
            ->orderBy('id');
    }

    public function scopeAllSource($query) {
        $query->groupby('source')
            ->select('source');
    }

    public function scopeType($query, $somatotype_id) {
        $query->where('varieties.somatotype_id', $somatotype_id)
            ->orderBy('id');
    }

    public function scopeAllSomatotypes($query) {
        $query->groupby('somatotype')
            ->select('somatotype');
    }
}
