<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $fillable = ['name'];
    public $timestamps = true;
    protected $table = 'cities';
    protected $primaryKey = 'id';

    protected function users() {
        return $this->hasMany(User::class);
    }

}
