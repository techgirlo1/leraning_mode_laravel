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
            <h4 class="card-title">ALL SERVICES</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            
                            <th><strong>logo</strong></th>
                            <th><strong>service_name</strong></th>
                            <th><strong>service_desc</strong></th>
                            <th><strong>ACTION</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($service as $services)
                        <tr>
                          
                            <td><img src="{{asset($services->logo)}}" style="height:200px;width:200px"/></td>
                            <td>{{$services->service_name,20 }}</td>
                            <td> {{ $services->service_desc,20 }}<td>
                            
                            <td>
                                <div class="d-flex">
                                    <a href="{{url('/service/edit/'.$services->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('/service/delete/'.$services->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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