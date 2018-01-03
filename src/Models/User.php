<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 26/12/17
 * Time: 23:04
 */

namespace WLFin\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    #Mass Assignment
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

}