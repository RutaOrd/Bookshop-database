<?php

// sukuriame pirkėjų klasės objektą
include 'libraries/buyer.class.php';
$buyerObj = new buyer();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $buyerObj->getBuyersListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio modelius
$data = $buyerObj->getBuyersList($paging->size, $paging->first);


// įtraukiame šabloną
include 'templates/buyer_list.tpl.php';

?>