<!-- Connecting to mysql -->

<?php
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "schooladmincrudapp");

$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

if (!$connection) {
  # code...
  die("Connection Failed");
}
// else{
//   echo"Congratulations, You are connected";
// }
?>