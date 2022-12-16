<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "luca.ferraro_97@yahoo.it";
 
    $email_subject = "ilucas contacting";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
  
        // echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        // echo "These errors appear below.<br /><br />";
 
        // echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }

     
 $test = $_POST['first_name']." ".$_POST['last_name']." ".$_POST['email']." ".$_POST['telephone']." ".$_POST['comments']." ";
    // validation expected data exists
 
    if(isset($_POST['first_name']) || isset($_POST['last_name']) || isset($_POST['email']) || isset($_POST['telephone']) ||isset($_POST['comments'])) {
//died("Errore");
    } else {
      echo "OK";
    }
 
     
 
    $first_name = $_POST['first_name']; // required
 
    $last_name = $_POST['last_name']; // required
 
    $email_from = $_POST['email']; // required
 
    $telephone = $_POST['telephone']; // not required
 
    $comments = $_POST['comments']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= ' <script> alert ("Email NON valida"); window.location.replace("http://www.ilucas.it/#contact");</script>';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= ' <script> alert ("Nome NON valido"); window.location.replace("http://www.ilucas.it/#contact");</script>';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= ' <script> alert ("Cognome NON valido"); window.location.replace("http://www.ilucas.it/#contact");</script>';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= ' <script> alert ("Testo NON valido"); window.location.replace("http://www.ilucas.it/#contact");</script>';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Dettagli di seguito\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
 <script> alert ("Grazie per avermi contattato"); window.location.replace("http://www.ilucas.it");</script>
 
<?php
 
}
 
?>