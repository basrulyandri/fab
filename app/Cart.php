<?php

namespace App;

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

    // public function add($item,$price,$id)
    // {    	
    // 	$storedItem = ['qty' => 0,'price' => $price->amount_idr,'payment_scheme' => $price->payment_scheme,'item' => $item,'image'=>$item->thumbnail];
    // 	if($this->items){
    // 		if(array_key_exists($id, $this->items)){
    // 			$storedItem = $this->items[$id];
    // 		}
    // 	}
    // 	$storedItem['qty']++;    	
    // 	$this->items[$id] = $storedItem;
    // 	$this->totalQty++;
    // 	$this->totalPrice += $price->amount_idr;
    // }
    // 
    // 
    public function add($item,$price,$id)
    {       
        $storedItem = ['qty' => 0,'price' => $price->amount_idr,'payment_scheme' => $price->payment_scheme,'item' => $item,'image'=>$item->thumbnail];
        if($this->items){
            if(array_key_exists($id, $this->items)){                
                $storedItem['qty'] = 1;
                $this->totalPrice = $this->totalPrice - $this->items[$id]['price'] + $price->amount_idr;
                $this->items[$id] = $storedItem;            
            } else {                
                $storedItem['qty']++;
                $this->items[$id] = $storedItem;
                $this->totalQty++;
                $this->totalPrice += $price->amount_idr;
            }
        } else {
            $storedItem['qty']++;       
            $this->items[$id] = $storedItem;
            $this->totalQty++;
            $this->totalPrice += $price->amount_idr;
        }

    }

    public function substractqty($item,$id)
    {   
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $this->items[$id]['qty'] -= 1;
            }
        }
        $this->totalQty -= 1;
        $this->totalPrice -= $item->price;
    }


    public function removeItem($course_id)
    {
        //dd($course_id);
        if($this->items){
            if(array_key_exists($course_id,$this->items)){
                $this->totalQty -= $this->items[$course_id]['qty'];
                $this->totalPrice -= $this->items[$course_id]['price'];
                unset($this->items[$course_id]);
            }
        }
    }
}
