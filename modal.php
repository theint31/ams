<?php 
include_once 'controller/employeecontroller.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

$id=$_GET['id'];
$empcontroller = new EmployeeController();
$results = $empcontroller->viewEmployee($id);

if(isset($_POST['send'])){
    if(!empty($_POST['name'])){
        $name = $_POST['name'];
    }
    if(!empty($_POST['email'])){
        $email = $_POST['email'];
    }
    if(!empty($_POST['subj'])){
        $subj = $_POST['subj'];
    }
    if(!empty($_POST['body'])){
        $body = $_POST['body'];
    }

     // passing true in constructor enables exceptions in PHPMailer
     $mail = new PHPMailer(true);

     try {
         // Server settings
         //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
         $mail->isSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->SMTPSecure = 'tls';   
         $mail->Port = 587;

         $mail->Username = 'theintshwesinmyomgy3199@gmail.com'; // YOUR gmail email
         $mail->Password = 'chxcdkzonpbdfmup'; // YOUR gmail password from app password

         // Sender and recipient settings
         $mail->setFrom('theintshwesinmyomgy3199@gmail.com', 'Sender Name');
         //$mail->addAddress()
         $mail->addAddress($email, $name);

     // Setting the email content
         $mail->IsHTML(true);
         $mail->Subject = $subj;
         $mail->Body = $body;
         $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

         $mail->send();
         //echo "Email message sent.";
         header('location:empindex.php');
         
     } catch (Exception $e) {
         echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
     }
}

include_once 'layouts/header.php';
?>
<div id="app">
    <?php 
    include_once ('layouts/sidebar.php');
    ?>
        <div id="main">
        <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <h1>Employee Form</h1>
             <!-- Start Modal Box -->
             <section class="content" style="padding-top: 20px">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="name">User Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?php  echo $results['emp_name']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?php  echo $results['emp_email']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="subj">Subject</label>
                                <textarea name="subj" id="subj" class="form-control" cols="5" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" class="form-control" cols="20" rows="8"></textarea>
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" name="send" class="btn btn-success" id="send">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                
              
            </section>
            <!-- End Modal Box -->
           
           
           
        </div>
    </div>
<?php 
    include_once 'layouts/footer.php';
?>

