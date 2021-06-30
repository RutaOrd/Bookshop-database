<?php


class press
{
    private $leidykla_lentele = '';

    public function __construct(){
        $this->leidykla_lentele = 'leidykla';
    }

    public function getPress($id) {
        $query = "  SELECT *
					FROM `{$this->leidykla_lentele}`
					WHERE `id_leidykla`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }

    public function getPressList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if(isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT `{$this->leidykla_lentele}`.`id_Leidykla`,
						   `{$this->leidykla_lentele}`.`Pavadinimas`,
                           `{$this->leidykla_lentele}`.`Adresas`,
                           `{$this->leidykla_lentele}`.`Darbo_laikas`,
                           `{$this->leidykla_lentele}`.`Kontaktinis_numeris`  
					FROM `{$this->leidykla_lentele}` {$limitOffsetString}";

        $data = mysql::select($query);

        return $data;
    }


    public function getPressListCount() {
        $query = "  SELECT COUNT(`{$this->leidykla_lentele}`.`id_Leidykla`) as `kiekis`
					FROM `{$this->leidykla_lentele}`";
        $data = mysql::select($query);
        return $data[0]['kiekis'];
    }


}