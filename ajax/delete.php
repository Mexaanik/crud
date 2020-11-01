<?php

use classes\Reference;

include '../init.php';
$loadAttr = new Reference();
$loadAttr->loadAttr($_GET);
if ($loadAttr->delete()) {
    echo true;
} else {
    echo false;
}
