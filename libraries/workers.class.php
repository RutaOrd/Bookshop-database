<?php

class workers
{
    private $darbuotojas_lentele = '';
    private $parduotuve_lentele = '';
    private $pirkejas_lentele = '';

    public function __construct()
    {
        $this->darbuotojas_lentele = 'darbuotojas';
        $this->parduotuve_lentele = 'parduotuve';
        $this->pirkejas_lentele = 'pirkejas';
    }


    public function getWorker($id)
    {
        $query = "  SELECT *
					FROM `{$this->darbuotojas_lentele}`
					WHERE `id_Darbuotojas`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }


    public function getWorkersList($limit = null, $offset = null)
    {
        $limitOffsetString = "";
        if (isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if (isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT `{$this->darbuotojas_lentele}`.`id_Darbuotojas`,
						   `{$this->darbuotojas_lentele}`.`Vardas`,
                           `{$this->darbuotojas_lentele}`.`Pavarde`,
                           `{$this->darbuotojas_lentele}`.`Pareigos`,
                           `{$this->parduotuve_lentele}`.`Pavadinimas` AS `fk_Parduotuveid_Parduotuve`
					FROM `{$this->darbuotojas_lentele}`
						LEFT JOIN `{$this->parduotuve_lentele}`
							ON `{$this->darbuotojas_lentele}`.`fk_Parduotuveid_Parduotuve`=`{$this->parduotuve_lentele}`.`id_Parduotuve` {$limitOffsetString}";
        $data = mysql::select($query);


        return $data;
    }

    public function getWorkersListByShop($shopId) {
        $query = "  SELECT *
					FROM `{$this->darbuotojas_lentele}`
					WHERE `fk_Parduotuveid_Parduotuve`='{$shopId}'";
        $data = mysql::select($query);

        return $data;
    }

    public function updateWorker($data) {
        $query = "  UPDATE `{$this->darbuotojas_lentele}`
					SET    `Vardas`='{$data['Vardas']}',
					       `Pavarde`='{$data['Pavarde']}',
					       `Pareigos`='{$data['Pareigos']}',
						   `fk_Parduotuveid_Parduotuve`='{$data['fk_Parduotuveid_Parduotuve']}'
					WHERE `id_Darbuotojas`='{$data['id_Darbuotojas']}'";
        mysql::query($query);
    }



    public function insertWorker($data) {
        $query = "  INSERT INTO `{$this->darbuotojas_lentele}`
								(
									`Vardas`,
								    `Pavarde`,
								    `Pareigos`,
									`fk_Parduotuveid_Parduotuve`
								)
								VALUES
								(
									'{$data['Vardas']}',
								    '{$data['Pavarde']}',
								    '{$data['Pareigos']}',
									'{$data['fk_Parduotuveid_Parduotuve']}'
									
								)";

        mysql::query($query);
    }


    public function deleteWorker($id) {
        $query = "  DELETE FROM `{$this->darbuotojas_lentele}`
					WHERE `id_Darbuotojas`='{$id}'";
        mysql::query($query);
    }

    public function getWorkersListCount()
    {
        $query = "  SELECT COUNT(`{$this->darbuotojas_lentele}`.`id_Darbuotojas`) as `kiekis`
					FROM `{$this->darbuotojas_lentele}`
						LEFT JOIN `{$this->parduotuve_lentele}`
							ON `{$this->darbuotojas_lentele}`.`fk_Parduotuveid_Parduotuve`=`{$this->parduotuve_lentele}`.`id_Parduotuve`";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }


    public function getWorkersCountOfBuyers($id) {
        $query = "  SELECT COUNT(`{$this->pirkejas_lentele}`.`id_Pirkejas`) AS `kiekis`
					FROM `{$this->darbuotojas_lentele}`
						INNER JOIN `{$this->pirkejas_lentele}`
							ON `{$this->darbuotojas_lentele}`.`id_Darbuotojas`=`{$this->pirkejas_lentele}`.`fk_Darbuotojasid_Darbuotojas`
					WHERE `{$this->darbuotojas_lentele}`.`id_Darbuotojas`='{$id}'";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }




}