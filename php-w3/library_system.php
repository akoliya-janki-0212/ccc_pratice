<?php
class Book{
    private $title;
    private $author;
    public function display_info(){
        echo  "Title: ".$this->title."author: ".$this->author."<br>";
    }
    function __set($property,$value){
        if(property_exists($this,$property)){
            $this->$property=$value;
        }
        else{
            echo 'this is  not existing Propery '.$property;
        }
    }
}


class Library extends Book
{
    private $books=[];
    public function add_books(Book $book)
    {
        $this->books[]=$book;
    }
    
    public function display_all_books(){
        foreach($this->books as $book){
            $book->display_info()."<br>";
        }
    }
}
$book1 = new Book();
$book1 = new Book();
$book1->title = "The Catcher in the Rye";
$book1->author = "J.D. Salinger";

$book2 = new Book();
$book2->title = "To Kill a Mockingbird";
$book2->author = "Harper Lee";
    
$library=new Library();
$library->add_books($book1);
$library->add_books($book2);
$library->display_all_books();
?>