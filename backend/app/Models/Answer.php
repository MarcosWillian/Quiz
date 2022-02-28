<?php

namespace App\Models;

use App\Traits\PrimaryKeyUuid;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use PrimaryKeyUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 
        'correct',
        'question_id'
    ];

}
