@extends('backend.master')
@section('title')
Manage Coupon
@endsection
@section('content')
<div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Coupon</a></li>
              <li class="breadcrumb-item active" aria-current="page">Coupon List</li>
            </ol>
          </nav>






          <div class="ms-panel">
            <div class="ms-panel-header">
            <a href="{{ route('coupon') }}" class="btn btn-sm btn-info float-right">Add Coupon</a>
              <h6>Coupon List</h6>
              
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Coupon Code</th>
                        <th>Coupon Type</th>
                        <th>Coupon Value</th>
                        <th>Cart min value</th>
                        <th>Added Date</th>
                        <th>Expired Date</th>
                        <th> Status Change</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($coupons as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->coupon_code }}</td>
                        <td>{{ $row->coupon_value }}</td>
                        <td>{{ $row->cart_min_value }}</td>
                        <td>{{ $row->added_on }}</td>
                        <td>{{ $row->expired_on }}</td>
                        <td>
                            @if($row->coupon_type == 1)
                            <span class="badge badge-success">Percentance</span>
                            @else
                            <span class="badge badge-info">Fixrd</span>
                            @endif
                            
                        </td>
                        <td>
                            @if($row->coupon_status==1)
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
                                    @if($row->coupon_status==1)
                                    <a class="dropdown-item" href="{{ route('active.coupon',$row->id) }}">Deactive</a>
                                    @else
                                    <a class="dropdown-item"  href="{{ route('inactive.coupon',$row->id) }}">Active </a>
                                    @endif
                                   
                                </div>
                            </div>
                        </td>
                        <td>
                            <a type="button" data-toggle="modal" data-target="#edit_{{$row->id}}"><i class='fas fa-pencil-alt text-secondary'  ></i></a>
                            <a  href="{{route('delete.coupon',$row->id)}}"><i class='far fa-trash-alt ms-text-danger'></i></a>
                        </td>
                    </tr>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="edit_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Coupon</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('coupon.update') }}" method="post" class=" clearfix" >
                                @csrf
                                <input type="hidden" name="id" value="{{$row->id}}" >
                                <div class="modal-body">
                                    <div class="form-row">
                                    
                                        <div class="col-xl-12 col-md-12 mb-3">
                                            <label for="validationCustom10">Coupon code</label>
                                            <div class="input-group">
                                            <input type="text" class="form-control" id="validationCustom10" placeholder="Coupon code" name="coupon_code" value="{{$row->coupon_code}}" required>
                                            <div class="invalid-feedback">
                                                Please provide coupon code
                                            </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-md-12 mb-3">
                                            <label for="validationCustom10">Coupon Type</label>
                                            <div class="input-group">
                                                <select name="coupon_type" class="form-control">
                                                    <option {{ $row->coupon_type == 1 ? "selected" : "" }} value="1">Percentance</option>
                                                    <option {{ $row->coupon_type == 0 ? "selected" : "" }}  value="0">Fixed</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="col-xl-12 col-md-12 mb-3">
                                            <label for="validationCustom10">Coupon value</label>
                                            <div class="input-group">
                                            <input type="number" class="form-control" id="validationCustom10" placeholder="Coupon value" name="coupon_value" value="{{$row->coupon_value}}" required>
                                            <div class="invalid-feedback">
                                                Please provide Coupon value
                                            </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-md-12 mb-3">
                                            <label for="validationCustom10">Coupon cart min value</label>
                                            <div class="input-group">
                                            <input type="number" class="form-control" id="validationCustom10" placeholder="Coupon cart min value" value="{{$row->cart_min_value}}" name="cart_min_value" required>
                                            <div class="invalid-feedback">
                                                Please provide Coupon cart min value
                                            </div>
                                            </div>
                                        </div>


                                        <div class="col-xl-12 col-md-12 mb-3">
                                            <label for="validationCustom10">Added On</label>
                                            <div class="input-group">
                                            <input type="date" class="form-control" id="validationCustom10" placeholder="Added On" name="added_on" value="{{$row->added_on}}">
                                            <div class="invalid-feedback">
                                                Please provide Added date
                                            </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-md-12 mb-3">
                                            <label for="validationCustom10">Expired On</label>
                                            <div class="input-group">
                                            <input type="date" class="form-control" id="validationCustom10" placeholder="Expired On" name="expired_on" value="{{$row->expired_on}}">
                                            <div class="invalid-feedback">
                                                Please provide Expired date
                                            </div>
                                        </div
                                    </div>
                                    
                                    
                                </div>    
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update Coupon</button>
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

