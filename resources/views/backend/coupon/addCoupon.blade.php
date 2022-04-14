@extends('backend.master')
@section('title')
Add Coupon
@endsection
@section('content')
<div class="ms-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="material-icons">home</i> Home</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Coupon</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Create Coupon</li>
            </ol>
            <div class="d-flax">
                <a href="{{ route('manage.coupon') }}" class="btn btn-success float-right">All Coupon</a>
            </div>
          </nav>
        </div>
        <div class="col-xl-3"></div>
        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6 style="text-align:center;"> Create Coupon</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('coupon.store') }}" method="post" class=" clearfix" >
                  @csrf
                <div class="form-row">
                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Coupon code</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom10" placeholder="Coupon code" name="coupon_code" required>
                      <div class="invalid-feedback">
                        Please provide coupon code
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Coupon Type</label>
                    <div class="input-group">
                        <select name="coupon_type" class="form-control">
                            <option value="1">Percentance</option>
                            <option  value="0">Fixed</option>
                        </select>
                    </div>
                  </div>



                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Coupon value</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="validationCustom10" placeholder="Coupon value" name="coupon_value" required>
                      <div class="invalid-feedback">
                        Please provide Coupon value
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Coupon cart min value</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="validationCustom10" placeholder="Coupon cart min value" name="cart_min_value" required>
                      <div class="invalid-feedback">
                        Please provide Coupon cart min value
                      </div>
                    </div>
                  </div>


                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Added On</label>
                    <div class="input-group">
                      <input type="date" class="form-control" id="validationCustom10" placeholder="Added On" name="added_on" required>
                      <div class="invalid-feedback">
                        Please provide Added date
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Expired On</label>
                    <div class="input-group">
                      <input type="date" class="form-control" id="validationCustom10" placeholder="Expired On" name="expired_on" required>
                      <div class="invalid-feedback">
                        Please provide Expired date
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Coupon Status</label>
                    <div class="input-group">
                        <select name="coupon_status" class="form-control">
                            <option value="1">Active</option>
                            <option  value="0">Inactive</option>
                        </select>
                    </div>
                  </div>

                  
                </div>
                <button class="btn btn-info float-right" type="submit">Save Coupon</button>
              </form>
            </div>
          </div>
        </div>
  
       

    
  
      </div>
    </div>
@endsection