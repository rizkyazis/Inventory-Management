<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    //show table inventories is represented by this model
    protected $tabel = 'inventories';

    //shown that there are 3 column that can be fill
    protected $fillable = [
        'name','photo','quantity'
    ];
}
