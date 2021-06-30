<ul id="reportInfo">
    <li class="title">Sudarytų pirkimų ataskaita</li>
    <li>Sudarymo data: <span><?php echo date("Y-m-d"); ?></span></li>
    <li>Pirkimų knygų kiekiai:
        <span>
		<?php
        if(!empty($data['dataNuo'])) {
            if(!empty($data['dataIki'])) {
                echo "nuo {$data['dataNuo']} iki {$data['dataIki']}";
            } else {
                echo "nuo {$data['dataNuo']}";
            }
        } else {
            if(!empty($data['dataIki'])) {
                echo "iki {$data['dataIki']}";
            } else {
                echo "nenurodyta";
            }
        }
        ?>
		</span>
    </li>

</ul>



<?php
if(sizeof($buyData) > 0) { ?>
    <table class="reportTable">
        <tr>
            <th>Pirkimas</th>
            <th>Sąskaitos data</th>
            <th class="width150">Kiekis pirkime</th>
            <th class="width150">Sąskaitos suma</th>
        </tr>

        <?php
        // suformuojame lentelę
        for($i = 0; $i < sizeof($buyData); $i++) {

            if($i == 0 || $buyData[$i]['id_Pirkejas'] != $buyData[$i-1]['id_Pirkejas']) {
                echo
                    "<tr>"
                    . "<td class='groupSeparator' colspan='4'>{$buyData[$i]['Vardas']} {$buyData[$i]['Pavarde']}</td>"
                    . "</tr>";
            }

            if($buyData[$i]['pirkimo_kaina'] == 0) {
                $buyData[$i]['pirkimo_kaina'] = "neišrašyta";
            } else {
                $buyData[$i]['pirkimo_kaina'] .= " &euro; ";
            }

            echo
                "<tr>"
                . "<td>#{$buyData[$i]['id_Pirkimas']}</td>"
                . "<td>{$buyData[$i]['Data']}</td>"
                . "<td>{$buyData[$i]['Kiekis']}</td>"
                . "<td>{$buyData[$i]['pirkimo_kaina']}</td>"
                . "</tr>";
            if($i == (sizeof($buyData) - 1) || $buyData[$i]['id_Pirkejas'] != $buyData[$i+1]['id_Pirkejas']) {
						if($buyData[$i]['pirkimu_saskaitu_kainos_suma'] == 0) {
							$buyData[$i]['pirkimu_saskaitu_kainos_suma'] = "neišrašyta";
						} else {
							$buyData[$i]['pirkimu_saskaitu_kainos_suma'] .= "";
						}

						echo
							"<tr class='aggregate'>"
								. "<td colspan='2'></td>"
								. "<td class='border'>{$buyData[$i]['pirkejo_perkamo_kiekio_suma']}</td>"
								. "<td class='border'>{$buyData[$i]['pirkimu_saskaitu_kainos_suma']} &euro;</td>"
							. "</tr>";
					}


        }
        ?>

        <tr>
            <td class='groupSeparator' colspan='4'>Bendra suma</td>
        </tr>

        <tr class="aggregate">
            <td class="label" style="text-align: right" colspan="2"></td>
            <td class="border"><?php echo $amountOfBuys[0]['pirkimu_kiekis']; ?> </td>
            <td class="border">
                <?php
                if($totalPrice[0]['paslaugu_suma'] == 0) {
                    $totalPrice[0]['paslaugu_suma'] = "neužsakyta";
                } else {
                    $totalPrice[0]['paslaugu_suma'] .=" &euro; ";
                }

                echo $totalPrice[0]['paslaugu_suma'];
                ?>
            </td>
        </tr>
    </table>
    <a href="index.php?module=buy&action=report" title="Nauja ataskaita" style="margin-bottom: 15px" class="button large float-right">nauja ataskaita</a>
    <?php
} else {
    ?>
    <div class="warningBox">
        Nurodytu laikotartpiu sutarčių sudaryta nebuvo.
    </div>
    <?php
}
?>