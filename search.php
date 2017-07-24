<?php
  if ( isset($_POST['submit']) ){
    if( isset($_GET['go']) ){
      if ( preg_match("/[^a-zA-Z\s:]/", $_POST['name']) ){
         echo "Your search query contains non alphabetical characters!"; 
      } elseif (preg_match("/^[\ a-zA-Z]+/", $_POST['name']) ){

            $db = mysqli_connect ('localhost', 'root',  'test');
            if (!$db){

              echo "Cannot connect to database!"."<br>\n";
              echo "Error no: " . mysqli_connect_errno() . PHP_EOL . "</br>";

            }

            $name = $_POST['name'];

            $mydb = mysqli_select_db($db, "mytest");

            $sql = "SELECT * FROM myTable where first_name = '$name' or last_name = '$name' " ;

            $result = mysqli_query($db, $sql);

            mysqli_num_rows($result) or die("Name is not in database!");

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            foreach ($row as $key => $value) {
                echo "$key:  $value\n" . "</br>";
            }
        }
    }
  }
 ?>

