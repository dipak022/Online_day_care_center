@extends('backend.master')
@section('title')
Manage category
@endsection
@section('content')
<div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Category</a></li>
              <li class="breadcrumb-item active" aria-current="page">Category List</li>
            </ol>
          </nav>






          <div class="ms-panel">
            <div class="ms-panel-header">
            <a href="{{ route('category') }}" class="btn btn-sm btn-info float-right">Add Category</a>
              <h6>Category List</h6>
              
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Category Name</th>
                        <th>Order Number</th>
                        <th>Created Date</th>
                        <th>Category Status</th>
                        <th> Status Change</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($categoryes as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->categoty_name }}</td>
                        <td>{{ $row->order_number }}</td>
                        <td>{{ $row->added_on }}</td>
                        <td>
                            @if($row->categoty_status)
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
                                    @if($row->categoty_status==1)
                                    <a class="dropdown-item" href="{{ route('active.category',$row->id) }}">Deactive</a>
                                    @else
                                    <a class="dropdown-item"  href="{{ route('inactive.category',$row->id) }}">Active </a>
                                    @endif
                                   
                                </div>
                            </div>
                        </td>
                        <td>
                            <a type="button" data-toggle="modal" data-target="#edit_{{$row->id}}"><i class='fas fa-pencil-alt text-secondary'  ></i></a>
                            <a  href="{{route('delete.category',$row->id)}}"><i class='far fa-trash-alt ms-text-danger'></i></a>
                        </td>
                    </tr>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="edit_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('category.update') }}" method="post" class=" clearfix" >
                                @csrf
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="col-xl-12 col-md-12 mb-3">
                                            <label for="validationCustom10">Category Name</label>
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$row->id}}">
                                                <input type="text" class="form-control" id="validationCustom10" placeholder="Category Name" name="categoty_name" value="{{$row->categoty_name}}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12 mb-3">
                                            <label for="validationCustom10">Order Number</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="validationCustom10" placeholder="Order Number" name="order_number" value="{{$row->order_number}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update Category</button>
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

