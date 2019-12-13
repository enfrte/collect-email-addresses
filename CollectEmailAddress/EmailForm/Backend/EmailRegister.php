<?php

namespace Liana\EmailForm\Backend;

use Liana\Database\DbConnect;
use PDOException;

class EmailRegister
{
  private $email;
  private $message;

  public function __construct($post_data)
  {
    $this->email = $post_data['email'];
  }

  public function dbInsert()
  {
    $db = DbConnect::getInstance();
    $conn = $db->getConnection();

    try {
        $sql = "INSERT INTO email_subscriber (email) VALUES (:email)";
    
        $query = $conn->prepare($sql);
    
        $query->execute(array(
            'email' => $this->email
        ));

        $this->message = 'Email has been registered.';
        return true;
    } 
    catch (PDOException $e) {
        // 23000 = duplicate entry
        if ($query->errorCode() === '23000') {
          $this->message = 'Email has already been registered.';
          return;
        }
        // other errors
        $this->message = 'Error: '.$e->getMessage();
    }
  }

  public function confirmation()
  {
    return $this->message;
  }
}
