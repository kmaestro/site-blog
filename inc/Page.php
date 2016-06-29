<?php


class Page extends Base
{
    private $post;
    private $admin;
    public function __construct()
    {
        parent::__construct();
        $this->post = Content::GetInstance();
        $this->menu = $this->template('views/site/menu.php', ['post' => Menu::GetInstance()->Menu()]);
        $this->admin = M_Admin::GetInstance();
    }

    public function action_index()
    {
        $post = $this->post->GetContents(PERPAGE, $_GET['nav']);
        $nav = page_navigation::GetInstance()->nav('bl_content', PERPAGE);
        $this->content = $this->template('views/site/index.php', ['post' => $post, 'nav' => $nav, 'link' => 'page/index']);
    }

    public function action_article()
    {
        $post = $this->post->GetContent($this->params[2]);
        $this->title = $post[0]['title'];
        $this->content = $this->template('views/site/article.php', ['post' => $post]);
    }

    public function action_category()
    {
        $nav = page_navigation::GetInstance()->nav1('bl_content', PERPAGE, $this->params[2]);
        $post = $this->post->CategotysContent($this->params[2], PERPAGE, $_GET['nav']);
        $this->title = $post[0]['name'];
        $this->content = $this->template('views/site/index.php', ['post' => $post, 'link' => "page/category/".$this->params[2], 'nav' => $nav]);
    }

    public function action_enter()
    {
        if (isset($_POST['submit']))
            if ($this->admin->Login($_POST['name'], sha1($_POST['pass'])) == true)
            {
                
                header('Location: /admin');
                exit();
            }
        $this->content = $this->template('views/site/enter.php');
    }

}