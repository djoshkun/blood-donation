<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Declaration extends Model {

    protected $fillable = ['name', 'active'];
    public $timestamps = true;
    protected $table = 'declarations';
    protected $primaryKey = 'id';

    public function scopeActiveDeclaration($query) {
        return $query->where('active', 1)->first();
    }

    protected function questions() {
        return $this->hasMany(Question::class);
    }

    public function addQuestion(Question $question) {
        return $this->questions()->save($question);
    }

    protected function getActiveAttribute($active) {
        return $active === 1 ? 'Активен' : 'Не активен';
    }

}
