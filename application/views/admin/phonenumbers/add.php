<form method="post" action="<?=baseurl('phonenumbers/adding/')?>">
    <table class="table  table-striped" style="width: 500px">
        <tr>
            <th>Номер:&nbsp;</th>
            <td><input name="number[phone]" class="form-control" value="<?=$formdata['number']['phone']?>"></td>
        </tr>
        <tr>
            <th>Получатели:&nbsp;</th>
            <td><input name="number[description]" value="<?=$formdata['number']['description']?>"></td>
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