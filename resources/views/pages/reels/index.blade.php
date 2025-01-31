<x-default-layout>
    @section('page-title', 'Manage Reels')
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                 <!--begin::Toolbar-->
                 <div data-kt-user-table-toolbar="base">
                    <span>Reels</span>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Add user-->
                <a href="#"> {{-- open model here --}}
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_reel">
                        <span><i class="fa fa-plus"></i></span>
                        Add Reel
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

    @include('partials.modals.reels.add')
    @include('partials.modals.reels.edit')
    @include('partials.modals.reels.delete')
    @push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        function deleteItem(id){
            document.querySelector("#reel_id_delete").value = id;
            var deleteModal = new bootstrap.Modal(document.getElementById('delete_reel'));
            deleteModal.show();
        }

        function editItem(id){
            let url = `{{ route('reel.edit', ':id') }}`.replace(':id', id);
            fetch(url)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((res) => {
                    let file_path = `{{ asset('assets/wolpin_media/reels/' . ':path') }}`.replace(":path", res.data.path);
                    let iFrame = document.querySelector("#preview-reel");
                    iFrame.src = file_path;
                    document.querySelector("#reel_id").value = res.data.id;
                    let modal = new bootstrap.Modal(document.getElementById('edit_reel'));
                    modal.show();
                })
                .catch((error) => {
                    console.error('Error fetching product:', error);
                });
        }
    </script>
    @endpush
</x-default-layout>
