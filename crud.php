<?php  
 class Crud  
 {  
      public  $connect;  
      private $host = 'localhost';  
      private $username = 'root';  
      private $password = '';  
      private $database = 'personscrud'; 
      public $customerTable = "crud";
      public function __construct()  
      {  
           $this->database_connect();  
      }  
      public function database_connect()  
      {  
           $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);  
           
      }  
      public function execute_query($query)  
      {  
           return mysqli_query($this->connect, $query);  
      } 
      public function getRecordById($id)
      {
         $query = "SELECT * FROM `crud` LEFT JOIN `gender` ON `crud`.`gender_id`=`gender`.`gender_id` WHERE id = '$id'";
         $result=mysqli_query($this->connect, $query);
         $response=array();
         while($row=mysqli_fetch_assoc($result)){
            $response=$row;
            return $response;
        }
       
        return $response;
    
    }
      public function get_data_in_table($query)  
      {  
           $table = '';  
           $result = $this->execute_query($query);  
           $table .= '<table class="table table-striped">
           <thead class="thead-dark">
             <tr> 
               <th scope="col">ID</th>
               <th scope="col">Name</th>
               <th scope="col">Surname</th>
               <th scope="col">Email </th>
               <th scope="col">Phone</th>
               <th scope="col">Gender</th>
               <th scope="col">Operation</th>
             </tr>
           </thead>' ;
           $sql="SELECT * FROM `crud` LEFT JOIN `gender` ON `crud`.`gender_id`=`gender`.`gender_id`";
           $result=mysqli_query($this->connect,$sql);
           while($row=mysqli_fetch_assoc($result)){
               $id=$row['id'];
               $name=$row['name'];
               $surname=$row['surname'];
               $email=$row['mail'];
               $phone=$row['number'];
               $gender=$row['gender'];
               $table.='<tr>
               <td scope="row">'.$id.'</td>
               <td>'.$name.'</td>
               <td>'.$surname.'</td>
               <td>'.$email.'</td>
               <td>'.$phone.'</td>
               <td>'.$gender.'</td>
               <td>
               <button class="btn btn-primary" onclick="GetDetails('.$id.')">Edit</button>
               <button class="btn btn-danger" onclick="DeleteUser('.$id.')">Delete</button>  
               </td>
              </tr>';  
          }
          $table.='</table>';
           echo $table;
      }



    }
 ?>  