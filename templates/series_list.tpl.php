<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Serijos</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Nauja serija</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Serija nebuvo pašalinta, nes yra jai priklausančių knygų.
    </div>
<?php } ?>

<table class="listTable">
    <tr>
        <th>ID</th>
        <th>Pavadinimas</th>
        <th>Versijos kodas</th>
        <th>Dalių skaičius</th>
        <th></th>
    </tr>
    <?php
    // suformuojame lentelę
    foreach($data as $key => $val) {
        echo
            "<tr>"
            . "<td>{$val['id_Serija']}</td>"
            . "<td>{$val['Pavadinimas']}</td>"
            . "<td>{$val['Versijos_kodas']}</td>"
            . "<td>{$val['Daliu_skaicius']}</td>"
            . "<td>"
            . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Serija']}\"); return false;' title=''>šalinti</a>&nbsp;"
            . "<a href='index.php?module={$module}&action=edit&id={$val['id_Serija']}' title=''>redaguoti</a>"
            . "</td>"
            . "</tr>";
    }
    ?>
</table>

<?php
// įtraukiame puslapių šabloną
include 'templates/paging.tpl.php';
?>
