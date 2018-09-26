<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 24.09.18
 * Time: 21:33
 */
//printarray($departments);
?>
<a href="<?=baseurl('phonenumbers/add/')?>" class="btn btn-success">Добавить номер</a>
<table class="table table-striped">
    <tr>
        <th>ID</th><th>Номер</th><th>ФИО</th><th>Действия</th>
    </tr>
    <?php
    $i=1;
    if(is_array($phonenumbers)) {
        foreach ($phonenumbers as $key => $data) {
            echo "<tr><td>" . ($i++) . "</td>";
            echo "<td>" . $data['phone'] . "</td>";
            echo "<td>" . $data['description'] . "</td><td>";
            echo "<a href=\"" . baseurl('phonenumbers/edit/' . $data['id']) . "\">Изменить</a> / ";
            echo "<a href=\"" . baseurl('phonenumbers/delete/' . $data['id']) . "\">Удалить</a></td></tr>";
        }
    }
    ?>
</table>
