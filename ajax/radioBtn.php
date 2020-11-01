<?php
use classes\DB;
include '../init.php';

$db=DB::getInstance();
$arr=$db->prepare("select id,letter from category");
$arr->execute();
$result=$arr->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);