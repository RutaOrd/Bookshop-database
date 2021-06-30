<?php

include 'libraries/buyer.class.php';
$buyerObj = new buyer();

if(!empty($id)) {

    $count = $buyerObj->getBuyersCountOfBuys($id);

    $removeErrorParameter = '';
    if($count == 0){
        $buyerObj->deleteBuyer($id);
    } else{
        $removeErrorParameter = '&remove_error=1';
    }

    // nukreipiame į pirkėjų puslapį
    common::redirect("index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}

?>



