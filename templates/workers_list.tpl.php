<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Pardtuouvės darbuotojai</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas darbuotojas</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Darbuotojas nebuvo pašalintas, nes yra pirkėjų, kuriuos jis aptarnauja.
    </div>
<?php } ?>

<table class="listTable">
    <tr>
        <th>ID</th>
        <th>Vardas</th>
        <th>Pavardė</th>
        <th>Pareigos</th>
        <th>Parduotuvė</th>
        <th></th>
    </tr>
    <?php
    // suformuojame lentelę
    foreach($data as $key => $val) {
        echo
            "<tr>"
            . "<td>{$val['id_Darbuotojas']}</td>"
            . "<td>{$val['Vardas']}</td>"
            . "<td>{$val['Pavarde']}</td>"
            . "<td>{$val['Pareigos']}</td>"
            . "<td>{$val['fk_Parduotuveid_Parduotuve']}</td>"
            . "<td>"
            . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Darbuotojas']}\"); return false;' title=''>šalinti</a>&nbsp;"
            . "<a href='index.php?module={$module}&action=edit&id={$val['id_Darbuotojas']}' title=''>redaguoti</a>"
            . "</td>"
            . "</tr>";
    }
    ?>
</table>

<?php
// įtraukiame puslapių šabloną
include 'templates/paging.tpl.php';
?>
