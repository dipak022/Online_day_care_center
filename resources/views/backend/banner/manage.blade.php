@extends('backend.master')
@section('title')
Manage Banner
@endsection
@section('content')
<div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Product</a></li>
              <li class="breadcrumb-item active" aria-current="page">Banner List</li>
            </ol>
          </nav>






          <div class="ms-panel">
            <div class="ms-panel-header">
            <a href="{{ route('banner') }}" class="btn btn-sm btn-info float-right">Add Banner</a>
              <h6>Banner List</h6>
              
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Short title</th>
                        <th>Image</th>
                        <th>Offer percentage</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th> Status Change</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($banners as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->Short_title }}</td>
                        <td> 
                            <img src="{{ asset($row->image) }}" alt="images" width="100" height="100">
                        </td>
                        <td>{{ $row->offer_percentage }} %</td>
                        
                        <td>
                            @if($row->duration == "day")
                            <span class="badge badge-success">Day</span>
                            @elseif($row->duration == "week")
                            <span class="badge badge-info">Week</span>
                            @else
                            <span class="badge badge-primary">Month</span>
                            @endif
                            
                        </td>
                        <td>
                            @if($row->banner_status == 1)
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
                                    @if($row->banner_status==1)
                                    <a class="dropdown-item" href="{{ route('active.banner',$row->id) }}">Deactive</a>
                                    @else
                                    <a class="dropdown-item"  href="{{ route('inactive.banner',$row->id) }}">Active </a>
                                    @endif
                                   
                                </div>
                            </div>
                        </td>
                        <td>
                            <a type="button" data-toggle="modal" data-target="#edit_{{$row->id}}"><i class='fas fa-pencil-alt text-secondary'  ></i></a>
                            <a  href="{{route('delete.banner',$row->id)}}"><i class='far fa-trash-alt ms-text-danger'></i></a>
                        </td>
                    </tr>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="edit_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Banner</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('banner.update') }}" method="post" class=" clearfix" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$row->id}}" >
                                <div class="modal-body">
                                    <div class="form-row">
                                    
                                        <div class="col-xl-12 col-md-12 mb-3">
                                            <label for="validationCustom10">Banner Title </label>
                                            <div class="input-group">
                                            <input type="text" class="form-control" id="validationCustom10" placeholder="title" name="title" value="{{$row->title}}" required>
                                            <div class="invalid-feedback">
                                                Please provide title
                                            </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-md-12 mb-3">
                                            <label for="validationCustom10">Banner Short Title </label>
                                            <div class="input-group">
                                            <input type="text" class="form-control" id="validationCustom10" placeholder="Short title" name="Short_title" value="{{$row->Short_title}}" required>
                                            <div class="invalid-feedback">
                                                Please provide title
                                            </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-md-12 mb-3">
                                            <label for="validationCustom10">Banner offer percentage </label>
                                            <div class="input-group">
                                            <input type="number" class="form-control" id="validationCustom10" placeholder="offer percentage" name="offer_percentage" value="{{$row->offer_percentage}}" required>
                                            <div class="invalid-feedback">
                                                Please provide title
                                            </div>
                                            </div>
                                        </div>


                                        <div class="col-xl-12 col-md-12 mb-3">
                                            <label for="validationCustom10">Banner duration</label>
                                            <div class="input-group">
                                                <select name="duration" class="form-control">
                                                <option {{ $row->duration == 'day' ? "selected" : "" }} value="day" >Day</option>
                                                <option {{ $row->duration == 'week' ? "selected" : "" }} value="week">Week</option>
                                                <option {{ $row->duration == 'month' ? "selected" : "" }} value="month">Month</option>
                                                </select>
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
                                    <button type="submit" class="btn btn-primary">Update Banner</button>
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

