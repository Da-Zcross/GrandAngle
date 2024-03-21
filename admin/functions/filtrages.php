<?php 

function test_input($data)
{
    $data = stripslashes($data);
    $data = trim($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

function comment($data)
{
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

function charactFilter($data)
{
    $result = preg_match("/^[a-zA-Z- ' ]*$/",$data);
    return $data;

        if ($result === false) {
            return false;
        }
    
        return $result === 1;
}


function mailVerif($data)
 {
    $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    return preg_match($pattern, $data);
 }
