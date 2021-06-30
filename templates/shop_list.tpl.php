<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Parduotuvės</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Nauja parduotuvė</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Parduotuvė nebuvo pašalinta, nes joje yra darbuotojų.
    </div>
<?php } ?>

<table class="listTable">
    <tr>
        <th>ID</th>
        <th>Pavadinimas</th>
        <th>Tinklapis</th>
        <th>Adresas</th>
        <th>Darbo laikas</th>
        <th></th>
    </tr>
    <?php
    // suformuojame lentelę
    foreach($data as $key => $val) {
        echo
            "<tr>"
            . "<td>{$val['id_Parduotuve']}</td>"
            . "<td>{$val['Pavadinimas']}</td>"
            . "<td>{$val['Tinklapis']}</td>"
            . "<td>{$val['Adresas']}</td>"
            . "<td>{$val['Darbo_laikas']}</td>"
            . "<td>"
            . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Parduotuve']}\"); return false;' title=''>šalinti</a>&nbsp;"
            . "<a href='index.php?module={$module}&action=edit&id={$val['id_Parduotuve']}' title=''>redaguoti</a>"
            . "</td>"
            . "</tr>";
    }
    ?>
</table>

<?php
// įtraukiame puslapių šabloną
include 'templates/paging.tpl.php';
?>