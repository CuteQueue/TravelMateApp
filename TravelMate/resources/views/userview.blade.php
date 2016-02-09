<!DOCTYPE html>
<html>
    <head>
        <title>User</title>

        

        <style>
            html, body {
                height: 100%;2
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
                font-size: 45px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">User:</div>
				@foreach($users as $user)
				<p>{{ $user->name }} 
				 hat die ID: {{$user->id}} </p> 
				@endforeach
            </div>
        </div>
    </body>
</html>
