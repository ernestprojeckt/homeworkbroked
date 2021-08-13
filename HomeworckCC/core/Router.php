<?php
namespace Core;
use Controllers\Admin\Index;
use Controllers\Home\Page404;

use Controllers\Admin\Main;
use Controllers\Admin\About;



final class Router
{

    private $href;

    public function __construct()
    {
        $this->href = $_SERVER["PATH_INFO"];
        $this->href = rtrim($this->href, '/');
        $this->href = explode('/', $this->href);
    }

    public function run()
    {
        if (isset($this->href[1])) {
            if (ucfirst($this->href[1]) === 'Admin') {
                $ControlesName = 'Controllers\\Admin\\' . ucfirst($this->href[1]);
            } else {
                $ControlesName = 'Controllers\\Home\\' . ucfirst($this->href[1]);
            }
            if (class_exists($ControlesName)) {

                $ClassObj = new $ControlesName;
                if (isset($this->href[2])) {

                    $fun1 = $this->href[2];
                    $fun2 = $fun1;
                    if (method_exists($ClassObj, $fun2)) {
                        $ClassObj->$fun2();
                    }
                }
            } //else {
                //$ClassObj = new Page404();

          //  }
        }else
        {
            $ClassObj = new index();
            $ClassObj->head();
        }


    }
}
