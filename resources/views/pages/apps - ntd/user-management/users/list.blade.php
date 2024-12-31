<x-default-layout>

    @section('title')
        Users
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('user-management.users.index') }}
    @endsection

    

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            document.getElementById('mySearchInput').addEventListener('keyup', function () {
                window.LaravelDataTables['users-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:load', function () {
                Livewire.on('success', function () {
                    $('#kt_modal_add_user').modal('hide');
                    window.LaravelDataTables['users-table'].ajax.reload();
                });
            });
        </script>
    @endpush

</x-default-layout>
