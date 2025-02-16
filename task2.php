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
    $hasExpensiveItem = false; //товар со стоимостью более 1000 рублей
    $itemCount = count($shoppingCart);

    foreach ($shoppingCart as $item) {
        if (!is_array($item) || !isset($item['product']) || !isset($item['price']) || !is_numeric($item['price']) || $item['price'] < 0){
        echo 'Корзина не должна быть пустой или она не массив';
        return false;
    } 

       $total += $item['price'];
       if ($item['price']>1000){
        $hasExpensiveItem = true;
       }
    }
        
    $discount = 0;
    if($hasExpensiveItem){
        $discount += 0.1;
    }
    if($itemCount >=4){
        $discount += 0.05;
    }
    
    return $total * (1 - $discount);
}

$calculatedTotal = calculateTotal($shoppingCart);

if ($calculatedTotal === false) {
    echo "Ошибка: некорректный формат корзины.";
} else {
    echo "Общая стоимость с учетом скидки: " . $calculatedTotal;
}
