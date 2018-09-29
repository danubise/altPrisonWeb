<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 27.09.18
 * Time: 19:16
 */
?>
<table class="table table-striped" >
    <tr><th>
             Дата
        </th>
        <th>
            Сообщение
        </th>
        <th>
             Нет ответа
        </th>
        <th>
            Ответ
        </th>
        <th>
            Прослушано
        </th>

    </tr>
    <?php
    if(is_array($schedules)){
        foreach ($schedules as $key=>$data){

            echo "<tr><td>".$data['datetime']."</td>
                <td><a href=\"" . baseurl('detailreport/index/' . $data['scheduleid']) ."\" >".$data['description']."</a></td>
                <td>".$data['noanswered']."</td>
                <td>".$data['answered']."</td>
                <td>".$data['listened']."</td></tr>";
        }
    }
    ?>
</table>
