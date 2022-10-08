<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Filier;

class Category extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'icon',
        'slug',
        'filier_id'
    ];


    public function filiers()
    {
        return $this->hasOne(Filier::class, 'id', 'filier_id');
    }


    
}
