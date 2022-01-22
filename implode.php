<?php

$str = array("name" => "name", "age" => "age" , "email" => "email" ,"password"=>"password");

$f = "insert into  xxxx (".implode(",",array_keys($str)).") Values ('".implode("','",array_values($str))."')";

echo $f;

echo '<br>';

$strU = array("name" => "name", "age" => "age" , "email" => "email" ,"password"=>"password");
 ;


echo $strfinal . $strloop;

// $ff = "insert update xxxxx set ".implode('',array_keys($strU))." = ".implode('',array_values($strU)) ;

// $Col = array(array_keys($strU));
// $Val =array
// print_r($SS);

// echo $ff;


?>