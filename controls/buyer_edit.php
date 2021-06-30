<?php


include 'libraries/buyer.class.php';
$buyerObj = new buyer();

$formErrors = null;
$data = array();

$required = array('Vardas', 'Pavarde', 'Adresas', 'Banko_saskaita', 'Telefono_numeris',
    'Gimimo_data','fk_Darbuotojasid_Darbuotojas');

$maxLengths = array (
    'Vardas' => 20,
    'Pavarde' => 20,
    'Adresas' => 50,
    'Banko_saskaita' => 15,
    'Telefono_numeris' => 20,
    'Gimimo_data' => 15
);

if(!empty($_POST['submit'])) {
    $validations = array (
        'Vardas' => 'alfanum',
        'Pavarde' => 'alfanum',
        'Adresas' => 'alfanum',
        'Banko_saskaita' => 'alfanum',
        'Telefono_numeris' => 'phone',
        'Gimimo_data' => 'date',
        'fk_Darbuotojasid_Darbuotojas' => 'positivenumber');


    include 'utils/validator.class.php';
    $validator = new validator($validations, $required, $maxLengths);

    if($validator->validate($_POST)) {

        $dataPrepared = $validator->preparePostFieldsForSQL();

        $buyerObj->updateBuyer($dataPrepared);

        common::redirect("index.php?module={$module}&action=list");
        die();

    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;

    }
} else {
    if(!empty($id)) {
        $data = $buyerObj->getBuyer($id);

    }
}
include 'templates/buyer_formEdit.tpl.php';

?>
