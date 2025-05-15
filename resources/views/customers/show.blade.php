@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Customer Details</h2>
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
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" value="{{ $address }}" readonly>
            </div>
        </form>
    </div>
</div>
@endsection 