@extends('backend.layout.main')
@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>
<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Order Statistics -->
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
              <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                  <div class="card-title mb-0">
                    <h5 class="m-0 me-2"><span class="text-primary">Orders Status</span></h5>
                    <hr>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column">
                        @php
                            $totalorders = 0;
                        @endphp
                        @foreach ($orders as $order)
                            @if (Carbon::parse($order['created_at'])->month === Carbon::now()->month)
                            @php
                                $totalorders += 1;
                            @endphp
                            @endif
                        @endforeach
                      <h2 class="mb-2">{{$totalorders}}</h2>
                      <span>Total Orders this Month</span>
                    </div>
                    <div id="orderStatisticsChart"></div>
                  </div>
                  <ul class="p-0 m-0">
                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-warning"
                          ><i class='bx bxs-time-five'></i></span>
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                          <h6 class="mb-0">Pending</h6>
                          <small class="text-muted"></small>
                        </div>
                        <div class="user-progress">
                            @php
                                $pendingorders=0;
                            @endphp
                            @foreach ($orders as $order)
                            @if (Carbon::parse($order['created_at'])->month === Carbon::now()->month)
                            @if ($order['status'] === "Pending")
                            @php $pendingorders += 1; @endphp
                            @endif
                            @endif
                        @endforeach
                        <small class="fw-semibold">{{$pendingorders}}</small>
                        </div>
                      </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-info"><i class='bx bx-dots-horizontal-rounded'></i></span>
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                          <h6 class="mb-0">Processing</h6>
                          <small class="text-muted"></small>
                        </div>
                        <div class="user-progress">
                            @php
                            $processingorders=0;
                            @endphp
                            @foreach ($orders as $order)
                            @if (Carbon::parse($order['created_at'])->month === Carbon::now()->month)
                                @if ($order['status'] === "Processing")
                                @php $processingorders += 1; @endphp
                                @endif
                            @endif
                            @endforeach
                        <small class="fw-semibold">{{$processingorders}}</small>
                        </div>
                      </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-success"><i class='bx bx-check-double'></i></span>
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                          <h6 class="mb-0">Completed</h6>
                          <small class="text-muted"></small>
                        </div>
                        <div class="user-progress">
                            @php
                            $completedorders=0;
                            @endphp
                            @foreach ($orders as $order)
                            @if (Carbon::parse($order['created_at'])->month === Carbon::now()->month)
                            @if ($order['status'] === "Completed")
                            @php $completedorders += 1; @endphp
                            @endif
                            @endif
                            @endforeach
                    <small class="fw-semibold">{{$completedorders}}</small>
                        </div>
                      </div>
                    </li>
                    <li class="d-flex">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-danger"
                          ><i class='bx bx-x'></i></span>
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                          <h6 class="mb-0">Cancelled</h6>
                          <small class="text-muted"></small>
                        </div>
                        <div class="user-progress">
                            @php
                            $cancelledorders=0;
                            @endphp
                            @foreach ($orders as $order)
                            @if (Carbon::parse($order['created_at'])->month === Carbon::now()->month)
                            @if ($order['status'] === "Cancelled")
                            @php $cancelledorders += 1; @endphp
                            @endif
                            @endif
                            @endforeach
                            <small class="fw-semibold">{{$cancelledorders}}</small>
                        </div>
                      </div>
                    </li>

                  </ul>
                  <div class="mt-5">
                    <form action="{{ url('/admin/orders') }}" >
                    <button type="submit" class="btn btn-primary me-2">Check Orders</button></form>
                  </div>
                </div>

              </div>
            </div>
            <!--/ Order Statistics -->

            <!-- Stock Statistics -->
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                      <h5 class="m-0 me-2"><span class="text-primary">Inventory Status</span></h5>
                      <hr>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <div class="d-flex flex-column">
                          @php
                              $totalproducts = 0;
                          @endphp
                          @foreach ($variants as $variant)
                              @php
                                  $totalproducts += $variant['product_quantity'];
                              @endphp
                          @endforeach
                        <h2 class="mb-2">{{$totalproducts}}</h2>
                        <span>Total Products</span>
                      </div>
                      <div id="orderStatisticsChart"></div>
                    </div>
                    <ul class="p-0 m-0">
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-danger"
                            ><i class='bx bxs-error-circle'></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">Products Low in Stock</h6>
                            <small class="text-muted"></small>
                          </div>
                          <div class="user-progress">
                              @php
                                  $lowstock=0;
                              @endphp
                              @foreach ($variants as $variant)
                              @if ($variant['product_quantity'] <= 5 && $variant['product_quantity'] > 0 )
                              @php $lowstock += 1; @endphp
                              @endif
                          @endforeach
                          <small class="fw-semibold">{{$lowstock}}</small>
                          </div>
                        </div>
                      </li>
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-secondary"><i class='bx bx-no-entry'></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">Products Out of Stock</h6>
                            <small class="text-muted"></small>
                          </div>
                          <div class="user-progress">
                            @php
                            $outofstock=0;
                        @endphp
                        @foreach ($variants as $variant)
                        @if ($variant['product_quantity'] == 0)
                        @php $outofstock += 1; @endphp
                        @endif
                    @endforeach
                          <small class="fw-semibold">{{$outofstock}}</small>
                          </div>
                        </div>
                    </li>
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          {{-- <span class="avatar-initial rounded bg-label-success"><i class='bx bx-check-double'></i></span> --}}
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0"></h6>
                            <small class="text-muted"></small>
                          </div>
                          <div class="user-progress">
                      <small class="fw-semibold"></small>
                          </div>
                        </div>
                      </li>
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          {{-- <span class="avatar-initial rounded bg-label-success"><i class='bx bx-check-double'></i></span> --}}
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0"></h6>
                            <small class="text-muted"></small>
                          </div>
                          <div class="user-progress">
                      <small class="fw-semibold"></small>
                          </div>
                        </div>
                    </li>
                    </ul>
                    <div class="mt-5">
                        <form action="{{ url('/admin/products') }}" >
                        <button type="submit" class="btn btn-primary me-2">Check Products</button></form>
                      </div>
                    </div>
                  </div>
            </div>
            <!--/ Stock Statistics -->

            <!-- Sales Statistics -->
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                      <h5 class="m-0 me-2"><span class="text-primary">Sales</span></h5>
                      <hr>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <div class="d-flex flex-column">
                          @php
                              $totalbill = 0;
                          @endphp
                          @foreach ($orders as $order)
                          @if (Carbon::parse($order['created_at'])->month === Carbon::now()->month)
                            @if ($order['status']==="Completed")
                            @php
                            $totalbill += $order['totalbill'];
                            @endphp
                            @endif
                            @endif
                          @endforeach
                        <h2 class="mb-2">Rs. {{ number_format($totalbill , 2, '.', ',') }}</h2>
                        <span>Sales this Month</span>
                      </div>
                      <div id="orderStatisticsChart"></div>
                    </div>
                    <ul class="p-0 m-0">
                        @foreach ($categories as $category)
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <span class="avatar-initial rounded bg-label-primary"
                                ><i class="fa fa-list"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">{{$category['category_name']}}</h6>
                                <small class="text-muted"></small>
                              </div>
                              <div class="user-progress">
                                  @php
                                      $clothing=0;
                                  @endphp
                                  @foreach($orders as $order)
                                  @if($order['status']==="Completed")
                                  @php
                                      $orderno=$order['order_number'];
                                  @endphp
                                  @foreach ($orderitems as $orderitem)
                                    @if ($orderitem['product_category'] === strtolower($category['category_name']) && $orderitem['order_number']=== $orderno)
                                        @php
                                            $clothing += ($orderitem["product_price"] * $orderitem["product_quantity"]);
                                        @endphp
                                    @endif
                              @endforeach
                              @endif
                              @endforeach
                              <small class="fw-semibold">Rs. {{ number_format($clothing , 2, '.', ',') }}</small>
                              </div>
                            </div>
                          </li>
                        @endforeach
                    </ul>
                    </div>
                  </div>
            </div>
            <!--/ Sales Statistics -->

              </div>
          </div>
  </body>

@endsection
