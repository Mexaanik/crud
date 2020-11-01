<?php

use classes\Reference;
include '../init.php';
$loadAttr = new Reference();
$loadAttr->loadAttr($_POST);
if($loadAttr->validate()){
    if($loadAttr->insert()){
        echo true;
    }else{
        echo false;
    }
}else{
    echo false;
}