<?php
namespace Nurdin\BinaryTalk\Middleware;

interface Middleware
{
    public function auth() : void;
}

?>