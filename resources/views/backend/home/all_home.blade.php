@extends('admin.admin_master')

@section('admin')

<div class="content-body" style="min-height: 788px;">
<div class="container-fluid">
<!-- Add home -->
<div class="modal fade" id="addhomeSidebar">
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
            <h4 class="card-title">All Homes</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            
                            <th><strong>home_title</strong></th>
                            <th><strong>home_subtitle</strong></th>
                            <th><strong>about_img</strong></th>
                            <th><strong>total_project</strong></th>
                            <th><strong>total_client</strong></th>
                            <th><strong>total_hours</strong></th>
                            <th><strong>video_desc</strong></th>
                            <th><strong>tech_desc</strong></th>
                            <th><strong>video_url</strong></th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($home as $homes)
                        <tr>
                          
                            <td>{{$homes->home_title,20  }}</td>
                            <td>{{$homes->home_subtitle,20  }}</td>
                            <td><img src="{{asset($homes->about_img)}}" style="height:100px;width:100px"/></td>
                            <td> {{ $homes->total_project,20  }}</td>
                            <td>{{$homes->total_client,20  }}</td>
                            <td> {{ $homes->total_hours,20  }}</td>
                            <td> {{ $homes->video_desc,20  }}</td>
                            <td> {{ $homes->tech_desc,20  }}</td>
                            <td> <video height="200"  width="200" controls>
                                <source src="{{asset($homes->video_url)}}"/>
                            </video></td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{url('/home/edit/'.$homes->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('/home/delete/'.$homes->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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