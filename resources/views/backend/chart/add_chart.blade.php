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
        <h4 class="card-title">Add Charts</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form method="post"  action="{{route('insert_chart')}}">
                @csrf
                <div class="form-group">
                    <label>Technology</label>
                    <input type="text" class="form-control input-default " name="tech">
                    @error('tech')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Project</label>
                    <input type="number" class="form-control input-default " name="proj">
                    @error('proj')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-success">Add Chart</button>
            </form>
        </div>
    </div>
</div>
</div>



@endsection