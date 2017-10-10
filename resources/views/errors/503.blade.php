<!DOCTYPE html>
<html>
    <head>
        <title>Voltaremos em breve.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Site em Manutenção.</div>
                {{-- {{ $exception->getMessage() }} --}}
                <div class="alert alert-danger">
                {{ json_decode(file_get_contents(storage_path('framework/down')), true)['message'] }}
                {{ json_decode(file_get_contents(storage_path('framework/down')), true)['retry'] }}
                {{ json_decode(file_get_contents(storage_path('framework/down')), true)['time'] }}

                </div>
            
            </div>
        </div>
    </body>
</html>
