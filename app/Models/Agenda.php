<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function rayon()
    {
        return $this->belongsTo(Rayon::class, 'penyelenggara'); // 'penyelenggara' adalah foreign key
    }
}
