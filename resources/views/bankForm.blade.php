@extends('welcome')

@section('form')

<div class="form">
    <h3>Cash transaction</h3>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('store-bank-transaction') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col">
                <label for="transfer_date">Transfer date</label >
                <input type="date" value="{{ old('transfer_date') }}" id="transfer_date" name="transfer_date" class="form-control" placeholder="Transfer date" required>
            </div>
            <div class="form-group col">
                <label for="customer_name">Customer name</label >
                <input type="text" value="{{ old('customer_name') }}" id="five_banknote" name="customer_name" class="form-control" placeholder="Customer name" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="ten_banknote">Account number</label >
                <input type="text" value="{{ old('account_number') }}" id="account_number" name="account_number" class="form-control" placeholder="Account number" required>
            </div>
            <div class="form-group col">
                <label for="amount">Amount</label>
                <input type="number" value="{{ old('amount') }}" id="amount" name="amount" class="form-control" placeholder="Amount" required min="0">
            </div>
        </div>
        
        <button type="submit" class="btn btn-success" style="margin-top:2rem">Save transaction</button>
    </form>
</div>

@endsection

