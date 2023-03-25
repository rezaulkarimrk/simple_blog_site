@extends('layouts.admin')

@section('admin_content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#categoryModal"> + Add </button>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card ml-5 ">
          <div class="card-header">
            <h3 class="card-title">All Categories List here</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-sm ">
              <thead>
              <tr>
                <th>SL</th>
                <th>Category Name</th>
                <th>Category Slug</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>

              @foreach($data as $key=>$row)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $row->category_name }}</td>
                <td>{{ $row->category_slug }}</td>
                <td>
                  <a href="#" class="btn btn-sm btn-info edit" data-id="{{ $row->id}}" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit" ></i></a>
                  <a href="{{ route('category.delete', $row->id) }}" class="btn btn-sm btn-danger" id="delete" ><i class="fas fa-trash" ></i></a>
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
  </section>
 </div>

 <!-- Category insert Modal -->
 <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('category.store')}}" method="POST" >
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="category_name">Cataegory Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" required>
            <small id="emailHelp" class="form-text text-muted">This is your main category</small>
          </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('category.update')}}" method="POST" >
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="e_category_name">Cataegory Name</label>
            <input type="text" class="form-control" id="e_category_name" name="category_name" required>
            <input type="hidden" class="form-control" id="e_category_id" name="id" >
            <small id="emailHelp" class="form-text text-muted">This is your main category</small>
          </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
  $('body').on('click', '.edit', function(){
    let cat_id =  $(this).data('id');
    $.get('category/edit/'+ cat_id, function(data){
      $('#e_category_name').val(data.category_name)
      $('#e_category_id').val(data.id)
      console.log(data.category_id)
    });
  });
</script>
@endsection