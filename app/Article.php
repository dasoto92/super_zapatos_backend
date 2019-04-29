<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    public $timestamps = false;
    use SoftDeletes;

    protected $table = 'articles';
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}
