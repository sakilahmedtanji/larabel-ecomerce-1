@extends('customer.master')

@section('content')

<div class="container-fluid mt-4 mb-4">

    <div class="row justify-content-center">

        <div class="col-md-10">

            <div class="card bg-dark text-light border-0 shadow-lg">

                <div class="card-header">
                    <h4 class="mb-0">Profile Information Form</h4>
                </div>

                <div class="card-body">

                    <form action="{{ url('/customer/profile-update') }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <!-- Name -->
                        <div class="mb-3">

                            <label class="form-label">Name</label>

                            <input type="text"
                                name="name"
                                value="{{ $authuserid->name }}"
                                class="form-control"
                                placeholder="Enter your name">

                        </div>

                        <!-- Email -->
                        <div class="mb-3">

                            <label class="form-label">Email</label>

                            <input type="email"
                                name="email"
                                value="{{ $authuserid->email }}"
                                class="form-control"
                                placeholder="Enter your email">

                        </div>

                        <!-- Phone -->
                        <div class="mb-3">

                            <label class="form-label">Phone</label>

                            <input type="text"
                                name="phone"
                                value="{{ $authuserid->phone }}"
                                class="form-control"
                                placeholder="Enter your phone number">

                        </div>

                        <!-- Image -->
                        <div class="mb-3">

                            <label class="form-label">Profile Image</label>

                            <input type="file"
                                name="image"
                                class="form-control">

                        </div>

                        <!-- Image Preview -->
                        <div class="mb-4">

                            @if($authuserid->image != null)

                                <img src="{{ asset($authuserid->image) }}"
                                    alt="Profile Image"
                                    width="120"
                                    height="120"
                                    class="rounded-circle border"
                                    style="object-fit: cover;">

                            @else

                                <img src="{{ asset('Customer/Image/Logo.png') }}"
                                    alt="Default Image"
                                    width="120"
                                    height="120"
                                    class="rounded-circle border"
                                    style="object-fit: cover;">

                            @endif

                        </div>

                        <!-- Submit -->
                        <button type="submit"
                            class="btn btn-primary w-100">

                            Submit

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection