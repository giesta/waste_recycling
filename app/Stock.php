<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';
    protected $fillable= ['name','price', 'fk_KIND_id'];
    public $timestamps = false;

    public function kinds(){
        return $this->belongsTo(Kind::class,'kind_id', 'id');
    }
    public function lines(){
        return $this->hasMany(Line::class, 'stock_id', 'id');
    }
}
