<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Filier;
class Module extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'icon',
        'slug',
        'category_id',
        "filier_id"
    ];


    public function filiers()
    {
        return $this->hasOne(Filier::class, 'id', 'filier_id');
    }

    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

}
