<?php 

require_once '../Backend/EmailValidator.php';
require_once '../Backend/EmailRegister.php';

// check if the form has been submited
if (isset($_POST['submit'])) {
  // validate form data
  $validation = new EmailValidator($_POST);
  $errors = $validation->validateForm();

  if(!$errors) {
    // save to db
    $register = new EmailRegister($_POST);
    $dbInsert = $register->dbInsert();
    $confirmation = $register->confirmation();
  }
}

require_once 'register-email-template.php';