<?php

// sukuriame serijų klasės objektą
include 'libraries/series.class.php';
$seriesObj = new series();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $seriesObj->getSeriesListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio modelius
$data = $seriesObj->getSeriesList($paging->size, $paging->first);


// įtraukiame šabloną
include 'templates/series_list.tpl.php';

?>
