<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable=[
      'id_item','borrower_name','status','period'
    ];

    public function item(){
        return $this->belongsTo('App\Models\Inventory','id_item', 'id');
    }
}
