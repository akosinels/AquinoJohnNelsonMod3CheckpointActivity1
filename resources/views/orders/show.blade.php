@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Order Details</h2>
    </div>
    <div class="card-body">
        <form>
            <div class="mb-3">
                <label for="customerId" class="form-label">Customer ID</label>
                <input type="text" class="form-control" id="customerId" value="{{ $customerId }}" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" value="{{ $name }}" readonly>
            </div>
            <div class="mb-3">
                <label for="orderNo" class="form-label">Order No</label>
                <input type="text" class="form-control" id="orderNo" value="{{ $orderNo }}" readonly>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="text" class="form-control" id="date" value="{{ $date }}" readonly>
            </div>
        </form>
    </div>
</div>
@endsection 