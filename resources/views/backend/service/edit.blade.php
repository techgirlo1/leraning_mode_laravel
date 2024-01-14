@extends('admin.admin_master')

@section('admin')





<div class="content-body" style="min-height: 788px;">
<div class="container-fluid">
<!-- Add Project -->
<div class="modal fade" id="addProjectSidebar">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        
    </div>
    <div class="modal-body">
       
    </div>
</div>
</div>
</div>
<div class="row page-titles mx-0">
<div class="col-sm-6 p-md-0">

</div>

</div>
<!-- row -->
<div class="row">
<div class="col-xl-12 col-lg-12">
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Update Services</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form method="post"  action="{{url('/service/edit_service/'.$edit->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Service Name</label>
                    <input type="text" class="form-control input-default " name="name" value='{{$edit->service_name}}'>
                    @error('name')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>
                

                <div class="form-group">
                    <label>Service Description</label>
                    <textarea class="form-control input-default " name="desc"  >{{$edit->service_desc}}</textarea>
                    @error('desc')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="input-group mb-3">
                
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload Logo</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="photo">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                            @error('photo')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                                        </div>

                                        <button type="submit" class="btn btn-success">Update Service</button>
            </form>
        </div>
    </div>
</div>
</div>



@endsection