<?php 
class Book {
    private $title;
    private $author;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function __toString() {
        return "Автор: {$this->author}";
    }
}

$book = new Book('Война и мир', 'Лев Толстой');
echo $book; // Книга: Война и мир, Автор: Лев Толстой
?>
