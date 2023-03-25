@extends('layouts.admin')

@section('admin_content')
<div class="container mt-2 ">
      <div class="row ">
          <div class="col-md-2" ></div>
            <div class="col-md-10" >
                <div class="card card-primary">
                <div class="card-header mt-5">
                    <h3 class="card-title">Edit Services</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('services.update')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Title</label>
                          <input class="form-control" name="title" placeholder="Title"  required value="{{$data->title}}" >
                      </div>
                       <div class="form-group">
                          <label for="exampleInputEmail1">description</label>
                          <textarea class="form-control" name="description" placeholder="Enter Site Owner Name"  required >{{$data->description}}</textarea>
                      </div>

                      <section class="content">
          						  <div class="container-fluid">
          						    <div class="row">
          						      <div class="col-12">
          						        <div class="card ml-5 ">
          						          <div class="card-header">
          						            <h3 class="card-title">All Sevices skill List here</h3>
          						          </div>
          						          <!-- /.card-header -->
          						          <div class="card-body">
          						            <table id="example1" class="table table-bordered table-striped table-sm ">
          						              <thead>
          						              <tr>
          						                <th>SL</th>
          						                <th>font Awosome Class</th>
          						                <th>Skills</th>
          						                <th>Action</th>
          						              </tr>
          						              </thead>
          						              <tbody>

          						              @foreach($services as $key=>$row)
          						              <tr>
          						                <td>{{ $key+1 }}</td>
          						                <td>{{ $row->fontAwosome }}</td>
          						                <td>{{ $row->skillName }}</td>
          						                <td>
          						                  <a href="#" class="btn btn-sm btn-info edit" data-id="{{$row->id}}" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit" ></i></a>
          						                  <a href="{{route('skill.delete', $row->id)}}" class="btn btn-sm btn-danger" id="delete" ><i class="fas fa-trash" ></i></a>
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
          						   <button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#SkillModal"> + Add </button>
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

  <!-- Category insert Modal -->
 <div class="modal fade" id="SkillModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('servicesSkill.store')}}" method="POST" >
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="fontAwosome">Font Awsome Class Name</label>
            <input type="text" class="form-control" id="fontAwosome" name="fontAwosome" required>
            <small id="emailHelp" class="form-text text-muted">Font Awsome Class Name</small>
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="skillName">Skill Name</label>
            <input type="text" class="form-control" id="skillName" name="skillName" required>
            <small id="emailHelp" class="form-text text-muted">This is your Skill Name</small>
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
      <form action="{{route('servicesSkill.update')}}" method="POST" >
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="e_fontAwosome">Font Awsome Class Name</label>
            <input type="text" class="form-control" id="e_fontAwosome" name="fontAwosome" required>
            <small id="emailHelp" class="form-text text-muted">Font Awsome Class Name</small>
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="e_skillName">Skill Name</label>
            <input type="text" class="form-control" id="e_skillName" name="skillName" required>
            <input type="hidden" class="form-control" id="e_skill_id" name="id" >
            <small id="emailHelp" class="form-text text-muted">This is your Skill Name</small>
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
    let skill_id =  $(this).data('id');
    $.get('services_skill/edit/'+ skill_id, function(data){
      $('#e_fontAwosome').val(data.fontAwosome)
      $('#e_skillName').val(data.skillName)
      $('#e_skill_id').val(data.id)
      console.log(data.services_skil_id)
    });
  });
</script>
@endsection