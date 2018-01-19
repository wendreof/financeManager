<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 26/12/17
 * Time: 23:04
 */

namespace WLFin\Models;

use Illuminate\Database\Eloquent\Model;

class BillReceive extends Model
{
    #Mass Assignment
    protected $fillable = [
        'date_launch',
        'name',
        'value',
        'user_id'
    ];

}