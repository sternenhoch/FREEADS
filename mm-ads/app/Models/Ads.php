<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    /**
     * The table associated with the model. 
     * */
    protected $table = 'ads';

    protected $fillable = [
        'title',
        'category',
        'description', //should not exceed 65 535 chars
        'photo',
        'price',
        'location'
    ];

}
