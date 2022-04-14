@extends('backend.master')
@section('title')
Add Banner
@endsection
@section('content')
<div class="ms-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="material-icons">home</i> Home</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Banner</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Create Banner</li>
            </ol>
            <div class="d-flax">
                <a href="{{ route('manage.banner') }}" class="btn btn-success float-right">All Banner</a>
            </div>
          </nav>
        </div>
        <div class="col-xl-3"></div>
        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6 style="text-align:center;"> Create Banner</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('banner.store') }}" method="post" class=" clearfix" enctype="multipart/form-data">
                  @csrf
                <div class="form-row">
                 


                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Banner Title </label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom10" placeholder="title" name="title" required>
                      <div class="invalid-feedback">
                        Please provide title
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Banner Short Title </label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom10" placeholder="Short title" name="Short_title" required>
                      <div class="invalid-feedback">
                        Please provide title
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Banner offer percentage </label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="validationCustom10" placeholder="offer percentage" name="offer_percentage" required>
                      <div class="invalid-feedback">
                        Please provide title
                      </div>
                    </div>
                  </div>


                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Banner duration</label>
                    <div class="input-group">
                        <select name="duration" class="form-control">
                            <option  value="day" >Day</option>
                            <option  value="week">Week</option>
                            <option  value="month">Month</option>
                        </select>
                    </div>
                  </div>



                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Image</label>
                    <div class="input-group">
                      <input type="file" class="form-control" id="validationCustom10" placeholder="Coupon cart min value" name="image" required>
                      
                    </div>
                  </div>


             

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Banner Status</label>
                    <div class="input-group">
                        <select name="banner_status" class="form-control">
                            <option value="1">Active</option>
                            <option  value="0">Inactive</option>
                        </select>
                    </div>
                  </div>

                  
                </div>
                <button class="btn btn-info float-right" type="submit">Save Banner</button>
              </form>
            </div>
          </div>
        </div>
  
       

    
  
      </div>
    </div>
@endsection