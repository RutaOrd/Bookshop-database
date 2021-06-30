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
    'Gimimo_data' => 20
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

        $buyerObj->insertBuyer($dataPrepared);

        common::redirect("index.php?module={$module}&action=list");
        die();
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
        if(isset($_POST['Vardas_arr']) && sizeof($_POST['Vardas_arr']) > 0) {
            $i = 0;
            foreach($_POST['Vardas_arr'] as $key => $val) {
                $data['pirkejas'][$i]['Vardas'] = $val;
                $data['pirkejas'][$i]['Pavarde_array'] = $_POST['Pavarde_array'][$key];
                $data['pirkejas'][$i]['Adresas_array'] = $_POST['Adresas_array'][$key];
                $data['pirkejas'][$i]['Banko_saskaita_array'] = $_POST['Banko_saskaite_array'][$key];
                $data['pirkejas'][$i]['Telefono_numeris_array'] = $_POST['Telefono_numeris_array'][$key];
                $data['pirkejas'][$i]['Gimimo_data_array'] = $_POST['Gimimo_data_array'][$key];
                $data['pirkejas'][$i]['id_Darbuotojas'] = $_POST['id_Darbuotojas'][$key];
                $data['pirkejas'][$i]['neaktyvus'] = $_POST['neaktyvus'][$key];
                $i++;
            }
        }
    }
} else {
    if(!empty($id)) {
        $data = $buyerObj->getBuyer($id);

    }
}
include 'templates/buyer_form.tpl.php';

?>
