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
<div class="welcome-text">
    

</div>
</div>

</div>
<!-- row -->
<div class="row">
<div class="col-xl-12 col-lg-12">
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Add Information</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form method="post"  action="{{route('insert_info')}}">
                @csrf
                <div class="form-group">
                    <label>About</label>
                     <textarea class="form-control" name="About" id="summernote"></textarea>
                    @error('About')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Refund Policy</label>
                    <textarea class="form-control input-default " name="Refund" id="refund" ></textarea>
                    @error('Refund')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Terms and Condition</label>
                    <textarea class="form-control input-default " name="Terms" id="terms" ></textarea>
                    @error('Terms')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Privacy</label>
                    <textarea class="form-control input-default " name="Privacy"  id="privacy" ></textarea>
                    @error('Privacy')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>
                


               

                                        <button type="submit" class="btn btn-success">Add Info</button>
            </form>
        </div>
    </div>
</div>
</div>

 <!-- summernotelink -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 400
    });
</script>

<script type="text/javascript">
    $('#refund').summernote({
        height: 400
    });
</script>

<script type="text/javascript">
    $('#terms').summernote({
        height: 400
    });
</script>

<script type="text/javascript">
    $('#privacy').summernote({
        height: 400
    });
</script>


@endsection