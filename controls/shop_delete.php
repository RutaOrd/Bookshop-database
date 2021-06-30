<?php

include 'libraries/shop.class.php';
$shopObj = new shop();

if(!empty($id)) {
    // patikriname, ar parduotuvė neturi dirbančių darbuotojų
    $count = $shopObj->getWorkersCountOfShop($id);

    $removeErrorParameter = '';
    if($count == 0) {
        // šaliname parduotuvę
        $shopObj->deleteShop($id);
    } else {
        // nepašalinome, nes parduotuvėje yra darbuotojų, rodome klaidos pranešimą
        $removeErrorParameter = '&remove_error=1';
    }

    // nukreipiame į parduotuvių puslapį
    common::redirect("index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}

?>
