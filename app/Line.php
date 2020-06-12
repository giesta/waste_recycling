<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    protected $table = 'line';
    protected $fillable= ['amount', 'price','invoice_id', 'stock_id'];
    public $timestamps = false;

    public function invoice(){
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }
    public function stocks(){
        return $this->belongsTo(Stock::class, 'stock_id', 'id');
    }
}
