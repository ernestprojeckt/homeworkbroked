<?php
namespace Controllers\Home;


class Page404
{
    public function index()
    {
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found");
    }

}