<?php
// test_system.php

require_once 'solution.php';

class SimpleTest {
    public function runAllTests() {
        $results = [];
        
        $results['test_inheritance'] = $this->testInheritance();
        $results['test_interface'] = $this->testInterface();
        $results['test_trait'] = $this->testTrait();
        $results['test_magic_methods'] = $this->testMagicMethods();
        $results['test_static'] = $this->testStatic();
        
        return $results;
    }
    
    private function testInheritance() {
        $book = new Book("PHP Basics", 29.99, "John Doe");
        return $book instanceof Product;
    }
    
    private function testInterface() {
        $book = new Book("PHP Basics", 29.99, "John Doe");
        return $book instanceof Discountable;
    }
    
    private function testTrait() {
        $book = new Book("PHP Basics", 29.99, "John Doe");
        // Проверяем что метод log существует
        return method_exists($book, 'log');
    }
    
    private function testMagicMethods() {
        $book = new Book("PHP Basics", 29.99, "John Doe");
        // Проверяем __toString
        $string = (string)$book;
        return strpos($string, "PHP Basics") !== false;
    }
    
    private function testStatic() {
        $initialCount = Product::getTotalProducts();
        $book = new Book("Test", 10, "Author");
        return Product::getTotalProducts() === $initialCount + 1;
    }
    
    public function printResults($results) {
        echo "=== РЕЗУЛЬТАТЫ ТЕСТИРОВАНИЯ ===\n\n";
        
        $passed = 0;
        foreach ($results as $test => $result) {
            $status = $result ? '✅ ПРОЙДЕН' : '❌ НЕ ПРОЙДЕН';
            echo str_pad($test, 20) . ": $status\n";
            if ($result) $passed++;
        }
        
        echo "\nПройдено: $passed/" . count($results) . "\n";
    }
}

// Запуск тестов
$test = new SimpleTest();
$results = $test->runAllTests();
$test->printResults($results);

// Демонстрация работы
echo "\n=== ДЕМОНСТРАЦИЯ ===\n";

$store = new Store();

$book1 = new Book("PHP Programming", 39.99, "Jane Smith");
$book1->applyDiscount(10);

$book2 = new Book("OOP in PHP", 34.99, "Mike Johnson");

$laptop = new Electronics("Laptop", 999.99, "Dell");

$store->addProduct($book1);
$store->addProduct($book2);
$store->addProduct($laptop);

$store->displayProducts();
echo $store . "\n";
echo "Всего продуктов: " . Product::getTotalProducts() . "\n";

?>