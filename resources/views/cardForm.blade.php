@extends('welcome')

@section('form')

<div class="form">
    <h3>Card transaction</h3>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('store-card-transaction') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col">
                <label for="card_number">Card number</label >
                <input type="number" value="{{ old('card_number') }}" id="card_number" name="card_number" class="form-control" placeholder="Card number" required>
            </div>
            <div class="form-group col">
                <label for="expiration_date">Expiration date</label >
                <input type="text" value="{{ old('expiration_date') }}" id="expiration_date" name="expiration_date" class="form-control" placeholder="MM/YYYY" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="card_holder">Card holder</label >
                <input type="text" value="{{ old('card_holder') }}" id="card_holder" name="card_holder" class="form-control" placeholder="Card holder" required>
            </div>
            <div class="form-group col">
                <label for="cvv">CVV</label>
                <input type="number" value="{{ old('cvv') }}" id="cvv" name="cvv" class="form-control" placeholder="CVV" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="amount">Amount</label >
                <input type="number" value="{{ old('amount') }}" id="amount" name="amount" class="form-control" placeholder="Amount" required min="0">
            </div>
        </div>
        <button type="submit" class="btn btn-success" style="margin-top:2rem">Save transaction</button>
    </form>
</div>

@endsection

