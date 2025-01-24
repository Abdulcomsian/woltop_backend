<x-default-layout>
    @section('page-title', 'Manage Parent Categories')
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                 <!--begin::Toolbar-->
                 <div data-kt-user-table-toolbar="base">
                    <span>Parent Categories</span>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Add user-->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#category_modal_id">
                    <span><i class="fa fa-plus"></i></span>
                    Add
                </button>
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

    @include('partials.modals.parent-category.add')
    @include('partials.modals.parent-category.edit')
    @include('partials.modals.parent-category.delete')
    @push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        function deleteParentCategory(id){
            document.querySelector("#parent_category_id_delete").value = id;
            var deleteModal = new bootstrap.Modal(document.getElementById('delete_parent_category_modal'));
            deleteModal.show();
        }

        function editParentCategory(id){
            let parentCategoryId = id;
            let url = `{{ route('parent-category.edit', ':parent_category_id') }}`.replace(':parent_category_id', id);
            fetch(url)
                .then((response) => {
                    console.log('response',response)
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((data) => {
                    document.querySelector("#parent_category_id").value = data.data.id;
                    document.querySelector("#parent_category_name_edit").value = data.data.name;
                    var editModal = new bootstrap.Modal(document.getElementById('edit_parent_category_modal'));
                    editModal.show();
                })
                .catch((error) => {
                    console.error('Error fetching parent category:', error);
                });
        }
    </script>
    @endpush
</x-default-layout>
