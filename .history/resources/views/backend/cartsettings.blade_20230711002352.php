
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
                                    <label class="col-sm-2 col-form-label" for="contact_number">Shipping Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="contact_number" name="contact_number"/>
                                        <div class="mt-2">
                                            @error('contact_number')
                                            <div class="alert alert-danger">{{ "Number is required" }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ url('/admin/homesettings/header') }}" class="btn btn-primary align-self-center">Edit Header</a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ url('/admin/homesettings/footer') }}" class="btn btn-primary align-self-center">Edit Footer</a>
                    </div>
                </div>



              <!-- Categories -->
              <div class="card mb-4">

                <div class="row ">
                    <div class="card-header col-md-9">
                        <h3 >Categories</h3>
                      </div>
                <div class="col-md-3 mt-3 mb-3">
                    <a href="{{url('/admin/homesettings/categories')}}" class="btn btn-primary align-self-center">Add Category</a></div>
                </div>
                {{-- <h5 class="card-header">Table Basic</h5> --}}
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Display Title</th>
                        <th >Action<th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category['id']}}</td>
                            <td>@if ($category['category_image'])
                                <img src="{{ asset($category['category_image']) }}" alt="category Image" width="100" height="80">
                            @else
                                <td><img src='{{ $category["category_image"] }}' width="100" height="100"></td>
                            @endif
                            </td>
                            <td>{{$category['category_name']}}</td>
                            <td>{{$category['category_display_title']}}</td>
                            <td ><a href="{{url('/admin/homesettings/edit-category/' . $category['id'])}}" class="btn rounded-pill btn-icon btn-primary">
                                <span class="tf-icons bx bx-edit-alt"></span></a>
                                <a href="{{url('/admin/homesettings/delete-category/' . $category['id'])}}" class="btn rounded-pill btn-icon btn-danger">
                                    <span class="tf-icons bx bx-trash-alt"></span></a>
                              </button></td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Categories -->
              <!-- Carousel -->
              <div class="card mt-4">

                <div class="row ">
                    <div class="card-header col-md-6">
                        <h3>Carousal</h3>
                      </div>
                      <div class="col-md-6 mt-3 mb-3 d-flex justify-content-end">
                        <div class="d-flex justify-content-between" style="display: flex; justify-content: flex-end; gap: 10px; margin-right:10px;">
                        <a href="{{url('/admin/homesettings/banners')}}" class="btn btn-primary align-self-center">Add Banner Image</a>  <a href="{{url('/admin/homesettings/carousals')}}" class="btn btn-primary ml-2 align-self-center custom-btn">Add Carousal</a></div></div>
                </div>
                {{-- <h5 class="card-header">Table Basic</h5> --}}
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Tag</th>
                        <th>Display Text</th>
                        <th >Action<th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($carousals as $carousal)
                        <tr>
                            <td>{{$carousal['id']}}</td>
                            <td>{{$carousal['carousal_tag']}}</td>
                            <td>{{$carousal['carousal_text']}}</td>
                            <td ><a href="{{url('/admin/homesettings/edit-carousal/' . $carousal['id'])}}" class="btn rounded-pill btn-icon btn-primary">
                                <span class="tf-icons bx bx-edit-alt"></span></a>
                                <a href="{{url('/admin/homesettings/delete-carousal/' . $carousal['id'])}}" class="btn rounded-pill btn-icon btn-danger">
                                    <span class="tf-icons bx bx-trash-alt"></span></a>
                              </button></td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Carousel -->

              <!-- Services -->
              <div class="card mt-4">

                <div class="row ">
                    <div class="card-header col-md-9">
                        <h3>Services</h3>
                      </div>
                      <div class="col-md-3 mt-3 mb-3">
                        <a href="{{url('/admin/homesettings/services')}}" class="btn btn-primary align-self-center">Add Service</a></div>
                    </div>

                {{-- <h5 class="card-header">Table Basic</h5> --}}
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Icon/Image</th>
                        <th >Action<th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($services as $service)
                        <tr>
                            <td>{{$service['id']}}</td>
                            <td>{{$service['service_name']}}</td>
                            <td>{{$service['service_description']}}</td>
                            @if ($service['service_image'] === '0')
                            <td><i class="{{$service['service_icon']}}" aria-hidden="true"></i></td>
                            @else
                            <td>@if ($service['service_image'])
                                <img src="{{ asset($service['service_image']) }}" alt="service Image" width="100" height="80">
                            @else
                                <td><img src='{{ $service["service_image"] }}' width="100" height="100"></td>
                            @endif
                            </td>
                            @endif

                            <td >
                                <a href="{{url('/admin/homesettings/delete-service/' . $service['id'])}}" class="btn rounded-pill btn-icon btn-danger">
                                    <span class="tf-icons bx bx-trash-alt"></span></a>
                              </button></td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>

              <!--/ Services -->

              <!-- footers -->
              <div class="card mt-4">

                <div class="row ">
                    <div class="card-header col-md-9">
                        <h3 >Footer</h3>
                      </div>
                <div class="col-md-3 mt-3 mb-3">
                    <a href="{{url('/admin/homesettings/footer')}}" class="btn btn-primary align-self-center">Add Footer</a></div>
                </div>
                {{-- <h5 class="card-header">Table Basic</h5> --}}
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Instagram</th>
                        <th>Image</th>
                        <th >Action<th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($footers as $footer)
                        <tr>
                            <td>{{$footer['id']}}</td>
                            <td>{{$footer['footer_insta']}}</td>
                            <td>@if ($footer['footer_image'])
                                <img src="{{ $footer['footer_image'] }}" alt="footer Image" width="100" height="80">
                            @else
                                <td><img src='{{ $footer["footer_image"] }}' width="100" height="100"></td>
                            @endif
                            </td>

                            <td ><a href="{{url('/admin/homesettings/edit-footer/' . $footer['id'])}}" class="btn rounded-pill btn-icon btn-primary">
                                <span class="tf-icons bx bx-edit-alt"></span></a>
                                <a href="{{url('/admin/homesettings/delete-footer/' . $footer['id'])}}" class="btn rounded-pill btn-icon btn-danger">
                                    <span class="tf-icons bx bx-trash-alt"></span></a>
                              </button></td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ footer -->
            </div>
            </div>
        </div>
        <script>
            // Add event listener to the file input
            document.getElementById('logo').addEventListener('change', function() {
              // Submit the form when a file is selected
              document.getElementById('uploadForm').submit();
            });
          </script>
@endsection
