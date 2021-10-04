<?php

//Class
class Home {
  //variables are properties in oop
  public $username = "";
  public $password= "";
  
    //functions are methods in oop
    function login ($username, $password)
    {
      if( $username == "Ion" && $password == "1234567") {
        $this->dashboard();
      } else {
        echo "Username or Password not maching";
      }
    }


    function dashboard()
    {
      echo "Welcome, to your Dashboard, Ion!";
      echo "<br><br>";
      echo "You have 15 messages";
    }

}

class User extends Home
{
    $age = 23;
    $sex = "F";
    $location = "Bucharest" ;

    $data = [
      'age' => $age,
      'sex' => $sex,
      'loc' => $location
    ];


}

// instantiation
$user = new User;
$username= "Ion";
$password = "1234567";
$user->login($username, $password);