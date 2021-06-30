<?php

// sukuriame serijų klasės objektą
include 'libraries/shop.class.php';
$shopObj = new shop();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $shopObj->getShopListCount();


// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio modelius
$data = $shopObj->getShopList($paging->size, $paging->first);


// įtraukiame šabloną
include 'templates/shop_list.tpl.php';

?>
