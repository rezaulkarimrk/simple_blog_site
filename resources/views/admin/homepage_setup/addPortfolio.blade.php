@extends('layouts.admin')

@section('admin_content')
<div class="container mt-2 ">
      <div class="row ">
          <div class="col-md-2" ></div>
            <div class="col-md-10" >
                <div class="card card-primary">
                <div class="card-header mt-5">
                    <h3 class="card-title">Add Portfolio</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('portfolio.store')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="card-body">
                	<div class="form-group">
                      <label for="exampleInputFile">Image Upload</label>
                      <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" >
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                   </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input class="form-control" name="title" placeholder="Title"  required >
                   </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1">Link</label>
                      <input class="form-control" name="link" placeholder="Link"  required >
                   </div>

                   <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Add</button>
                   </div>
                </div>
              </form>
           </div>
         </div>
      </div>
</div> -->

@endsection