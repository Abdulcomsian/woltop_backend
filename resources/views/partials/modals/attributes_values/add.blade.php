<div class="modal fade" id="add_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add Attribute</h2>
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
                <form action="{{route('attributevalue.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <label for="attribute" class="required mb-3">Please select attribute</label>
                            <select class="form-control form-control-solid mb-4" name="attribute_id" id="attribute" required>
                                <option value="" selected disabled>Select Option</option>
                                @isset($attributes)
                                    @foreach($attributes as $attribute)
                                        <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                    @endforeach
                                @endisset
                            </select>
                            @error('attribute_id')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="fv-row mb-7">
                            <!--end::Label-->
                            <!--begin::Input-->
                            <label class="required mb-3">Attribute Value Name</label>
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please enter attribute name" required/>
                            <!--end::Input-->
                            @error('name')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
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
