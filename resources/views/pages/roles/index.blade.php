<x-default-layout>
    @section('page-title', 'Manage Roles')
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                 <div data-kt-user-table-toolbar="base">
                    <span>Roles</span>
                </div>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#category_modal_id">
                    <span><i class="fa fa-plus"></i></span>
                    Add
                </button>
            </div>
        </div>
        <div class="card-body py-4">
            <div class="table-responsive">
               {{$dataTable->table()}}
            </div>
        </div>
    </div>
    @include('partials.modals.roles.add')
    @include('partials.modals.roles.edit')
    @include('partials.modals.roles.delete')
    @push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        function deleteItem(id){
            document.querySelector("#delete_id").value = id;
            var deleteModal = new bootstrap.Modal(document.getElementById('delete_modal'));
            deleteModal.show();
        }

        function editItem(id){
            let url = `{{ route('roles.edit', ':id') }}`.replace(':id', id);
            fetch(url)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((res) => {
                    document.querySelector("#edit_id").value = res.data.id;
                    document.querySelector("input[name='name']").value = res.data.title;
                    let modal = new bootstrap.Modal(document.getElementById('edit_modal'));
                    modal.show();
                })
                .catch((error) => {
                    console.error('Error fetching product:', error);
                });
        }
    </script>
    @endpush
</x-default-layout>
