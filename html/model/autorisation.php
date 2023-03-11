<?php

// берем данные из фронта
$bodyParam = json_decode(file_get_contents('php://input'));
$curName = $bodyParam->name;
$curPassword = $bodyParam->password;

// берем данные из файла
$puthPass = '../model/_password.json';
$passwordsFile =  json_decode(file_get_contents($puthPass));
$needPassword = $passwordsFile->$curName;

// проверяем эти данные 
$success = !!($needPassword == $curPassword);

$res = array(
  'success' => $success,
  'autoris' => $bodyParam,
  'needPassword' => $needPassword,
  'curPassword' => $curPassword,
);
// print_r($passwords);

echo json_encode($res);
