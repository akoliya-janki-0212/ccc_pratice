<?php
class Post{
    public $title;
    public $content;
    public function __construct($title,$content) {
        $this->title = $title;
        $this->content=$content;
    }
    public function display_info()
    {
        echo "Title : $this->title || Content : $this->content<br>";
    }

}
class Blog{
    private $posts=[];
    public function add_post(Post $post){
        $this->posts[]=$post;
    }
    public function display_all_post()
    {
        foreach($this->posts as $post)
        {
            $post->display_info();
        }
    }

}

$post1=new Post("intro. to PHP","this is php blog");
$post2=new Post("intro. to java","this is java blog");

$blog=new Blog();
$blog->add_post($post1);
$blog->add_post($post2);

$blog->display_all_post();
?>