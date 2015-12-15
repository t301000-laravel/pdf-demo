<!doctype html>
<html lang="zh-hant">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <style>
        @import url(http://fonts.googleapis.com/earlyaccess/notosanstc.css);

        .page-break {
            page-break-after: always;
        }
        .my-container {
            width: 15cm;
            background: #80fff8;
        }
        .my-title-block {
            margin-top: 3cm;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 1cm;
            background: #2ca02c;
        }
        .my-body-block {
            margin-top: 3cm;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 1cm;
            background: #8c8c8c;
            height: 15cm;
            position: relative;
        }
        .head-img {
            width: 5cm;
            height: 5cm;
            float: right;
        }
        .my-name {
            width: 5cm;
            display: inline-block;
        }
        .head-img img {
            width: 5cm;
            height: auto;
        }
        .my-footer-block {
            margin-top: 2cm;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 0.5cm;
            background: #985f0d;
        }
    </style>
</head>
<body style="background: #ff96a7">

    <a class="btn btn-primary pull-right hidden-print" href="{{ url('export') }}">匯出 PDF</a>

    @foreach($users as $user)
        <div class="center-block my-container page-break">
            <div class="text-center my-title-block">
                新北市育林國中獎狀
            </div>

            <div class="my-body-block">
                學生<span class="my-name text-center">{{ $user['name'] }}</span>的觸控螢幕技術後，
                連接埠也可能因應趨勢導入USB Type-C設計。
                <div class="head-img pull-right">
                    <img src="{{ asset('img/head1.jpg') }}"  class="img-circle">
                </div>
            </div>

            <div class="text-center my-footer-block">
                中華民國 104 年 12 月 16 日
            </div>
        </div>
    @endforeach

</body>
</html>