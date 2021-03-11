<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function responses() {
        return $this->hasMany(SurveyResponse::class);
    }
}
