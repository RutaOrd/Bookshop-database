<?php

include 'libraries/series.class.php';
$seriesObj = new series();

if(!empty($id)) {
    // patikriname, ar nėra knygų, priklausančių šiai serijai
    $count = $seriesObj->getSeriesCountOfBook($id);

    $removeErrorParameter = '';
    if($count == 0) {
        // šaliname seriją
        $seriesObj->deleteSeries($id);
    } else {
        // nepašalinome, nes yra serijai priklausančių knygų
        $removeErrorParameter = '&remove_error=1';
    }

    common::redirect("index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}

?>