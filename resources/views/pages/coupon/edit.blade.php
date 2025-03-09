<x-default-layout>
    @section('page-title', 'Add Coupon')
    <div class="row">
        {{-- add form content here  --}}
        <div class="card" style="">
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Toolbar-->
                    <div data-kt-user-table-toolbar="base">
                        <span>Coupon information</span>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--begin::Card toolbar-->

                <!--end::Card toolbar-->
            </div>
            <div class="card-body py-4">
                {{-- add form content here  --}}
                <!--begin::Form-->
                <form action="{{ route('coupon.update') }}" id="submitForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column" id="kt_modal_add_user_scroll" data-kt-scroll-activate="true"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="row">
                            <!-- Title Field -->
                            <div class="col-md-12">
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name" class="form-control mb-3 mb-lg-0"
                                        placeholder="Name" value="{{$data->name}}"/>
                                    <!--end::Input-->
                                </div>
                                @error("name")
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Short Description</label>
                            <textarea class="form-control" name="short_description" rows="3" placeholder="Short Description">{{$data->short_description}}</textarea>
                        </div>
                        @error("short_description")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <!--end::Input group-->

                        <div class="fv-row mb-3">
                            <label for="description" class="required fw-semibold fs-6 mb-2">Description</label>
                            <textarea id="description" name="description" placeholder="Type some content here!">{{$data->long_description}}</textarea>
                        </div>
                        @error("description")
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                        <div class="row mb-7">
                            <div class="col-6">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Type</label>
                                <select class="form-control" name="type" id="price-type">
                                    <option value="percentage" @if($data->type == "percentage") selected @endif>Percentage</option>
                                    <option value="fixed" @if($data->type == "fixed") selected @endif>Fixed</option>
                                </select>
                            </div>

                            <div class="col-6 price-input">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Percentage</label>
                                <input type="text" name="price" class="form-control" placeholder="Enter number which will consider in percentage e.g 20%" value="{{$data->price}}">
                            </div>
                            @error("price")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="row mb-7">
                            <div class="col-6">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Is Countable</label>
                                <select class="form-control" name="is_countable" id="counting-type">
                                    <option value="yes" @if($data->is_countable == true) selected @endif>Yes</option>
                                    <option value="no" @if($data->is_countable == false) selected @endif>No</option>
                                </select>
                            </div>

                            <div class="col-6 counting-input">
                                @if($data->is_countable == true)
                                    <label class="required fw-semibold fs-6 mb-2">Counting</label>
                                    <input type="text" name="counting" class="form-control" placeholder="Enter the number that how many times a user can use this coupon code" value="{{$data->counting ?? ''}}">
                                @error("counting")
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                @endif

                                @if($data->is_countable == false)
                                <div class="row">
                                    <div class="col-6">
                                        <label class="required fw-semibold fs-6 mb-2">Start Date:</label>
                                        <input type="date" name="start_date" class="form-control" value="{{ isset($data->start_date) ? date('Y-m-d', strtotime($data->start_date)) : '' }}">
                                    </div>
                                    @error("start_date")
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <div class="col-6">
                                        <label class="required fw-semibold fs-6 mb-2">End Date:</label>
                                        <input type="date" name="end_date" class="form-control" value="{{ isset($data->end_date) ? date('Y-m-d', strtotime($data->end_date)) : '' }}">
                                    </div>
                                    @error("end_date")
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Status</label>
                                <select class="form-control" name="status" id="counting-type">
                                    <option value="active" @if($data->status == "active") selected @endif>Active</option>
                                    <option value="disable" @if($data->status == "disable") selected @endif>Disable</option>
                                </select>
                            </div>
                            @error("status")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="fv-row mb-3">
                            <div class="d-flex justify-content-end mt-5 mb-5">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--end::Scroll-->

                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
        @push('scripts')
            <script>
                // Existing Dropzone initialization
                Dropzone.autoDiscover = false;

                // Existing ClassicEditor initialization
                ClassicEditor
                    .create(document.querySelector('#description'))
                    .catch(error => {
                        console.error(error);
                    });

                // Validations
                function validateForm(form, isEdit = false) {
                    let fields = [{
                            selector: "input[name='name']",
                            type: "input"
                        },
                        {
                            selector: "input[name='title']",
                            type: "input"
                        },
                        {
                            selector: "input[name='price']",
                            type: "input"
                        },
                        {
                            selector: "input[name='counting']",
                            type: "input"
                        },
                        {
                            selector: "input[name='start_date']",
                            type: "input"
                        },
                        {
                            selector: "input[name='end_date']",
                            type: "input"
                        },
                        {
                            selector: "textarea[name='short_description']",
                            type: "textarea"
                        },
                        {
                            selector: "textarea[name='description']",
                            type: "textarea"
                        },
                    ];

                    form.querySelectorAll(".text-danger").forEach(el => el.remove());
                    let isValid = true;
                    fields.forEach(field => {
                        let element = form.querySelector(field.selector);
                        if (element && (element.value.trim() === "")) {
                            isValid = false;
                            let errorSpan = document.createElement("span");
                            errorSpan.classList.add("text-danger");
                            errorSpan.innerText = "This field is required";
                            if (!element.parentNode.querySelector(".text-danger")) {
                                element.parentNode.appendChild(errorSpan);
                            }
                        }
                    });

                    return isValid;
                }

                document.querySelector("#submitForm").addEventListener("submit", function(e) {
                    e.preventDefault();
                    if (validateForm(this)) {
                        this.submit();
                    }
                });


                document.querySelector("#price-type").addEventListener("change", function(){
                    let value = this.options[this.selectedIndex].value;
                    let priceInput = document.querySelector(".price-input");
                    if(value == "percentage"){
                        var updateInput = `
                            <label class="required fw-semibold fs-6 mb-2">Percentage</label>
                            <input type="text" name="price" class="form-control" placeholder="Enter number which will consider in percentage e.g 20%">
                        `;
                    }else if(value == "fixed"){
                        var updateInput = `
                            <label class="required fw-semibold fs-6 mb-2">Price</label>
                            <input type="text" name="price" class="form-control" placeholder="Enter fixed price e.g 20">
                        `;
                    }
                    priceInput.innerHTML = updateInput;
                })


                document.querySelector("#counting-type").addEventListener("change", function(){
                    let value = this.options[this.selectedIndex].value;
                    let priceInput = document.querySelector(".counting-input");
                    if(value == "yes"){
                        var updateInput = `
                                <label class="required fw-semibold fs-6 mb-2">Counting</label>
                                <input type="text" name="counting" class="form-control" placeholder="Enter the number that how many times a user can use this coupon code">
                        `;
                    }else if(value == "no"){
                        var updateInput = `
                        <div class="row">
                            <div class="col-6">
                                <label class="required fw-semibold fs-6 mb-2">Start Date:</label>
                                <input type="date" name="start_date" class="form-control">
                            </div>
                            <div class="col-6">
                                <label class="required fw-semibold fs-6 mb-2">End Date:</label>
                                <input type="date" name="end_date" class="form-control">
                            </div>
                        </div>
                        `;
                    }
                    priceInput.innerHTML = updateInput;
                })
            </script>
        @endpush
</x-default-layout>
