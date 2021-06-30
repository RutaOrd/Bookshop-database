<?php


class buy
{
    private $pirkimas_lentele = '';
    private $pirkejas_lentele = '';
    private $parduotuve_lentele = '';
    private $saskaita_lentele = '';

    public function __construct(){
        $this->pirkimas_lentele = 'pirkimas';
        $this->pirkejas_lentele = 'pirkejas';
        $this->parduotuve_lentele = 'parduotuve';
        $this->saskaita_lentele = 'saskaita';

    }
    /**
     * Pirkimo išrinkimas
     * @param type $id
     * @return type
     */
    public function getBuy($id) {
        $query = "  SELECT *
					FROM `{$this->pirkimas_lentele}`
					WHERE `id_Pirkimas`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }
    /**
     * Pirkimų sąrašo išrinkimas
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getBuyList($limit = null, $offset = null)
    {
        $limitOffsetString = "";
        if (isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if (isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT `{$this->pirkimas_lentele}`.`id_Pirkimas`,
						   `{$this->pirkimas_lentele}`.`Pristatymas`,
                           `{$this->pirkimas_lentele}`.`Grazinimas`,
                           `{$this->pirkimas_lentele}`.`Kiekis`,
                           `{$this->pirkejas_lentele}`.`Vardas` AS `pirkejas_vardas`,
						   `{$this->pirkejas_lentele}`.`Pavarde` AS `pirkejas_pavarde`,
                           `{$this->parduotuve_lentele}`.`Pavadinimas` AS `parduotuve_pavadinimas`
					  FROM `{$this->pirkimas_lentele}`
						   LEFT JOIN `{$this->pirkejas_lentele}`
							  ON `{$this->pirkimas_lentele}`.`fk_Pirkejasid_Pirkejas`=`{$this->pirkejas_lentele}`.`id_Pirkejas`
						  LEFT JOIN `{$this->parduotuve_lentele}`
							ON `{$this->pirkimas_lentele}`.`fk_Parduotuveid_Parduotuve`=`{$this->parduotuve_lentele}`.`id_Parduotuve` {$limitOffsetString}";

        $data = mysql::select($query);


        return $data;
    }

    /**
     * Pirkimų kiekio radimas
     * @return type
     */
    public function getBuyListCount()
    {
        $query = "  SELECT COUNT(`{$this->pirkimas_lentele}`.`id_Pirkimas`) AS `kiekis`
					FROM `{$this->pirkimas_lentele}`
						LEFT JOIN `{$this->pirkejas_lentele}`
							ON `{$this->pirkimas_lentele}`.`fk_Pirkejasid_Pirkejas`=`{$this->pirkejas_lentele}`.`id_Pirkejas`
						LEFT JOIN `{$this->parduotuve_lentele}`
							ON `{$this->pirkimas_lentele}`.`fk_Parduotuveid_Parduotuve`=`{$this->parduotuve_lentele}`.`id_Parduotuve`";


        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }


    public function updateBuy($data) {
        $query = "  UPDATE `{$this->pirkimas_lentele}`
					SET    `Pristatymas`='{$data['Pristatymas']}',
						   `Grazinimas`='{$data['Grazinimas']}',
						   `Kiekis`='{$data['Kiekis']}',
						   `fk_Pirkejasid_Pirkejas`='{$data['fk_Pirkejasid_Pirkejas']}',
                           `fk_Parduotuveid_Parduotuve`='{$data['fk_Parduotuveid_Parduotuve']}'
					WHERE `id_Pirkimas`='{$data['id_Pirkimas']}'";
        mysql::query($query);

    }

    public function insertBuy($data) {

        $query = "  INSERT INTO `{$this->pirkimas_lentele}`
								(
									`Pristatymas`,
									`Grazinimas`,
									`Kiekis`,
								    `fk_Pirkejasid_Pirkejas`,
								    `fk_Parduotuveid_Parduotuve`
									
								)
								VALUES
								(
									'{$data['Pristatymas']}',
									'{$data['Grazinimas']}',
									'{$data['Kiekis']}',
									'{$data['fk_Pirkejasid_Pirkejas']}',
									'{$data['fk_Parduotuveid_Parduotuve']}'
									
								)";
        mysql::query($query);

        return mysql::getLastInsertedId();
    }

