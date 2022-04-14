@extends('backend.master')
@section('title')
Manage Product
@endsection
@section('content')
<div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Day Care</a></li>
              <li class="breadcrumb-item active" aria-current="page">Day Care List</li>
            </ol>
          </nav>






          <div class="ms-panel">
            <div class="ms-panel-header">
            <a href="{{ route('product') }}" class="btn btn-sm btn-info float-right">Add Day Care</a>
              <h6>Day Care List</h6>
              
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Details</th>
                        <th>Status</th>
                        <th> Status Change</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($products as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->categoty_name }}</td>
                        <td> 
                            <img src="{{ asset($row->image) }}" alt="images" width="100" height="100">
                        </td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->price }}</td>
                        <td>{{ $row->details }}</td>
                        
                        <td>
                            @if($row->status == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-info">Inactive</span>
                            @endif
                            
                        </td>
                     
                        <td>
                            <div class="dropdown show">
                                <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Status
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @if($row->status==1)
                                    <a class="dropdown-item" href="{{ route('active.product',$row->id) }}">Deactive</a>
                                    @else
                                    <a class="dropdown-item"  href="{{ route('inactive.product',$row->id) }}">Active </a>
                                    @endif
                                   
                                </div>
                            </div>
                        </td>
                        <td>
                            <a type="button" data-toggle="modal" data-target="#edit_{{$row->id}}"><i class='fas fa-pencil-alt text-secondary'  ></i></a>
                            <a  href="{{route('delete.product',$row->id)}}"><i class='far fa-trash-alt ms-text-danger'></i></a>
                        </td>
                    </tr>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="edit_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Day Care</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('product.update') }}" method="post" class=" clearfix" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$row->id}}" >
                                <div class="modal-body">
                                    <div class="form-row">
                                    
                                       
                                        <div class="form-row">
                                            <div class="col-xl-12 col-md-12 mb-3">
                                                <label for="validationCustom10">Select Category</label>
                                                <div class="input-group">
                                                <select class="form-control"  name="category_id" required>
                                                <option>Select Category</option>
                                                    @foreach($categorys as $rows)
                                                    <option {{ $row->category_id == $rows->id ? "selected" : "" }} value="{{$rows->id}}">{{$rows->categoty_name}}</option>
                                                    @endforeach
                                                </select>
                                                
                                                </div>
                                            </div>


                                            <div class="col-xl-12 col-md-12 mb-3">
                                                <label for="validationCustom10"> Name </label>
                                                <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom10" placeholder="Name" name="name" value="{{$row->name}}" required>
                                                <div class="invalid-feedback">
                                                    Please provide name
                                                </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-md-12 mb-3">
                                                <label for="validationCustom10">Price </label>
                                                <div class="input-group">
                                                <input type="number" class="form-control" id="validationCustom10" placeholder="Price" name="price" value="{{$row->price}}" required>
                                                <div class="invalid-feedback">
                                                    Please provide price
                                                </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-md-12 mb-3">
                                                <label for="validationCustom10">Details  </label>
                                                <div class="input-group">
                                                
                                                <textarea class="form-control" id="validationCustom10" placeholder="Details" name="details" rows="5"  required> {{$row->details}}</textarea>
                                                <div class="invalid-feedback">
                                                    Please provide details
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 mb-3">
                                                <label for="validationCustom10">Old Image</label>
                                                <div class="input-group">
                                                <img src="{{ asset($row->image) }}" alt="images" width="100" height="100">
                                                <input type="hidden" name="oldimage" value="{{$row->image}}" >
                                            </div>
                                            <div class="col-xl-12 col-md-12 mb-3">
                                                <label for="validationCustom10">New Image</label>
                                                <div class="input-group">
                                                
                                                <input type="file" class="form-control" id="validationCustom10" placeholder="Coupon cart min value" name="image" >
                                                
                                            </div>
                                         </div>


                                       

                                        


                                        

                                        
                                    </div>
                                    
                                    
                                </div>    
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update Day Care</button>
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

