<?php
$var = "val";

$arr = array("v" => "$var");

foreach ($arr as $key => $value)
{
    echo $key." ".$value;
}