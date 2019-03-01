<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    public $timestamps = true;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'fathersname', 'surname', 'blood_type', 'city_id', 'added_by',
        'hospital_id', 'role', 'active', 'email', 'password', 'egn', 'gender',
        'blood_quantity', 'count_blood_quantity'
    ];
    protected $hidden = ['password', 'remember_token', 'gender'];
    public $bloodTypes = [
        1 => 'A(+)', 2 => 'B(+)', 3 => 'AB(+)', 4 => 'O(+)',
        5 => 'A(-)', 6 => 'B(-)', 7 => 'AB(-)', 8 => 'O(-)'
    ];
    protected $appends = ['blood_group'];
    private $genders = ['male' => 'мъж', 'female' => 'жена'];
    private $actives = [1 => 'Активен', 0 => 'Не активен'];

    const ROLE_USER = 'ROLE_USER';
    const ROLE_PATIENT = 'ROLE_PATIENT';
    const ROLE_DOCTOR = 'ROLE_DOCTOR';
    const ROLE_LABORANT = 'ROLE_LABORANT';
    const ROLE_ADMIN = 'ROLE_ADMIN';

    public $roles = [
        self::ROLE_PATIENT => 'Пациент',
        self::ROLE_USER => 'Донор',
        self::ROLE_ADMIN => 'Администратор',
        self::ROLE_DOCTOR => 'Доктор',
        self::ROLE_LABORANT => 'Лаборант'
    ];
    
    public $types = [
        self::ROLE_USER => 'Донор',
        self::ROLE_ADMIN => 'Администратор',
        self::ROLE_DOCTOR => 'Доктор',
        self::ROLE_LABORANT => 'Лаборант'
    ];
    
    public function scopeSelectUserRole($query, $param) {
        $query->where('role', [$param['role']]);
    }

    protected function getGenderAttribute($gender) { 
        return $gender !== null ? $this->genders[$gender] : '';
    }

    protected function getTypeAttribute() {
        return null !== $this->role ? $this->roles[$this->role] : '';
    }

    protected function getActiveAttribute($active) {
        return $active !== null ? $this->actives[$active] : '';
    }

    protected function donations() {
        return $this->hasMany(Donation::class, 'donor_id')->where(['flag' => 1]);
    }

    protected function getAddedByUserAttribute() {
        return $this->where(['id' => $this->added_by])->first();
    }

    protected function getFullNameAttribute() {
        return "{$this->name} {$this->fathersname} {$this->surname}";
    }

    protected function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }

    protected function city() {
        return $this->belongsTo(City::class);
    }

    protected function hospital() {
        return $this->belongsTo(Hospital::class);
    }

    protected function getCreatedAtAttribute($date) {
        return date('d.m.Y', strtotime($date));
    }

    public function scopeAllPatients($query) {
        return $query->where('role', User::ROLE_PATIENT)->whereColumn('count_blood_quantity', '<>', 'blood_quantity')->get();
    }

    protected function getbloodGroupAttribute() {
        return $this->blood_type !== null ? $this->bloodTypes[$this->blood_type] : '';
    }

}
