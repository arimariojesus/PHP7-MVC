<?php

class Validator {

  public static function checkName($name) {
    if(!preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u", $name)) {
      return true;
    }else {
      return false;
    }
  }

  public static function checkEmail($email) {
    if(!preg_match("/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\._-]+.[.]([a-zA-Z]{2,4})$/", $email)) {
      return true;
    }else {
      return false;
    }
  }
}

?>