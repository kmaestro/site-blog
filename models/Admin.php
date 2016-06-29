<?php


class M_Admin
{
    private static $instance;
    private $mysql;

    private  function __construct()
    {
        $this->mysql = Mysql::GetInstance();
    }

    public static function GetInstance()
    {
        if(self::$instance == null)
            self::$instance = new self;
        return self::$instance;
    }

    public function AddContent(string $img, string $title, $desc , string $ingredients, string $content, int $id_category)
    {
        $fields = [
            'id' => null,
            'img' => $img,
            'title' => $title,
            'description' => $desc,
            'content' => $content,
            'ingredients' => $ingredients,
            'id_categoty' => $id_category
        ];

        $result = $this->mysql->Insert('bl_content', $fields);
        return $result;
    }

    public function DeleteContent(int $id)
    {
        $result = $this->mysql->Delete('bl_content', "id = $id");
        return $result;
    }

    public function Login($login, $password)
    {
        $user = $this->GetByLogin($login);

        if ($user == null)
            return false;

        if ($user[0]['password'] != $password)
            return false;
        $hash = $this->Hash($user[0]['login']);
        print_r($_SESSION);
        $_SESSION['login'] = $login;
        $_SESSION['pass'] = $hash[0]['hash'];
        return true;
    }

    private function Hash($login)
    {
        $hash =['hash' => $this->GenerateStr()] ;
        $this->mysql->Update("bl_admin", $hash, "login = '$login'");
        $result = $this->mysql->Select("SELECT hash FROM bl_admin WHERE login = '$login'" );
        return $result[0];
    }

    public function GetByLogin($login)
    {
        $query = "SELECT * FROM bl_admin WHERE login = '$login'";
        $result = $this->mysql->Select($query);
        return $result[0];
    }

    private function GenerateStr($length = 10)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789';
        $code = '';
        $clen = strlen($chars) - 1;

        while (strlen($code) < $length)
        {
            $code .= $chars[mt_rand(0, $clen)];
        }
        return $code;
    }
}