<?php
    if(isset($_POST['fname']))
{
    $server = "localhost";
    $username = "root";
    $password = "";
    
    $con = mysqli_connect($server, $username, $password);

    if(!$con)
    {
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    //echo "success connecting to the database";
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $sql = " INSERT INTO `sbc&s`.`customer_info` (`fname`, `lname`, `email`, `mobile`, `subject`, `message`, `date`) VALUES ('$fname', '$lname', '$email', '$mobile', '$subject', '$message', current_timestamp())";
    //echo $sql;    
    
    if($con->query($sql) == true)
    {
        //echo "Successfully inserted";
    }
    else
    {
        echo "ERROR: $sql <br> $con->error";
    }

    $email_from = "XDpsp9825@Gmail.com";
    $email_subject = $subject;
    $email_body = "User Name: $fname $lname.\n".
                    "User Email: $email.\n".
                        "User Message: $message.\n";
                    
    $to = "pradiprajpurohit98@gmail.com";

    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $email \r\n";

    if (mail($to,$email_subject,$email_body,$headers))
        {
            echo "Mail send Successfully";
        }
    else
        {
            echo "Can not send mail";
        }
    $con->close();
}
header('location:index.php');

?>