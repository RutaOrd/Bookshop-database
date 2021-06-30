<?php

include 'libraries/buy.class.php';
$buyObj = new buy();
$formErrors = null;
$data = array();

$required = array('Pristatymas', 'Grazinimas', 'Kiekis', 'fk_Pirkejasid_Pirkejas','fk_Parduotuveid_Parduotuve');

$maxLengths = array (
    'Pristatymas' => 20,
    'Grazinimas' => 30,
    'Kiekis' => 5,
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
        $buyObj->updateBuy($dataPrepared);

        $deleteQueryClause = "";
        if(sizeof($dataPrepared['Data_arr']) > 0) {
            foreach($dataPrepared['Data_arr'] as $key=>$val) {
                if($dataPrepared['neaktyvus'][$key] == 1) {
                    $deleteQueryClause .= " AND NOT `Suma`='" . $dataPrepared['Suma_array'][$key] . "'";
                    $deleteQueryClause .= " AND NOT `Banko_saskaita`='" . $dataPrepared['Banko_saskaita_array'][$key] . "'";
                }
            }
        }

        $buyObj->deleteBill($dataPrepared['id_Pirkimas'], $deleteQueryClause);


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
                $data['saskaita_pirkimas'][$i]['Banko_saskaita_array'] = $_POST['Banko_saskaita_array'][$key];
                $data['saskaita_pirkimas'][$i]['neaktyvus'] = $_POST['neaktyvus'][$key];
                $i++;
            }
        }
    }
}   else {
    if (!empty($id)) {
        $data = $buyObj->getBuy($id);
        $tmp = $buyObj->getBill($id);
        if (sizeof($tmp) > 0) {
            foreach ($tmp as $key => $val) {
                $data['saskaita_pirkimas'][] = $val;
            }
        }
    }
}


include 'templates/buy_form.tpl.php';

?>

