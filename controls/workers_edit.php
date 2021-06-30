<?php

include 'libraries/workers.class.php';
$workersObj = new workers();

include 'libraries/shop.class.php';
$shopObj = new shop();

$formErrors = null;
$data = array();

// nustatome privalomus formos laukus
$required = array('Vardas', 'Pavarde', 'Pareigos', 'fk_Parduotuveid_Parduotuve');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
    'Vardas' => 20,
    'Pavarde' => 20,
    'Pareigos' => 20
);

// paspaustas išsaugojimo mygtukas
if(!empty($_POST['submit'])) {
    // nustatome laukų validatorių tipus
    $validations = array (
        'Vardas' => 'alfanum',
        'Pavarde' => 'alfanum',
        'Pareigos' => 'alfanum',
        'fk_Parduotuveid_Parduotuve' => 'positivenumber'

    );
    // sukuriame validatoriaus objektą
    include 'utils/validator.class.php';
    $validator = new validator($validations, $required, $maxLengths);

    // laukai įvesti be klaidų
    if($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $dataPrepared = $validator->preparePostFieldsForSQL();

        // atnaujiname duomenis
        $workersObj->updateWorker($dataPrepared);


        common::redirect("index.php?module={$module}&action=list");
        die();
    } else {
        // gauname klaidų pranešimą
        $formErrors = $validator->getErrorHTML();
        // gauname įvestus laukus
        $data = $_POST;
    }
} else {
    // tikriname, ar nurodytas elemento id. Jeigu taip, išrenkame elemento duomenis ir jais užpildome formos laukus.
    $data = $workersObj->getWorker($id);
}

// įtraukiame šabloną
include 'templates/workers_form.tpl.php';

?>
