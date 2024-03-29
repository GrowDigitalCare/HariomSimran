@extends('backend.layouts.layout')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/datetimepicker.css">
    <link rel="stylesheet" href="{{asset('admin')}}/assets/css/main/datetimepicker.css">
    <div id="main">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="container ">
            <div class="page-heading">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Sindhi Tipno Form</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" action="{{ route('tipno-update', $tipno->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="name">Title</label>
                                                            <input type="text" class="form-control" name="title"
                                                                placeholder="Title" value="{{ $tipno->title }}"
                                                                required>
                                                            @error('title')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="price">Start</label>
                                                            <input autocomplete="off" type="text" id="starts_at" class="form-control" name="start" value="{{ $tipno->start }}" required>
                                                        </div>
                                                        @error('start')
                                                        <div class="text-danger text-sm">
                                                            <small>{{ $message }}</small>
                                                        </div>
                                                    @enderror
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="price">End</label>
                                                            <input autocomplete="off" type="text" id="expires_at" class="form-control" name="end" value="{{ $tipno->end }}" required>
                                                           
                                                        </div>
                                                        @error('end')
                                                        <div class="text-danger text-sm">
                                                            <small>{{ $message }}</small>
                                                        </div>
                                                    @enderror
                                                    </div>
                                                   
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Description</label>
                                                            <div id="editor">{{ $tipno->description }}</div>
                                                            <input type="hidden" name="description" id="hidden-editor-input">
                                                        </div>
                                                    </div>
                                                      <div class="col-12">
                                                          <div class="form-group">
                                                              <label for="image">Image</label>
                                                              <input type="file" class="form-control"  name="image" >
                                                              <img style="height:50px; width:50px;" src="{{asset('/uploads/Tipno/'.$tipno->image)}}" alt="">
                                                            
                                                          </div>
                                                      </div>


                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary me-1 mb-1">
                                                            Add Tipno
                                                        </button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                            Reset
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

            </div>
        </div>




    </div>

  <!-- Include CKEditor script -->
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

  <!-- Initialize CKEditor -->
  <script>
    CKEDITOR.replace('editor', {
        // Your CKEditor configuration options for 'description', if any
    });

    CKEDITOR.replace('meta_description_editor', {
        // Your CKEditor configuration options for 'meta_description', if any
    });

    // Update form submission to include CKEditor content
    document.querySelector('form').addEventListener('submit', function() {
        var editorContent = CKEDITOR.instances.editor.getData();
        document.getElementById('hidden-editor-input').value = editorContent;

        var metaDescriptionContent = CKEDITOR.instances.meta_description_editor.getData();
        document.getElementById('hidden_meta_description_input').value = metaDescriptionContent;
    });
</script>

    <script src="{{ asset('admin') }}/assets/js/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/datetimepicker.js"></script>
    <script>
        $(document).ready(function(){
            $('#starts_at').datetimepicker({
                // options here
                format:'Y-m-d H:i:s',
            });
        });
        $(document).ready(function(){
            $('#expires_at').datetimepicker({
                // options here
                format:'Y-m-d H:i:s',
            });
        });
    </script>
    
@endsection
