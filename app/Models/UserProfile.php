<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = PROFILES;

    protected $fillable = [
        'uid',
        'pid',
        'viewed',
        'housename',
        'gender',
        'dob',
        'dobap',
        'mothertongue',
        'otherlang',
        'particularchurch',
        'noncath_church',
        'height',
        'weight',
        'blood',
        'complex',
        'maritalstatus',
        'photo',
        'about',
        'preference',
        'qualification',
        'occupation',
        'area',
        'income',
        'firmaddress',
        'fathername',
        'fhouse',
        'foccupation',
        'mothername',
        'mhouse',
        'moccupation',
        'siblings',
        'pparish',
        'pyear',
        'fparish',
        'housetype',
        'caddress',
        'paddress',
        'mobile1',
        'mobile2',
    ];
}
