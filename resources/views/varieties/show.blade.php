@extends('app')
@section('title', '這是狗狗品種單一顯示')
@section('title_h1', '這是狗狗品種單一顯示')
@section('dog_content')
{{--<h1 align="center">這是狗狗品種單一顯示</h1>--}}
<p align="center"><a href="{{ route('varieties.index', 1) }}">返回狗狗品種首頁</a></p>

<table border="1" align="center">
    <tr>
        <td>查詢指定品種ID</td>
        <td>{!! Form::select('id', $varieties_id, null, ['id' => 'id']) !!}</td>
        <td><button id="search" name="search">查詢</button></td>
   </tr>
</table>
</br>

<table border="1" align="center">
    <tr>
        <th>欄位</th>
        <th>資料</th>
    </tr>
    <tr>
        <td>狗狗ID</td>
        <td id="_id"></td>
    </tr>
    <tr>
        <td>狗狗名稱</td>
        <td id="name"></td>
    </tr>
    <tr>
        <td>體型</td>
        <td id="somatotype"></td>
    </tr>
    <tr>
        <td>原產地</td>
        <td id="source"></td>
    </tr>
    <tr>
        <td>平均壽命</td>
        <td id="avg_life"></td>
    </tr>
    <tr>
        <td>發現日期</td>
        <td id="find_date"></td>
    </tr>
    <tr>
        <td>登陸日期</td>
        <td id="land_date"></td>
    </tr>
</table>

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--}}
{{--<script type="text/JavaScript">--}}
{{--    $(document).ready(function() {--}}
{{--        $("#search").click(function() {--}}
{{--            $.ajax({--}}
{{--                type: "GET",--}}
{{--                url: "{{ route('varieties.show') }}" + "?id=" + $("#id").val(),--}}
{{--                dataType: "json",--}}
{{--                success: function(data) {--}}
{{--                    $("#dog_id").html(data.id);--}}
{{--                    $("#dog_name").html(data.name);--}}
{{--                    $("#dog_somatotype").html(data.somatotype);--}}
{{--                    $("#dog_source").html(data.source);--}}
{{--                    $("#dog_life").html(data.avg_life);--}}
{{--                },--}}
{{--                error: function(jqXHR) {--}}
{{--                    alert("發生錯誤: " + jqXHR.status);--}}
{{--                }--}}
{{--            })--}}
{{--        })--}}
{{--    });--}}
{{--</script>--}}


<script type="text/JavaScript">
    document.getElementById("search").onclick = function () {

        // 發送 Ajax 查詢請求並處理

        var request = new XMLHttpRequest();
        request.open("GET", "{{ route('varieties.show') }}" + "?id=" + document.getElementById("id").value);
        request.send();
        request.onreadystatechange = function () {
            // 伺服器請求完成
            if (request.readyState === request.DONE) {
                // 伺服器回應成功

                if (request.status === 200) {
                    var type = request.getResponseHeader("Content-Type");   // 取得回應類型

                    // 判斷回應類型，這裡使用 JSON
                    if (type.indexOf("application/json") === 0) {
                        var data = JSON.parse(request.responseText);

                        set(data);
                    }
                } else {
                    document.getElementById("id").value = "未搜尋到此資料";
                    clear();
                }
            }
        }
    }

    function clear() {
        document.getElementById("_id").innerHTML = "";
        document.getElementById("name").innerHTML = "";
        document.getElementById("somatotype").innerHTML = "";
        document.getElementById("source").innerHTML = "";
        document.getElementById("avg_life").innerHTML = "";
        document.getElementById("find_date").innerHTML = "";
        document.getElementById("land_date").innerHTML = "";
    }

    function set(data) {
        document.getElementById("_id").innerHTML = data.id;
        document.getElementById("name").innerHTML = data.name;
        document.getElementById("somatotype").innerHTML = data.somatotype;
        document.getElementById("source").innerHTML = data.source;
        document.getElementById("avg_life").innerHTML = data.avg_life;
        document.getElementById("find_date").innerHTML = data.find_date;
        document.getElementById("land_date").innerHTML = data.land_date;
    }
    //
    // function set(id, name, somatotype, source, avg_life, find_date, land_date) {
    //     document.getElementById("_id").innerHTML = id;
    //     document.getElementById("name").innerHTML = name;
    //     document.getElementById("somatotype").innerHTML = somatotype;
    //     document.getElementById("source").innerHTML = source;
    //     document.getElementById("avg_life").innerHTML = avg_life;
    //     document.getElementById("find_date").innerHTML = find_date;
    //     document.getElementById("land_date").innerHTML = land_date;
    // }

</script>

@endsection
