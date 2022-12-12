<?php

foreach($_POST as $key=>$value)
    $_POST[$key] = htmlentities($value);

  $name = $_POST['name']; //d
  $visitor_email = $_POST['email'];
  $message = $_POST['message'];

  if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
   
}   

if(filter_var("chris@example.com", FILTER_VALIDATE_EMAIL)) {
    // it's valid so do something
}
else {
    // it's not valid so do something else
}

	$email_from = 'mostafafateh20@gmail.com'; 

	$email_subject = "New Form submission";

	$email_body = "You have received a new message from the user $name.\n";
                           
?>
<?php
  										$to = "mostafafateh20@gmail.com"; 
 									    $headers = "From: $email_from \r\n";
 										
 										mail($to,$email_subject,$email_body,$headers);
                                         header("Location:thanku.html");
                                         exit();
                                         

?>
<?php
function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}


?>