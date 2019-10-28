<?php
echo "<link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\"/>";

if($_POST["username"] != ""){
  $name = $_POST["username"];



  $mysqli = new mysqli("mysql.eecs.ku.edu", "flobbus", "flobbysia", "flobbus");

  /* check connection */
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }

    $query = "SELECT user_id FROM Users;";

    if ($result = $mysqli->query($query)) {
  //    printf("gOT HERE");
  //    /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
    //    printf("gOT HERE");

        if($row[user_id] == $name){
        printf ("%s is already in the database!\n", $name);
        exit();
        }
      }
      $create = "INSERT INTO Users (user_id) VALUES ('$name');";
      $mysqli->query($create);
      printf ("%s has been added to the database!\n", $name);

    }

/* free result set */
    $result->free();
    $mysqli->close();


/* close connection */

}
else{
  printf ("This field can't be empty!");
  exit();
}
?>
