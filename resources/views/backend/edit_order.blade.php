
@extends('backend.layout.main')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">Order # </h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-body">
                <form action="{{ url('/admin/edit-order/'. $orders['id']) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="order_number">Order Number</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="order_number" name="order_number" value="{{ str_pad($orders['order_number'], 8, '0', STR_PAD_LEFT) }}" />
                            <div class="mt-2">
                                @error('order_number')
                                <div class="alert alert-danger">{{ "Order Number is required" }}</div>
                                @enderror
                            </div>
                        </div>
                        <label class="col-sm-2 col-form-label" for="customer_name">Customer Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $orders['customer_name'] }}" />
                            <div class="mt-2">
                                @error('customer_name')
                                <div class="alert alert-danger">{{ "Name is required" }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="totalbill">Total Amount (Rs.)</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="totalbill" name="totalbill" value="{{ $orders['totalbill'] }}" />
                            <div class="mt-2">
                                @error('totalbill')
                                <div class="alert alert-danger">{{ "Total Amount is required" }}</div>
                                @enderror
                            </div>
                        </div>
                        <label class="col-sm-2 col-form-label" for="status">Status</label>
                        <div class="col-sm-4">
                            <select class="form-select" id="status" name="status">
                                <option selected value="{{ $orders['status'] }}">{{ $orders['status'] }}</option>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                                <option value="Processing">Processing</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                            <div class="mt-2">
                                @error('status')
                                <div class="alert alert-danger">{{ "Status is required" }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
    <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->

@endsection
