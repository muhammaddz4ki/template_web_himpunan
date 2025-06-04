<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationStructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'description',
        'image_path'
    ];

    public function getImageUrlAttribute()
{
    return asset('sim-pcimm-lampura/storage/' . $this->image_path);
}

}