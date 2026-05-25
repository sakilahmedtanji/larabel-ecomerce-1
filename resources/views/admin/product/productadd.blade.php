
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
                    <div class="card-title">Product add</div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form method="POST" action="{{url('/product/product-manage/post')}}" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="catagoryname" class="form-label">Catagory name</label>
                        <input type="text" class="form-control" id="name" name="name" />
                      </div>
                      <div class="mb-3">
                        <label for="catagoryname" class="form-label">Catagory name</label>
                        <input type="text" class="form-control" id="cat_id" name="cat_id" />
                      </div>
                      <div class="mb-3">
                        <label for="catagoryname" class="form-label">Catagory name</label>
                        <input type="text" class="form-control" id="subcat_id" name="subcat_id" />
                      </div>
                      <div class="mb-3">
                        <label for="catagoryname" class="form-label">Catagory name</label>
                        <input type="text" class="form-control" id="name" name="name" />
                      </div>
                      <div class="mb-3">
                        <label for="catagoryname" class="form-label">Catagory name</label>
                        <input type="text" class="form-control" id="name" name="name" />
                      </div>
                      <div class="mb-3">
                        <label for="catagoryname" class="form-label">Catagory name</label>
                        <input type="text" class="form-control" id="name" name="name" />
                      </div>
                      <div class="mb-3">
                        <label for="catagoryname" class="form-label">Catagory name</label>
                        <input type="text" class="form-control" id="name" name="name" />
                      </div>
                      <div class="mb-3">
                        <label for="catagoryname" class="form-label">Catagory name</label>
                        <input type="text" class="form-control" id="name" name="name" />
                      </div>
                      <div class="mb-3">
                        <label for="catagoryname" class="form-label">Catagory name</label>
                        <input type="text" class="form-control" id="name" name="name" />
                      </div>
                      <div class="mb-3">
                        <label for="catagoryname" class="form-label">Catagory name</label>
                        <input type="text" class="form-control" id="name" name="name" />
                      </div>
                      <div class="mb-3">
                        <label for="catagoryname" class="form-label">Catagory name</label>
                        <input type="text" class="form-control" id="name" name="name" />
                      </div>

                      <div class="input-group mb-3">
                        <input type="file" class="form-control" name="image" id="inputGroupFile02" accept="image/*" required/>
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                      </div>
                      
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