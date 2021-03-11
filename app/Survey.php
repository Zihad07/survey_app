<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    public function questionnaire(){
        return $this->belongsTo(Questionnaire::class);
    }

    public function responses() {
        return $this->hasMany(SurveyResponse::class);
    }
}
