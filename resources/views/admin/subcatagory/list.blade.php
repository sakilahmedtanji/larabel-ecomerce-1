@extends('admin.master')
@section('maincontent')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">SubCatagory list</h3>
                    </div>

                </div>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Sub Catagory list</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No.</th>
                                            <th>Name</th>
                                            <th>Catagory name</th>
                                            <th style="width: 40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($catagories as $category )
                                            <tr class="align-middle">
                                            
                                            <td>{{ $loop->index + 1 }}</td>
                                            
                                            <td>
                                                {{ $category->name }}
                                            </td>
                                            <td>
                                                {{ $category->catagory->name }}
                                            </td>
                                            <td>

                                                <div class="d-flex gap-2">
                                                    <a href="{{url('/product/subcatagory-manage/post/edit/'.$category->id)}}" class="btn btn-sm btn-primary">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                    <a href="{{url('/product/subcatagory-manage/post/delete/'.$category->id)}}" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                    <!-- /.col -->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection
