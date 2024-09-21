<?php
function dump($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
;

function dd($data)
{
    dump($data);
    die;
}
;

function checkAllowedFields($fields = [])
{
    $data = [];
    foreach ($_POST as $key => $value) {
        if (in_array($key, $fields)) {
            $data[$key] = $value;
        }
    }
    return $data;
}