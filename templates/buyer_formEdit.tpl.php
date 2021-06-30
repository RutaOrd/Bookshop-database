<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=<?php echo $module; ?>&action=list">Pirkėjas</a></li>
    <li><?php if(!empty($id)) echo "Redaguoti pirkėją"; else echo "Naujas pirkėjas"; ?></li>
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
            <legend>Pirkėjas</legend>
            <p>
                <label class="field" for="Vardas">Vardas<?php echo in_array('Vardas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Vardas" name="Vardas" class="textbox textbox-150" value="<?php echo isset($data['Vardas']) ? $data['Vardas'] : ''; ?>" />
                <?php if(key_exists('Vardas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Vardas']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="Pavarde">Pavardė<?php echo in_array('{Pavarde}', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Pavarde" name="Pavarde" class="textbox textbox-150" value="<?php echo isset($data['Pavarde']) ? $data['Pavarde'] : ''; ?>" />
                <?php if(key_exists('Pavarde', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Pavarde']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="Adresas">Adresas<?php echo in_array('Adresas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Adresas" name="Adresas" class="textbox textbox-150" value="<?php echo isset($data['Adresas']) ? $data['Adresas'] : ''; ?>" />
                <?php if(key_exists('Adresas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Adresas']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="Banko_saskaita">Banko sąskaita<?php echo in_array('Banko_saskaita', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Banko_saskaita" name="Banko_saskaita" class="textbox textbox-150" value="<?php echo isset($data['Banko_saskaita']) ? $data['Banko_saskaita'] : ''; ?>" />
                <?php if(key_exists('Banko_saskaita', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Banko_saskaita']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="Telefono_numeris">Telefono numeris<?php echo in_array('Telefono_numeris', $required)?'<span>*</span>' : ''; ?></label>
                <input type="text" id="Telefono_numeris" name="Telefono_numeris" class="textbox textbox-150" value="<?php echo isset($data['Telefono_numeris']) ? $data['Telefono_numeris'] : ''; ?>" />
                <?php if(key_exists('Telefono_numeris', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Telefono_numeris']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="Gimimo_data">Gimimo_data<?php echo in_array('Gimimo_data', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Gimimo_data" name="Gimimo_data" class="textbox textbox-150" value="<?php echo isset($data['Gimimo_data']) ? $data['Gimimo_data'] : ''; ?>" />
                <?php if(key_exists('Gimimo_data', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Gimimo_data']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="fk_Darbuotojasid_Darbuotojas">Darbuotojas<?php echo in_array('fk_Darbuotojasid_Darbuotojas', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="fk_Darbuotojasid_Darbuotojas" name="fk_Darbuotojasid_Darbuotojas">
                    <option value="-1">---------------</option>
                    <?php
                    $buyertypes = $buyerObj->getWorkerList();
                    // Generuojamas pasirinkimų laukas
                    $buyer = $buyerObj->getWorkerlist();
                    foreach($buyer as $key => $val) {
                        $selected = "";
                        if(isset($data['fk_Darbuotojasid_Darbuotojas']) && $data['fk_Darbuotojasid_Darbuotojas'] == $val['id_Darbuotojas']) {
                            $selected = " selected='selected'";
                        }
                        echo "<option{$selected} value='{$val['id_Darbuotojas']}'>  {$val['Vardas']} {$val['Pavarde']}</option>";
                    }

                    ?>
                </select>
            </p>

        </fieldset>
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submit button" name="submit" value="Išsaugoti">
        </p>
        <?php if(isset($data['id_Pirkejas'])) { ?>
            <input type="hidden" name="id_Pirkejas" value="<?php echo $data['id_Pirkejas']; ?>" />
        <?php } ?>
    </form>
</div>
