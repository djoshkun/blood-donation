<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

    protected $fillable = ['answer', 'description', 'donor_declaration_id', 'question_id'];
    public $timestamps = true;
    protected $table = 'answers';
    protected $primaryKey = 'id';

    protected function question() {
        return $this->belongsTo(Question::class);
    }

}
