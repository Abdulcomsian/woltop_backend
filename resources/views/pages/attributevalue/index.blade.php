<x-default-layout>
    @section('page-title', 'Manage Attributes Values')
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                 <!--begin::Toolbar-->
                 <div data-kt-user-table-toolbar="base">
                    <span>Attribute Values</span>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Add user-->
                <a href="#"> {{-- open model here --}}
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_modal">
                        <span><i class="fa fa-plus"></i></span>
                        Add Attribute Value
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
    @include('partials.modals.attributes_values.add')
    @include('partials.modals.attributes_values.edit')
    @include('partials.modals.attributes_values.delete')
    @push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        function deleteItem(id){
            document.querySelector("#id_delete").value = id;
            var deleteModal = new bootstrap.Modal(document.getElementById('delete_modal'));
            deleteModal.show();
        }

        function editItem(id){
            let url = `{{ route('attributevalue.edit', ':id') }}`.replace(':id', id);
            fetch(url)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((res) => {
                    document.querySelector("#attribute_name").value = res.data.name;
                    document.querySelector("#id").value = res.data.id;
                    let attribute_id = res.data.attribute_id; 
                    let attributeDropdown = document.querySelector("#attribute_edit");
                    if (attributeDropdown) {
                        Array.from(attributeDropdown.options).forEach(option => {
                            if (option.value == attribute_id) {
                                option.selected = true; // Mark the correct option as selected
                            } else {
                                option.selected = false; // Unselect other options
                            }
                        });
                    }
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