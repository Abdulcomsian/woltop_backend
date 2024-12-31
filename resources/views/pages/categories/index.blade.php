<x-default-layout>
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                 <!--begin::Toolbar-->
                 <div data-kt-user-table-toolbar="base">
                    <span>Categories</span>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Add user-->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#category_modal_id">
                    <span><i class="fa fa-plus"></i></span>
                    Add User
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

    @include('partials.modals.categories.add-category-modal')
    @include('partials.modals.categories.edit-category-modal')
    @include('partials.modals.categories.delete-category')
    @push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        function deleteCategory(id){
            $("#category_id").val(id);
            $("#delete_category_modal").modal("show");
        }

        function editCategory(id){
            let category_id = id;
            let url = `{{ route('edit.category', ':category_id') }}`.replace(':category_id', id);
            fetch(url)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((data) => {
                    $("#category_name").val(data.data.name);
                    let imageUrl = data.data.image;
                    let url = `{{asset('assets/wolpin_media/categories')}}/${imageUrl}`;
                    document.querySelector("#category_image_style").style.backgroundImage = `url('${url}')`;
                    $("#edit_category_modal").modal("show");
                })
                .catch((error) => {
                    console.error('Error fetching category:', error);
                });
        }
    </script>
    @endpush
</x-default-layout>