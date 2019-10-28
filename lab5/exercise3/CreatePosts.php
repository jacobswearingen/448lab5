<?php
echo "<link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\"/>";

if(($_POST["username"] != "")&&($_POST["post"] != "")){
  $name = $_POST["username"];
  $post = $_POST["post"];
  $mysqli = new mysqli("mysql.eecs.ku.edu", "flobbus", "flobbysia", "flobbus");

  /* check connection */
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }

    $query = "SELECT user_id FROM Users;";
    $present = false;
    if ($result = $mysqli->query($query)) {
      while ($row = $result->fetch_assoc()) {
        if($row[user_id] == $name){
          printf ("Welcome, %s!\n", $name);
          $present = true;
        }
      }
    if($present){
      $create = "INSERT INTO Posts (post_id, content, author_id) VALUES (DEFAULT, '$post', '$name');";
      $mysqli->query($create);
      printf ("Your post has been added to the database!\n");
    }
    else{
      printf("Invalid username! You've gotta make an account first before you can post!\n");
    }
  }

/* free result set */
    $result->free();
    $mysqli->close();


/* close connection */

}
else{
  printf("You need to have a %s", ($_POST["username"] != "") ? "post!\n" : "username!\n");
  exit();
}
?>
