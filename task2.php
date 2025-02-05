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

    $total = 0;
    $discount1 = false; //товар со стоимостью более 1000 рублей
    $cartCount = count($shoppingCart);
    foreach ($shoppingCart as $key => $value) {
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
