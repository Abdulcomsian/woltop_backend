<div class="modal fade" id="tool_modal_id" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add Tool</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    {!! getIcon('cross','fs-1') !!}
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form action="#" id="add_tool_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="d-block fw-semibold fs-6 mb-5">Tool Image</label>
                            <!--end::Label-->
                            <!--begin::Image placeholder-->
                            <style>
                                .image-input-placeholder {
                                    background-image: url('{{ image(' svg/files/blank-image.svg') }}');
                                }

                                [data-bs-theme="dark"] .image-input-placeholder {
                                    background-image: url('{{ image(' svg/files/blank-image-dark.svg') }}');
                                }
                            </style>
                            <!--end::Image placeholder-->
                            <!--begin::Image input-->
                            {{-- {{ $avatar || $saved_avatar ? '' : 'image-input-empty' }} --}}
                            <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                {{-- @if($avatar)
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ $avatar ? $avatar->temporaryUrl() : '' }});">
                            </div>
                            @else
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ $saved_avatar }});"></div>
                            @endif --}}
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ image('svg/files/blank-image.svg') }}');"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                {!! getIcon('pencil','fs-7') !!}
                                <!--begin::Inputs-->
                                <input type="file" name="tool_image" id="tool_imege_add" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                {!! getIcon('cross','fs-2') !!}
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                {!! getIcon('cross','fs-2') !!}
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        <span class="text-danger" id="add_tool_image_err" style="display: none;">Tool image is required</span>
                        <!--end::Hint-->
                        @error('tool_image')
                        <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Tool Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="tool_name" id="tool_name_add" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tool Name" />
                        <span class="text-danger" id="add_tool_name_err" style="display: none;">Tool name is required</span>
                        <!--end::Input-->
                        @error('tool_name')
                        <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Tool Description</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="tool_description" id="tool_description_add" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tool description" />
                        <span class="text-danger" id="add_tool_description_err" style="display: none;">Tool description is required</span>
                        <!--end::Input-->
                        @error('tool_description')
                        <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Price</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" name="tool_price" id="tool_price_add" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tool price" />
                        <span class="text-danger" id="add_tool_price_err" style="display: none;">Tool price is required</span>
                        <!--end::Input-->
                        @error('tool_price')
                        <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Sale Price</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" name="tool_sale_price" id="tool_sale_price_add" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tool sale_price" />
                        <span class="text-danger" id="add_tool_sale_price_err" style="display: none;">Tool sale_price is required</span>
                        <!--end::Input-->
                        @error('tool_sale_price')
                        <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!--end::Input group-->
            </div>
            <!--end::Scroll-->
            <!--begin::Actions-->
            <div class="text-center pt-15">
                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">
                        Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>
            </div>
            <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Modal body-->
    </div>
    <!--end::Modal content-->
</div>
<!--end::Modal dialog-->
</div>
