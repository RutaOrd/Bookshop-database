<?php

include 'libraries/series.class.php';
$seriesObj = new series();

$formErrors = null;
$data = array();

// nustatome privalomus laukus (?)
$required = array('Pavadinimas', 'Versijos_kodas', 'Daliu_skaicius');


// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
   // 'id_Serija' => 6,
    'Pavadinimas' => 20,
    'Versijos_kodas' => 5,
    'Daliu_skaicius' => 10
);

// paspaustas išsaugojimo mygtukas
if(!empty($_POST['submit'])) {
    // nustatome laukų validatorių tipus
    $validations = array (

        'Pavadinimas' => 'alfanum',
        'Versijos_kodas' => 'alfanum',
        'Daliu_skaicius' => 'positivenumber');

    // sukuriame validatoriaus objektą
    include 'utils/validator.class.php';
    $validator = new validator($validations, $required, $maxLengths);

    // laukai įvesti be klaidų
    if($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $dataPrepared = $validator->preparePostFieldsForSQL();

        // redaguojame  įrašą
        $seriesObj->updateSeries($dataPrepared);

        // nukreipiame į modelių puslapį
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
    else {
        // išrenkame klientą
        $data = $seriesObj->getSeries($id);
    }

// įtraukiame šabloną
include 'templates/series_form.tpl.php';

?>
