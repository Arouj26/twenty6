
@extends('backend.layout.main')
@section('content')
<body>
<div class="container-xxl flex-grow-1 container-p-y" >
        <h4 class="fw-bold py-3 mb-4">Messages</h4>
<!-- Contextual Classes -->
<div class="row">
    <div class="card ">

        {{-- <h5 class="card-header">Orders</span></h5> --}}
        <div class="table-responsive text-nowrap">
          <table class="table">
            <tbody class="table-border-bottom-0">
                @foreach($messages as $message)
                <tr>
                    <td><b>Name</b> </td><td style="text-align: right">{{$message['name']}}</td>
                </tr>
                <tr>
                    <td><b>Email</b> </td><td style="text-align: right">{{$message['email']}}</td>
                </tr>
                <tr>
                    <td><b>Phone</b> </td><td style="text-align: right">{{$message['phone']}}</td>
                </tr>
                <tr>
                    <td><b>Message</b><br><blockquote class="blockquote mt-3">
                      <p class="mb-0" style="white-space: pre-wrap;">{{$message['message']}}</p></blockquote></td></tr>
                @endforeach
            </tbody>
            <tr><td>
            <div class="mt-2">
                <form action="{{url('/admin/view-messages/' . $message['id'])}}" method="post">
                    @csrf
                <button type="submit" class="btn btn-primary me-2">Read</button></form>
              </div>
            {{-- </div> --}}
            </div></td>
        </tr>
          </table>

        </div>


    </div>
</body>
@endsection
