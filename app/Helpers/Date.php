<?php

class Date {
  
  public static function formatDate($date) {
    $day = date('d', strtotime($date));
    $month = date('F', strtotime($date));
    $year = date('Y', strtotime($date));

    return $day." de ".$month." de ".$year;
  }

}