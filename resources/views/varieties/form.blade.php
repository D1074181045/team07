<table border="1" align="center">
    <tr>
        <th>欄位</th>
        <th>資料</th>
    </tr>
    <tr>
        <td>狗狗名稱</td>
        <td>{!! Form::text('name', null, ['onfocus' => 'this.select()']) !!}</td>
    </tr>
    <tr>
        <td>體型</td>
        <td>
            {!! Form::select('somatotype_id', $somatotypes) !!}
        </td>
    </tr>
    <tr>
        <td>原產地</td>
        <td>{!! Form::text('source', null, ['onfocus' => 'this.select()']) !!}</td>
    </tr>
    <tr>
        <td>平均壽命</td>
        <td>{!! Form::text('avg_life', null, ['onfocus' => 'this.select()']) !!}</td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            {!! Form::submit($submitButtonText) !!}
            {!! Form::reset('重新填寫') !!}
        </td>
    </tr>
</table>
