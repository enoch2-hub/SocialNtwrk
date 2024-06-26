<?php
// <!-- checkuser.php, which looks up a username
// in the database and returns a string indicating 
// whether it has already been taken. -->

    require_once 'functions.php';

    if(isset($_POST['user'])) {
        $user   = sanitizeString($_POST['user']);
        $result = queryMysql("SELECT * FROM members WHERE user='$user'");

        if($result->rowCount()) {
            echo "<span class='taken'>&nbsp;&#x2718; " .
                 "The username '$user' is taken</span>";
        } else {
            echo "<span class='available'>&nbsp;&#x2714; " .
                 "The username '$user' is available</span>";
        }
    }
    
?>