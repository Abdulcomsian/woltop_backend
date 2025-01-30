<x-default-layout>
    @section('page-title', 'Edit Blog')
    <div class="row">
        {{-- add form content here  --}}
        <div class="card" style="">
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Toolbar-->
                    <div data-kt-user-table-toolbar="base">
                        <span>Blog information</span>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--begin::Card toolbar-->

                <!--end::Card toolbar-->
            </div>
            <div class="card-body py-4">
                {{-- add form content here  --}}
                <!--begin::Form-->
                <form action="{{ route('blog.update') }}" id="submitForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <!--begin::Scroll-->
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="d-flex flex-column" id="kt_modal_add_user_scroll" data-kt-scroll-activate="true"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <img src="{{asset('assets/wolpin_media/blogs/' . $data->image)}}" alt="Blog Image" height="200">
                            </div>
                        </div>
                        <div class="row">
                            <!-- Image Field -->
                            <div class="col-md-6">
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-2">Replace Image</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="file" name="image" class="form-control mb-3 mb-lg-0"
                                        placeholder="Image" accept="image/*"/>
                                    <!--end::Input-->
                                </div>
                                @error("image")
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Title Field -->
                            <div class="col-md-6">
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Title</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="title" class="form-control mb-3 mb-lg-0"
                                        placeholder="Name" value="{{$data->title}}"/>
                                    <!--end::Input-->
                                </div>
                                @error("title")
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
                            <textarea id="description" name="description" placeholder="Type some content here!">{!!$data->description!!}</textarea>
                        </div>
                        @error("description")
                            <span class="text-danger">{{$message}}</span>
                        @enderror

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
                    let fields = [
                        {
                            selector: "input[name='title']",
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
            </script>
        @endpush
</x-default-layout>
