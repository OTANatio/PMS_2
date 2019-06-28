<?php

session_start();

if (isset($_SESSION['id'])) {
    header("Location: dashboard.php");
}

if (isset($_POST['login'])){
    include 'connector/dbhandler.php';

    function purify($data){
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    $data = trim($data);
                    return $data;
                }

        $name = mysqli_real_escape_string($conn, purify($_POST['email']));
        // $email = mysqli_real_escape_string($conn, purify($_POST['email']));
        $password = mysqli_real_escape_string($conn, purify($_POST['password']));

        $email_err = $password_err = "";


    //Check for empty field
    if (empty($name)){
        $email_err = "Email Field is required";
    }
    if (empty($password)) {
        $password_err = "Password Field is required";
    }
    else{
        $sql = "SELECT * FROM users WHERE username='$name' OR email='$name';";
        $result = mysqli_query($conn, $sql);
        $checkresult = mysqli_num_rows($result);

        if ($checkresult<1){
            $email_err = "Username/Email Not registered";

        }else if($checkresult==1){
            if ($row = mysqli_fetch_assoc($result)){
                //Dehashing the password
                $hashedpwdcheck = password_verify($password, $row['password']);

                if($hashedpwdcheck==false){
                    $password_err = "Wrong Password";

                }elseif($hashedpwdcheck==true){
                    //Check if theres an active session for the user...

                    if (isset($_SESSION["id"])) {
                        
                        $email_err = "Multiple Session not allowed";

                    }else if(!isset($_SESSION["id"])){

                        //Log the user in

                        $_SESSION['id'] = $row['id'];
                        $_SESSION['username'] = $row['username'];
                        // $_SESSION['phonenumber'] = $row['phonenumber'];
                        $_SESSION['email'] = $row['email'];

                        header('Location: dashboard.php?login=successful');
                        exit();


                    }
                }

            }
        }else{
            $email_err = "Username/Email Not registered.";
        }
    }

}else{
    $email_err = $password_err = "";
}

?>