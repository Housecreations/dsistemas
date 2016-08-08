<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Front extends Model
{
  protected $table = "front";
    
    protected $fillable = ['new_collection', 'men', 'women', 'acc', 'outlet'];
}
