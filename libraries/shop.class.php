<?php


class shop
{
    private $parduotuve_lentele = '';
    private $darbuotojas_lentele = '';
    private $pirkejas_lentele = '';

    public function __construct(){
        $this->parduotuve_lentele = 'parduotuve';
        $this->darbuotojas_lentele = 'darbuotojas';
        $this->darbuotojas_lentele = 'pirkejas';
    }

    public function getShop($id) {
        $query = "  SELECT *
					FROM `{$this->parduotuve_lentele}`
					WHERE `id_Parduotuve`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }

    public function getShopList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if(isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT `{$this->parduotuve_lentele}`.`id_Parduotuve`,
						   `{$this->parduotuve_lentele}`.`Pavadinimas`,
                           `{$this->parduotuve_lentele}`.`Tinklapis`,
                           `{$this->parduotuve_lentele}`.`Adresas`,
                           `{$this->parduotuve_lentele}`.`Telefono_numeris`, 
                           `{$this->parduotuve_lentele}`.`Elektroninis_pastas`,
                            `{$this->parduotuve_lentele}`.`Darbo_laikas`  
					FROM `{$this->parduotuve_lentele}`  {$limitOffsetString}";
        $data = mysql::select($query);


        return $data;
    }



    public function getShopListCount() {
        $query = "  SELECT COUNT(`{$this->parduotuve_lentele}`.`id_Parduotuve`) as `kiekis`
					FROM `{$this->parduotuve_lentele}`";
        $data = mysql::select($query);
        return $data[0]['kiekis'];
    }


    public function insertShop($data) {
        $query = "  INSERT INTO `{$this->parduotuve_lentele}`
								(
									`id_Parduotuve`,
									`Pavadinimas`,
									`pavarde`,
									`gimimo_data`,
									`telefonas`,
									`epastas`
								) 
								VALUES
								(
									'{$data['id_Parduotuve']}',
									'{$data['Pavadinimas']}',
									'{$data['pavarde']}',
									'{$data['gimimo_data']}',
									'{$data['telefonas']}',
									'{$data['epastas']}'
								)";
        mysql::query($query);
    }

    /**
     * Parduotuvės atnaujinimas
     * @param type $data
     */
    public function updateShop($data) {
        $query = "  UPDATE `{$this->parduotuve_lentele}`
					SET    `Pavadinimas`='{$data['Pavadinimas']}',
						   `Tinklapis`='{$data['Tinklapis']}',
					       `Adresas`='{$data['Adresas']}',
					       `Telefono_numeris`='{$data['Telefono_numeris']}',
					       `Eelektroninis_pastas`='{$data['Elektroninis_pastas']}',
					       `Darbo_laikas`='{$data['Darbo_laikas']}',
					WHERE `id_Parduotuve`='{$data['id_Parduotuve']}'";
        mysql::query($query);
    }

    /**
     * Parduotuvių šalinimas
     * @param type $id
     */
    public function deleteShop($id) {
        $query = "  DELETE FROM `{$this->parduotuve_lentele}`
					WHERE `id_Parduotuve`='{$id}'";
        mysql::query($query);
    }


    public function getWorkersCountOfShop($id) {
        $query = "  SELECT COUNT(`{$this->darbuotojas_lentele}`.`id_Darbuotojas`) AS `kiekis`
					FROM `{$this->parduotuve_lentele}`
						INNER JOIN `{$this->darbuotojas_lentele}`
							ON `{$this->parduotuve_lentele}`.`id_Parduotuve`=`{$this->darbuotojas_lentele}`.`fk_Parduotuveid_Parduotuve`
					WHERE `{$this->parduotuve_lentele}`.`id_Parduotuve`='{$id}'";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }


    public function getSeriesCountOfBook($id) {
        $query = "  SELECT COUNT(`{$this->pirkejas_lentele}`.`id_Pirkejas`) AS `kiekis`
					FROM `{$this->darbuotojas_lentele}`
						INNER JOIN `{$this->pirkejas_lentele}`
							ON `{$this->darbuotojas_lentele}`.`id_Darbuotojas`=`{$this->pirkejas_lentele}`.`fk_Darbuotojasid_Darbuotojas`
					WHERE `{$this->darbuotojas_lentele}`.`id_Darbuotojas`='{$id}'";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }



}