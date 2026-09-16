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
                    <h3 class="mb-0">Order Details</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                    </ol>
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
            <div class="row g-4">
                <!--begin::Col-->
                <div class="col-md-12">
                    <!--begin::Quick Example-->
                    <div class="card card-primary card-outline mb-4">
                        <!--begin::Form-->
                        <div class="row g-4">
                            <!--begin::Col-->
                            <form action="{{url('/order-management/update/'.$order->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <!--begin::Quick Example-->
                                        <div class="card card-primary card-outline mb-4">
                                            <!--begin::Header-->
                                            <div class="card-header">
                                                <div class="card-title">Customer Info</div>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Form-->
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="mb-3 col-md-12">
                                                        <label for="exampleInputEmail1" class="form-label">Invoice Number</label>
                                                        <input type="text" class="form-control" value="{{$order->invoice_number}}" name="invoice_number" id="invoice_number" readonly />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="exampleInputEmail1" class="form-label">Customer
                                                            Name*</label>
                                                        <input type="text" class="form-control" value="{{$order->name}}"
                                                            name="name" id="name" required />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="exampleInputEmail1" class="form-label">Customer
                                                            Phone*</label>
                                                        <input type="text" class="form-control" value="{{$order->phone}}"
                                                            name="phone" id="phone" required />
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <label for="exampleInputEmail1" class="form-label">Delivery
                                                            Charge*</label>
                                                        <input type="number" class="form-control" value="{{$order->charge}}"
                                                            name="charge" id="charge" required />
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <label for="exampleInputEmail1"
                                                            class="form-label">Address*</label>
                                                        <textarea class="form-control" name="address" id="address" required>{{ $order->address }}</textarea>
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <label for="exampleInputEmail1"
                                                            class="form-label">Courier*</label>
                                                        <select name="courier_name" class="form-control"
                                                            id="courier_name">
                                                            <option value="">Select Courier</option>
                                                            <option value="steadfast" @if($order->courier_name == 'steadfast') selected @endif>Steadfast</option>
                                                            <option value="pathao" @if($order->courier_name == 'pathao') selected @endif>Pathao</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                            <!--begin::Footer-->
                                            <!--end::Footer-->
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Quick Example-->
                                    </div>
                                    <div class="col-md-6">
                                        <!--begin::Quick Example-->
                                        <div class="card card-primary card-outline mb-4">
                                            <!--begin::Header-->
                                            <div class="card-header">
                                                <div class="card-title">Product Info</div>
                                            </div>
                                            <div class="card-body">
                                                @foreach($order->orderDetails as $item)
                                                <div class="mb-5" id="subform" data-id="{{ $item->id }}">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <img src="{{ $item->product->image }}" height="100"
                                                                width="100"><br>
                                                            {{ $item->product->name }}
                                                        </div>
                                                        <div class="col-md-8">
                                                            <label>Unit Price:</label><input type="number"
                                                                class="form-control" name="price" value="{{ $item->price }}"
                                                                readonly>
                                                            <label>Quantity:</label><input type="number"
                                                                class="form-control" name="qty" value="{{ $item->qty }}"
                                                                required>
                                                            <label>Color:</label><input type="text"
                                                                class="form-control" name="color" value="{{ $item->color }}">
                                                            <label>Size:</label><input type="text"
                                                                class="form-control" name="size" value="{{ $item->size }}">
                     <!-- <input type="button" class="form-control mt-3 btn btn-success" value="Update" onclick="submitform({{ $item->id }})"> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <label>Total Price:</label>
                                                <input type="number" class="form-control" name="price"
                                                    value="{{ $order->total_price }}" required>
                                            </div>
                                            <!--end::Body-->
                                            <!--begin::Footer-->
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Update Order</button>
                                            </div>
                                            <!--end::Footer-->
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Quick Example-->
                                    </div>
                                </div>
                            </form>
                            <!--end::Col-->
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Quick Example-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
@endsection
@push('script')
<!-- <script>
    function submitform(id) {
        console.log("১. ফাংশন কল হয়েছে, ID:", id);

        let form = document.querySelector('#subform[data-id="' + id + '"]');
        console.log("২. ফর্ম এলিমেন্ট পাওয়া গেছে:", form);

        if (!form) {
            console.error("ফর্ম খুঁজে পাওয়া যায়নি!");
            return;
        }

        let formdata = new FormData();
        formdata.append('_token', '{{csrf_token()}}');
        formdata.append('qty', form.querySelector('input[name="qty"]').value);
        formdata.append('price', form.querySelector('input[name="price"]').value);
        formdata.append('color', form.querySelector('input[name="color"]').value);
        formdata.append('size', form.querySelector('input[name="size"]').value);

        fetch('/order-management/product-update/' + id, {
                method: 'POST',
                body: formdata
            })
            .then(res => res.json())
            .then(data => {
                alert('updated successfully');
            })
            .catch(err => {
                console.error("Fetch Error:", err);
            });
    }
    }
</script> -->
@endpush