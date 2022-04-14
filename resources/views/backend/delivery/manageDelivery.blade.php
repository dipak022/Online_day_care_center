@extends('backend.master')
@section('title')
Manage delivery boy account
@endsection
@section('content')
<div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Delivery</a></li>
              <li class="breadcrumb-item active" aria-current="page">Delivery Boy Account List</li>
            </ol>
          </nav>

          <div class="ms-panel">
            <div class="ms-panel-header">
            <a href="{{ route('delivery') }}" class="btn btn-sm btn-info float-right">Create deliveryboy account</a>
              <h6>Delivery Boy Account List</h6>
              
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Delivery Name</th>
                        <th>Delivery Phone</th>
                        <th>Category Status</th>
                        <th> Status Change</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($delivery_boys as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->delivery_boy_name }}</td>
                        <td>{{ $row->delivery_boy_phone }}</td>
                        <td>
                            @if($row->delivery_boy_status)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inctive</span>
                            @endif
                            
                        </td>
                        <td>
                            <div class="dropdown show">
                                <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Status
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @if($row->delivery_boy_status==1)
                                    <a class="dropdown-item" href="{{ route('active.delivery',$row->id) }}">Deactive</a>
                                    @else
                                    <a class="dropdown-item"  href="{{ route('inactive.delivery',$row->id) }}">Active </a>
                                    @endif
                                   
                                </div>
                            </div>
                        </td>
                        <td>
                            <a type="button" data-toggle="modal" data-target="#edit_{{$row->id}}"><i class='fas fa-pencil-alt text-secondary'  ></i></a>
                            <a  href="{{route('delete.delivery',$row->id)}}"><i class='far fa-trash-alt ms-text-danger'></i></a>
                        </td>
                    </tr>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="edit_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Delivery Boy Account</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('delivery.update') }}" method="post" class=" clearfix" >
                                @csrf
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="col-xl-12 col-md-12 mb-3">
                                            <label for="validationCustom10">Category Name</label>
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$row->id}}">
                                                <input type="text" class="form-control" id="validationCustom10" placeholder="Delivery boy name" name="delivery_boy_name" value="{{$row->delivery_boy_name}}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12 mb-3">
                                            <label for="validationCustom10">Order Number</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="validationCustom10" placeholder="Delivery boy phone number" name="delivery_boy_phone" value="{{$row->delivery_boy_phone}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update Delivery Boy</button>
                                </div>
                            </form> 
                            </div>
                        </div>
                    </div>
                    @endforeach

                </tbody>
            
            </table>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>


@endsection

