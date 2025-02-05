<?php

$shoppingCart = [
    ['product' => 'Телефон', 'price' => 1200],
    ['product' => 'Наушники', 'price' => 800],
    ['product' => 'Ноутбук', 'price' => 1500],
    ['product' => 'Телевизор', 'price' => 1000],
    ['product' => 'Кабель', 'price' => 50],
    ['product' => 'Клавиатура', 'price' => 400]
];

function CalculateTotal($shoppingCart){

    if(empty($shoppingCart)|| !is_array($shoppingCart)){
        echo 'Корзина не должна быть пустой или она не массив';
        return;
    }

    $total = 0;
    $discount1 = false; //товар со стоимостью более 1000 рублей
    $cartCount = count($shoppingCart);

    foreach ($shoppingCart as $key => $value) {
        if(!is_array($value) || !is_numeric($value['price']) || !isset($value['price']) || $value['price'] < 0){
            echo 'Корзина не должна быть пустой или она не массив';
        return;
        }
       $total += $value['price'];
       if ($value['price']>1000){
        $discount1 = true;
       }
    }
        if ($discount1 == true){
            $total *= 0.9;
        }
        if ($cartCount > 3){
            $total *= 0.95;
        }
    
    return $total;
}

echo CalculateTotal($shoppingCart);
