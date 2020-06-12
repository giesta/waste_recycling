<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';
    protected $fillable= ['date'];
    public $timestamps = false; 
    
    public function lines(){
        return $this->hasMany(Line::class, 'invoice_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
