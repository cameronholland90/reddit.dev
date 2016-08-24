<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
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
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
            <div class="row">
               <form method="POST" action="/test-route">
                    {{ csrf_field() }}

                    Name: <input type="text" name="name" value="{{ old('name') }}">
                    E-mail: <input type="text" name="email" value="{{ old('email') }}">
                    Website: <input type="text" name="website" value="{{ old('website') }}">
                    Comment: <textarea name="comment" rows="5" cols="40">{{ old('comment') }}</textarea>
                    <input type="submit">
                </form>
            </div>
        </div>
    </body>
</html>
