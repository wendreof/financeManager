<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 26/12/17
 * Time: 23:04
 */

namespace WLFin\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryCost extends Model
{
    #Mass Assignment
    protected $fillable = [
        'name',
        'user_id'
    ];

}