<?php

include 'libraries/buy.class.php';
$buyObj = new buy();
$formErrors = null;
$data = array();

$required = array('Pristatymas', 'Grazinimas', 'Kiekis', 'fk_Pirkejasid_Pirkejas','fk_Parduotuveid_Parduotuve');

$maxLengths = array (
    'Pristatymas' => 20,
    'Grazinimas' => 30,
    'Kiekis' => 4,
    'fk_Pirkejasid_Pirkejas' => 8,
    'fk_Parduotuveid_Parduotuve' => 8
);

if(!empty($_POST['submit'])) {
    include 'utils/validator.class.php';

    $validations = array (
        'Pristatymas' => 'alfanum',
        'Grazinimas' => 'alfanum',
        'Kiekis' => 'positivenumber',
        'fk_Pirkejasid_Pirkejas' => 'positivenumber',
        'fk_Parduotuveid_Parduotuve' => 'positivenumber'
    );

    $validator = new validator($validations, $required, $maxLengths);

    if($validator->validate($_POST)) {
        $dataPrepared = $validator->preparePostFieldsForSQL();
        $dataPrepared['id_Pirkimas'] = $buyObj->insertBuy($dataPrepared);
        $buyObj->insertBill($dataPrepared);
        common::redirect("index.php?module={$module}&action=list");
        die();
    }
    else {
        $formErrors = $validator->getErrorHTML();

        $data = $_POST;
        if(isset($_POST['Data_arr']) && sizeof($_POST['Data_arr']) > 0) {
            $i = 0;
            foreach($_POST['Data_arr'] as $key => $val) {
                $data['saskaita_pirkimas'][$i]['Data'] = $val;
                $data['saskaita_pirkimas'][$i]['Suma_array'] = $_POST['Suma_array'][$key];
                $data['saskaita_pirkimas'][$i]['Banko_saskaita'] = $_POST['Banko_saskaita'][$key];
                $data['saskaita_pirkimas'][$i]['neaktyvus'] = $_POST['neaktyvus'][$key];
                $i++;
            }
        }
    }
}

include 'templates/buy_form.tpl.php';

?>
