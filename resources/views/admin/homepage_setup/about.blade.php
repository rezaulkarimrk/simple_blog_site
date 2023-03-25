@extends('layouts.admin')

@section('admin_content')
<div class="container mt-2 ">
      <div class="row ">
          <div class="col-md-2" ></div>
            <div class="col-md-10" >
                <div class="card card-primary">
                <div class="card-header mt-5">
                    <h3 class="card-title">Edit About</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('about.update')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                          <label for="exampleInputFile">Photo Upload</label>
                          <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" >
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          <textarea class="form-control" name="description" placeholder="Enter Site Owner Name"  required>{{$data->description}}</textarea>
                      </div>
                     </div>

                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div> -->
@endsection