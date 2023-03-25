@extends('layouts.admin')

@section('admin_content')
<div class="container mt-2 ">
      <div class="row ">
          <div class="col-md-2" ></div>
            <div class="col-md-10" >
                <div class="card card-primary">
                <div class="card-header mt-5">
                    <h3 class="card-title">Edit Header</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('header.update')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                          <label for="exampleInputFile">Logo Upload</label>
                          <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="logo" >
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="exampleInputFile">Hero Photo Upload</label>
                          <div class="input-group">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" name="image" >
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="Enter Site Owner Name"  required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Profession</label>
                          <input type="text" class="form-control" name="profession" value="{{$data->profession}}" placeholder="profession"  required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="text" class="form-control" name="email" value="{{$data->email}}" placeholder="email"  required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputFile">CV Upload</label>
                          <div class="input-group">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" name="cv" >
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Facebook Link</label>
                          <br/>
                          <span>https://www.facebook.com/(Use Only User Name)</span>
                          <input type="text" class="form-control " name="facebook" value="{{$data->facebook}}" placeholder="facebook"  required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Githup Link</label>
                          <br/>
                          <span>https://github.com/(Use Only User Name)</span>
                          <input type="text" class="form-control " name="github" value="{{$data->github}}" placeholder="Githup"  required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Twitter Link</label>
                          <br/>
                          <span>https://twitter.com/(Use Only User Name)</span>
                          <input type="text" class="form-control " name="twitter" value="{{$data->twitter}}" placeholder="Twitter"  required>
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