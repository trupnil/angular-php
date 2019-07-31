<?php
require 'db.php';
//echo "hi"; exit;

// Get the posted data.
$postdata = file_get_contents("php://input");
//print_r($postdata); 

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
//print_r($request);

  // Validate.
  if(trim($request->userid) === '' || (float)$request->title || $request->body < 0)
  {
    return http_response_code(400);
  }

  // Sanitize.
  // $number = mysqli_real_escape_string($con, trim($request->number));
  // $amount = mysqli_real_escape_string($con, (int)$request->amount);


  // Create.
   $sql = "INSERT INTO `posts`(`user_id`,`title`,`body`) VALUES ('$request->userid','$request->title','$request->body')";

  $ex = mysqli_query($con,$sql);

  echo http_response_code(422);
  
}
