<?php
if (!session_id()) session_start(); //Mengecek apakah ada session atau tidak
require_once '../app/init.php';

$app = new App;