<?php

?>
<form method="post" action="<?=baseurl('voicerecords/editing/')?>">
    <input name="voicerecord[id]" class="form-control" value="<?=$voicerecord['id']?>" type=hidden>
    <table class="table  table-striped" style="width: 500px">

        <tr>
            <th>Название:&nbsp;</th>
            <td><input name="voicerecord[description]" class="form-control" value="<?=$voicerecord['description']?>"></td>
        </tr>

        <tr>
            <th>&nbsp;</th>
            <td><button class="btn btn-primary">Сохранить</button></td>
        </tr>
    </table>
</form>