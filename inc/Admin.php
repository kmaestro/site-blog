<?php


class Admin extends Base
{
    private $post;
    private $admin;
    public function __construct()
    {
        parent::__construct();
        $this->menu = $this->template('views/admin/menu.php', ['post' => Menu::GetInstance()->Menu()]);
        $this->post = Content::GetInstance();
        $this->admin = M_Admin::GetInstance();

    }

    public function action_index()
    {
        $post = $this->post->GetContents(PERPAGE, $_GET['nav']);
        $nav = page_navigation::GetInstance()->nav('bl_content', PERPAGE);
        $this->content = $this->template('views/admin/index.php', ['post' => $post, 'nav' => $nav, 'link' => 'admin/index']);
    } 
    
    public function action_add()
    {
        if (isset($_POST['submit']))
        {
                if ($_FILES['img']['error'] == 0)
                {
                    $this->admin->AddContent($_FILES['img']['name'], $_POST['title'], $_POST['deck'], $_POST['ing'], $_POST['content'], $_POST['k']);
                    copy($_FILES['img']['tmp_name'], "img/".basename($_FILES['img']['name']));
                    header('Location: /admin');
                    exit();
                }

        }
        $this->content = $this->template('views/admin/add.php', ['menu' => Menu::GetInstance()->Menu()]);
    } 
    
    public function action_edit()
    {

        $this->content = $this->template('views/admin/edit.php', ['menu' => Menu::GetInstance()->Menu()]);
    } 
    
    public function action_delete()
    {
        if (isset($this->params[2]))
        {
            $this->admin->DeleteContent($this->params[2]);
            header("Location: /admin");
            exit();
        }

        $this->content = $this->template('views/site/index.php');
    }
}