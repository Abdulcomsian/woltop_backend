<x-default-layout>
    @section('page-title', 'Manage Orders')
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                 <!--begin::Toolbar-->
                 <div data-kt-user-table-toolbar="base">
                    <span>Orders</span>
                </div>
                <!--end::Toolbar-->
            </div>
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
    @include('partials.modals.orders.address')
    @push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        function viewAddress(event, address_id){
            event.preventDefault();
            const url = "{{route('order.get.address')}}";            
            const options = {
                method: "POST",
                body: JSON.stringify({
                    _token: "{{csrf_token()}}",
                    address_id,
                }),
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
            };


            fetch(url, options).then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(res => {
                if (res.success) {
                    document.querySelector("#main-table-content").innerHTML = res.data;
                    var modal = new bootstrap.Modal(document.getElementById('address_modal'));
                    modal.show();
                } else {
                    console.error("Error:", res.message);
                }
            }).catch((error) => {
                console.log(error);
            })
        }
    </script>
    @endpush
</x-default-layout>