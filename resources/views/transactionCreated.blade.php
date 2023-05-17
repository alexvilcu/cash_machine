<html>
    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous"
    >
</html>
<div class="container">
    <div class="row">
        <h2>New transaction added!</h2>
    </div>
    <div class="row">
        <h4>Transaction amount: {{ $transaction['amount'] }}</h4>
    </div>
    <div class="row">
        <h4>Inputs:</h4>
        
    </div>
    <div class="row">
        <ul>
            @foreach($transaction['inputs'] as $key => $value)
                <li>{{ $key }}: {{ $value }}</li>
            @endforeach
        </ul>
    </div>
    <a href="{{ route('home') }}">
        <button class="btn btn-info">Home</button>
    </a>
</div>


