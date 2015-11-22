<?php
 /**
  * VERIFIED  PASSWORD AND GO TO PROFILE-PAGE
  */
  include_once('t-workWithDB.php');

  if(!empty($_POST)){

       $userEmail = $_POST['email'];
       $userPassword = stripcslashes($_POST['password']);

       $db = new WorkWithDatabase();
       $db->connect();
       $db->select('users', 'pass' , ' email = "'.$userEmail.'"');
       $result = $db->getResult();
       var_dump($result);
       if ($userPassword==$result['pass']){ //password_verify($userPassword, $result['pass'])) { //committed because not work on hosting
           $_SESSION['user_email'] = $userEmail;
           header('Location: http://test_task/t-profile.php');
       }
       else {
            echo "Sorry, but email or password is incorrect!";
       }

       $db->disconnect();
  }
