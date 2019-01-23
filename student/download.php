<?php
if(isset($_GET['nid']))
{
include("../connect.php");
ob_start();

$nid    = $_GET['nid'];
$query = "SELECT note_name, note_type, note_size, note_file " .
         "FROM notes WHERE note_id = '$nid'";

$result = mysqli_query($conn,$query) or die('Error, query failed');
list($name, $type, $size, $content) = mysqli_fetch_array($result);

header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
echo $content;


exit;
}

?>
