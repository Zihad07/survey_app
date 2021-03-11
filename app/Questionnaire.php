<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $guarded = [];

    public function path() {
        return url('/questionnaires/'.$this->id);
    }
    public function publicPath() {
        return url('/surveys/'.$this->id.'-'.Str::slug($this->title));
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function surveys() {
        return $this->hasMany(Survey::class);
    }
}
