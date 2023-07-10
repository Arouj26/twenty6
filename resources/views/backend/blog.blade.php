
@extends('backend.layout.main')
@section('content')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                    <div class="col-md-10">
              <h4 class="fw-bold py-3 mb-4">Blog</h4></div>
                <div class="col-md-2">
                <a href="{{url('/admin/add-blog/')}}" class="btn btn-primary">Add Blog</a></div>
                </div>
              <!-- Basic Bootstrap Table -->
              <div class="card">
                {{-- <h5 class="card-header">Table Basic</h5> --}}
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Tag</th>
                        <th>Author</th>
                        <th style="padding-right:0;">Action<th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($blog as $blog)
                        <tr>
                            <td>{{$blog["blog_date"]}}</td>
                            <td>{{$blog["blog_title"]}}</td>
                            <td>{{$blog["blog_tag"]}}</td>
                            <td>{{$blog["blog_author"]}}</td>
                            <td style="padding-right:0;">
                                <a href="{{url('/admin/edit-blog/' . $blog['id'])}}" class="btn rounded-pill btn-icon btn-primary">
                                <span class="tf-icons bx bx-edit-alt"></span>
                                </a>
                                <a href="{{url('/admin/delete-blog/' . $blog['id'])}}" class="btn rounded-pill btn-icon btn-danger">
                                <span class="tf-icons bx bx-trash-alt"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->
            </div>
        </div>
@endsection

