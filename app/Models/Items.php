<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{

    protected $fillable = [
        'description',
        'location',
        'email',
        'phonenum',
        'foundby',
        'turnedInto',
        'purpose',
        'status',
        'published',
        'date',
        'categories_id',
        'image',
        'schoolid',
        'nameclaim'

    ];

    use HasFactory;
}
