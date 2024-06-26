<?php
    require_once 'header.php';
    
    $error = $user = $pass = "";

    if(isset($_POST['user'])) {
        $user = sanitizeString($_POST['user']);
        $pass = sanitizeString($_POST['pass']);

        if($user == "" || $pass == "") {
            $error = 'Not all fields were entered';
        } else {
            $result = queryMysql("SELECT user,pass FROM members
                WHERE user='$user' AND pass='$pass'");
        }

        if($result->rowCount() == 0) {
            $error = "Invalid login attempt";
        } else {
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;

            die("<div class='center'>You are now logged in. Please
            <a data-transition='slide' href='members.php?view=$user&r=$randstr'>
            Click here</a> to continue.    
            </div>");
        }

    }




echo <<<_END

    <form method='post' action='login.php?r=$randstr' class='signuplogin-form'>
        
        <div data-role='fieldcontain'>
            <label></label>
            <span class='error'>$error</span>
        </div>
        
        <div data-role='fieldcontain'>
            <label></label>
            Please enter your details to log in 
        </div>

        <div data-role='fieldcontain'>
            <label>Username</label>
            <input type='text' maxlength='16' name='user' value'$user'>
        </div>

        <div data-role='fieldcontain'>
            <label>Password</label>
            <input type='password' maxlength='16' name='pass' value'$pass'>
        </div>

        <div data-role='fieldcontain'>
            <label></label>
            <input data-transition='slide' type='submit' value='Login' class='btn'>
        </div>

    </form>


_END;


?>