    public function getBuyerlist(){
        $query = " SELECT *
				   FROM `{$this->pirkejas_lentele}`";
        $data = mysql::select($query);

        return $data;
    }

    public function getShopList(){
        $query = " SELECT *
				   FROM `{$this->parduotuve_lentele}`";
        $data = mysql::select($query);

        return $data;
    }
    /**
     * Sąskaitos, sussietos su pirkimu
     * @return type
     */
    public function getBillCountOfBuys($id) {
        $query = "  SELECT COUNT(`{$this->saskaita_lentele}`.`Nr`) AS `kiekis`
					FROM `{$this->pirkimas_lentele}`
						INNER JOIN `{$this->saskaita_lentele}`
							ON `{$this->pirkimas_lentele}`.`id_Pirkimas`=`{$this->saskaita_lentele}`.`fk_Pirkimasid_Pirkimas`
					WHERE `{$this->pirkimas_lentele}`.`id_Pirkimas`='{$id}'";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    public function deleteBill($serviceId, $clause = "") {
        $query = "  DELETE FROM `{$this->saskaita_lentele}`
					WHERE `fk_PirkimasId_Pirkimas`='{$serviceId}'" . $clause;
        mysql::query($query);
    }

    public function deleteBuy($id) {
        $query = "  DELETE FROM `{$this->pirkimas_lentele}`
					WHERE `id_Pirkimas`='{$id}'";
        mysql::query($query);
    }

    public function insertBill($data) {
        if(isset($data['Data_arr']) && sizeof($data['Data_arr']) > 0) {
            foreach($data['Data_arr'] as $key=>$val) {
                if($data['neaktyvus'] == array() || $data['neaktyvus'][$key] == 0) {
                    $query = "  INSERT INTO `{$this->saskaita_lentele}`
											(
												`fk_Pirkimasid_Pirkimas`,
												`Suma`,
												`Banko_saskaita`,
											    `Data`
								
											)
											VALUES
											(
												'{$data['id_Pirkimas']}',
												'{$data['Suma_array'][$key]}',
												'{$data['Banko_saskaita_array'][$key]}',
												'{$val}'
											)";
                    mysql::query($query);
                }
            }
        }
    }


    public function getBill($serviceId) {
        $query = "  SELECT *
					FROM `{$this->saskaita_lentele}`
					 WHERE `fk_Pirkimasid_Pirkimas`='{$serviceId}'";
        $data = mysql::select($query);

        return $data;
    }


