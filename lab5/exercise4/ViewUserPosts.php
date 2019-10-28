<?php
echo "<link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\"/>";
$name = $_POST['name'];
if($name != ""){
  $mysqli = new mysqli("mysql.eecs.ku.edu", "flobbus", "flobbysia", "flobbus");
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }
    $query = "SELECT * FROM Posts WHERE author_id = '$name';";
    if ($result = $mysqli->query($query)) {
      echo "<br><br><p>Posts:</p><table align=\"center\">";
      while ($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row[content]."</td</tr>";
        }
      echo "</table>";
      }
    }
  else
  echo "<br><br><p>No User Selected!</p>";
    $result->free();
    $mysqli->close();
?>
