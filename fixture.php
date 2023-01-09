<?php

require_once "model/User.php";
require_once "model/UserProvider.php";
$pdo = require 'db.php';

$user = new User('admin');
$user->setName('Master admin');

$userProvider = new UserProvider($pdo);
$userProvider->registerUser($user, '123');
