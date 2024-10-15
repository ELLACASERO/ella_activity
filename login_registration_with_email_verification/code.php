<?php
session_start();
include('db.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

function sendemail_verify($name, $email, $verify_token) {
$mail = new PHPMailer(true);

    //Server settings
    //$mail->SMTPDebug = 3;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ellaanana49@gmail.com';                     //SMTP username
    $mail->Password   = 'eelq yjcu qcoj ehys';                               //SMTP password
    $mail->SMTPSecure = "ssl";            
    $mail->Port       = 465;  
    
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    

    //Recipients
    $mail->setFrom('ellaanana49@gmail.com', 'Ella');
    $mail->addAddress($email, $name);     //Add a recipient
    

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Email verification from Ella';
    $email_template = "
            <h1>You have Registered with Ella</h1>
            <h4>Verify your Email address to login with the link below:</h4>
            <br><a href='http://localhost/ella_activity/login_registration_with_email_verification/verify_email.php?token=$verify_token'>Click here to verify</a></b>
    ";
    $mail->Body    = $email_template;
    $mail->AltBody = 'Verify your email address to complete the registration.';

    try {
        $mail->send();
        return true;    
    } catch (Exception $e) {
        return false;
    }
   
}

if (isset($_POST['register_btn'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone']; 
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $verify_token = md5(rand()); 

    
    //Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['status'] = "It looks like you already have an account with us. 
        Try logging in or use a different email address.";
        header("Location: register.php");
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, phone, email, password, verify_token) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss', $name, $phone, $email, $password, $verify_token);
        $query_run = $stmt->execute();

        if ($query_run) {
            sendemail_verify($name, $email, $verify_token);
            $_SESSION['status'] = "Success! We’ve sent you a confirmation email.
             Please check your inbox to verify your account and get started";
            header("Location: register.php");
        } else {
            error_log("SQL Error: " . $stmt->error);
            $_SESSION['status'] = "Oops! Something went wrong with your registration. 
            Please try again, or contact support if the issue persists.";
            header("Location: register.php");
        }
     }
     $stmt->close();
    }
?>
