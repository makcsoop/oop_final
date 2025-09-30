<?php
// solution.php

// 1. Абстрактный класс Product
abstract class Product {
    // TODO: Добавьте свойства и методы
}

// 2. Интерфейс Discountable
interface Discountable {
    // TODO: Добавьте методы
}

// 3. Трейт Logger
trait Logger {
    // TODO: Добавьте методы
}

// 4. Класс Book
class Book extends Product implements Discountable {
    use Logger;
    
    // TODO: Реализуйте методы
}

// 5. Класс Electronics
class Electronics extends Product {
    // TODO: Реализуйте методы
}

// 6. Класс Store
class Store {
    // TODO: Реализуйте методы
}

?>