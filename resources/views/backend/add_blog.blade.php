
@extends('backend.layout.main')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">Add blog</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-body">
              <form action="{{url('/admin/add-blog/')}}" enctype="multipart/form-data" method="post" id="addBlogForm">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="blog_title">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="blog_title" name="blog_title" />
                    <div class="mt-2">@error('blog_title')
                    <div class="alert alert-danger">{{"Title is required" }}</div>
                    @enderror</div>
                </div>
                  </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="blog_tag">Main Tag</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="blog_tag" name="blog_tag"/>
                    <div class="mt-2">@error('blog_tag')
                        <div class="alert alert-danger">{{"Tag is required" }}</div>
                        @enderror</div>
                  </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="blog_author">Author</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="blog_author" name="blog_author"/>
                      <div class="mt-2">@error('blog_author')
                          <div class="alert alert-danger">{{"Author is required" }}</div>
                          @enderror</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="blog_date">Publish Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="blog_date" name="blog_date"/>
                      <div class="mt-2">@error('blog_date')
                          <div class="alert alert-danger">{{"Date is required" }}</div>
                          @enderror</div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <div class="button-wrapper">
                          <label for="blog_picture" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload blog cover photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="blog_picture" name="blog_picture" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>
                          @error('blog_picture')
                            <div class="alert alert-danger">{{"Please upload cover picture" }}</div>
                            @enderror

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="blog_p1">Body 1st Paragraph</label>
                    <div class="col-sm-10">
                        <div id="editor" name="blog_p1" style="width: 100%; height: 300px;"></div>
                        <input type="hidden" id="editorContent" name="blog_p1" />
                        <div class="mt-2">@error('blog_p1')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror</div>
                      </div>

                </div>
                <div class="row justify-content-end mt-2">
                  <div class="col-sm-10">

                    <button type="submit" class="btn btn-primary save-changes-btn">Add</button>
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
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  {{-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> --}}
  <script>
      var quill = new Quill('#editor', {
          theme: 'snow'
      });

      var form = document.getElementById('addBlogForm');
      var saveChangesButton = document.querySelector('.save-changes-btn');

      form.addEventListener('submit', function(event) {
          event.preventDefault(); // Prevent the default form submission

          var editorContent = quill.root.innerHTML;
          document.getElementById('editorContent').value = editorContent;

          // Perform any other form handling or validation if needed

          // Finally, submit the form programmatically
          form.submit();
      });

  </script>



@endsection
