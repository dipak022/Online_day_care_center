@extends('backend.master')
@section('title')
Manage Order
@endsection
@section('content')
<div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Order</a></li>
              <li class="breadcrumb-item active" aria-current="page">Order List</li>
            </ol>
          </nav>






          <div class="ms-panel">
            <div class="ms-panel-header">
           
              <h6>Order List</h6>
              
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Total</th>
                        <th>Payment Type</th>
                        <th>Status</th>
                        <th> Status Change</th>
                        <th>Action</th>
                        <th>Drop Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($orders as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->total }}</td>
                        <td>{{ $row->payment_type }}</td>
                        <td>{{ $row->status }}</td>
                        
                        <td>
                            @if($row->status == 'panding')
                            <span class="badge badge-success">Panding</span>
                            @else
                            <span class="badge badge-success">Delivery</span>
                            @endif
                            
                        </td>
                     
                        <td>
                            <div class="dropdown show">
                                <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Status
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @if($row->status=="panding")
                                    <a class="dropdown-item" href="{{ route('active.delivery',$row->id) }}">delivery</a>
                                    @else
                                    
                                    <span class="badge badge-success">Delivery Done</span>
                                   
                                    @endif
                                   
                                </div>
                            </div>
                           
                        </td>
                        <td> <a  class="btn-sm btn-danger" href="{{route('delete.report',$row->id)}}"><i class='far fa-trash-alt ms-text-danger'></i>Delete</a></td>

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


@endsection

