<?php
require 'DbOp.php';
require 'required.php';
################################################################
# Fetch  User Data .......
$db = new DbOp();

$data=$db->selectCmd("select * from blogs","");

require './design/header.php';
require './design/nav.php';
?>



<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></li>
           
        </ol>
        <?php

if (isset($_SESSION['Message'])) {
    foreach ($_SESSION['Message'] as $key => $value) {
        # code...
        echo $value . '<br>';
    }
    unset($_SESSION['Message']);
}
?>

        <div class="card mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Content</th>                                            
                                <th>image</th>                       
                                <th>Action</th>
                            </tr>
                        </thead>
                       
                            <?php 
                                        # Fetch Data ...... 
                                        while($dataBlog = mysqli_fetch_assoc($data)){
                                      
                                    ?>
                            <tr>
                                <td><?php echo $dataBlog['id']; ?></td>
                                <td><?php echo $dataBlog['title']; ?></td>
                                <td><?php echo substr($dataBlog['content'],0,20); ?></td>
                                
                                <td> <img src="./uploads/<?php echo $dataBlog['image']; ?>" height="40px" width="40px">  </td>                          

                                <td>
                                    <a href='delete.php?id=<?php echo $dataBlog['id']; ?>'
                                        class='btn btn-danger m-r-1em'>Delete</a>
                                    <a href='edit.php?id=<?php echo $dataBlog['id']; ?>' class='btn btn-primary m-r-1em'>Edit</a>
                                </td>

                            </tr>

                            <?php 
                                        }
                                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>


<?php
require './design/footer.php';
?>
