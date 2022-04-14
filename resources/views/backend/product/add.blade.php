@extends('backend.master')
@section('title')
Add Product
@endsection
@section('content')
<div class="ms-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="material-icons">home</i> Home</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Day Care</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Create Day care</li>
            </ol>
            <div class="d-flax">
                <a href="{{ route('manage.product') }}" class="btn btn-success float-right">All Day Care</a>
            </div>
          </nav>
        </div>
        <div class="col-xl-3"></div>
        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6 style="text-align:center;"> Create Day Care</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('product.store') }}" method="post" class=" clearfix" enctype="multipart/form-data">
                  @csrf
                <div class="form-row">
                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Select Category</label>
                    <div class="input-group">
                      <select class="form-control"  name="category_id" required>
                      <option>Select Category</option>
                         @foreach($categorys as $row)
                          <option value="{{$row->id}}">{{$row->categoty_name}}</option>
                         @endforeach
                      </select>
                      
                    </div>
                  </div>


                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10"> Name </label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom10" placeholder="Name" name="name" required>
                      <div class="invalid-feedback">
                        Please provide name
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                      <label for="validationCustom10">Price </label>
                      <div class="input-group">
                      <input type="number" class="form-control" id="validationCustom10" placeholder="Price" name="price" required>
                      <div class="invalid-feedback">
                          Please provide price
                      </div>
                      </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Details  </label>
                    <div class="input-group">
                      
                      <textarea class="form-control" id="validationCustom10" placeholder="Details" name="details" rows="5" required></textarea>
                      <div class="invalid-feedback">
                        Please provide details
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Image</label>
                    <div class="input-group">
                      <input type="file" class="form-control" id="validationCustom10" placeholder="Coupon cart min value" name="image" required>
                      
                    </div>
                  </div>


             

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Status</label>
                    <div class="input-group">
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option  value="0">Inactive</option>
                        </select>
                    </div>
                  </div>

                  
                </div>
                <button class="btn btn-info float-right" type="submit">Save Day Care</button>
              </form>
            </div>
          </div>
        </div>
  
       

    
  
      </div>
    </div>
@endsection