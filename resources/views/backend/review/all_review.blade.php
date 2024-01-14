@extends('admin.admin_master')

@section('admin')

<div class="content-body" style="min-height: 788px;">
<div class="container-fluid">
<!-- Add review -->
<div class="modal fade" id="addreviewSidebar">
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
            <h4 class="card-title">ALL REVIEWS</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            
                            
                           
                            <th><strong>client_name</strong></th>
                            <th><strong>client_reviews</strong></th>
                            <th><strong>client_photo</strong></th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($review as $reviews)
                        <tr>
                          
                            
                            <td><img src="{{asset($reviews->client_photo)}}" style="height:100px;width:100px"/></td>
                            <td>{{$reviews->client_name,20  }}</td>
                            <td> {{ $reviews->client_reviews,20  }}</td>
                            
                            <td>
                                <div class="d-flex">
                                    <a href="{{url('/review/edit/'.$reviews->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('/review/delete/'.$reviews->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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