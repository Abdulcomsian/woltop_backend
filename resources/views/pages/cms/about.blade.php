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
    @section('page-title', 'About')
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                 <!--begin::Toolbar-->
                 <div data-kt-user-table-toolbar="base">
                    <span>About Page Content</span>
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div>
                <form action="{{route('page.update.about')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    @php
                    $title = json_decode($data->title);
                    $description = json_decode($data->description);
                    @endphp
                    <input type="hidden" name="id" value="{{$data->id ?? null}}">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="delivery" class="form-label fw-semibold required">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$data->name ?? ''}}" placeholder="Name" required>
                            @error("name")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="delivery" class="form-label fw-semibold required">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$title->title ?? ''}}" placeholder="Title" required>
                            @error("title")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-4 mt-2">
                        <div class="col-md-12">
                            <label for="delivery" class="form-label fw-semibold required">Description</label>
                            <textarea class="form-control" name="description" placeholder="Description">{{$description->description ?? ''}}</textarea>
                            @error("description")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-4 mt-2">
                        <div class="col-md-12">
                            <label for="delivery" class="form-label fw-semibold required">Team Title</label>
                            <input type="text" class="form-control" name="team_title" value="{{$title->team_title ?? ''}}" placeholder="Team Title" required>
                            @error("team_title")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-4 mt-2">
                        <div class="col-md-12">
                            <label for="delivery" class="form-label fw-semibold required">Team Description</label>
                            <textarea class="form-control" name="team_description" placeholder="Team Description">{{$description->team_description ?? ''}}</textarea>
                            @error("team_description")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-4 mt-2">
                        <div class="col-md-6">
                            @if(isset($data) && $data->main_image != null)
                            <div class="image-back">
                                <img src="{{ asset('assets/wolpin_media/general/about/' . $data->main_image) }}" 
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
                            @if(isset($data) && $data->image != null)
                            <div class="image-back">
                                <img src="{{ asset('assets/wolpin_media/general/about/' . $data->image) }}" 
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
    @push('scripts')

    @endpush
</x-default-layout>