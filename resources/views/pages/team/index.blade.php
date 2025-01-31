<x-default-layout>
    @section('page-title', 'Manage Team')
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                 <!--begin::Toolbar-->
                 <div data-kt-user-table-toolbar="base">
                    <span>Teams</span>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Add user-->
                <a href="{{ route('team.create') }}">
                    <button type="button" class="btn btn-primary">
                        <span><i class="fa fa-plus"></i></span>
                        Add Team Member
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
    @include('partials.modals.product.delete')
    @push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        function deleteProduct(id){
            document.querySelector("#product_id_delete").value = id;
            var deleteModal = new bootstrap.Modal(document.getElementById('delete_product_modal'));
            deleteModal.show();
        }

        function editProduct(id){
            let product_id = id;
            let url = `{{ route('product.edit', ':product_id') }}`.replace(':product_id', id);
            fetch(url)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((data) => {
                    document.querySelector("#product_name_edit").value = data.data.name;
                    document.querySelector("#product_id").value = data.data.id;
                    if(data.data.image != ""){
                        let imageUrl = data.data.image;
                        let url = `${imageUrl}`;
                        document.querySelector("#product_image_style").style.backgroundImage = `url('${url}')`;
                    }
                    var editModal = new bootstrap.Modal(document.getElementById('edit_product_modal'));
                    editModal.show();
                })
                .catch((error) => {
                    console.error('Error fetching product:', error);
                });
        }
    </script>
    @endpush
</x-default-layout>
