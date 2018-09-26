<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 24.09.18
 * Time: 21:33
 */
//printarray($departments);
?>

<table class="table table-striped">
    <tr>
        <th>ID</th><th>Название</th><th>Операции</th>
    </tr>
    <?php
    $i=1;
    if(is_array($voicerecords)){
    foreach($voicerecords as $key=>$data) {
        echo "<tr><td>" . ($i++) . "</td>";
        echo "<td>" . $data['description'] . "</td><td>";
        echo "<a href=\"" . baseurl('voicerecords/play/' . $data['id']) . "\">Проиграть</a> / ";
        echo "<a href=\"" . baseurl('voicerecords/edit/' . $data['id']) . "\">Изменить</a> / ";
        echo "<a href=\"" . baseurl('voicerecords/delete/' . $data['id']) . "\">Удалить</a></td></tr>";
    }

    }
    ?>
</table>
