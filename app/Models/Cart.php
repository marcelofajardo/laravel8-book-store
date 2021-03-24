<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $items;  //array
    public $totalQuantity; 
    public $totalPrice;

    public function __construct($prevCart)
    {
        if ($prevCart != null) {
            $this->items = $prevCart->items;
            $this->totalQuantity = $prevCart->totalQuantity;
            $this->totalPrice = $prevCart->totalPrice;
        } else {
            $this->items = [];
            $this->totalQuantity = 0;
            $this->totalPrice = 0;
        }
    }

    public function addItem($id, $qty, $product) 
    {
        $price = $product->price;

        //the item already exists
        if (array_key_exists($id, $this->items)) {
            $productToAdd = $this->items[$id];
            $productToAdd['quantity'] += $qty;
            $productToAdd['totalSinglePrice'] = $productToAdd['quantity'] * $price;
        
        //first time to add this product to cart
        } else {
            $productToAdd = [
                'quantity' => $qty,
                'totalSinglePrice'=> $price * $qty, 
                'data' => $product
            ];
        }
        
        $this->items[$id] = $productToAdd;
        
        $this->totalQuantity += $qty;
        $this->totalPrice += $price * $qty;
    }

    public function decreaseItem($id, $product) 
    {
        $price = $product->price;

        if (array_key_exists($id, $this->items) && $this->items[$id]['quantity'] > 1) {
            $productToDecrease = $this->items[$id];
            $productToDecrease['quantity']--;
            $productToDecrease['totalSinglePrice'] = $productToDecrease['quantity'] * $price;
            $this->items[$id] = $productToDecrease;
            $this->totalQuantity--;
            $this->totalPrice -= $price;
        }
    }

    public function updatePriceAndQuantity() 
    {
        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($this->items as $item) {
            $totalQuantity += $item['quantity'];
            $totalPrice += $item['totalSinglePrice'];
        }

        $this->totalQuantity = $totalQuantity;
        $this->totalPrice = $totalPrice;
    }
    
}
