<?php
require 'blogCls.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    //$img =isset( $_POST['image']);

    if (empty($_FILES['image']['name'])) {
        $errors['Image'] = 'Field Required';
    } else {

        $ImgTempPath = $_FILES['image']['tmp_name'];
        $ImgName     = $_FILES['image']['name'];

        $extArray = explode('.', $ImgName);
        $ImageExtension = strtolower(end($extArray));


        $FinalName = time() . rand() . '.' . $ImageExtension;
        $disPath = './uploads/' . $FinalName;
        if (move_uploaded_file($ImgTempPath, $disPath)) {
            $blog = new blogCls();

            $blog->InsertBlog($title, $content, $FinalName);
        }
            }
}


?>
<?php
require './design/header.php';
require './design/nav.php';
?>

    <div class="container">


        <h2>create</h2>
        <br>
        <?php

        if (isset($_SESSION['Message'])) {
            foreach ($_SESSION['Message'] as $key => $value) {
                # code...
                echo $value . '<br>';
            }
            unset($_SESSION['Message']);
        }
        ?>

        <form action="create.php" enctype="multipart/form-data" method="POST">

            <div class="form-group">
                <label for="exampleInputName">title</label>
                <input type="text" class="form-control" id="exampleInputName" name="title" aria-describedby="" placeholder="Enter title">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">content</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="content" aria-describedby="" placeholder="Enter content">
            </div>

            <div class="form-group">
            <label class="labels">Picture</label>
            <input type="file" class="form-control" placeholder="Choose" name="image">

            </div>




            <button type="submit" class="btn btn-primary">Submit</button>
        </form>



<?php
require './design/footer.php';
?>
