<?php


class author
{
    private $autorius_lentele = '';

    public function __construct(){
        $this->autorius_lentele = 'autorius';
    }
    /**
     * Autoriaus išrinkimas
     * @param type $id
     * @return type
     */
    public function getAuthor($id) {
        $query = "  SELECT *
					FROM `{$this->autorius_lentele}`
					WHERE `id`='{$id}'";
        $data = mysql::select($query);

        return $data[0];
    }

    /**
     * Autorių sąrašo išrinkimas
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getAuthorList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if(isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT `{$this->autorius_lentele}`.`id_Autorius`,
						   `{$this->autorius_lentele}`.`Vardas`,
                           `{$this->autorius_lentele}`.`Pavarde`,
                           `{$this->autorius_lentele}`.`Gimimo_data`,
                           `{$this->autorius_lentele}`.`Issilavinimas`,
                           `{$this->autorius_lentele}`.`Kilmes_salis`,
                           `{$this->autorius_lentele}`.`Pasiekimai`
					FROM `{$this->autorius_lentele}` {$limitOffsetString}";

        $data = mysql::select($query);


        return $data;
    }


    /**
     * Autorių kiekio radimas
     * @return type
     */
    public function getAuthorListCount() {
        $query = "  SELECT COUNT(`{$this->autorius_lentele}`.`id_Autorius`) as `kiekis`
					FROM `{$this->autorius_lentele}`";
        $data = mysql::select($query);
        return $data[0]['kiekis'];
    }



    /**
     * Autoriaus šalinimas
     * @param type $id
     */
    public function deleteEmployee($id) {
        $query = "  DELETE FROM `{$this->darbuotojai_lentele}`
					WHERE `tabelio_nr`='{$id}'";
        mysql::query($query);
    }




}