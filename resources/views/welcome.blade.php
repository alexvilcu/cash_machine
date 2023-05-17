<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="/css/custom.css">
        <link 
            rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
            crossorigin="anonymous"
        >
        <!-- Styles -->
        <style>
            html{font-family:Figtree, sans-serif;}
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="cash-machine" style="display:flex; flex-direction:column">
                <h2>Cash Machine</h2>
            </div>
            <div class="row" style="margin-top:3rem">
                <div class="col-2">
                    <a href="{{ route('cash-transaction') }}">
                        <button class="btn btn-info" type="button">Cash transaction</button>
                    </a>
                </div>
                <div class="col-2">
                    <a href="{{ route('card-transaction') }}">
                        <button class="btn btn-info" type="button">Card transaction</button>
                    </a>
                </div>
                <div class="col-2">
                    <a href="{{ route('bank-transaction') }}">
                        <button class="btn btn-info" type="button">Bank transaction</button>
                    </a>
                </div>
                
                
            </div>
                
            <div style="margin-top:3rem">
                @yield('form')
            </div>
                
        </div>
    </body>
</html>
