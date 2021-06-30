<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=<?php echo $module; ?>&action=list">Pirkimas</a></li>
    <li><?php if(!empty($id)) echo "redaguoti pirkimą"; else echo "naujas pirkimas"; ?></li>
</ul>
<div class="float-clear"></div>
<div id="formContainer">
    <?php if($formErrors != null) { ?>
        <div class="errorBox">
            Neįvesti arba neteisingai įvesti šie laukai:
            <?php
            echo $formErrors;
            ?>
        </div>
    <?php } ?>
    <form action="" method="post">
        <fieldset>
            <legend>Pirkimo informacija</legend>
            <p>
                <label class="field" for="Pristatymas">Pristatymas<?php echo in_array('Pristatymas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Pristatymas" name="Pristatymas" class="textbox textbox-150" value="<?php echo isset($data['Pristatymas']) ? $data['Pristatymas'] : ''; ?>" />
                <?php if(key_exists('Pristatymas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Pristatymas']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="Grazinimas">Grąžinimas<?php echo in_array('Grazinimas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Grazinimas" name="Grazinimas" class="textbox textbox-150" value="<?php echo isset($data['Grazinimas']) ? $data['Grazinimas'] : ''; ?>" />
                <?php if(key_exists('Grazinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Grazinimas']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="Kiekis">Kiekis<?php echo in_array('Kiekis', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Kiekis" name="Kiekis" class="textbox textbox-150" value="<?php echo isset($data['Kiekis']) ? $data['Kiekis'] : ''; ?>" />
                <?php if(key_exists('Kiekis', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Kiekis']} simb.)</span>"; ?>
            </p>

            <p>
                <label class="field" for="fk_Pirkejasid_Pirkejas">Pirkėjas<?php echo in_array('fk_Pirkejasid_Pirkejas', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="fk_Pirkejasid_Pirkejas" name="fk_Pirkejasid_Pirkejas">
                    <option value="-1">---------------</option>
                    <?php
                    // išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
                    $buyerTypes = $buyObj->getBuyerlist();
                    foreach($buyerTypes as $key => $val) {
                        $selected = "";
                        if(isset($data['fk_Pirkejasid_Pirkejas']) && $data['fk_Pirkejasid_Pirkejas'] == $val['id_Pirkejas']) {
                            $selected = " selected='selected'";
                        }
                        echo "<option{$selected} value='{$val['id_Pirkejas']}'>{$val['Vardas']} {$val['Pavarde']}</option>";
                    }
                    ?>
                </select>
            </p>

            <p>
                <label class="field" for="fk_Parduotuveid_Parduotuve">Parduotuvė<?php echo in_array('fk_Parduotuveid_Parduotuve', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="fk_Parudotuveid_Parduotuve" name="fk_Parduotuveid_Parduotuve">
                    <option value="-1">---------------</option>
                    <?php
                    // išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
                    $buyerTypes = $buyObj->getShoplist();
                    foreach($buyerTypes as $key => $val) {
                        $selected = "";
                        if(isset($data['fk_Parduotuveid_Parduotuve']) && $data['fk_Parduotuveid_Parduotuve'] == $val['id_Parduotuve']) {
                            $selected = " selected='selected'";
                        }
                        echo "<option{$selected} value='{$val['id_Parduotuve']}'>{$val['Pavadinimas']}</option>";
                    }
                    ?>
                </select>
            </p>

        </fieldset>

        <fieldset>
            <legend>Sąskaitos</legend>
            <div class="childRowContainer">
                <div class="labelLeft<?php if(empty($data['saskaita_pirkimas']) || sizeof($data['saskaita_pirkimas']) == 0) echo ' hidden'; ?>">Data</div>
                <div class="labelRight<?php if(empty($data['saskaita_pirkimas']) || sizeof($data['saskaita_pirkimas']) == 0) echo ' hidden'; ?>">Suma</div>
                <div class="labelRight<?php if(empty($data['saskaita_pirkimas']) || sizeof($data['saskaita_pirkimas']) == 0) echo ' hidden'; ?>">Banko saskaita</div>
                <div class="float-clear"></div>
                <?php
                if(empty($data['saskaita_pirkimas']) || sizeof($data['saskaita_pirkimas']) == 0) {
                    ?>

                    <div class="childRow hidden">
                        <input type="text" name="Data_arr[]" value="" class="textbox textbox-70 date " disabled="disabled" />
                        <input type="text" name="Suma_array[]" value="" class="textbox textbox-70" disabled="disabled" />
                        <input type="text" name="Banko_saskaita_array[]" value="" class="textbox textbox-150" disabled="disabled" />
                        <input type="hidden" class="isDisabledForEditing" name="neaktyvus[]" value="0" />
                        <a href="#" title="" class="removeChild">Naikinti</a>
                    </div>
                    <div class="float-clear"></div>

                    <?php
                } else {
                    foreach($data['saskaita_pirkimas'] as $key => $val) {
                        ?>
                        <div class="childRow">
                            <input type="text" name="Data_arr[]" value="<?php echo $val['Data']; ?>" class="textbox textbox-70 date <?php if(isset($val['neaktyvus']) && $val['neaktyvus'] == 1) echo ' disabledInput'; ?>" />
                            <input type="text" name="Suma_array[]" value="<?php echo $val['Suma']; ?>" class="textbox textbox-70<?php if(isset($val['neaktyvus']) && $val['neaktyvus'] == 1) echo ' disabledInput'; ?>" />
                            <input type="text" name="Banko_saskaita_array[]" value="<?php echo $val['Banko_saskaita']; ?>" class="textbox textbox-150<?php if(isset($val['neaktyvus']) && $val['neaktyvus'] == 1) echo ' disabledInput'; ?>" />
                            <input type="hidden" class="isDisabledForEditing" name="neaktyvus[]" value="<?php if(isset($val['neaktyvus']) && $val['neaktyvus'] == 1) echo "1"; else echo "0"; ?>" />
                            <a href="#" title="" class="removeChild<?php if(isset($val['neaktyvus']) && $val['neaktyvus'] == 1) echo " hidden"; ?>">Naikinti</a>
                        </div>
                        <div class="float-clear"></div>
                        <?php
                    }
                }
                ?>
            </div>
            <p id="newItemButtonContainer">
                <a href="#" title="" class="addChild">Pridėti</a>
            </p>
        </fieldset>
        <p class="required-note">*  pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submit button" name="submit" value="Išsaugoti">
        </p>
        <?php if(isset($data['id_Pirkimas'])) { ?>
            <input type="hidden" name="id_Pirkimas" value="<?php echo $data['id_Pirkimas']; ?>" />
        <?php } ?>
    </form>
</div>
