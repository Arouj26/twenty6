
@extends('backend.layout.main')
@section('content')
<body>
<div class="container-xxl flex-grow-1 container-p-y" >
        <h4 class="fw-bold py-3 mb-4">Order # <span class="text-primary">@foreach($orders as $order)
            {{ str_pad($order['order_number'], 8, '0', STR_PAD_LEFT) }}
        @endforeach</span></h4>
<!-- Contextual Classes -->
<div class="row">
    <div class="card ">

        {{-- <h5 class="card-header">Orders</span></h5> --}}
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th><h5 style="margin-top: 10px; margin-bottom:0px; font-weight: bold;"><span class="text-primary"><span class="text-primary">Order Summary</span></span></h5></th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($orders as $order)
                <tr>
                    <td><b>Order Created</b> </td><td style="text-align: right">{{ \Carbon\Carbon::parse($order["created_at"])->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <td><b>Status</b> </td><td style="text-align: right">@if ($order['status'] == 'Pending')
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
                    @endif</td>
                </tr>
                <tr>
                        <td><b>Total Amount</b> </td><td style="text-align: right">Rs. {{ number_format($order['totalbill'] , 2, '.', ',') }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
<div class="card " style="margin-top:10px">

    {{-- <h5 class="card-header">Orders</span></h5> --}}
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th><h5 style="margin-top: 10px; margin-bottom:0px; font-weight: bold;"><span class="text-primary">Products Summary</span></h5></th>
            <th><h5 style="margin-top: 10px; margin-bottom:0px; font-weight: bold;"><span class="text-primary">Color</span></h5></th>
            <th><h5 style="margin-top: 10px; margin-bottom:0px; font-weight: bold;"><span class="text-primary">Size</span></h5></th>
            <th><h5 style="margin-top: 10px; margin-bottom:0px; font-weight: bold;"><span class="text-primary">Qty</span></h5></th>
            <th><h5 style="margin-top: 10px; margin-bottom:0px; font-weight: bold;"><span class="text-primary">Price</span></h5></th>
            <th><h5 style="margin-top: 10px; margin-bottom:0px; font-weight: bold;"><span class="text-primary">Total Amount</span></h5></th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($orderitems as $orderitem)
            <tr>
            <td>{{$orderitem['product_code'] }} - {{ $orderitem['product_title'] }} </td>
            <td>x {{$orderitem['product_quantity'] }}</td>
            <td>x {{$orderitem['product_color'] }}</td>
            <td>x {{$orderitem['product_size'] }}</td>
            <td>Rs. {{ number_format($orderitem['product_price'] , 2, '.', ',') }}</td>
            <td>Rs. {{ number_format($orderitem['product_price'] * $orderitem['product_quantity'] , 2, '.', ',') }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>

<div class="card" style="margin-top:10px">
{{-- <h5 class="card-header">Orders</span></h5> --}}
<div class="table-responsive text-nowrap">
  <table class="table">
    <tr>
        <th><h5 style="margin-top: 10px; margin-bottom:0px; font-weight: bold;"><span class="text-primary">Customer Details</span></h5></th>
      </tr>
    <tbody class="table-border-bottom-0">
        @foreach($customers as $customer)
        <tr>
        <td><b>Name</b> </td>
        <td style="text-align: right"> {{$customer['first_name'] }} {{$customer['last_name'] }}</td>
        </tr>
        <tr>
            <td><b>Contact Number</b> </td>
            <td style="text-align: right"> {{$customer['phone'] }} </td>
        </tr>
        <tr>
            <td><b>Email</b> </td>
            <td style="text-align: right"> {{$customer['email'] }} </td>
        </tr>
        <tr>
            <td><b>Notes</b> </td>
            <td style="text-align: right"> {{$customer['notes'] }} </td>
        </tr>
        <tr>
            <td><b>Country</b> </td>
            <td style="text-align: right"> {{$customer['country'] }}</td>
            </tr>
            <tr>
                <td><b>Address</b> </td>
                <td style="text-align: right"> {{$customer['address'] }} </td>
            </tr>
            <tr>
                <td><b>City</b> </td>
                <td style="text-align: right"> {{$customer['city'] }} </td>
            </tr>
            <tr>
                <td><b>Zip Code</b> </td>
                <td style="text-align: right"> {{$customer['zip'] }} </td>
            </tr>
        @endforeach
    </tbody>
  </table>

</div>
</div>

<!--/ Contextual Classes -->
</div>
<div class="mt-2">
    <form action="{{ url('/admin/orders') }}" >
    <button type="submit" class="btn btn-primary me-2">Go Back</button></form>
  </div>
{{-- </div> --}}
</div>

</div>
</body>
@endsection
