<?php


class series
{
    private $serija_lentele = '';
    private $knyga_lentele = '';

    public function __construct(){
        $this->serija_lentele = 'serija';
        $this->knyga_lentele = 'knyga';
    }
    /**
     * Serijos išrinkimas
     * @param type $id
     * @return type
     */
    public function getSeries($id) {
        $query = "  SELECT *
					FROM `{$this->serija_lentele}`
					WHERE `id_Serija`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }
    /**
     * Serijų sąrašo išrinkimas
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getSeriesList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if(isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }
        $query = "  SELECT `{$this->serija_lentele}`.`id_Serija`,
						   `{$this->serija_lentele}`.`Pavadinimas`,
                           `{$this->serija_lentele}`.`Versijos_kodas`,
                           `{$this->serija_lentele}`.`Daliu_skaicius`  
					FROM `{$this->serija_lentele}`  {$limitOffsetString}";

        $data = mysql::select($query);

        return $data;
    }

    /**
     * Serijų kiekio radimas
     * @return type
     */
    public function getSeriesListCount() {
        $query = "  SELECT COUNT(`{$this->serija_lentele}`.`id_Serija`) as `kiekis`
					FROM `{$this->serija_lentele}`";
        $data = mysql::select($query);
        return $data[0]['kiekis'];
    }


    public function updateSeries($data) {
        $query = "  UPDATE  `{$this->serija_lentele}`
                    SET     `Pavadinimas`='{$data['Pavadinimas']}',
                            `Versijos_kodas`='{$data['Versijos_kodas']}',
                            `Daliu_skaicius`='{$data['Daliu_skaicius']}'
                    WHERE   `id_Serija`='{$data['id_Serija']}'";
        mysql::query($query);
    }

    /**
     * Serijos šalinimas
     * @param type $id
     */
    public function deleteSeries($id) {
        $query = "  DELETE FROM `{$this->serija_lentele}`
					WHERE `id_Serija`='{$id}'";
        mysql::query($query);
    }


    public function insertSeries($data) {
        $query = "  INSERT INTO `{$this->serija_lentele}`
								(
									`Pavadinimas`,
									`Versijos_kodas`,
									`Daliu_skaicius`
								) 
								VALUES
								(
									
								    '{$data['Pavadinimas']}',
									'{$data['Versijos_kodas']}',
									'{$data['Daliu_skaicius']}'
																		
								)";
        mysql::query($query);
    }

    public function getSeriesCountOfBook($id) {
        $query = "  SELECT COUNT(`{$this->knyga_lentele}`.`id_Knyga`) AS `kiekis`
					FROM `{$this->serija_lentele}`
						INNER JOIN `{$this->knyga_lentele}`
							ON `{$this->serija_lentele}`.`id_Serija`=`{$this->knyga_lentele}`.`fk_Serijaid_Serija`
					WHERE `{$this->serija_lentele}`.`id_Serija`='{$id}'";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }



}