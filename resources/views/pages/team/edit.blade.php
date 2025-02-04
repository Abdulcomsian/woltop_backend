<x-default-layout>
    @section('page-title', 'Add Team Member')
    <form action="{{ route('team.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="card scroll-y ">
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Toolbar-->
                    <div data-kt-user-table-toolbar="base">
                        <span>Team information</span>
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
                    <div class="d-flex flex-column  " id="kt_modal_add_user_scroll" 
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
                            <div class="col-6">
                                <img src="{{asset('assets/wolpin_media/team/' . $data->image)}}" height="100" alt="team_member">
                            </div>
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fw-semibold fs-6 mb-2">Replace Image</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" name="image" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Image" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder=" Name" value="{{$data->name}}" required/>
                            <!--end::Input-->
                            @error("name")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Designation</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="designation"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Designation" value="{{$data->designation}}"
                                required />
                            <!--end::Input-->
                            @error("designation")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--end::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fw-semibold fs-6 mb-2">Bio</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea class="form-control form-control-solid" rows="3" name="bio" placeholder="Bio">{{$data->bio}}</textarea>
                            <span class="text-danger" id="add_category_name_err" style="display: none;">Category name is
                                required</span>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Scroll-->
                </div>
            </div>
        </div>
        <div>
            <div class="card mt-4 mb-4 ">
                <div class="card-header border-0  pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Toolbar-->
                        <div data-kt-user-table-toolbar="base">
                            <span>Social Media</span>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--begin::Card toolbar-->

                    <!--end::Card toolbar-->
                </div>
                <div class="card-body">
                    <!--end::Input group-->
                    <div class="row mb-4 ">
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label">Portfolio website</label>
                            <!--begin::Input-->
                            <input type="text" name="portfolio_website"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Portfolio Website" value="{{$data->portfolio_website}}"/>
                            <!--end::Input-->
                        </div>
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label">LinkedIn Profile</label>
                            <!--begin::Input-->
                            <input type="text" name="linkedIn_profile"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="LinkedIn Profile" value="{{$data->linkedIn_profile}}"/>
                            <!--end::Input-->
                        </div>
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label">Facebook Profile</label>
                            <!--begin::Input-->
                            <input type="text" name="facebook_profile"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Facebook Profile" value="{{$data->facebook_profile}}"/>
                            <!--end::Input-->
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--end::Input group-->
                    <div class="row mb-7">
                        <div class="col-md-6">
                            <!--begin::Label-->
                            <label class="fw-semibold fs-6 mb-2">X Profile</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="x_profile"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="X Profile" value="{{$data->x_profile}}"/>
                            <!--end::Input-->
                        </div>

                        <div class="col-md-6">
                            <!--begin::Label-->
                            <label class="fw-semibold fs-6 mb-2">Youtube Profile</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="youtube_profile" id="youtube_profile_add"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Youtube Profile" value="{{$data->youtube_profile}}"/>
                            <!--end::Input-->
                        </div>
                    </div>
                    <!--end::Input group-->

                </div>
            </div>

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
    </form>
    <!--end::Actions-->
    </div>
    @push('scripts')
    @endpush
</x-default-layout>
