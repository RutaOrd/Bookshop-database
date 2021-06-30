<?php


class books
{
    private $knyga_lentele = '';
    private $serija_lentele = '';
    private $parduotuve_lentele = '';
    private $autorius_lentele = '';
    private $formatas_lentele = '';
    private $leidykla_lentele = '';

    public function __construct() {
        $this->knyga_lentele = 'knyga';
        $this->serija_lentele = 'serija';
        $this->parduotuve_lentele = 'parduotuve';
        $this->autorius_lentele = 'autorius';
        $this->formatas_lentele = 'formatas';
        $this->leidykla_lentele = 'leidykla';

    }

    /**
     * Knygų sąrašo išrinkimas
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getBookList($limit, $offset) {
        $query = "  SELECT `{$this->knyga_lentele}`.`id_Knyga`,
                           `{$this->knyga_lentele}`.`Pavadinimas`,
						   `{$this->knyga_lentele}`.`Isleidimo_metai`,
						   `{$this->knyga_lentele}`.`Zanras`  ,
						   `{$this->knyga_lentele}`.`Kalba`  ,
						   `{$this->knyga_lentele}`.`Ivertinimas` ,
                           `{$this->knyga_lentele}`.`ISBN` ,
                           `{$this->knyga_lentele}`.`Literaturos_rusis` ,
                           `{$this->knyga_lentele}`.`Funkcinis_stilius` ,
                           `{$this->parduotuve_lentele}`. `Pavadinimas` AS `fk_Parduotuveid_Parduotuve`,
                           `{$this->formatas_lentele}`. .`Virselio_tipas` AS `fk_Formatasid_Formatas`,
                           `{$this->autorius_lentele}`. .`Vardas` AS `fk_Autoriusid_Autorius`,
                           `{$this->serija_lentele}`. .`Pavadinimas` AS `fk_Serijaid_Serija`,
                           `{$this->leidykla_lentele}`. .`Pavadinimas` AS `fk_Leidyklaid_Leidykla`
					FROM `{$this->knyga_lentele}`
						LEFT JOIN `{$this->parduotuve_lentele}`
							ON `{$this->knyga_lentele}`.`fk_Parduotuveid_Parduotuve`=`{$this->parduotuve_lentele}`.`id_Parduotuve`
						LEFT JOIN `{$this->formatas_lentele}`
							ON `{$this->knyga_lentele}`.`fk_Formatasid_Formatas`=`{$this->formatas_lentele}`.`id_Formatas`
					    LEFT JOIN `{$this->autorius_lentele}`
							ON `{$this->knyga_lentele}`.`fk_Autoriusid_Autorius`=`{$this->autorius_lentele}`.`id_Autorius`
					    LEFT JOIN `{$this->serija_lentele}`
							ON `{$this->knyga_lentele}`.`fk_Serijaid_Serija`=`{$this->serija_lentele}`.`id_Serija`
						LEFT JOIN `{$this->leidykla_lentele}`
							ON `{$this->knyga_lentele}`.`fk_Leidyklaid_Leidykla`=`{$this->leidykla_lentele}`.`id_Leidykla`  LIMIT {$limit} OFFSET {$offset}";
        $data = mysql::select($query);

        return $data;
    }

    /**
     * Knygų kiekio radimas
     * @return type
     */
    public function getBookListCount() {
        $query = "  SELECT COUNT(`{$this->knyga_lentele}`.`id_Knyga`) AS `kiekis`
					FROM `{$this->knyga_lentele}`
						LEFT JOIN `{$this->parduotuve_lentele}`
							ON `{$this->knyga_lentele}`.`fk_Parduotuveid_Parduotuve`=`{$this->parduotuve_lentele}`.`id_Parduotuve`
						LEFT JOIN `{$this->formatas_lentele}`
							ON `{$this->knyga_lentele}`.`fk_Formatasid_Formatas`=`{$this->formatas_lentele}`.`id_Formatas`
					    LEFT JOIN `{$this->autorius_lentele}`
							ON `{$this->knyga_lentele}`.`fk_Autoriusid_Autorius`=`{$this->autorius_lentele}`.`id_Autorius`
					      LEFT JOIN `{$this->serija_lentele}`
							ON `{$this->knyga_lentele}`.`fk_Serijaid_Serija`=`{$this->serija_lentele}`.`id_Serija`
						LEFT JOIN `{$this->leidykla_lentele}`
							ON `{$this->knyga_lentele}`.`fk_Leidyklaid_Leidykla`=`{$this->leidykla_lentele}`.`id_Leidykla`";
        $data = mysql::select($query);

        return $data[0]['kiekis'];
    }

    /**
     * Knygos išrinkimas
     * @param type $id
     * @return type
     */
    public function getContract($id) {
        $query = "  SELECT `{$this->knyga_lentele}`.`id_Knyga`,
                           `{$this->knyga_lentele}`.`Pavadinimas`,
						   `{$this->knyga_lentele}`.`Isleidimo_metai`,
						   `{$this->knyga_lentele}`.`Zanras`  ,
						   `{$this->knyga_lentele}`.`Kalba`  ,
						   `{$this->knyga_lentele}`.`Ivertinimas` ,
                           `{$this->knyga_lentele}`.`ISBN` ,
                           `{$this->knyga_lentele}`.`Literaturos_rusis` ,
                           `{$this->knyga_lentele}`.`Funkcinis_stilius` ,
						   `{$this->knyga_lentele}`.`fk_Parduotuveid_Parduotuve`,
						   `{$this->knyga_lentele}`.`fk_Formatasid_Formatas`,
						   `{$this->knyga_lentele}`.`fk_Autoriusid_Autorius`,
						   `{$this->knyga_lentele}`.`fk_Serijaid_Serija`,
						   `{$this->knyga_lentele}`.`fk_Leidyklaid_Leidykla`  
					FROM `{$this->knyga_lentele}`
					WHERE `{$this->knyga_lentele}`.`id_Knyga`='{$id}'";



        $data = mysql::select($query);

        return $data[0];
    }





}