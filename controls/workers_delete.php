<?php

include 'libraries/workers.class.php';
$workersObj = new workers();

if(!empty($id)) {

    $count = $workersObj->getWorkersCountOfBuyers($id);

    $removeErrorParameter = '';
    if($count == 0) {

        $workersObj->deleteWorker($id);
    } else {

        $removeErrorParameter = '&remove_error=1';
    }

    common::redirect("index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}

?>
