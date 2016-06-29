<?php


abstract class Controller
{
    protected $params;
    protected abstract function render();
    
    protected abstract function before();
    
    public function request($action, $params)
    {
        $this->params = $params;
        $this->before();
        $this->$action();
        $this->render();
    }
    
    protected function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] == "GET";
    }

    protected function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == "POST";
    }

    protected function template($path, $params = [])
    {
        foreach ($params as $k => $v)
        {
            $$k = $v;
        }

        ob_start();
        include $path;
        return ob_get_clean();
    }

    public function __call($name, $arguments)
    {
        die("Unknown method");
    }

}