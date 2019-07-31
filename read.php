<?php
require 'database.php';

$policies = [];
$sql = "SELECT * FROM `posts`";

if($result = mysqli_query($conn,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $policies[$i]['id']    = $row['id'];
    $policies[$i]['user_id'] = $row['user_id'];
    $policies[$i]['title'] = $row['title'];
    $policies[$i]['body'] = $row['body'];
    $i++;
  }

  echo json_encode($policies);
}
else
{
  http_response_code(404);
}



  

?>