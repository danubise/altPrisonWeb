<form method="post" action="<?=baseurl('department/editing/')?>">
<input name="department[groupid]" class="form-control" value="<?=$department['groupid']?>" type=hidden>
    <table class="table  table-striped" style="width: 500px">
        <tr>
            <th>ID:&nbsp;</th>
            <td><input name="groupid" class="form-control" value="<?=$department['groupid']?>" disabled></td>
        </tr>
        <tr>
            <th>Название:&nbsp;</th>
            <td><input name="department[name]" class="form-control" value="<?=$department['name']?>"></td>
        </tr>
        <tr>
            <th>Получатели:&nbsp;</th>
            <td><input name="department[emails]" value="<?=$department['emails']?>"></td>
        </tr>
        <tr>
            <th>Пинкоде:&nbsp;</th>
            <td><input name="department[pincode]" value="<?=$pincode['pincode']?>"></td>
        </tr>
        <tr>
            <th>Тип:&nbsp;</th>
            <td>
                <select name="grouptype">
                    <?
                        if($pincode['grouptype'] == 1) {
                            $one="selected";
                            $two="";
                        }else{
                            $one="";
                            $two="selected";
                        }
                    ?>
                  <option value="1" <?=$one?>>Управление</option>
                  <option value="2" <?=$two?>>Учреждение</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td><button class="btn btn-primary">Сохранить</button></td>
        </tr>
    </table>
</form>