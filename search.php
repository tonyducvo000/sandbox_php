<?php
  if( isset($_POST['submit']) ){
    if( isset($_GET['go']) ){
      if( preg_match("/^[  a-zA-Z]+/", $_POST['name']) ){

        $name = $_POST['name'];

        $db = mysqli_connect ('localhost', 'root',  'Lithium0!');
        if (!$db){

          echo "Cannot connect to database!"."<br>\n";
          echo "Error no: " . mysqli_connect_errno() . PHP_EOL . "</br>";

        } else echo "Connection success!\n" . "</br></br>";

        $mydb = mysqli_select_db($db, "mytest");

        $sql = "SELECT * FROM myTable";

        $result = mysqli_query($db, $sql);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        foreach ($row as $key => $value) {
            echo "$key:  $value\n" . "</br>";
        }
      }
    }
  }
?>
