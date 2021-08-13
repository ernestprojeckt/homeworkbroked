<?php
namespace Controllers\Admin;

abstract class Main
{
    public function  head(){
        printf("%s","<h1>".self::class."</h1>" );

    }


}