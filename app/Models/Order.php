<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity', // Asegúrate de incluir el campo 'quantity' en el $fillable
        // Otros atributos que desees ser masivamente asignables
    ];
    public function user() 
{
    return $this->belongsTo(User::class);
}

public function camp() 
{
    return $this->belongsTo(Camp::class);
}



public function products()
{
    return $this->belongsToMany(Product::class, 'order_details')->withPivot('quantity');
}

}
