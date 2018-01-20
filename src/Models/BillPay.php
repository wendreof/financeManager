<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 26/12/17
 * Time: 23:04
 */

namespace WLFin\Models;

use Illuminate\Database\Eloquent\Model;

class BillPay extends Model
{
    #Mass Assignment
    protected $fillable = [
        'date_launch',
        'name',
        'value',
        'user_id',
        'category_cost_id'
    ];

    public function categoryCost()
    {
        return $this->belongsTo(CategoryCost::class);
    }
}