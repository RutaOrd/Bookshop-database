<?php


include 'libraries/buy.class.php';
$buyObj = new buy();


$elementCount = $buyObj->getBuyListCount();


include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);


$paging->process($elementCount, $pageId);


$data = $buyObj->getBuyList($paging->size, $paging->first);



include 'templates/buy_list.tpl.php';

?>