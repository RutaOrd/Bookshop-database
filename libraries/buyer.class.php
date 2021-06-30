<?php


class buyer
{

    private $pirkejas_lentele = '';
    private $darbuotojas_lentele = '';
    private $pirkimas_lentele = '';

    public function __construct(){
        $this->pirkejas_lentele = 'pirkejas';
        $this->darbuotojas_lentele = 'darbuotojas';
        $this->pirkimas_lentele = 'pirkimas';
    }
    /**
     * Pirkėjo išrinkimas
     * @param type $id
     * @return type
     */
    public function getBuyer($id) {
        $query = "  SELECT *
					FROM `{$this->pirkejas_lentele}`
					WHERE `id_Pirkejas`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }

    /**
     * Pirkėjų sąrašo išrinkimas
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getBuyersList($limit = null, $offset = null)
    {
        $limitOffsetString = "";
        if (isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if (isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT `{$this->pirkejas_lentele}`.`id_Pirkejas`,
						   `{$this->pirkejas_lentele}`.`Vardas`,
                           `{$this->pirkejas_lentele}`.`Pavarde`,
                           `{$this->pirkejas_lentele}`.`Adresas`,
                           `{$this->pirkejas_lentele}`.`Banko_saskaita`,
                           `{$this->pirkejas_lentele}`.`Telefono_numeris`,
                           `{$this->pirkejas_lentele}`.`Gimimo_data`,
                           `{$this->darbuotojas_lentele}`.`Vardas` AS `darbuotojo_vardas`,
						   `{$this->darbuotojas_lentele}`.`Pavarde` AS `darbuotojo_pavarde`
					FROM `{$this->pirkejas_lentele}`
						LEFT JOIN `{$this->darbuotojas_lentele}`
							ON `{$this->pirkejas_lentele}`.`fk_Darbuotojasid_Darbuotojas`=`{$this->darbuotojas_lentele}`.`id_Darbuotojas` {$limitOffsetString}";
        $data = mysql::select($query);

        return $data;
    }



    /**
     * pirkėjų kiekio radimas
     * @return type
     */
    public function getBuyersListCount()
    {
        $query = "  SELECT COUNT(`{$this->pirkejas_lentele}`.`id_Pirkejas`) as `kiekis`
					FROM `{$this->pirkejas_lentele}`
						LEFT JOIN `{$this->darbuotojas_lentele}`
							ON `{$this->pirkejas_lentele}`.`fk_Darbuotojasid_Darbuotojas`=`{$this->darbuotojas_lentele}`.`id_Darbuotojas`";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    public function updateBuyer($data) {
        $query = "  UPDATE `{$this->pirkejas_lentele}`
					SET    `Vardas`='{$data['Vardas']}',
						   `Pavarde`='{$data['Pavarde']}',
						   `Adresas`='{$data['Adresas']}',
					       `Banko_saskaita`='{$data['Banko_saskaita']}',
					       `Telefono_numeris`='{$data['Telefono_numeris']}',
						   `Gimimo_data`='{$data['Gimimo_data']}',
						   `fk_Darbuotojasid_Darbuotojas`='{$data['fk_Darbuotojasid_Darbuotojas']}'
					WHERE `id_Pirkejas`='{$data['id_Pirkejas']}'";
        mysql::query($query);
    }



    public function insertBuyer($data) {
        if(isset($data['Vardas_arr']) && sizeof($data['Vardas_arr']) > 0) {
            foreach($data['Vardas_arr'] as $key=>$val) {
                if($data['neaktyvus'] == array() || $data['neaktyvus'][$key] == 0) {
                    $query = "  INSERT INTO `{$this->pirkejas_lentele}`
                                            (
                                             `fk_Darbuotojasid_Darbuotojas`,
									         `Pavarde`,
									         `Adresas`,
									         `Banko_saskaita`,
								             `Telefono_numeris`,
								             `Gimimo_data`,
                                             `Vardas`
                   
                                            )
                                            VALUES
                                            (
                                                '{$data['id_Darbuotojas'][$key]}',
                                                '{$data['Pavarde_array'][$key]}',
                                                '{$data['Adresas_array'][$key]}',
                                                '{$data['Banko_saskaita_array'][$key]}',
                                                '{$data['Telefono_numeris_array'][$key]}',
                                                '{$data['Gimimo_data_array'][$key]}',
                                                '{$val}'
                                            )";
                    mysql::query($query);
                }
            }
        }
    }

    public function getWorkerlist(){
        $query = " SELECT *
				   FROM `{$this->darbuotojas_lentele}`";
        $data = mysql::select($query);

        return $data;
    }


    /**
     * pirkimų, kuriuos atlieka pirkėjai, kiekio radimas
     * @return type
     */
    public function getBuyersCountOfBuys($id) {
        $query = "  SELECT COUNT(`{$this->darbuotojas_lentele}`.`id_Darbuotojas`) AS `kiekis`
					FROM `{$this->pirkejas_lentele}`
						INNER JOIN `{$this->darbuotojas_lentele}`
							ON `{$this->pirkejas_lentele}`.`id_Pirkejas`=`{$this->darbuotojas_lentele}`.`fk_Parduotuveid_Parduotuve`
					WHERE `{$this->pirkejas_lentele}`.`id_Pirkejas`='{$id}'";
        $data = mysql::select($query);

        return $data[0]['kiekis'];

    }



    public function deleteBuyer($id) {
        $query = "  DELETE FROM `{$this->pirkejas_lentele}`
					WHERE `id_Pirkejas`='{$id}'";
        mysql::query($query);
    }






}