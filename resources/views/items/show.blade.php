@extends('layouts.app')

@section('title', 'Item Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Item Details</h2>
    </div>
    <div class="card-body">
        <form>
            <div class="mb-3">
                <label for="itemNo" class="form-label">Item No</label>
                <input type="text" class="form-control" id="itemNo" value="{{ $itemNo }}" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" value="{{ $name }}" readonly>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" value="{{ $price }}" readonly>
            </div>
        </form>
    </div>
</div>
@endsection 