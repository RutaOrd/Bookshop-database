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

// vartotojas paspaudė išsaugojimo mygtuką
if(!empty($_POST['submit'])) {
    include 'utils/validator.class.php';

    // nustatome laukų validatorių tipus
    $validations = array (
        'Vardas' => 'alfanum',
        'Pavarde' => 'alfanum',
        'Pareigos' => 'alfanum',
        'fk_Parduotuveid_Parduotuve' => 'positivenumber'


    );

    // sukuriame laukų validatoriaus objektą
    $validator = new validator($validations, $required, $maxLengths);

    // laukai įvesti be klaidų
    if($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $dataPrepared = $validator->preparePostFieldsForSQL();


        $workersObj->insertWorker($dataPrepared);


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
if(!empty($id)) {
    $data = $workersObj->getWorker($id);
}

// įtraukiame šabloną
include 'templates/workers_form.tpl.php';

?>
