<?php

include 'libraries/author.class.php';
$authorObj = new author();


$elementCount = $authorObj->getAuthorListCount();


include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);


$paging->process($elementCount, $pageId);


$data = $authorObj->getAuthorList($paging->size, $paging->first);



include 'templates/author_list.tpl.php';

?>