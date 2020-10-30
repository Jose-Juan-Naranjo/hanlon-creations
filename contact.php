<?php

    $msg = '';
    $msgClass= '';

if (filter_has_var(INPUT_POST, 'submit') ) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if(!empty($email) && !empty($name) && !empty($message) ) {

        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $msg = 'Please use a valid email';
            $msgClass = 'alert-danger';
        } else {
            $toEmail = 'bruceh.hcc@gmail.com';
            $subject = 'Contact Request From '.$name;
            $body = '<h2>Contact Request</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Message</h4><p>'.$message.'</p>';
                $headers = "MIME-Version: 1.0" ."\r\n";
                $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: " .$name. "<".$email.">". "\r\n";
                if(mail($toEmail, $subject, $body, $headers) ) {
                    $msg = 'Your email has been sent';
                    $msgClass = 'alert-success'; 
                }else {
                    $msg = 'Your email was not sent';
                    $msgClass = 'alert-danger';

                } 
        }

    } else {
        $msg = 'Please fill in all fields';
        $msgClass = 'alert-danger';

    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="css/contact.css">

  <title>Contact</title>

</head>
<body>
    <header class="header">
        <nav class="nav">
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="gallery.html">GALLERY</a></li>
            </ul>

        </nav>
        
        <h1><a href="index.html">Hanlon Concrete Creations</a></h1>
        
        <h3>CONTACT</h3>
    </header>
    <?php if($msg != ''): ?>
        <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
<?php endif; ?>
    <div class="form">

        <div class="contact">
            
            <p>Please leave your name, email and a message. I will contact you as soon as possible. Thank you!</p>
        </div>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-box">
             <!-- --------NAME---------- -->
                <input type="text" name="name" placeholder="Name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">

                <!-- ---------Email---- -->
                <input type="text" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">


                <!-- ----------Message---- -->
                <label for="message">Message</label>
                
                <textarea type="text" name="message" rows="4"><?php echo isset($_POST['message']) ? $message : ''; ?>
                </textarea>

                <div class="buttons">
                <button class="btn btn-primary" type="submit" name="submit">SUBMIT</button>

                <a href="index.html">
                        BACK</a>
                </div>
            
            </div>
        </form>
        
    </div>
    
<script src="main.js"></script>

</body>
</html>