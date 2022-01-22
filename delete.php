
<?php

require 'blogCls.php';

$id=$_GET['id'];
if($id=="")
{
    header("Location: index.php");
}

$blog= new BlogCls();

$a = $blog->blogDelete("id=$id");
if ($a) {
    $errors['done'] = 'deleted';
    header("Location: index.php");
}







?>