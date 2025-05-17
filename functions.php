<?php
    

    function dd($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        die();
    }

    function urlis($value)
    {
        return $_SERVER['REQUEST_URI'] === $value;
    }

    function abort($code = 404)
    {
        http_response_code($code);
        require "views/$code.php";
        die;
    }

    function authorize($condition,$status=Response::FORBIDDEN)
    {
        if($condition)
        {
            abort($status);
        }
    }

?>