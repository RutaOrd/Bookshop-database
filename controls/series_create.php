<?php

include 'libraries/series.class.php';
$seriesObj = new series();

$formErrors = null;
$data = array();

// nustatome privalomus laukus (?)
$required = array('Pavadinimas', 'Versijos_kodas', 'Daliu_skaicius');


// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
    'Pavadinimas' => 20,
    'Versijos_kodas' => 5,
    'Daliu_skaicius' => 10
);

// paspaustas išsaugojimo mygtukas
if(!empty($_POST['submit'])) {
    // nustatome laukų validatorių tipus
    $validations = array (
        'Pavadinimas' => 'anything',
        'Versijos_kodas' => 'positivenumber',
        'Daliu_skaicius' => 'positivenumber');

    // sukuriame validatoriaus objektą
    include 'utils/validator.class.php';
    $validator = new validator($validations, $required, $maxLengths);

    // laukai įvesti be klaidų
    if($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $dataPrepared = $validator->preparePostFieldsForSQL();

        // įrašome naują įrašą
        $seriesObj->insertSeries($dataPrepared);

        // nukreipiame į serijų puslapį
       common::redirect("index.php?module={$module}&action=list");
        die();
    }
    else {
        // gauname klaidų pranešimą
        $formErrors = $validator->getErrorHTML();
        // laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
        $data = $_POST;
    }
}

// įtraukiame šabloną
include 'templates/series_form.tpl.php';

?>