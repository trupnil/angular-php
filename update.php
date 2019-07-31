<?php
require 'db.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

  // Validate.
  // if ((int)$request->user_id < 1 || trim($request->number) == '' || (float)$request->amount < 0) {
  //   return http_response_code(400);
  // }

  // Sanitize.

  // Update.
  echo $sql = "UPDATE `posts` SET `title`='$request->title',`body`='$request->body' WHERE `user_id` = '$request->userid' LIMIT 1";
  

  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}

?>