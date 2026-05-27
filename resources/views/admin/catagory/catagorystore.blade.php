@extends('admin.master')

@section('maincontent')
<main class="app-main py-4">
    <div class="app-content-header mb-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0 text-dark fw-bold">Category Management</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="icon-shape bg-primary-soft text-primary me-2 rounded-2 p-2">
                                    <i class="bi bi-grid-3x3-gap-fill fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0 fw-semibold text-secondary">Primary Categories</h5>
                            </div>
                            <a href="{{ url('/product/catagory-manage/create') }}" class="btn btn-primary btn-sm fw-medium px-3 shadow-sm">
                                <i class="bi bi-plus-lg me-1"></i> Add New Category
                            </a>
                        </div>
                        
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light text-uppercase tracking-wider" style="font-size: 0.75rem;">
                                        <tr>
                                            <th class="text-center py-3 ps-4" style="width: 70px;">SL. No.</th>
                                            <th class="py-3" style="width: 120px;">Preview</th>
                                            <th class="py-3">Category Name</th>
                                            <th class="text-end py-3 pe-4" style="width: 200px;">Action Elements</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($catagories as $category)
                                            <tr>
                                                <td class="text-center fw-medium text-muted ps-4">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if($category->image)
                                                            <img src="{{ asset($category->image) }}" 
                                                                 class="rounded-2 border shadow-sm object-fit-cover" 
                                                                 style="width: 55px; height: 55px;" 
                                                                 alt="{{ $category->name }}">
                                                        @else
                                                            <div class="bg-light rounded-2 border d-flex align-items-center justify-content-center text-muted shadow-sm" 
                                                                 style="width: 55px; height: 55px;">
                                                                <i class="bi bi-image fs-4"></i>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="fw-semibold text-dark fs-6">{{ $category->name }}</span>
                                                </td>
                                                <td class="text-end pe-4">
                                                    <div class="d-inline-flex gap-2">
                                                        <a href="{{ url('/product/catagory-manage/post/edit/'.$category->id) }}" 
                                                           class="btn btn-sm btn-outline-primary px-2.5 py-1" 
                                                           data-bs-toggle="tooltip" 
                                                           title="Edit Category">
                                                            <i class="bi bi-pencil-square"></i> <span class="d-none d-md-inline ms-1">Edit</span>
                                                        </a>
                                                        <a href="{{ url('/product/catagory-manage/post/delete/'.$category->id) }}" 
                                                           class="btn btn-sm btn-outline-danger px-2.5 py-1" 
                                                           onclick="return confirm('Are you sure you want to delete this category?')"
                                                           data-bs-toggle="tooltip" 
                                                           title="Delete Category">
                                                            <i class="bi bi-trash"></i> <span class="d-none d-md-inline ms-1">Delete</span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-5 text-muted">
                                                    <i class="bi bi-folder-x fs-2 d-block mb-2 text-secondary"></i>
                                                    No parent categories found in the system database.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if(method_exists($catagories, 'links'))
                            <div class="card-footer bg-white border-top py-3">
                                {!! $catagories->links() !!}
                            </div>
                        @endif
                    </div>
                    </div>
            </div>
        </div>
    </div>
    </main>
@endsection