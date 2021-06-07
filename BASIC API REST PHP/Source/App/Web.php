<?php

namespace Source\App;

class Web
{
    public function home()
    {
        echo "<h1>Home</h1>";
    }

    public function error($data)
    {
        echo "<h1>Error {$data['errcode']}</h1>";

        var_dump($data);
    }
}
