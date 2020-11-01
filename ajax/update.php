<?php
use classes\Reference;
include '../init.php';
$loadAttr = new Reference();
$loadAttr->loadAttr($_POST);
if($loadAttr->validate()){
    if($loadAttr->update()){
        echo true;
    }else{
        echo false;
    }
}else{
    echo false;
}