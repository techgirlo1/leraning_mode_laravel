@extends('admin.admin_master')

@section('admin')

<div class="content-body" style="min-height: 788px;">
<div class="container-fluid">
<!-- Add footer -->
<div class="modal fade" id="addfooterSidebar">
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
            <h4 class="card-title">All Footer</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            
                            
                           
                            <th><strong>address</strong></th>
                            <th><strong>email</strong></th>
                            <th><strong>phone</strong></th>
                            <th><strong>instagram Link</strong></th>
                            <th><strong>linkden link</strong></th>
                            <th><strong>behance</strong></th>
                           
                           
                        
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($footer as $footers)
                        <tr>
                          
                            
                            
                            <td>{{$footers->address,20  }}</td>
                            <td> {{ $footers->email,20  }}</td>
                            <td> {{ $footers->phone,20  }}</td>
                            <td> {{ $footers->instagram,20  }}</td>
                            <td> {{ $footers->linkden,20  }}</td>
                            <td> {{ $footers->behance,20  }}</td>
                            
                            <td>
                                <div class="d-flex">
                                    <a href="{{url('/footer/edit/'.$footers->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('/footer/delete/'.$footers->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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