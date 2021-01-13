<?php

use function PHPSTORM_META\type;

class Image {

  public static function checkFile($data, $maxSizeInMB) {
    $maxSize = ($maxSizeInMB * 1024 * 1024);
    $type = $data['type'];
    $size = $data['size'];

    if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/', $type)) {
      return 'Tipo de imagem inválida';
    }

    if($size > $maxSize) {
      return 'A imagem deve possuir no máximo '.$maxSizeInMB.'MB';
    }

    return '';
  }

}