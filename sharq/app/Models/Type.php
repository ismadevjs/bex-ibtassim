<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'module_id'
    ];


    public function modules()
    {
        return $this->hasOne(Module::class, 'id', 'module_id');
    }

}
