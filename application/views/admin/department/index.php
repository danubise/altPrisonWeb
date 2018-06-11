<?
printarray($departments);
?>
<a href="<?=baseurl('department/add/')?>" class="btn btn-success">Создать учреждение</a>

<table class="table table-striped">
    <tr>
        <th>ID</th><th>Название</th><th>Emails</th><th>Операции</th>
    </tr>
<?php
    foreach($departments as $key=>$data){
        echo "<tr><td>".$data['groupid']."</td><td>".$data['name']."</td><td>".$data['emails']."</td><td>";

        echo "<a href=\"".baseurl('department/edit/'.$data['groupid'])."\">Изменить</a> / ";
        echo "<a href=\"".baseurl('department/delete/'.$data['groupid'])."\">Удалить</a></td></tr>";


    }
?>
</table>
