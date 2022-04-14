@extends('backend.master')
@section('title')
Add category
@endsection
@section('content')
<div class="ms-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="material-icons">home</i> Home</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Category</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Create Category</li>
            </ol>
            <div class="d-flax">
                <a href="{{ route('manage.category') }}" class="btn btn-success float-right">All Category</a>
            </div>
          </nav>
        </div>
        <div class="col-xl-3"></div>
        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6 style="text-align:center;"> Create Category</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('category.store') }}" method="post" class=" clearfix" >
                  @csrf
                <div class="form-row">
                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Category Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom10" placeholder="Category Name" name="categoty_name" required>
                      <div class="invalid-feedback">
                        Please provide category name
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Order Number</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="validationCustom10" placeholder="Order Number" name="order_number" required>
                      <div class="invalid-feedback">
                        Please provide order number
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Added On</label>
                    <div class="input-group">
                      <input type="date" class="form-control" id="validationCustom10" placeholder="Added On" name="added_on" required>
                      <div class="invalid-feedback">
                        Please provide date
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Category Status</label>
                    <div class="input-group">
                        <select name="categoty_status" class="form-control">
                            <option value="1">Active</option>
                            <option  value="0">Inactive</option>
                        </select>
                    </div>
                  </div>

                  
                </div>
                <button class="btn btn-info float-right" type="submit">Save Category</button>
              </form>
            </div>
          </div>
        </div>
  
       

    
  
      </div>
    </div>
@endsection