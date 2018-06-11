<form method="post" action="<?=baseurl('department/adding/')?>">
    <table class="table  table-striped" style="width: 500px">
        <tr>
            <th>Название:&nbsp;</th>
            <td><input name="department[name]" class="form-control"></td>
        </tr>
        <tr>
            <th>Получатели:&nbsp;</th>
            <td><input name="department[emails]" ></td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td><button class="btn btn-primary">Добавить</button></td>
        </tr>
    </table>
</form>