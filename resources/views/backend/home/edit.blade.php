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
        <h4 class="card-title">Update Home</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form method="post"  action="{{url('/home/edit_home/'.$home->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Home Title</label>
                    <input type="text" class="form-control input-default " name="title" value="{{$home->home_title}}">
                    @error('title')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>



                <div class="form-group">
                    <label>Home Subtitle</label>
                    <input type="text" class="form-control input-default " name="sub" value="{{$home->home_subtitle}}">
                    @error('sub')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>



                <div class="form-group">
                    <label>Tech Description</label>
                    <textarea class="form-control input-default " name="tech" id="tech">{{$home->tech_desc}}</textarea>
                    @error('tech')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


               
                
                <div class="form-group">
                    <label>Video Description</label>
                    <textarea class="form-control input-default " name="desc" id='desc'>{{$home->video_desc}}</textarea>
                    @error('desc')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Total Project</label>
                    <input type="number" class="form-control input-default " name="proj">
                    @error('proj')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>

                <div class="form-group">
                    <label>Total client</label>
                    <input type="number" class="form-control input-default " name="client">
                    @error('client')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Total hours</label>
                    <input type="number" class="form-control input-default " name="hour">
                    @error('hour')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>

                


                <div class="form-group">
                    <label>Video url</label>
                    <div class="input-group-prepend">
                    </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="vid">
                    <label class="custom-file-label">Choose file</label>
                </div>
                @error('vid')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                    </div>
                </div>
                
                
                <div class="form-group">
                <label>About Image</label>
                <div class="input-group-prepend">
                    
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="img1">
                    <label class="custom-file-label">Choose file</label>
                </div>
                @error('img1')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                
               </div>

                    

                                        <button type="submit" class="btn btn-success">Update Home</button>
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
    $('#tech').summernote({
        height: 400
    });
</script>



@endsection