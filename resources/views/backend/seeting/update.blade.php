@extends('backend.master')
@section('title')
Update Website information
@endsection
@section('content')
<div class="ms-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="material-icons">home</i> Home</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Seeting</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Update Website information</li>
            </ol>
            
          </nav>
        </div>
        <div class="col-xl-3"></div>
        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6 style="text-align:center;"> Update Website information</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('setting.update') }}" method="post" class=" clearfix" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{ $setting->id}}">
                <div class="form-row">
                 


                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Email </label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom10" placeholder="Email" name="email" value="{{ $setting->email}}" required>
                      <div class="invalid-feedback">
                        Please provide title
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Phone </label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom10" placeholder="Phone" name="phone" value="{{ $setting->phone}}" required>
                      <div class="invalid-feedback">
                        Please provide title
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Detail </label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom10" placeholder="Detail" name="detail" value="{{ $setting->detail}}" required>
                      <div class="invalid-feedback">
                        Please provide title
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Facebookb link </label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom10" placeholder="Facebookb link" name="facebookb_link" value="{{ $setting->facebookb_link}}" required>
                      <div class="invalid-feedback">
                        Please provide title
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Twiter link </label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom10" placeholder="Twiter link" name="twiter_link" value="{{ $setting->twiter_link}}" required>
                      <div class="invalid-feedback">
                        Please provide title
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Instragram link </label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom10" placeholder="Instragram link" name="instragram_link" value="{{ $setting->instragram_link}}" required>
                      <div class="invalid-feedback">
                        Please provide title
                      </div>
                    </div>
                  </div>


                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Linkdin link </label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom10" placeholder="Linkdin link" name="linkdin_link" value="{{ $setting->linkdin_link}}" required>
                      <div class="invalid-feedback">
                        Please provide title
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Old Image</label>
                    <div class="input-group">
                        <img src="{{ asset($setting->image) }}" alt="images" width="100" height="100">
                        <input type="hidden" name="oldimage" value="{{$setting->image}}" >
                    </div>
                 </div>




                  <div class="col-xl-12 col-md-12 mb-3">
                    <label for="validationCustom10">Image</label>
                    <div class="input-group">
                      <input type="file" class="form-control" id="validationCustom10" placeholder="Coupon cart min value" name="image">
                      
                    </div>
                  </div>



                </div>
                <button class="btn btn-info float-right" type="submit">Update  Info</button>
              </form>
            </div>
          </div>
        </div>
  
       

    
  
      </div>
    </div>
@endsection