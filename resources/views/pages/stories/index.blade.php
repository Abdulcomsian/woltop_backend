<x-default-layout>
    @section('page-title', 'Manage Story')
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                 <!--begin::Toolbar-->
                 <div data-kt-user-table-toolbar="base">
                    <span>Stories</span>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Add user-->
                <a href="#"> {{-- open model here --}}
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_story">
                        <span><i class="fa fa-plus"></i></span>
                        Add Story
                    </button>
                </a>
                <!--end::Add user-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
               {{$dataTable->table()}}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>

    @include('partials.modals.stories.add')
    @include('partials.modals.stories.edit')
    @include('partials.modals.stories.delete')
    @push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        function deleteProduct(id){
            document.querySelector("#story_id_delete").value = id;
            var deleteModal = new bootstrap.Modal(document.getElementById('delete_story'));
            deleteModal.show();
        }

        function editProduct(id){
            let url = `{{ route('story.edit', ':id') }}`.replace(':id', id);
            fetch(url)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((res) => {
                    let file_path = `{{ asset('assets/wolpin_media/stories/' . ':path') }}`.replace(":path", res.data.path);
                    let iFrame = document.querySelector("#preview-story");
                    iFrame.src = file_path;
                    document.querySelector("#story_id").value = res.data.id;
                    let modal = new bootstrap.Modal(document.getElementById('edit_story'));
                    modal.show();
                })
                .catch((error) => {
                    console.error('Error fetching product:', error);
                });
        }
    </script>
    @endpush
</x-default-layout>
