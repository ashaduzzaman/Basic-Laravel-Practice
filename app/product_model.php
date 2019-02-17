<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_model extends Model
{
    protected $table = 'products';
    protected $primarykey = 'id';
    protected $fillable = ['name','class','roll','contact'];
}
