@extends('layouts.admin')

@section('admin_content')
<div class="container mt-2 ">
      <div class="row ">
          <div class="col-md-2" ></div>
            <div class="col-md-10" >
                <div class="card card-primary">
                <div class="card-header mt-5">
                    <h3 class="card-title">Edit Portfoilo</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('portfolio.update')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Title</label>
                          <input class="form-control" name="title" placeholder="Title"  required value="{{$data->title}}" >
                      </div>
                       <div class="form-group">
                          <label for="exampleInputEmail1">description</label>
                          <textarea class="form-control" name="description" placeholder="Description"  required >{{$data->description}}</textarea>
                      </div>

                      <section class="content">
						  <div class="container-fluid">
						    <div class="row">
						      <div class="col-12">
						        <div class="card ml-5 ">
						          <div class="card-header">
						            <h3 class="card-title">All Portfolio List here</h3>
						          </div>
						          <!-- /.card-header -->
						          <div class="card-body">
						            <table id="example1" class="table table-bordered table-striped table-sm ">
						              <thead>
						              <tr>
						                <th>SL</th>
						                <th>Image</th>
						                <th>Title</th>
						                <th>Link</th>
						                <th>Action</th>
						              </tr>
						              </thead>
						              <tbody>

						              @foreach($portfolio as $key=>$row)
						              <tr>
						                <td>{{ $key+1 }}</td>
						                <td>{{ $row->image }}</td>
						                <td>{{ $row->title }}</td>
						                <td>{{ $row->link }}</td>
						                <td>
						                  <a href="{{route('portfolio.edit', $row->id)}}" class="btn btn-sm btn-info edit"><i class="fas fa-edit" ></i></a>
						                  <a href="{{route('portfolio.delete', $row->id)}}" class="btn btn-sm btn-danger" id="delete" ><i class="fas fa-trash" ></i></a>
						                </td>
						              </tr>
						              @endforeach
						              </tbody>
						            </table>
						          </div>
						         </div>
						      </div>
						    </div>
						   </div>
						   <button type="button" class="btn btn-sm btn-info "> <a href="{{route('Portfolio.add')}}" style="color: #fff;" >+ Add </a> </button>
					  </section>
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