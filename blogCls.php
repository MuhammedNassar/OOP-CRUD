<?php
session_start();
require 'DbOp.php';
require 'Validation.php';

class BlogCls
{
    private $title;
    private $content;
    private $image;

    // function __construct( )
    // {
  
    // }

    public function InsertBlog($title, $content , $img )
    {

        ##  Obj  Validator  
        $validator = new Validation();
       
        # Clean ....
        $this->title     = $validator->Clean($title);
        $this->content    = $validator->Clean($content);
        $this->image = $validator->Clean($img);

        # Validation .....
        $errors = [];

      
        if (!$validator->Validate($this->title, 1)) {
            $errors['Name'] = 'Field Required';
        }
        if (!$validator->Validate($this->content,1)) {
            $errors['content'] = 'Field Required';
        }
        if (!$validator->Validate($this->content,2)) {
            $errors['contentLength'] = 'minimuim chars is 50 ';
        }
       
       #  ERRORS ...   
        if (count($errors) > 0) {
            $Message = $errors;
        }else{
    
    
        $db = new DbOp();

         $sqlArray = array("title"=>$this->title ,"content"=> $this->content,"image"=>$this->image);

         $op  = $db->createCmd("Blogs",$sqlArray);
         if($op){
             $Message = ['Raw Inserted'];
         }else{
             $Message = ['Error Try Again !!!!!'];
         }
                }

        
        $_SESSION['Message'] = $Message;
    
    }



    public function blogInfo($strId){
        $db = new DbOp(); 
       $data= $db->selectCmd("select * from blogs","id=".$strId);
       return $data;
    }
    public function blogEdit($strTable,$array=[],$strId){
        $db = new DbOp(); 
       $db->updateCmd($strTable,$array,$strId);

    }
    public function blogDelete($strwhere){
        /// Assign $strwhere by "ALL" delete *  
        // type condeition as param
        $db = new DbOp(); 
 $done=       $db->deleteCmd("blogs",$strwhere);

    return $done;

    }
}

?>
