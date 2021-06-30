<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=<?php echo $module; ?>&action=list">Serijos</a></li>
    <li><?php if(!empty($id)) echo "Serijos redagavimas"; else echo "Nauja serija"; ?></li>
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
            <legend>Serijos informacija</legend>

            <p>
                <label class="field" for="Pavadinimas">Pavadinimas<?php echo in_array('Pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Pavadinimas" name="Pavadinimas" class="textbox textbox-150" value="<?php echo isset($data['Pavadinimas']) ? $data['Pavadinimas'] : ''; ?>">
                <?php if(key_exists('Pavadinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Pavadinimas']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="Versijos_kodas">Versijos kodas<?php echo in_array('Versijos_kodas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Versijos_kodas" name="Versijos_kodas" class="textbox textbox-150" value="<?php echo isset($data['Versijos_kodas']) ? $data['Versijos_kodas'] : ''; ?>" />
                <?php if(key_exists('Versijos_kodas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Versijos_kodas']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="Daliu_skaicius">Dalių skaičius<?php echo in_array('Daliu_skaicius', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Daliu_skaicius" name="Daliu_skaicius" class="textbox textbox-150" value="<?php echo isset($data['Daliu_skaicius']) ? $data['Daliu_skaicius'] : ''; ?>" />
                <?php if(key_exists('Daliu_skaicius', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Daliu_skaicius']} simb.)</span>"; ?>
            </p>
        </fieldset>
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submit button" name="submit" value="Išsaugoti">
        </p>

        <?php if(isset($data['id_Serija'])) { ?>
            <input type="hidden" name="id_Serija" value="<?php echo $data['id_Serija']; ?>" />
        <?php } ?>
    </form>
</div>

