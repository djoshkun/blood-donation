<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

    protected $fillable = ['name', 'declaration_id'];
    public $timestamps = true;
    protected $table = 'questions';
    protected $primaryKey = 'id';

    protected function declaration() {
        return $this->belongsTo(Declaration::class);
    }

    protected function answers() {
        return $this->hasMany(Answer::class);
    }

}
