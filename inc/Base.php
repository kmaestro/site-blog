<?php


abstract class Base extends Controller
{
    protected $title;
    protected $content;
    protected $menu;
    
    public function __construct()
    {
        Counter::GetInstance()->c($_SERVER['REMOTE_ADDR'], date('Y-m-d'));
    }
    
    public function before()
    {
        
        $this->title = 'cooking-tasty.ru';
        $this->content = "My content";
    }
    
    public function render()
    {

        $params = ['title' => $this->title, 'content' => $this->content, 'menu' => $this->menu];
        $page = $this->template("views/layouts/main.php", $params);
        
        echo $page;
        
    }
}