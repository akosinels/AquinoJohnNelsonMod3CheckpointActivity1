<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Order Details Management</h2>
        
        <div class="card">
            <div class="card-body">
                <form action="{{ route('order-details.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="order_id" class="form-label">Order</label>
                        <select class="form-select" id="order_id" name="order_id" required>
                            <option value="">Select Order</option>
                            @foreach($orders as $order)
                                <option value="{{ $order->id }}">Order #{{ $order->id }} - {{ $order->customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="item_id" class="form-label">Item</label>
                        <select class="form-select" id="item_id" name="item_id" required>
                            <option value="">Select Item</option>
                            @foreach($items as $item)
                                <option value="{{ $item->id }}" data-price="{{ $item->price }}">
                                    {{ $item->name }} - ${{ number_format($item->price, 2) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="price" class="form-label">Unit Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="subtotal" class="form-label">Subtotal</label>
                        <input type="number" class="form-control" id="subtotal" name="subtotal" step="0.01" readonly>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Add Order Detail</button>
                </form>
            </div>
        </div>
        
        <div class="mt-4">
            <h3>Order Details List</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Order</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Subtotal</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderDetails as $detail)
                    <tr>
                        <td>{{ $detail->id }}</td>
                        <td>Order #{{ $detail->order->id }}</td>
                        <td>{{ $detail->item->name }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>${{ number_format($detail->price, 2) }}</td>
                        <td>${{ number_format($detail->subtotal, 2) }}</td>
                        <td>
                            <a href="{{ route('order-details.edit', $detail->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('order-details.destroy', $detail->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Calculate subtotal when quantity or price changes
        document.getElementById('quantity').addEventListener('input', calculateSubtotal);
        document.getElementById('price').addEventListener('input', calculateSubtotal);
        
        // Update price when item is selected
        document.getElementById('item_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            document.getElementById('price').value = price;
            calculateSubtotal();
        });
        
        function calculateSubtotal() {
            const quantity = document.getElementById('quantity').value;
            const price = document.getElementById('price').value;
            const subtotal = quantity * price;
            document.getElementById('subtotal').value = subtotal.toFixed(2);
        }
    </script>
</body>
</html> 