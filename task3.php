<?php

class Book {
    public $title;
    public $author;
    public $year;
    public $price;
    
    public function __construct($title, $author, $year, $price) {
        if (empty($title) || empty($author) || empty($year) || empty($price)) {
            echo "Поля не должны быть пусты";
            return;
        }
        if (!is_numeric($price) || !is_numeric($year)) {
            echo "Год и цена должны быть указаны числом";
            return;
        }
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->price = $price;
    }

     function getInfo(){
        return "Название: {$this->title}, Автор: {$this->author}, Год: {$this->year}, Цена: {$this->price}\n";
    }
}

$books= [
new Book("Ромео&Джульетта","Shakespeare","1591","500"),
new Book("Война и Мир","Л.Н. Толстой","1863","563"),
new Book("Том Сойер","Марк Твен","1876","700"),
new Book("Совершенный код","Макконнелл Стив","2022","1653")
];

foreach ($books as $book){
    echo $book->getInfo();
}

//var_dump($books); //для отладки переменной с данными её типа и длинны
//print_r($books[0]); // для вывода конкретного объекта массива класса, для отладки структуры объекта
