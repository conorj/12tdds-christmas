<?php

include('/home/cryan/.config/composer/vendor/autoload.php');
include(__DIR__ . '/TenPinBowling.php');

$obj = new TenPinBowling();
$obj->calculateScore('X|X|X|X|X|X|X|X|X|X||55');
