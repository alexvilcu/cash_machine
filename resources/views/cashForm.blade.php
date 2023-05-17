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
    <form action="{{ route('store-cash-transaction') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col">
                <label for="one_banknote">1 Banknote Qty</label >
                <input type="number" value="{{ old('one_banknote') }}" id="one_banknote" name="one_banknote" class="form-control" placeholder="Enter the quantity for 1 banknote" required min="0">
            </div>
            <div class="form-group col">
                <label for="five_banknote">5 Banknote Qty</label >
                <input type="number" value="{{ old('five_banknote') }}" id="five_banknote" name="five_banknote" class="form-control" placeholder="Enter the quantity for 5 banknote" required min="0">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="ten_banknote">10 Banknote Qty</label >
                <input type="number" value="{{ old('ten_banknote') }}" id="ten_banknote" name="ten_banknote" class="form-control" placeholder="Enter the quantity for 10 banknote" required min="0">
            </div>
            <div class="form-group col">
                <label for="fifty_banknote">50 Banknote Qty</label >
                <input type="number" value="{{ old('fifty_banknote') }}" id="fifty_banknote" name="fifty_banknote" class="form-control" placeholder="Enter the quantity for 50 banknote" required min="0">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="one_hundred_banknote">100 Banknote Qty</label >
                <input type="number" value="{{ old('one_hundred_banknote') }}" id="one_hundred_banknote" name="one_hundred_banknote" class="form-control" placeholder="Enter the quantity for 100 banknote" required min="0">
            </div>
        </div>
        <button type="submit" class="btn btn-success" style="margin-top:2rem">Save transaction</button>
    </form>
</div>

@endsection

