<x-default-layout>
    @section('page-title', 'Manage Profile')
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="card scroll-y ">
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Toolbar-->
                    <div data-kt-user-table-toolbar="base">
                        <span>Update Profile</span>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--begin::Card toolbar-->

                <!--end::Card toolbar-->
            </div>
            <div class="card-body py-4">
                <div class="row">
                    <!--begin::Form-->
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column  " id="kt_modal_add_user_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->

                            <!--begin::Image placeholder-->
                            <style>
                                .image-input-placeholder {
                                    background-image: url('{{ image(' svg/files/blank-image.svg') }}');
                                }

                                [data-bs-theme="dark"] .image-input-placeholder {
                                    background-image: url('{{ image(' svg/files/blank-image-dark.svg') }}');
                                }
                            </style>

                            <!-- Featured Image Tab -->
                            <!--begin::Image input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Name" value="{{$data->name}}" required />
                            <!--end::Input-->
                            @error("name")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Email</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Email" value="{{$data->email}}" required />
                            <!--end::Input-->
                            @error("email")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--end::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fw-semibold fs-6 mb-2">Password</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="password" name="password"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Password" value=""/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Scroll-->
                </div>
            </div>
        </div>
        <!--begin::Actions-->
        <div class="d-flex justify-content-end mt-5 mb-5">
            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">
                    Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
        </div>
    </form>
    @push('scripts')
    @endpush
</x-default-layout>
