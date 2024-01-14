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
        <h4 class="card-title">Add Projects</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form method="post"  action="{{route('insert_project')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Project Name</label>
                    <input type="text" class="form-control input-default " name="name">
                    @error('name')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Project Description</label>
                    <textarea class="form-control input-default " name="desc" id='desc'  ></textarea>
                    @error('desc')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Project Features</label>
                    <textarea class="form-control input-default " name="feat" id='feature'  ></textarea>
                    @error('feat')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>



                <div class="form-group">
                    <label>Live Preview Link</label>
                    <input type="text" class="form-control input-default " name="preview">
                    @error('preview')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>

                <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <span class="input-group-text">Upload </span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="img1">
                    <label class="custom-file-label">Choose file</label>
                </div>
                @error('img1')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                    </div>


                    <div class="input-group mb-3">
                   <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="img2">
                        <label class="custom-file-label">Choose file</label>
                    </div>
                    @error('img2')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                    </div>

                                        <button type="submit" class="btn btn-success">Add Project</button>
            </form>
        </div>
    </div>
</div>
</div>


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#desc').summernote({
        height: 400
    });
</script>

<script type="text/javascript">
    $('#feature').summernote({
        height: 400
    });
</script>



@endsection