<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    protected $table = 'kind';
    protected $fillable= ['name'];
    public $timestamps = false;

    public function stocks(){
        return $this->hasMany(Stock::class, 'kind_id', 'id');
    }
}
