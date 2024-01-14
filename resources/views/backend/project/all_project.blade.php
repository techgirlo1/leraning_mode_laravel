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
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">ALL PROJECTS</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            
                            <th><strong>image_1</strong></th>
                            <th><strong>image_2</strong></th>
                            <th><strong>project_name</strong></th>
                            <th><strong>project_desc</strong></th>
                            <th><strong>project_features</strong></th>
                            <th><strong>live_preview Link</strong></th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($project as $projects)
                        <tr>
                          
                            <td><img src="{{asset($projects->image_1)}}" style="height:100px;width:100px"/></td>
                            <td><img src="{{asset($projects->image_2)}}" style="height:100px;width:100px"/></td>
                            <td>{{$projects->project_name,20  }}</td>
                            <td> {{ $projects->project_desc,20  }}</td>
                            <td>{{$projects->project_features,20  }}</td>
                            <td> {{ $projects->live_preview,20  }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{url('/project/edit/'.$projects->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('/project/delete/'.$projects->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                </div>
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
</div>
</div>
</div>

@endsection