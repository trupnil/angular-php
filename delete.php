<?php
require 'database.php';
// Extract, validate and sanitize the id.
$id = ($_GET['id']);
echo $id;
if(!$id)
{
  return http_response_code(400);
}

// Delete.
$sql = "DELETE FROM `posts` WHERE `id`=$id LIMIT 1";

if(mysqli_query($conn, $sql))
{
  http_response_code(204);
}
else
{
  return http_response_code(422);
}

?>