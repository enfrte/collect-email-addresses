<?php 

namespace Liana\EmailForm\Frontend;

use Liana\EmailForm\Backend\EmailRegister;
use Liana\EmailForm\Backend\EmailValidator;

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