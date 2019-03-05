<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
    	'titleKh',
    	'titleEn',
    	'sort_order'
    ];

    public function question()
    {
    	return $this->belongsTo(Question::class);
    }
}
