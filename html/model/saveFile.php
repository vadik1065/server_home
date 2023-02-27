<?php
$nameFile = $_POST["name"];
// $currentFile = $_FILES["file"];

// $uploads_dir = '/uploads';

// $uploads_dir = '/uploads';
// // foreach ($_FILES["$nameFile"]["error"] as $key => $error) {
// //   if ($error == UPLOAD_ERR_OK) {
// //     $tmp_name = $_FILES["$nameFile"]["tmp_name"][$key];
// //     $name = basename($_FILES["$nameFile"]["name"][$key]);
// //     move_uploaded_file($tmp_name, "$uploads_dir/$name");
// //   }
// // }

// $tmp_name = $_FILES["$nameFile"]["tmp_name"];
// $resMove = move_uploaded_file($tmp_name, "$uploads_dir/$name");

// $res = array(
//   'pic1' => $_POST["name"],
//   '$tmp_name' => $tmp_name,
//   'resMove' => $resMove
// );

// echo json_encode($res);


header('Content-Type: text/plain; charset=utf-8');

try {

  // Undefined | Multiple Files | $_FILES Corruption Attack
  // If this request falls under any of them, treat it invalid.
  if (
    !isset($_FILES["$nameFile"]['error']) ||
    is_array($_FILES["$nameFile"]['error'])
  ) {
    throw new RuntimeException('Invalid parameters.');
  }

  // Check $_FILES["$nameFile"]['error'] value.
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

  // You should also check filesize here. 
  if ($_FILES["$nameFile"]['size'] > 1000000) {
    throw new RuntimeException('Exceeded filesize limit.');
  }

  // DO NOT TRUST $_FILES["$nameFile"]['mime'] VALUE !!
  // Check MIME Type by yourself.
  $finfo = new finfo(FILEINFO_MIME_TYPE);
  if (false === $ext = array_search(
    $finfo->file($_FILES["$nameFile"]['tmp_name']),
    array(
      'jpg' => 'image/jpeg',
      'png' => 'image/png',
      'gif' => 'image/gif',
    ),
    true
  )) {
    throw new RuntimeException('Invalid file format.');
  }

  // You should name it uniquely.
  // DO NOT USE $_FILES["$nameFile"]['name'] WITHOUT ANY VALIDATION !!
  // On this example, obtain safe unique name from its binary data.
  if (!move_uploaded_file(
    $_FILES["$nameFile"]['tmp_name'],
    sprintf(
      './uploads/%s.%s',
      sha1_file($_FILES["$nameFile"]['tmp_name']),
      $ext
    )
  )) {
    throw new RuntimeException('Failed to move uploaded file.');
  }

  echo 'File is uploaded successfully.';
} catch (RuntimeException $e) {

  echo $e->getMessage();
}
