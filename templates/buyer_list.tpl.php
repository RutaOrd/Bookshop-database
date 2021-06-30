<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Pirkėjai</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas pirkėjas</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Pirkėjas nebuvo pašalintas, nes yra pirkimų, kuriuos jis atliko.
    </div>
<?php } ?>

<table class="listTable">
    <tr>
        <th>ID</th>
        <th>Vardas</th>
        <th>Pavardė</th>
        <th>Adresas</th>
        <th>Banko sąskaita</th>
        <th>Darbuotojas</th>
        <th></th>
    </tr>
    <?php
    // suformuojame lentelę
    foreach($data as $key => $val) {
        echo
            "<tr>"
            . "<td>{$val['id_Pirkejas']}</td>"
            . "<td>{$val['Vardas']}</td>"
            . "<td>{$val['Pavarde']}</td>"
            . "<td>{$val['Adresas']}</td>"
            . "<td>{$val['Banko_saskaita']}</td>"
            . "<td>{$val['darbuotojo_vardas']} {$val['darbuotojo_pavarde']}</td>"
            . "<td>"
            . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Pirkejas']}\"); return false;' title=''>šalinti</a>&nbsp;"
            . "<a href='index.php?module={$module}&action=edit&id={$val['id_Pirkejas']}' title=''>redaguoti</a>"
            . "</td>"
            . "</tr>";


    }
    ?>
</table>

<?php
// įtraukiame puslapių šabloną
include 'templates/paging.tpl.php';
?>
