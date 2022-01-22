<?php
// # TASK .
// Build a Blog (CRUD) using oop 
// Title  = [required , string]
// Content = [required,length >50 ch]
// Image = [required, file].

function Validate($input,$flag,$length = null){
    $status = true;
     switch ($flag) {
         case 1:
             # code...
             if (empty($input)) {
                $status = false;
             }
             break;     
        case 2: 
           #code .... 
           if (strlen($input) < $length){
               $status = false;
           }  
           break;
          case 3: 
            # Code ....
            $allowedExt = ['png','jpg']; 
                 if(!in_array($input,$allowedExt)){
                    $status = false;
                 }
            break;
     }
     return $status;
  }
   function Messages($Message){
    foreach ($Message as $key => $value) {
            # code...
            echo '* ' . $key . ' : ' . $value . '<br>';      
        }

   }
