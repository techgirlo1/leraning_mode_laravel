@extends('admin.admin_master')

@section('admin')

<div class="content-body" style="min-height: 788px;">
<div class="container-fluid">
<!-- Add course -->
<div class="modal fade" id="addcourseSidebar">
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
            <h4 class="card-title">ALL COURSES</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            
                            <th><strong>short_title</strong></th>
                            <th><strong>short_desc</strong></th>
                            <th><strong>small_img</strong></th>
                            <th><strong>long_title</strong></th>
                            <th><strong>long_desc</strong></th>
                            <th><strong>total_duration</strong></th>
                            <th><strong>total_student</strong></th>
                            <th><strong>total_lecture</strong></th>
                            <th><strong>skill_all</strong></th>
                            <th><strong>video_url</strong></th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($course as $courses)
                        <tr>
                          
                            <td>{{$courses->short_title,20  }}</td>
                            <td>{{$courses->short_desc,20  }}</td>
                            <td><img src="{{asset($courses->small_img)}}" style="height:100px;width:100px"/></td>
                            <td> {{ $courses->long_title,20  }}</td>
                            <td>{{$courses->long_desc,20  }}</td>
                            <td> {{ $courses->total_duration,20  }}</td>
                            <td> {{ $courses->total_student,20  }}</td>
                            <td> {{ $courses->total_lecture,20  }}</td>
                            <td> {{ $courses->skill_all,20  }}</td>
                            <td> <video height="200"  width="200" controls>
                                <source src="{{asset($courses->video_url)}}"/>
                            </video></td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{url('/course/edit/'.$courses->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('/course/delete/'.$courses->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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