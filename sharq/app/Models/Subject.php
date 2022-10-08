<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pdf',
        'module_id',
        'type_id'
    ];

    public function modules()
    {
        return $this->hasOne(Module::class, 'id', 'module_id');
    }

    public function types()
    {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }
}
