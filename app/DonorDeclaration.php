<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonorDeclaration extends Model {

    protected $fillable = ['declaration_id', 'donor_id'];
    public $timestamps = true;
    protected $table = 'donor_deklarations';
    protected $primaryKey = 'id';

    protected function user() {
        return $this->belongsTo(User::class, 'donor_id');
    }

    protected function answers() {
        return $this->hasMany(Answer::class);
    }
    
}
