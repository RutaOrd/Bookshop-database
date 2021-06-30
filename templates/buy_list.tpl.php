<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Pirkimai</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas pirkimas</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Pirkimas nebuvo pašalintas, nes jis įtrauktas į sąskaitą.
    </div>
<?php } ?>

<table class="listTable">
    <tr>
        <th>ID</th>
        <th>Pristatymas</th>
        <th>Grąžinimas</th>
        <th>Kiekis</th>
        <th>Pirkėjas</th>
        <th>Parduotuvė</th>
        <th></th>
    </tr>
    <?php
    // suformuojame lentelę
    foreach($data as $key => $val) {
        echo
            "<tr>"
            . "<td>{$val['id_Pirkimas']}</td>"
            . "<td>{$val['Pristatymas']}</td>"
            . "<td>{$val['Grazinimas']}</td>"
            . "<td>{$val['Kiekis']}</td>"
            . "<td>{$val['pirkejas_vardas']} {$val['pirkejas_pavarde']}</td>"
            . "<td>{$val['parduotuve_pavadinimas']}</td>"
            . "<td>"
            . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Pirkimas']}\"); return false;' title=''>šalinti</a>&nbsp;"
            . "<a href='index.php?module={$module}&action=edit&id={$val['id_Pirkimas']}' title=''>redaguoti</a>"
            . "</td>"
            . "</tr>";


    }
    ?>
</table>

<?php
// įtraukiame puslapių šabloną
include 'templates/paging.tpl.php';
?>