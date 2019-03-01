<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model {

    protected $fillable = ['name', 'city_id'];
    public $timestamps = true;
    protected $table = 'hospitals';
    protected $primaryKey = 'id';

    protected function doctors() {
        return $this->hasMany(User::class)->where('role', User::ROLE_DOCTOR);
    }

    protected function allPatients() {
        return $this->hasMany(User::class)->where('role', User::ROLE_PATIENT);
    }

    protected function patients() {
        return $this->hasMany(User::class)->where('role', User::ROLE_PATIENT)->whereColumn('count_blood_quantity', '<>', 'blood_quantity');
    }

    public function users() {
        return $this->hasMany(User::class);
    }

    protected function city() {
        return $this->belongsTo(City::class);
    }

}
