<?php

// получаем данные с фронта
$nameFile = $_POST["name"];
$currentFile = $_FILES["file"];

header('Content-Type: text/plain; charset=utf-8');

try {

  // Валидация
  switch ($_FILES["$nameFile"]['error']) {
    case UPLOAD_ERR_OK:
      break;
    case UPLOAD_ERR_NO_FILE:
      throw new RuntimeException('No file sent.');
    case UPLOAD_ERR_INI_SIZE:
    case UPLOAD_ERR_FORM_SIZE:
      throw new RuntimeException('Exceeded filesize limit.');
    default:
      throw new RuntimeException('Unknown errors.');
  }

  // // You should also check filesize here. 
  // if ($_FILES["$nameFile"]['size'] > 1000000) {
  //   throw new RuntimeException('Exceeded filesize limit.');
  // }

  // скачивание файла
  chmod("../../uploads/$nameFile", 0777);
  $f = fopen("../../uploads/$nameFile", "w+") or die("fopen failed direct /upload/$nameFile file : $currentFile");
  fwrite($f, $currentFile);
  fclose($f);

  echo 'File is uploaded successfully.';
} catch (RuntimeException $e) {

  echo $e->getMessage();
}
