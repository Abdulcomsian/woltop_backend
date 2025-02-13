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
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                 <!--begin::Toolbar-->
                 <div data-kt-user-table-toolbar="base">
                    <span>Homepage Banner</span>
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div>
                <form action="{{route('general.update.banner')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <input type="hidden" name="id" value="{{$banner->id}}">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="delivery" class="form-label fw-semibold required">Banner Text</label>
                            <input type="text" class="form-control" name="banner_text" value="{{$banner->name ?? ''}}" required>
                            @error("banner_text")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="delivery" class="form-label fw-semibold required">Button Link</label>
                            <input type="text" class="form-control" name="button_link" value="{{$banner->link ?? ''}}" required>
                            @error("button_link")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-4 mt-2">
                        <div class="col-md-6">
                            @if($banner->main_image != null)
                            <div class="image-back">
                                <img src="{{ asset('assets/wolpin_media/general/homepage/' . $banner->main_image) }}" 
                                     alt="banner_image" 
                                     class="images">
                            </div>
                            @endif
                            <div class="mt-2">
                                <label for="delivery" class="form-label fw-semibold required">Replace Banner Image</label>
                                <input type="file" class="form-control" name="banner_image" value="#" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-6">
                            @if($banner->image != null)
                            <div class="image-back">
                                <img src="{{ asset('assets/wolpin_media/general/homepage/' . $banner->image) }}" 
                                alt="logo" 
                                class="images">
                            </div>
                            @endif
                            <div class="mt-2">
                                <label for="delivery" class="form-label fw-semibold required">Replace Logo Image</label>
                                <input type="file" class="form-control" name="banner_logo" value="#" accept="image/*">
                            </div>
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

    {{-- Video Card  --}}
    <div class="card mt-4">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                 <!--begin::Toolbar-->
                 <div data-kt-user-table-toolbar="base">
                    <span>Homepage Video</span>
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div>
                <form action="{{route('general.update.video')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <input type="hidden" name="id" value="{{$video->id}}">
                    <div class="row g-4">
                        <div class="col-md-12">
                            @if($video->link != null)
                            <div class="image-back">
                                <video controls class="img-fluid">
                                    <source src="{{asset('assets/wolpin_media/general/homepage/' . $video->link)}}" type="video/mp4">
                                </video>
                            </div>
                            @endif
                            <div class="mt-2">
                                <label for="delivery" class="form-label fw-semibold required">Replace Video</label>
                                <input type="file" class="form-control" name="video" value="#" accept="video/*">
                            </div>
                            @error("video")
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