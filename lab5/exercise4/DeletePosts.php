<?php
echo "<link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\"/>";

  $mysqli = new mysqli("mysql.eecs.ku.edu", "flobbus", "flobbysia", "flobbus");
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }
    $checkyCheese = $_POST['checkBox'];
    if(count($checkyCheese) >0){
      for($i = 0; $i < count($checkyCheese); $i++){
        $query = "DELETE FROM Posts WHERE post_id = '$checkyCheese[$i]';";
        $mysqli->query($query);
        echo "<p>Deleted post_id ".$checkyCheese[$i]."</p>";
      }
    }
    else{
      echo "<p>No posts selected!</p>";

    }
    $result->free();
    $mysqli->close();
?>
