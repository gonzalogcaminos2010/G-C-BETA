<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'supplier_id', 'category_id', 'name', 'description', 'code', 'price'];

    public function user() 
{
    return $this->belongsTo(User::class);
}

public function supplier() 
{
    return $this->belongsTo(Supplier::class);
}

public function category() 
{
    return $this->belongsTo(Category::class);
}

public function orders()
{
    return $this->belongsToMany(Order::class, 'order_details')->withPivot('quantity');
}
public function inventoryMovements()
{
    return $this->hasMany(Inventory::class);
}

}

