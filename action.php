<?php  
 include 'crud.php';  
 $object = new Crud();  
 if(isset($_POST["action"]))  
 {  
      if($_POST["action"] == "Load")  
      {  
           echo $object->get_data_in_table("SELECT * FROM `crud` ORDER BY id DESC");  
      }  
          
    
    
        if($_POST["action"] == "Delete")  
      {  
        
        $query = "DELETE FROM `crud` WHERE id = '".$_POST["deletesend"]."'";
        $object->execute_query($query);
       
   
      }  
      if($_POST["action"] == "Insert")  
      {  
        $nameSend = mysqli_real_escape_string($object->connect, $_POST["nameSend"]);
        $surnameSend = mysqli_real_escape_string($object->connect, $_POST["surnameSend"]);
        $emailSend = mysqli_real_escape_string($object->connect, $_POST["emailSend"]);
        $mobileSend = mysqli_real_escape_string($object->connect, $_POST["mobileSend"]);
        $genderSend = mysqli_real_escape_string($object->connect, $_POST["genderSend"]);
        

    
           $query = "insert into `crud` (name,surname,mail,number,gender_id)
           values ('".$nameSend."', '".$surnameSend."', '".$emailSend."','".$mobileSend."','".$genderSend."')";
           $object->execute_query($query);  
           
      }  
      if($_POST["action"] == "getjson") 
      {
        $updateid = $_POST['updateid'];
        $row = $object->getRecordById($updateid);
        echo json_encode($row);
     }
  

      if($_POST["action"] == "Edit"){
      
     $uniqueid = mysqli_real_escape_string($object->connect, $_POST["hiddendata"]);
     $name = mysqli_real_escape_string($object->connect, $_POST["updatename"]);
     $surname = mysqli_real_escape_string($object->connect, $_POST["updatesurname"]);
     $mail = mysqli_real_escape_string($object->connect, $_POST["updatemail"]);
     $number = mysqli_real_escape_string($object->connect, $_POST["updatemobile"]);
     $gender = mysqli_real_escape_string($object->connect, $_POST["updategender"]);
     $query = "UPDATE `crud` set  name= '".$name."', surname = '".$surname."', mail = '".$mail."', number = '".$number."', gender_id = '".$gender."' WHERE id = '".$uniqueid."'";
     $object->execute_query($query);
      }
    } 

  
 ?>  