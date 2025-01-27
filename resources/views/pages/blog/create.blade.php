<x-default-layout>
    @section('page-title', 'Add Blog')
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
                <form action="{{ route('store.category') }}" id="add_categoy_form" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column  " id="kt_modal_add_user_scroll" 
                        data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="row">
                            <!-- Image Field -->
                            <div class="col-md-6">
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Image</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="file" name="image" id="category_image_add"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Image" />
                                    <span class="text-danger" id="add_category_image_err" style="display: none;">Image
                                        is required</span>
                                    <!--end::Input-->
                                </div>
                            </div>

                            <!-- Title Field -->
                            <div class="col-md-6">
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Title</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name" id="category_title_add"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Name" />
                                    <span class="text-danger" id="add_category_title_err" style="display: none;">Title
                                        is required</span>
                                    <!--end::Input-->
                                </div>
                            </div>
                        </div>

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Short Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <!-- <input type="textarea" name="bio" id="bio_add"
                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="bio" /> -->
                            <textarea class="form-control " id="exampleFormControlTextarea1" rows="3"></textarea>
                            <span class="text-danger" id="add_category_name_err" style="display: none;">Short
                                Description
                                is required</span>
                            <!--end::Input-->

                            <span class="text-danger"></span>
                        </div>
                        <!--end::Input group-->

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description"></textarea>
                        </div>
                    </div>
                    <!--end::Scroll-->

                </form>
                <!--end::Form-->
            </div>
        </div>
        <div>
            <!--begin::Actions-->
            <div class="d-flex justify-content-end mt-5 mb-5">
                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal"
                    aria-label="Close">Discard</button>
                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">
                        Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>
            </div>
            <!--end::Actions-->
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
            </script>
        @endpush
</x-default-layout>
