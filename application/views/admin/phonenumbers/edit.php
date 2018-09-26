<?php

?>
<form method="post" action="<?=baseurl('phonenumbers/editing/')?>">
    <input name="phonenumber[id]" class="form-control" value="<?=$phonenumber['id']?>" type=hidden>
    <table class="table  table-striped" style="width: 500px">

        <tr>
            <th>Номер:&nbsp;</th>
            <td><input name="phonenumber[phone]" class="form-control" value="<?=$phonenumber['phone']?>"></td>
        </tr>
        <tr>
            <th>Название:&nbsp;</th>
            <td><input name="phonenumber[description]" class="form-control" value="<?=$phonenumber['description']?>"></td>
        </tr>

        <tr>
            <th>&nbsp;</th>
            <td><button class="btn btn-primary">Сохранить</button></td>
        </tr>
    </table>
</form>