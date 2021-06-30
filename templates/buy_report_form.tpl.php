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
            <legend>Įveskite ataskaitos kriterijus</legend>
            <p><label class="field" for="dataNuo">Kiekis pirkimuose nuo: </label><input type="text" id="dataNuo" name="dataNuo" class="textbox textbox-100" value="<?php echo isset($fields['dataNuo']) ? $fields['dataNuo'] : ''; ?>" /></p>
            <p><label class="field" for="dataIki">Kiekis pirkimuose iki: </label><input type="text" id="dataIki" name="dataIki" class="textbox textbox-100" value="<?php echo isset($fields['dataIki']) ? $fields['dataIki'] : ''; ?>" /></p>
        </fieldset>
        <p><input type="submit" class="submit button float-right" name="submit" value="Sudaryti ataskaitą"></p>
    </form>
</div>
