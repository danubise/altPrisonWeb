<form method="post" action="<?=baseurl('department/adding/')?>">
    <table class="table  table-striped" style="width: 500px">
        <tr>
            <th>Название:&nbsp;</th>
            <td><input name="department[name]" class="form-control" value="<?=$formdata['department']['name']?>"></td>
        </tr>
        <tr>
            <th>Получатели:&nbsp;</th>
            <td><input name="department[emails]" value="<?=$formdata['department']['emails']?>"></td>
        </tr>
        <tr>
            <th>Пинкод (5 цифр):&nbsp;</th>
            <td><input name="pincode" ></td>
        </tr>
        <tr>
            <th>Тип:&nbsp;</th>
            <td><select name="grouptype">
                    <?
                        if(isset($formdata['department']['grouptype'])){
                            if($formdata['department']['grouptype'] == 1) {
                                $one="selected";
                                $two="";
                            }else{
                                $one="";
                                $two="selected";
                            }
                        }else{
                            $one="";
                            $two="";
                        }
                    ?>
                  <option value="1" <?=$one?>>Управление</option>
                  <option value="2" <?=$two?>>Учреждение</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td><button class="btn btn-primary">Добавить</button></td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td>&nbsp;<?=$errorMessage?></td>
        </tr>
    </table>
</form>