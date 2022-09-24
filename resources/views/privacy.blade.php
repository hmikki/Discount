<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{(app()->getLocale() == 'ar')?\App\Models\Setting::where('key','privacy')->first()->name_ar: \App\Models\Setting::where('key','privacy')->first()->name}}</title>
    <link rel="icon" type="image/png" href="{{asset((app()->getLocale()=='ar')?'logo.png':'logo_en.png')}}" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            margin: 0;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 30px;
            margin-top: 35px;
            padding: 25px;
            text-align: justify;
        }

    </style>
</head>
<body>
<div class=" position-ref full-height">

    <div class="content">
        <div class="" style="text-align: center !important;">
            <h1>{{\App\Models\Setting::where('key','privacy')->first()->name_ar}}</h1>
        </div>
        <div style="padding: 24px; text-align: center !important;">
            {!! \App\Models\Setting::where('key','privacy')->first()->value_ar !!}
        </div>
    </div>
</div>
</body>
</html>
