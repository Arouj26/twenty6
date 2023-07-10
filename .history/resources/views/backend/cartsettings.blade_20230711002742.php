
@extends('backend.layout.main')
@section('content')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                    <div class="col-md-8">
                    <h4 class="fw-bold py-3 mb-4">Cart Settings</h4></div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="button-wrapper">
                            <form action="{{ url('/admin/homesettings/logo') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="shipping">Shipping Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="shipping" name="shipping"/>
                                        <div class="mt-2">
                                            @error('shipping')
                                            <div class="alert alert-danger">{{ "Shipping rate is required" }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Add</button>
                    </div>
            </div>
            </div>
@endsection
