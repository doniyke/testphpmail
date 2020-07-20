<?php
// Make sure each form input element has a name 
// Note : this script only works on a live host and mails do not work on local host

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send'])) {
        // get content of elemets by name on submit


        $name = test_input($_POST['name']);
        $email = test_input($_POST['email']);
        $phone = test_input($_POST['phone']);
        $reason = test_input($_POST['reason']);
        $message = test_input($_POST['message']);

        $msg = "New Contact Message From Your Website Name \nName : $name \nEmail : $email \nPhone Number : $phone \nReason For Contact : $reason \nMessage : $message";

        if (mail('yoremal@domainname', 'New Message', $msg)) {
            echo '
                <script>
                    alert("Thank you for reaching out to us. We will get back to you shortly");
                    window.history.back();
                </script>
            ';
            // message on successful email
            // window.history.back(); // use to get back to the contact page
        }else{
            echo '
                <script>
                    alert("Sorry, there was an error sending your message, please refresh and try again")
                    window.history.back();
                </script>
            ';
            // message on successful email
            // window.history.back(); // use to get back to the contact page
        }

}


?>

