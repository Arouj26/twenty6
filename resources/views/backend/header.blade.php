
@extends('backend.layout.main')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">Header</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">

            <div class="table-responsive">
              <table class="table table-striped table-borderless border-bottom">
                <thead>
                  <tr>
                    <th class="text-nowrap"><h5 class="mt-20 mb-0">Select sections</h5></th>
                    <th class="text-nowrap text-center"></th>
                  </tr>
                </thead>
                <tbody>
                    <form action="{{ url('/admin/homesettings/header/') }}" enctype="multipart/form-data" method="post">
                        @csrf
                  <tr>
                    <td class="text-nowrap">Home</td>
                    <td>
                      <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="home" type="checkbox" id="home" checked />
                      </div>
                    </td>
                  </tr>
                  @foreach ($categories as $category)
                  <tr>
                    <td class="text-nowrap">{{$category['category_name']}}</td>
                    <td>
                      <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="{{$category['category_name']}}" type="checkbox" id="{{$category['category_name']}}" checked />
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  <tr>
                    <td class="text-nowrap">Blog</td>
                    <td>
                      <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="blog" type="checkbox" id="blog" id="defaultCheck1" checked />
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap">Contact</td>
                    <td>
                      <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" name="contact" type="checkbox" id="contact" id="defaultCheck1" checked />
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-body">
                  <div class="row justify-content-start">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!-- /Notifications -->
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
    <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->

@endsection
