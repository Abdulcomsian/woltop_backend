<div class="modal fade" id="add_review" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add Review</h2>
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
                <form action="{{route('review.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--end::Label-->
                            <!--begin::Input-->
                            <label for="reel" class="required mb-2">Please Select Product</label>
                            <select name="product_id" class="form-control" required>
                                <option value="" selected disabled>Select Option</option>
                                @isset($products)
                                    @foreach($products as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                        <!--end::Input group-->
                        
                       <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="required mb-2">Rating</label>
                            <div class="rating-stars d-flex flex-row-reverse justify-content-end">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio" id="star{{$i}}" name="rating" value="{{$i}}" required/>
                                    <label for="star{{$i}}">&#9733;</label>
                                @endfor
                            </div>
                        </div>
                        <!--end::Input group-->
                        
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--end::Label-->
                            <!--begin::Input-->
                            <label for="reel" class="required mb-2">Review</label>
                            <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Enter Review" required></textarea>
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
