<?php

include 'libraries/shop.class.php';
$shopObj = new shop();

$formErrors = null;
$data = array();

// nustatome privalomus formos laukus
$required = array('id_Parduotuve', 'Pavadinimas', 'Tinklapis', 'Adresas', 'Telefono_numeris','Elektroninis_pastas', 'Darbo_laikas');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
    'id_Parduotuve' => 6,
    'Pavadinimas' => 20,
   // 'Tinklapis' => 20,
    'Adresas' => 50,
   // 'Telefono_numeris' => 20,
   // 'Elektroninis_pastas' => 20,
    'Darbo_laikas' => 60
);

// vartotojas paspaudė išsaugojimo mygtuką
if(!empty($_POST['submit'])) {
    include 'utils/validator.class.php';

    // nustatome laukų validatorių tipus
    $validations = array (
        'id_Parduotuve' => 'positivenumber',
        'Pavadinimas' => 'alfanum',
        //'Tinklapis' => 'alfanum',
        'Adresas' => 'alfanum',
       // 'Telefono_numeris' => 'alfanum',
        //'Elektroninis_pastas' => 'alfanum',
        'Darbo_laikas' => 'alfanum');

    // sukuriame laukų validatoriaus objektą
    $validator = new validator($validations, $required, $maxLengths);

    // laukai įvesti be klaidų
    if($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $dataPrepared = $validator->preparePostFieldsForSQL();


        $shopObj->updateShop($dataPrepared);


        common::redirect("index.php?module={$module}&action=list");
        die();
    }
    else {
        // gauname klaidų pranešimą
        $formErrors = $validator->getErrorHTML();

        // laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
        $data = $_POST;
    }
} else {

    $data = $shopObj->getShop($id);
}



// įtraukiame šabloną
include 'templates/shop_form.tpl.php';

?>
