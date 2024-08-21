<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaterialCategory extends Model
{
    use HasFactory;

    protected $table = 'material_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'photo',
    ];

    public $timestamps = true;

}

