@extends('admin.master')
@section('maincontent')
    <main class="app-main py-4">
    <div class="app-content-header mb-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0 text-dark fw-bold">Policy Management</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Policy</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 col-12">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center">
                            <div class="icon-shape bg-primary-soft text-primary me-2 rounded-2 p-2">
                                <i class="bi bi-folder-plus fs-5"></i>
                            </div>
                            <h5 class="card-title mb-0 fw-semibold text-secondary">Privacy policy update</h5>
                        </div>
                        
                        <form method="POST" action="{{ url('/Policy-settings/update') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            
                            <div class="card-body p-4">
                                
                               

                                <div class="mb-3">
                                    <label for="name" class="form-label fw-medium text-secondary">
                                        Privacy Policy <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="privacy_policy" id="privacy_policy" cols="30" rows="10" class="form-control">{{$policy->privacy_policy}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-medium text-secondary">
                                        Terms And conditon<span class="text-danger">*</span>
                                    </label>
                                    <textarea name="terms_conditions" id="terms_conditions" cols="30" rows="10" class="form-control">{{$policy->terms_conditions}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-medium text-secondary">
                                        Refund Policy <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="refund_policy" id="refund_policy" cols="30" rows="10" class="form-control">{{$policy->refund_policy}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-medium text-secondary">
                                        Payment Policy  <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="payment_plicy" id="payment_plicy" cols="30" rows="10" class="form-control">{{$policy->payment_plicy}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-medium text-secondary">
                                       About us<span class="text-danger">*</span>
                                    </label>
                                    <textarea name="about_us" id="about_us" cols="30" rows="10" class="form-control">{{$policy->about_us}}</textarea>
                                </div>
                                
                            </div>
                            <div class="card-footer bg-light p-3 d-flex justify-content-end gap-2">
                                <button type="reset" class="btn btn-light border fw-medium px-4">Reset</button>
                                <button type="submit" class="btn btn-primary fw-medium px-4 shadow-sm">
                                    <i class="bi bi-plus-lg me-1"></i> Save Privacy Policy
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </main>
@endsection
@push('java')
    <script>
        $(document).ready(function() {
            // Summernote Editors Initialization
            $('#privacy_policy').summernote({
                placeholder: 'Write gorgeous description here...',
                tabsize: 2,
                height: 200
            });
            $('#terms_conditions').summernote({
                placeholder: 'Write gorgeous description here...',
                tabsize: 2,
                height: 200
            });
            $('#refund_policy').summernote({
                placeholder: 'Write gorgeous description here...',
                tabsize: 2,
                height: 200
            });
            $('#payment_plicy').summernote({
                placeholder: 'Write gorgeous description here...',
                tabsize: 2,
                height: 200
            });
            $('#about_us').summernote({
                placeholder: 'Write dynamic product policies here...',
                tabsize: 2,
                height: 150
            });
        });
    </script>
@endpush