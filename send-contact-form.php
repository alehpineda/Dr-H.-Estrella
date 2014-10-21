<?php
if($_POST) {
    /* Email data */
    $cust_name = $_POST['name'];
    $cust_email = $_POST['email'];
    $cust_message = $_POST['message'];
    $email_to = $_POST['email_to'];
    $email_subject = $_POST['email_subject'];
    $email_from= $cust_email;

    $header = "From:" . $email_from . "\r\n";
    $header .= 'MIME-Version: 1.0' ."\r\n";
    $header .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
    $body  = "Customer email: " . $cust_email . "<br/>";
    $body .= "Customer name: " . $cust_name . "<br/>";
    $body .= "Message: " . $cust_message;
    if(mail($email_to, $email_subject, $body, $header)) {
        echo '<strong>Tu email se ha enviado con exito.</strong><br/>Gracias por contactarnos. Nos comunicaremos contigo a la brevedad.';
        echo '<script>$("#contact-form").each(function(){
                    this.reset();
                });
                </script>';
    } else {
        echo "<strong>Error al enviar tu email, por favor contacta al administrador.</strong>";
    }

}
?>