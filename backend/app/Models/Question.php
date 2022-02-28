<?php

namespace App\Models;

use App\Traits\PrimaryKeyUuid;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use PrimaryKeyUuid;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'observation',
        'points'
    ];
}
