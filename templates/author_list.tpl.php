<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Autoriai</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas autorius</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Autorius nebuvo pašalintas.
    </div>
<?php } ?>

<table class="listTable">
    <tr>
        <th>ID</th>
        <th>Vardas</th>
        <th>Pavardė</th>
        <th>Gimimo data</th>
        <th>Kilmės šalis</th>
        <th></th>
    </tr>
    <?php
    // suformuojame lentelę
    foreach($data as $key => $val) {
        echo
            "<tr>"
            . "<td>{$val['id_Autorius']}</td>"
            . "<td>{$val['Vardas']}</td>"
            . "<td>{$val['Pavarde']}</td>"
            . "<td>{$val['Gimimo_data']}</td>"
            . "<td>{$val['Issilavinimas']}</td>"

            . "<td>"
            . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Autorius']}\"); return false;' title=''>šalinti</a>&nbsp;"
            . "<a href='index.php?module={$module}&action=edit&id={$val['id_Autorius']}' title=''>redaguoti</a>"
            . "</td>"
            . "</tr>";
    }
    ?>
</table>

<?php
// įtraukiame puslapių šabloną
include 'templates/paging.tpl.php';
?>
