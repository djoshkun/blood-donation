<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model {

    protected $fillable = [
        'syphilis', 'hepatitis_c', 'hepatitis_b', 'hiv_spin',
        'donor_id', 'donor_declaration_id', 'doctor_id', 'laborant_id',
        'patient_id', 'flag', 'description'
    ];
    public $timestamps = true;
    protected $table = 'donations';
    protected $primaryKey = 'id';
    public $results = [1 => '(-) Отрицателен', 2 => '(+) Положителен'];

    protected function laborant() {
        return $this->belongsTo(User::class, 'laborant_id');
    }

    protected function donor() {
        return $this->belongsTo(User::class, 'donor_id');
    }

    protected function donorDeclaration() {
        return $this->belongsTo(DonorDeclaration::class, 'donor_declaration_id');
    }

    protected function patient() {
        return $this->belongsTo(User::class, 'patient_id');
    }

    protected function doctor() {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    protected function getCreatedAtAttribute($date) {
        return date('d.m.Y', strtotime($date));
    }

    public function scopeWaitingForResults($query) {
        return $query->where(['flag' => 1, 'hiv_spin' => null, 'syphilis' => null, 'hepatitis_b' => null, 'hepatitis_c' => null]);
    }

    public function scopeWaitingDeclarations($query) {
        return $query->where('flag', null);
    }

    public function scopeDeclarations($query) {
        return $query->where('flag', 1);
    }

    public function scopeFinishedResults($query) {
        return $query->where('flag', 1)->where('hiv_spin', '!=', null)->where('hepatitis_b', '!=', null)->where('hepatitis_c', '!=', null)->where('syphilis', '!=', null);
    }

    protected function getHepatitisBAttribute($param) {
        return $param !== null ? $this->results[$param] : '';
    }

    protected function getHepatitisCAttribute($param) {
        return $param !== null ? $this->results[$param] : '';
    }

    protected function getSyphilisAttribute($param) {
        return $param !== null ? $this->results[$param] : '';
    }

    protected function getHivSpinAttribute($param) {
        return $param !== null ? $this->results[$param] : '';
    }

}
