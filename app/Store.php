<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    public $timestamps = false;
    use SoftDeletes;

    protected $table = 'stores';
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
