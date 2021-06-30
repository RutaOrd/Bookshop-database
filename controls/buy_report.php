<?php

include 'libraries/buy.class.php';
$buyObj = new buy();

$formErrors = null;
$fields = array();

$data = array();
if(empty($_POST['submit'])) {
    // rodome ataskaitos parametrų įvedimo formą
    include 'templates/buy_report_form.tpl.php';
} else {
    // nustatome laukų validatorių tipus
    $validations = array (
        'dataNuo' => 'positivenumber',
        'dataIki' => 'positivenumber'
    );

    // sukuriame validatoriaus objektą
    include 'utils/validator.class.php';
    $validator = new validator($validations);

    if($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $data = $validator->preparePostFieldsForSQL();

        // išrenkame ataskaitos duomenis
        $buyData = $buyObj->getReport($data['dataNuo'], $data['dataIki']);
        $amountOfBuys = $buyObj->getAmountOfBuys($data['dataNuo'], $data['dataIki']);
        $totalPrice = $buyObj->getSumPriceOfBuys($data['dataNuo'], $data['dataIki']);

        // rodome ataskaitą
        include 'templates/buy_report_show.tpl.php';
    } else {
        // gauname klaidų pranešimą
        $formErrors = $validator->getErrorHTML();
        // gauname įvestus laukus
        $fields = $_POST;

        // rodome ataskaitos parametrų įvedimo formą su klaidomis
        include 'templates/buy_report_form.tpl.php';
    }
}
