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
<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Bootstrap</a></li>
    </ol>
</div>
</div>
<!-- row -->

<div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">ALL INFORMATION</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            
                            <th><strong>ABOUT</strong></th>
                            <th><strong>PRIVACY</strong></th>
                            <th><strong>REFUND</strong></th>
                            <th><strong>TERMS AND CONDITION</strong></th>
                            <th><strong>ACTION</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($info as $infos)
                        <tr>
                           
                            <td>{{ $infos->about,20}}</td>
                            <td>{{$infos->privacy,20}}</td>
                            <td>{{$infos->refund,20  }}</td>
                            <td> {{ $infos->terms,20  }}<td>
                            
                            <td>
                                <div class="d-flex">
                                    <a href="{{url('/information/edit/'.$infos->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('/information/deleteinfo/'.$infos->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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