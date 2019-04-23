<?php

namespace App\Models;


class Cart
{

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id){
        $storedItem = [ 'qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items){
            if (array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        //dd($storedItem['qty']);
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function cartIncrementDecrement($item, $id, $qty){

        $storedItem = [ 'qty' => $qty, 'price' => $item->price*$qty, 'item' => $item];

        if ($this->items){
            if (array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
                $this->totalQty = $this->totalQty - $storedItem['qty'];
                $this->totalPrice = $this->totalPrice - $storedItem['price'];
                $storedItem['qty'] = $qty;
                $storedItem['price'] = $item->price * $qty;
            }
        }

        $this->items[$id] = $storedItem;
        $this->totalQty += $qty;
        $this->totalPrice += $storedItem['price'];
    }

    public function remvoeItem($id)
    {
        if(array_key_exists($id, $this->items)) {
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['price'];
            unset($this->items[$id]);
        }

    }

}
