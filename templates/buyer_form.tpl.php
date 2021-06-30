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
            <legend>Naujas pirkėjas</legend>
            <div class="childRowContainer">
                <div class="labelLeft<?php if(empty($data['pirkejas']) || sizeof($data['pirkejas']) == 0) echo ' hidden'; ?>">Vardas<span>* </span> </div>
                <div class="labelRight<?php if(empty($data['pirkejas']) || sizeof($data['pirkejas']) == 0) echo ' hidden'; ?>">Pavardė<span>* </span> </div>
                <div class="labelRight<?php if(empty($data['pirkejas']) || sizeof($data['pirkejas']) == 0) echo ' hidden'; ?>">Adresas<span>* </span> </div>
                <div class="labelRight<?php if(empty($data['pirkejas']) || sizeof($data['pirkejas']) == 0) echo ' hidden'; ?>">Banko sąs.<span>* </span></div>
                <div class="labelRight<?php if(empty($data['pirkejas']) || sizeof($data['pirkejas']) == 0) echo ' hidden'; ?>">Telefono nr.<span>* </span> </div>
                <div class="labelRight<?php if(empty($data['pirkejas']) || sizeof($data['pirkejas']) == 0) echo ' hidden'; ?>">Gimimodata<span>*</span></div>
                <div class="float-clear"></div>
                <?php
                if(empty($data['pirkejas']) || sizeof($data['pirkejas']) == 0) {
                    ?>

                    <div class="childRow hidden">
                        <input type="text" name="Vardas_arr[]" value="" class="textbox textbox-70" disabled="disabled" />
                        <input type="text" name="Pavarde_array[]" value="" class="textbox textbox-70" disabled="disabled" />
                        <input type="text" name="Adresas_array[]" value="" class="textbox textbox-70" disabled="disabled" />
                        <input type="text" name="Banko_saskaita_array[]" value="" class="textbox textbox-70" disabled="disabled" />
                        <input type="text" name="Telefono_numeris_array[]" value="" class="textbox textbox-70" disabled="disabled" />
                        <input type="text" name="Gimimo_data_array[]" value="" class="textbox textbox-70" disabled="disabled" />

                        <select class="elementSelector" name="id_Darbuotojas[]" disabled="disabled">
                            <option value="-1">Pasirinkite darbuotoją</option>
                            <?php


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
                        <input type="hidden" class="isDisabledForEditing" name="neaktyvus[]" value="0" />
                        <a href="#" title="" class="removeChild">Šalinti</a>
                    </div>
                    <div class="float-clear"></div>

                    <?php
                } else {
                    foreach($data['pirkejas'] as $key => $val) {
                        ?>
                        <div class="childRow">
                            <input type="text" name="Vardas_arr[]" value="<?php echo $val['Vardas']; ?>"  class="textbox textbox-70<?php if(isset($val['neaktyvus']) && $val['neaktyvus'] == 1) echo ' disabledInput'; ?>" />
                            <input type="text" name="Pavarde_array[]" value="<?php echo $val['Vardas']; ?>" class="textbox textbox-70<?php if(isset($val['neaktyvus']) && $val['neaktyvus'] == 1) echo ' disabledInput'; ?>" />
                            <input type="text" name="Adresas_array[]" value="<?php echo $val['Adresas']; ?>" class="textbox textbox-70<?php if(isset($val['neaktyvus']) && $val['neaktyvus'] == 1) echo ' disabledInput'; ?>" />
                            <input type="text" name="Banko_saskaita_array[]" value="<?php echo $val['Banko_saskaita']; ?>" class="textbox textbox-70<?php if(isset($val['neaktyvus']) && $val['neaktyvus'] == 1) echo ' disabledInput'; ?>" />
                            <input type="text" name="Telefono_numeris_array[]" value="<?php echo $val['Telefono_numeris']; ?>" class="textbox textbox-70<?php if(isset($val['neaktyvus']) && $val['neaktyvus'] == 1) echo ' disabledInput'; ?>" />
                            <input type="text" name="Gimimo_data_array[]" value="<?php echo $val['Gimimo_data']; ?>" class="textbox textbox-70 <?php if(isset($val['neaktyvus']) && $val['neaktyvus'] == 1) echo ' disabledInput'; ?>" />
                            <input type="hidden" class="isDisabledForEditing" name="neaktyvus[]" value="<?php if(isset($val['neaktyvus']) && $val['neaktyvus'] == 1) echo "1"; else echo "0"; ?>" />
                            <a href="#" title="" class="removeChild<?php if(isset($val['neaktyvus']) && $val['neaktyvus'] == 1) echo " hidden"; ?>">remove</a>
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
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submit button" name="submit" value="Išsaugoti">
        </p>
        <?php if(isset($data['id_Pirkejas'])) { ?>
            <input type="hidden" name="id_Pirkejas" value="<?php echo $data['id_Pirkejas']; ?>" />
        <?php } ?>
    </form>
</div>
