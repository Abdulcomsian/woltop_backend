<x-default-layout>
    <style>
        .image-back{
            background-color: #e1e1e1;
            padding: 14px;
        }

        .images{
            max-width: 100%;
            height: 200px;
        }
    </style>
    @section('page-title', 'General')
    {{-- Product Charges --}}
    <div class="card mt-4">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                 <!--begin::Toolbar-->
                 <div data-kt-user-table-toolbar="base">
                    <span>Product Charges</span>
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div>
                <form action="{{route('general.update.charges')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <input type="hidden" name="id" value="{{ $charges->id ?? null }}">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="mt-2">
                                <label for="delivery" class="form-label fw-semibold required">How much are the installation charges per roll?</label>
                                <input type="number" class="form-control" name="installation_charges" value="{{ $charges->installation_charges ?? null }}" placeholder="Amount" required>
                            </div>
                            @error("installation_charges")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="mt-2">
                                <label for="delivery" class="form-label fw-semibold required">How much are the cash on delivery charges? <small>(If user select that option)</small></label>
                                <input type="number" class="form-control" name="cash_on_delivery_charges" value="{{ $charges->cash_on_delivery_charges ?? null }}" placeholder="Amount" required>
                            </div>
                            @error("cash_on_delivery_charges")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="mt-2">
                                <label for="delivery" class="form-label fw-semibold required">What is the order amount threshold above which shipping charges do not apply?</label>
                                <input type="number" class="form-control" name="threshold_charges" value="{{ $charges->threshold_charges ?? null }}" placeholder="Amount" required>
                            </div>
                            @error("threshold_charges")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="mt-2">
                                <label for="delivery" class="form-label fw-semibold required">How much are the shipping charges? <small>(If order price haven`t exceeds the certain amount)</small></label>
                                <input type="number" class="form-control" name="shipping_charges" value="{{ $charges->shipping_charges ?? null }}" placeholder="Amount" required>
                            </div>
                            @error("shipping_charges")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>

    {{-- footer information  --}}
    <div class="card mt-4">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                 <!--begin::Toolbar-->
                 <div data-kt-user-table-toolbar="base">
                    <span>Footer Information</span>
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div>
                <form action="{{route('general.update.info')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <input type="hidden" name="id" value="{{ $footer_information->id ?? null }}">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="mt-2">
                                <label for="delivery" class="form-label fw-semibold required">Contact Number:</label>
                                <input type="number" class="form-control" name="contact_number" value="{{ $footer_information->contact_no ?? null }}" placeholder="Contact Number" required>
                            </div>
                            @error("contact_number")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="mt-2">
                                <label for="delivery" class="form-label fw-semibold required">Email:</label>
                                <input type="email" class="form-control" name="email" value="{{ $footer_information->email ?? null }}" placeholder="Email" required>
                            </div>
                            @error("email")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="mt-2">
                                <label for="delivery" class="form-label fw-semibold required">Address:</label>
                                <input type="text" class="form-control" name="address" value="{{ $footer_information->address ?? null }}" placeholder="Address" required>
                            </div>
                            @error("address")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    @push('scripts')

    @endpush
</x-default-layout>