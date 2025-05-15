<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Orders Management</h2>
        
        <div class="card">
            <div class="card-body">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="customer_id" class="form-label">Customer</label>
                        <select class="form-select" id="customer_id" name="customer_id" required>
                            <option value="">Select Customer</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="order_date" class="form-label">Order Date</label>
                        <input type="date" class="form-control" id="order_date" name="order_date" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="status" class="form-label">Order Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="total_amount" class="form-label">Total Amount</label>
                        <input type="number" class="form-control" id="total_amount" name="total_amount" step="0.01" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Create Order</button>
                </form>
            </div>
        </div>
        
        <div class="mt-4">
            <h3>Orders List</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Total Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>${{ number_format($order->total_amount, 2) }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
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
</body>
</html> 