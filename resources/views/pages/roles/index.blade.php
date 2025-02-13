<x-default-layout>
    @section('page-title', 'Manage Users')
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                 <!--begin::Toolbar-->
                 <div data-kt-user-table-toolbar="base">
                    <span>Users</span>
                </div>
                <!--end::Toolbar-->
            </div>
            {{-- <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Add user-->
                <a href="{{route('blog.create')}}" class="btn btn-primary">
                    <span><i class="fa fa-plus"></i></span>
                    Add
                </a>
                <!--end::Add user-->
            </div>
            <!--end::Card toolbar--> --}}
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
    @include('partials.modals.users.edit')
    @include('partials.modals.users.delete')
    @push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        function deleteItem(id){
            document.querySelector("#delete_id").value = id;
            var deleteModal = new bootstrap.Modal(document.getElementById('delete_modal'));
            deleteModal.show();
        }

        function editItem(id){
            let url = `{{ route('user.edit', ':id') }}`.replace(':id', id);
            fetch(url)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((res) => {
                    document.querySelector("#edit_id").value = res.data.id;
                    document.querySelector("input[name='name']").value = res.data.name;
                    document.querySelector("input[name='email']").value = res.data.email;
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