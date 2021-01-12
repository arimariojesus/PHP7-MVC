<?php

class Date {
  
  public static function formatDate($date) {
    $day = date('d', strtotime($date));
    $month = date('m', strtotime($date));
    $year = date('Y', strtotime($date));

    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    return strftime("%e de %B de %Y", mktime($day, $month, $year));
  }

}