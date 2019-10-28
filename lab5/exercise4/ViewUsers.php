<?php
echo "<link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\"/>";
  $mysqli = new mysqli("mysql.eecs.ku.edu", "flobbus", "flobbysia", "flobbus");
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }
    $query = "SELECT user_id FROM Users;";
    if ($result = $mysqli->query($query)) {
      echo "<br><br><table align=\"center\"><tr><td>Users:</td</tr>";
      while ($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row[user_id]."</td</tr>";
        }
      echo "</table>";
      }
  else
  echo "<br><br><table align=\"center\"><tr><td>No Users Found!</td</tr></table>";
    $result->free();
    $mysqli->close();
?>
