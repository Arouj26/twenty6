@extends('backend.layout.main')
@section('content')

<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Messages</h4>
<!-- Contextual Classes -->

<div class="card">
    {{-- <h5 class="card-header">Orders</h5> --}}
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Message #</th>
            <th>Customer Name</th>
            <th>Message</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($messages as $message)
            <tr>
                <td>{{$message["id"]}}</td>
                <td>{{$message["name"]}}</td>
                <td>{{$message["email"]}}</td>
                <td>
                    @if ($message['status'] == 'un-read')
                    <span class="badge bg-label-info me-1">{{$message['status']}}</span>
                    @endif
                    @if ($message['status'] == 'read')
                    <span class="badge bg-label-success me-1">{{$message['status']}}</span>
                    @endif
                </td>
                <td><a href="{{url('/admin/view-messages/' . $message['id'])}}" class="btn rounded-pill btn-icon btn-primary">
                    <span class="tf-icons bx bx-envelope-open"></span></a></td>
                  <td>
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
