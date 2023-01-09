<?php

$pass = 123;

$hash = password_hash($pass, PASSWORD_DEFAULT);

print_r(password_verify($pass, $hash));
