@extends('app')
@section('title', '這是狗狗體型單一顯示')
@section('title_h1', '這是狗狗體型單一顯示')
@section('dog_content')
<p align="center"><a href="{{ route('somatotypes.index', 1) }}">返回狗狗體型首頁</a></p>
<table border="1" align="center">
    <tr>
        <td>查詢指定體型</td>
        <td>{!! Form::select('somatotypes_id', $somatotypes_id, null, ['id' => 'somatotypes_id']) !!}</td>
        <td><button id="search" name="search">查詢</button></td>
    </tr>
</table>
</body>
</br>

<table border="1" align="center">
    <tr>
        <th>欄位</th>
        <th>資料</th>
    </tr>
    <tr>
        <td>體型編號</td>
        <td id="somatotype_id"></td>
    </tr>
    <tr>
        <td>體型</td>
        <td id="somatotype"></td>
    </tr>
    <tr>
        <td>平均身高</td>
        <td id="avg_height"></td>
    </tr>
    <tr>
        <td>平均體重</td>
        <td id="avg_weight"></td>
    </tr>
</table>


<script type="text/JavaScript">
    document.getElementById("search").onclick = function () {
        // 發送 Ajax 查詢請求並處理
        var request = new XMLHttpRequest();
        request.open("GET", "{{ route('somatotypes.show') }}" + "?id=" + document.getElementById("somatotypes_id").value);
        request.send();
        request.onreadystatechange = function () {
            // 伺服器請求完成
            if (request.readyState === 4) {
                // 伺服器回應成功

                if (request.status === 200) {
                    var type = request.getResponseHeader("Content-Type");   // 取得回應類型

                    // 判斷回應類型，這裡使用 JSON
                    if (type.indexOf("application/json") === 0) {
                        var data = JSON.parse(request.responseText);

                        set(data.somatotype_id, data.somatotype, data.avg_height, data.avg_weight);

                    }
                } else {
                    document.getElementById("id").value = "未搜尋到此資料";
                    clear();
                }
            }
        }
    }

    function clear(){
        document.getElementById("somatotype_id").innerHTML = "";
        document.getElementById("somatotype").innerHTML = "";
        document.getElementById("avg_height").innerHTML = "";
        document.getElementById("avg_weight").innerHTML = "";
    }

    function set(somatotype_id, somatotype, avg_height, avg_weight){
        document.getElementById("somatotype_id").innerHTML = somatotype_id;
        document.getElementById("somatotype").innerHTML = somatotype;
        document.getElementById("avg_height").innerHTML = avg_height;
        document.getElementById("avg_weight").innerHTML = avg_weight;
    }

</script>
@endsection
