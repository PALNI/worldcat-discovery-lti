<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", 1);
require_once 'ims-blti/blti.php';
$lti = new BLTI("secret", false, false);

session_start();
header('Content-Type: text/html;charset=utf-8');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Building Tools with the Learning Tools Operability Specification</title>
  </head
  <body>
  <?php 
    if ($lti->valid) {
  ?>
    <h2>Search WorldCat Discovery</h2>
      <form action="results.php" method="post" encType="application/x-www-form-urlencoded">
        Search: <input type="text" name="query" id="query" />
         <?php
    foreach($_POST as $key => $value) {
      echo "<input type=\"hidden\" name=\"" .$key .  "\" value=\"" . $value . "\" />\n";
    }
  ?>
      <input type="submit" name="submit" value="Submit" />
      </form>
    <pre>
    </pre>
    <?php
      } else {
    ?>
      <h2>This was not a valid LTI launch</h2>
      <p>Error message: <?= $lti->message ?></p>
    <?php
      }
    ?>
    </body>
</html>
