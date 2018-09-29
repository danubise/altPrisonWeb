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
    echo "<tr><td>".$schedule['datetime']."</td>
        <td>".$schedule['description']."</a></td>
        <td>".$schedule['noanswered']."</td>
        <td>".$schedule['answered']."</td>
        <td>".$schedule['listened']."</td></tr>";
    ?>
</table>
<br>
<table class="table table-striped" >
    <tr><th>
            Номер
        </th>
        <th>
            Статус
        </th>
    </tr>
    <?php
    if(is_array($allNumbersByScheduleId)){
        foreach ($allNumbersByScheduleId as $key=>$data){

            echo "<tr><td>".$data['phonenumber']."</td>";
            $status = "Нет ответа";
            if($data['status'] == 1){
                $status = "Ответ";
            }
            if($data['status'] == 2){
                $status = "Прослушал";
            }
            echo "<td>".$status."</td></tr>";
        }
    }
    ?>
</table>
