<?php

include 'libraries/press.class.php';
$pressObj = new press();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $pressObj->getPressListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio modelius
$data = $pressObj->getPressList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/press_list.tpl.php';

?>
