<?php
$bodyParam = json_decode(file_get_contents('php://input'));
$curName = $bodyParam->name;
$curPassword = $bodyParam->password;

$puthPass = '../model/_password.json';
$passwordsFile =  json_decode(file_get_contents($puthPass));
$needPassword = $passwordsFile->$curName;

$success = !!($needPassword == $curPassword);

$res = array(
  'success' => $success,
  'autoris' => $bodyParam,
  'needPassword' => $needPassword,
  'curPassword' => $curPassword,
);
// print_r($passwords);

echo json_encode($res);
