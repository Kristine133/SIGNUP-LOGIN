<?php

class USER
{
  private $db;
 
  function __construct($DB_con)
{
  $this->db = $DB_con;
  }
 
  public function register($uname,$umail,$upass)
{
try
{
  $new_password = password_hash($upass, PASSWORD_DEFAULT);
   
  $stmt = $this->db->prepare("INSERT INTO user2(username,email,password) 
                                         VALUES(:uname, :umail, :upass)");
              
  $stmt->bindparam(":uname", $uname);
  $stmt->bindparam(":umail", $umail);
  $stmt->bindparam(":upass", $new_password);            
  $stmt->execute(); 
   
return $stmt; 
  }
catch(PDOException $e)
{
   echo $e->getMessage();
  }    
}
 
  public function login($umail,$upass)
{
try
{
  $stmt = $this->db->prepare("SELECT * FROM user2 WHERE email=:umail AND password=:upass LIMIT 1");
  $stmt->execute(array(':umail'=>$umail, ':upass'=>$upass));
  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
if($stmt->rowCount() > 0)
{
if(password_verify($upass, $userRow['user_pass']))
{

  $_SESSION['login'] = TRUE;
  $_SESSION['id'] = $user_data['id'];
return true;
  }
else
{
return false;
  }
  }
  }
catch (PDOException $e) {
  echo $e->getMessage();
  }
}

 
public function redirect($url)
{
header("Location: $url");
  }
 
public function logout()
{
session_destroy();
return true;
  }
}

?>