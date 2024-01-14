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
        <h4 class="card-title">Update Course</h4>

        
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form method="post"  action="{{url('/course/edit_course/'.$course->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Course Title</label>
                    <input type="text" class="form-control input-default " name="name" value="{{$course->short_title}}">
                    @error('name')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Course Description</label>
                    <textarea class="form-control input-default " name="desc1">{{$course->short_desc}}</textarea>
                    @error('desc1')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Course Long Title</label>
                    <input type="text" class="form-control input-default " name="name2"  value="{{$course->long_title}}">
                    @error('name2')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Course Long Description</label>
                    <textarea class="form-control input-default " name="desc" id='desc'>{{$course->long_desc}}</textarea>
                    @error('desc')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Total Duration</label>
                    <input type="text" class="form-control input-default " name="duration"value="{{$course->total_duration}}">
                    @error('duration')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>

                <div class="form-group">
                    <label>Total Student</label>
                    <input type="text" class="form-control input-default " name="student" value="{{$course->total_student}}">
                    @error('student')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Total lecture</label>
                    <input type="text" class="form-control input-default " name="lecture" value="{{$course->total_lecture}}">
                    @error('lecture')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>

                <div class="form-group">
                    <label>Skill</label>
                    <textarea class="form-control input-default " name="skill">{{$course->skill_all}}</textarea>
                    @error('skill')
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
                <label>Upload Image</label>
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

                    

                                        <button type="submit" class="btn btn-success">Update Project</button>
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
    $('#skill').summernote({
        height: 400
    });
</script>



@endsection