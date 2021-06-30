<?php

include 'libraries/buy.class.php';
$buyObj = new buy();

if(!empty($id)) {
    $count = $buyObj->getBillCountOfBuys($id);

    $removeErrorParameter = '';
    if($count == 0) {
        $buyObj->deleteBill($id);
        $buyObj->deleteBuy($id);
    } else {
        $removeErrorParameter = '&remove_error=1';
    }

    common::redirect("index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}

?>
