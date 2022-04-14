@extends('frontend.master')
@section('title')
Order Details
@endsection
@section('content')

 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>All Orders</h4>
                        <div class="breadcrumb__links">
                            <a href="index.html">Home</a>
                            <a href="shop.html">Shop</a>
                            <span>Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
<div class="ms-content-wrapper">
      <div class="row" style="padding: 30px;">

        <div class="col-md-12">
         

          <div class="ms-panel">
            <div class="ms-panel-header">
           
            
              
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
                        <th> Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($orders as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->total }} Tk</td>
                        <td>Hand Cash</td>
                        <td>{{ $row->status }}</td>
                        
                        <td>
                            @if($row->status == 'panding')
                            <span class="badge badge-success">Panding</span>
                            @else
                            <span class="badge badge-success">Delivery</span>
                            @endif
                            
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