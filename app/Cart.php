<?php

namespace App;

class Cart
{
  public $products = [];
  public $totalPrice = 0;
  public $totalQuantity = 0;

  public function __construct($cart)
  {
    if($cart){
        $this->products = $cart->products;
        $this->totalPrice = $cart->totalPrice;
        $this->totalQuantity = $cart->totalQuantity;
    }
  }

  public function AddCart($product, $id)
  {
    if($product->ProductPromotionPrice == 0){
        $newProduct = ['quantity' => 0, 'Price' => $product->ProductPrice, 'productInfo' => $product];
    } else{
        $newProduct = ['quantity' => 0, 'Price' => $product->ProductPromotionPrice, 'productInfo' => $product];
    }

    if( $this->products ){
        if(array_key_exists($id, $this->products)){
            $newProduct = $this->products[$id];
        }
    }
    $newProduct['quantity']++;

    if($product->ProductPromotionPrice == 0){
        $newProduct['Price'] = $newProduct['quantity'] * $product->ProductPrice;
    } else {
        $newProduct['Price'] = $newProduct['quantity'] * $product->ProductPromotionPrice;
    }

    $this->products[$id] = $newProduct;

    if($product->ProductPromotionPrice == 0){
        $this->totalPrice += $product->ProductPrice;
    } else {
        $this->totalPrice += $product->ProductPromotionPrice;
    }

    $this->totalQuantity++;

    $result = new \stdClass();
    $result->products = $this->products;
    $result->totalPrice = $this->totalPrice;
    $result->totalQuantity = $this->totalQuantity;

    return $result;
  }

  public function DeleteItemCart($id){
    $this->totalQuantity -= $this->products[$id]['quantity'];
    $this->totalPrice -= $this->products[$id]['Price'];
    unset($this->products[$id]);
  }

  public function UpdateItemCart($id, $quantity){
    $this->totalQuantity -= $this->products[$id]['quantity'];
    $this->totalPrice -= $this->products[$id]['Price'];

    $this->products[$id]['quantity'] = $quantity;
    $this->products[$id]['Price'] = $quantity * $this->products[$id]['productInfo']->ProductPrice;
    $this->totalQuantity += $this->products[$id]['quantity'];
    $this->totalPrice += $this->products[$id]['Price'];

  }
}
?>
