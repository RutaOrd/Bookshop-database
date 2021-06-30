<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=<?php echo $module; ?>&action=list">Parduotuvės</a></li>
    <li><?php if(!empty($id)) echo "Parduotuvės redagavimas"; else echo "Nauja parduotuvė"; ?></li>
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
            <legend>Parduotuvės informacija</legend>
            <p>
                <label class="field" for="id_Parduotuve">ID<?php echo in_array('id_Parduotuve', $required) ? '<span> *</span>' : ''; ?></label>
                <?php if(!isset($data['editing'])) { ?>
                    <input type="text" id="id_Parduotuve" name="id_Parduotuve" class="textbox textbox-150" value="<?php echo isset($data['id_Parduotuve']) ? $data['id_Parduotuve'] : ''; ?>" />
                    <?php if(key_exists('id_Parduotuve', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['id_Parduotuve']} simb.)</span>"; ?>
                <?php } else { ?>
                    <span class="input-value"><?php echo $data['id_Parduotuve']; ?></span>
                    <input type="hidden" name="editing" value="1" />
                    <input type="hidden" name="id_Parduotuve" value="<?php echo $data['id_Parduotuve']; ?>" />
                <?php } ?>
            </p>
            <p>

            <p>
                <label class="field" for="Pavadinimas">Pavadinimas<?php echo in_array('Pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Pavadinimas" name="Pavadinimas" class="textbox textbox-150" value="<?php echo isset($data['Pavadinimas']) ? $data['Pavadinimas'] : ''; ?>" />
                <?php if(key_exists('Pavadinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Pavadinimas']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="Adresas">Adresas<?php echo in_array('Adresas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Adresas" name="Adresas" class="textbox textbox-150" value="<?php echo isset($data['Adresas']) ? $data['Adresas'] : ''; ?>" />
                <?php if(key_exists('adresas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Adresas']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="Darbo_laikas">Darbo laikas<?php echo in_array('Darbo_laikas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Darbo_laikas" name="Darbo_laikas" class="textbox textbox-150" value="<?php echo isset($data['Darbo_laikas']) ? $data['Darbo_laikas'] : ''; ?>" />
                <?php if(key_exists('Darbo_laikas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Darbo_laikas']} simb.)</span>"; ?>
            </p>
        </fieldset>
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submit button" name="submit" value="Išsaugoti">
        </p>
    </form>
</div>
