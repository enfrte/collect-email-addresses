<?php

namespace Liana\EmailForm\Backend; 

/**
 * Validates an email address
 */
class EmailValidator {

  private $data;
  private $errors = [];
  private static $fields = ['email']; // more fields may come, like; agree to terms, not a bot

  public function __construct($post_data)
  {
    $this->data = $post_data;
  }

  public function validateForm()
  {
    // check if fields are present in post data 
    foreach (self::$fields as $field) {
      if(!array_key_exists($field, $this->data)){
        trigger_error("$field is not present in data.");
        return;
      }
    }

    $this->validateEmail();

    return $this->errors;
  }

  private function validateEmail()
  {
    $email = trim($this->data['email']);
    $validateAddress = filter_var($email, FILTER_VALIDATE_EMAIL);

    if (empty($email)) {
      $this->addError('email', 'Email field cannot be empty.');
    }
    elseif (!$validateAddress) {
      $this->addError('email', 'Email address is not valid.');
    }
  }

  private function addError($key, $value)
  {
    $this->errors[$key] = $value;
  }

}
