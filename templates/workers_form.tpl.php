<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=<?php echo $module; ?>&action=list">Darbuotojai</a></li>
    <li><?php if(!empty($id)) echo "Darbuotojo redagavimas"; else echo "Naujas darbuotojas"; ?></li>
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
            <legend>Darbuotojo informacija</legend>
            <p>
                <label class="field" for="Vardas">Vardas<?php echo in_array('Vardas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Vardas" name="Vardas" class="textbox textbox-150" value="<?php echo isset($data['Vardas']) ? $data['Vardas'] : ''; ?>" />
                <?php if(key_exists('Vardas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Vardas']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="Pavarde">Pavardė<?php echo in_array('Pavarde', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Pavarde" name="Pavarde" class="textbox textbox-150" value="<?php echo isset($data['Pavarde']) ? $data['Pavarde'] : ''; ?>" />
                <?php if(key_exists('Pavarde', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Pavarde']} simb.)</span>"; ?>
            </p>

            <p>
                <label class="field" for="Pareigos">Pareigos<?php echo in_array('Pareigos', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Pareigos" name="Pareigos" class="textbox textbox-150" value="<?php echo isset($data['Pareigos']) ? $data['Pareigos'] : ''; ?>" />
                <?php if(key_exists('Pareigos', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Pareigos']} simb.)</span>"; ?>
            </p>

            <p>
                <label class="field" for="shop">Parduotuvė<?php echo in_array('fk_Parduotuveid_Parduotuve', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="shop" name="fk_Parduotuveid_Parduotuve">
                    <option value="-1">Pasirinkite parduotuvę</option>
                    <?php
                    // išrenkame visas markes
                    $shops = $shopObj->getShopList();
                    foreach($shops as $key => $val) {
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
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submit button" name="submit" value="Išsaugoti">
        </p>
        <?php if(isset($data['id_Darbuotojas'])) { ?>
            <input type="hidden" name="id_Darbuotojas" value="<?php echo $data['id_Darbuotojas']; ?>" />
        <?php } ?>
    </form>
</div>
