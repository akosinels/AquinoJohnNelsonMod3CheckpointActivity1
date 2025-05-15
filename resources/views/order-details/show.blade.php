@extends('layouts.app')

@section('title', 'Order Detail Information')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Order Detail Information</h2>
    </div>
    <div class="card-body">
        <form>
            <div class="mb-3">
                <label for="transNo" class="form-label">Transaction No</label>
                <input type="text" class="form-control" id="transNo" value="{{ $transNo }}" readonly>
            </div>
            <div class="mb-3">
                <label for="orderNo" class="form-label">Order No</label>
                <input type="text" class="form-control" id="orderNo" value="{{ $orderNo }}" readonly>
            </div>
            <div class="mb-3">
                <label for="itemId" class="form-label">Item ID</label>
                <input type="text" class="form-control" id="itemId" value="{{ $itemId }}" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" value="{{ $name }}" readonly>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" value="{{ $price }}" readonly>
            </div>
            <div class="mb-3">
                <label for="qty" class="form-label">Quantity</label>
                <input type="text" class="form-control" id="qty" value="{{ $qty }}" readonly>
            </div>
        </form>
    </div>
</div>
@endsection 