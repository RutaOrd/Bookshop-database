<?php


class bill
{
    private $saskaita_lentele = '';
    private $pirkimas_lentele = '';

    public function __construct(){
        $this->saskaita_lentele = 'saskaita';
        $this->pirkimas_lentele = 'pirkimas';

    }

    public function getBills($id) {
        $query = "  SELECT *
					FROM `{$this->saskaita_lentele}`
					WHERE `id_Saskaita`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }

    public function getBillsList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if(isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }
        $query = "  SELECT `{$this->saskaita_lentele}`.`Nr`,
						   `{$this->saskaita_lentele}`.`Data`,
                           `{$this->saskaita_lentele}`.`Suma`,
                           `{$this->saskaita_lentele}`.`Banko_saskaita`,
                           `{$this->pirkimas_lentele}`.`Pristatymas` AS `fk_Pirkimasid_Pirkimas`
					FROM `{$this->saskaita_lentele}`
						LEFT JOIN `{$this->pirkimas_lentele}`
							ON `{$this->saskaita_lentele}`.`fk_Pirkimasid_Pirkimas`=`{$this->pirkimas_lentele}`.`id_Pirkimas` {$limitOffsetString}";


        $data = mysql::select($query);

        return $data;
    }


    public function getBillsListCount()
    {
        $query = "  SELECT COUNT(`{$this->saskaita_lentele}`.`Nr`) as `kiekis`
					FROM `{$this->saskaita_lentele}`
						LEFT JOIN `{$this->pirkimas_lentele}`
							ON `{$this->saskaita_lentele}`.`fk_Pirkimasid_Pirkimas`=`{$this->pirkimas_lentele}`.`id_Parduotuve`";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }


}