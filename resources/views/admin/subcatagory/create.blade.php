
@extends('admin.master')


@section('maincontent')
    <main class="app-mainhphp">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">
              <!--begin::Col-->
              <div class="col-12">
                
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-md-12">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header">
                    <div class="card-title">Sub Catagory</div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form method="POST" action="{{url('/product/subcatagory-manage/post')}}" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                        <label for="catagoryname" class="form-label"> Select Sub Catagory </label>
                        <select name="cat_id" id="cat_id" required class="form-control">
                            @foreach ($catagory as  $catagories)
                                <option value="{{$catagories->id}}">{{$catagories->name}}</option>
                            @endforeach
                            
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="catagoryname" class="form-label">Sub Catagory name</label>
                        <input type="text" class="form-control" id="name" name="name" />
                      </div>
                      
                      <div class="card-body">
                      
                      
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
                <!--end::Quick Example-->
                <!--begin::Input Group-->
                
                <!--end::Input Group-->
                <!--begin::Horizontal Form-->
               
                <!--end::Horizontal Form-->
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
     
@endsection