    public function getReport($dateFrom, $dateTo){
        $whereClauseString = "";
        if(!empty($dateFrom)) {
            $whereClauseString .= " WHERE `{$this->pirkimas_lentele}`.`Kiekis`>='{$dateFrom}'";
            if(!empty($dateTo)) {
                $whereClauseString .= " AND `{$this->pirkimas_lentele}`.`Kiekis`<='{$dateTo}'";
            }
        } else {
            if(!empty($dateTo)) {
                $whereClauseString .= " WHERE `{$this->pirkimas_lentele}`.`Kiekis`<='{$dateTo}'";
            }
        }

        $query = "  SELECT  `{$this->pirkimas_lentele}`.`id_Pirkimas`,
							`{$this->saskaita_lentele}`.`Data`,
							`{$this->saskaita_lentele}`.`Suma`,
							`{$this->pirkimas_lentele}`.`Kiekis`,
						    `{$this->pirkejas_lentele}`.`Vardas`,
						    `{$this->pirkejas_lentele}`.`Pavarde`,
                            `{$this->pirkejas_lentele}`.`id_Pirkejas`,
                         IFNULL(sum(`{$this->saskaita_lentele}`.`Suma` * `{$this->pirkimas_lentele}`.`Kiekis`), 0) as `pirkimo_kaina`,
						   `t`.`pirkejo_perkamo_kiekio_suma`,
						   `s`.`pirkimu_saskaitu_kainos_suma`
			FROM `{$this->pirkimas_lentele}`
					   LEFT JOIN `{$this->saskaita_lentele}`
							ON `{$this->pirkimas_lentele}`.`id_Pirkimas`=`{$this->saskaita_lentele}`.`fk_Pirkimasid_Pirkimas`			   
                      INNER JOIN `{$this->pirkejas_lentele}`
							ON `{$this->pirkimas_lentele}`.`fk_Pirkejasid_Pirkejas`=`{$this->pirkejas_lentele}`.`id_Pirkejas`
                      INNER JOIN (
							SELECT `id_Pirkejas`,
									sum(`{$this->pirkimas_lentele}`.`Kiekis`) AS `pirkejo_perkamo_kiekio_suma`
							FROM `{$this->pirkimas_lentele}`
								INNER JOIN `{$this->pirkejas_lentele}`
									ON `{$this->pirkimas_lentele}`.`fk_Pirkejasid_Pirkejas`=`{$this->pirkejas_lentele}`.`id_Pirkejas`
							{$whereClauseString}
							GROUP BY `id_Pirkejas`
						) `t` ON `t`.`id_Pirkejas`=`{$this->pirkejas_lentele}`.`id_Pirkejas`
                     INNER JOIN (
							SELECT `id_Pirkejas`,
									IFNULL(sum(`{$this->saskaita_lentele}`.`Suma` * `{$this->pirkimas_lentele}`.`Kiekis`), 0) as `pirkimu_saskaitu_kainos_suma`
							FROM `{$this->pirkimas_lentele}`
								INNER JOIN `{$this->pirkejas_lentele}`
									ON `{$this->pirkimas_lentele}`.`fk_Pirkejasid_Pirkejas`=`{$this->pirkejas_lentele}`.`id_Pirkejas`
								LEFT JOIN `{$this->saskaita_lentele}`
									ON `{$this->pirkimas_lentele}`.`id_Pirkimas`=`{$this->saskaita_lentele}`.`fk_Pirkimasid_Pirkimas`
								{$whereClauseString}							
								GROUP BY `id_Pirkejas`
						) `s` ON `s`.`id_Pirkejas`=`{$this->pirkejas_lentele}`.`id_Pirkejas`
					{$whereClauseString}
					GROUP BY `{$this->pirkimas_lentele}`.`id_Pirkimas` ORDER BY `{$this->pirkejas_lentele}`.`pavarde` ASC";

        $data = mysql::select($query);


        return $data;
    }



    //pirkimu suma pagal saskaita
    public function getSumPriceOfBuys($dateFrom, $dateTo){
        $whereClauseString = "";
        if(!empty($dateFrom)) {
            $whereClauseString .= " WHERE `{$this->pirkimas_lentele}`.`Kiekis`>='{$dateFrom}'";
            if(!empty($dateTo)) {
                $whereClauseString .= " AND `{$this->pirkimas_lentele}`.`Kiekis`<='{$dateTo}'";
            }
        } else {
            if(!empty($dateTo)) {
                $whereClauseString .= " WHERE `{$this->pirkimas_lentele}`.`Kiekis`<='{$dateTo}'";
            }
        }

        $query = "  SELECT sum(`{$this->saskaita_lentele}`.`Suma`) AS `paslaugu_suma`
					FROM `{$this->pirkimas_lentele}`
					    INNER JOIN `{$this->saskaita_lentele}`
							ON `{$this->pirkimas_lentele}`.`id_Pirkimas`=`{$this->saskaita_lentele}`.`fk_Pirkimasid_Pirkimas`
						
					{$whereClauseString}";
        $data = mysql::select($query);

        return $data;
    }
    //kiekis pirkimu
    public function getAmountOfBuys($dateFrom, $dateTo){
        $whereClauseString = "";
        if(!empty($dateFrom)) {
            $whereClauseString .= " WHERE `{$this->pirkimas_lentele}`.`Kiekis`>='{$dateFrom}'";
            if(!empty($dateTo)) {
                $whereClauseString .= " AND `{$this->pirkimas_lentele}`.`Kiekis`<='{$dateTo}'";
            }
        } else {
            if(!empty($dateTo)) {
                $whereClauseString .= " WHERE `{$this->pirkimas_lentele}`.`Kiekis`<='{$dateTo}'";
            }
        }

        $query = "  SELECT sum(`{$this->pirkimas_lentele}`.`Kiekis`) AS `pirkimu_kiekis`
					FROM `{$this->pirkimas_lentele}`
					 
					{$whereClauseString}";
        $data = mysql::select($query);

        return $data;

    }








}