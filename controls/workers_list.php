<?php


include 'libraries/workers.class.php';
$workerObj = new workers();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $workerObj->getWorkersListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio modelius
$data = $workerObj->getWorkersList($paging->size, $paging->first);


// įtraukiame šabloną
include 'templates/workers_list.tpl.php';

?>
