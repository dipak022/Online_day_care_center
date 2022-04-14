@extends('backend.master')
@section('title')
 Delivery Account Create 
@endsection
@section('content')
<div class="ms-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="material-icons">home</i> Home</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Delivery</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page"> Delivery Boy Account Create</li>
            </ol>
            <div class="d-flax">
                <a href="{{ route('manage.delivery') }}" class="btn btn-success float-right">All Delivery Boy </a>
            </div>
          </nav>
        </div>
        <div class="col-xl-3"></div>
        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6 style="text-align:center;"> Delivery Boy Account Create</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('delivery.store') }}" method="post" class=" clearfix" >
                  @csrf
                <div class="form-row">
                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Delivery Boy Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom10" placeholder="Delivery Boy Name" name="delivery_boy_name" required>
                      <div class="invalid-feedback">
                        Please provide delivery boy name
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Delivery Boy Phone Number</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="validationCustom10" placeholder="Delivery Boy Phone Number" name="delivery_boy_phone" required>
                      <div class="invalid-feedback">
                        Please provide delivery boy phone number
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Delivery Boy Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" id="validationCustom10" placeholder="Delivery Boy Password" name="delivery_boy_password" required>
                      <div class="invalid-feedback">
                        Please provide delivery boy password
                      </div>
                    </div>
                  </div>
                 

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Delivery Boy Status</label>
                    <div class="input-group">
                        <select name="delivery_boy_status" class="form-control">
                            <option value="1">Active</option>
                            <option  value="0">Inactive</option>
                        </select>
                    </div>
                  </div>

                  
                </div>
                <button class="btn btn-info float-right" type="submit">Create Account</button>
              </form>
            </div>
          </div>
        </div>
  

      </div>
    </div>
@endsection