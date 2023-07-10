@extends('backend.layout.main')
@section('content')

<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Orders</h4>
<!-- Contextual Classes -->

<div class="card">
    {{-- <h5 class="card-header">Orders</h5> --}}
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Order #</th>
            <th>Order Date</th>
            <th>Customer Name</th>
            <th>Amount</th>
            {{-- <th>Products</th> --}}
            <th>Status</th>
            <th>Action</th>
            {{-- <th>Email</th>
            <th>Address</th>
            <th>Phone #</th> --}}
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($orders as $order)
            <tr>
                <td>{{ str_pad($order['order_number'], 8, '0', STR_PAD_LEFT) }}</td>
                <td>{{ \Carbon\Carbon::parse($order["created_at"])->format('Y-m-d') }}</td>
                <td>{{$order["customer_name"]}}</td>
                <td>Rs. {{ number_format($order['totalbill'] , 2, '.', ',') }}</td>
                <td>
                    @if ($order['status'] == 'Pending')
                    <span class="badge bg-label-info me-1">{{$order['status']}}</span>
                    @endif
                    @if ($order['status'] == 'pending')
                    <span class="badge bg-label-info me-1">{{$order['status']}}</span>
                    @endif
                    @if ($order['status'] == 'Completed')
                    <span class="badge bg-label-success me-1">{{$order['status']}}</span>
                    @endif
                    @if ($order['status'] == 'Processing')
                    <span class="badge bg-label-warning me-1">{{$order['status']}}</span>
                    @endif
                    @if ($order['status'] == 'Cancelled')
                    <span class="badge bg-label-danger me-1">{{$order['status']}}</span>
                    @endif
                </td>

                  <td><a href="{{url('/admin/edit-order/' . $order['id'])}}" class="btn rounded-pill btn-icon btn-primary">
                    <span class="tf-icons bx bx-edit-alt"></span></a>
                    <a href="{{url('/admin/view-order/' . $order['id'])}}" class="btn rounded-pill btn-icon btn-secondary">
                        <i class="fa fa-eye"></i></a>
                  </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Contextual Classes -->
    </div>
</body>

@endsection
