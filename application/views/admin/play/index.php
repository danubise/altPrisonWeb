<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 26.09.18
 * Time: 12:55
 */

?>

<form method="post"  enctype="multipart/form-data" action="<?=baseurl('play/start')?>">
    <input type="hidden" name="voicerecordid" value="<?=$voicerecord['id']?>">
<table>
    <tr>
        <td>Запуск обзвона для  <?=$voicerecord['description']?></td>
        <td><button class="btn btn-primary">Старт</button></td>
    </tr>
</table>
    <br>
<table class="table table-striped">
    <tr>
        <th>Номер</th><th>ФИО</th>
    </tr>
    <?php
    $i=1;
    if(is_array($phonenumbers)) {
        foreach ($phonenumbers as $key => $data) {
            echo "<tr><td><input type=\"checkbox\" name=\"phonenumbers[".$data['id']."]\" value=\"" . $data['phone'] . "\">".$data['phone']."</td>";
            echo "<td>" . $data['description'] . "</td></tr>";
        }
    }
    ?>
</table>

</form>