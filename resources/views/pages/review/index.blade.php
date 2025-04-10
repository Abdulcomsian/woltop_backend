<x-default-layout>
    <style>
        .rating-stars input[type="radio"] {
            display: none;
        }

        .rating-stars label {
            font-size: 2rem;
            color: #ddd;
            cursor: pointer;
            transition: color 0.2s;
        }

        .rating-stars input[type="radio"]:checked~label,
        .rating-stars label:hover,
        .rating-stars label:hover~label {
            color: #ffc107;
        }
    </style>
    @section('page-title', 'Manage Reviews')
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Toolbar-->
                <div data-kt-user-table-toolbar="base">
                    <span>Reviews</span>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Add user-->
                <a href="#"> {{-- open model here --}}
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_review">
                        <span><i class="fa fa-plus"></i></span>
                        Add Review
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
                {{ $dataTable->table() }}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    @include('partials.modals.reviews.add', ['data' => $products])
    @include('partials.modals.reviews.edit')
    @include('partials.modals.reviews.delete')
    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            function deleteItem(id) {
                document.querySelector("#delete_id").value = id;
                var deleteModal = new bootstrap.Modal(document.getElementById('delete_modal'));
                deleteModal.show();
            }

            function changeStatus(event, id) {
                let url = "{{ route('review.change.status') }}";
                let value = event.target.checked;

                fetch(url, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                        },
                        body: JSON.stringify({
                            id: id,
                            status: value
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success == true) {
                            console.log("Status changed successfully!");
                        } else {
                            alert("Failed to change status.");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
            }
        </script>
    @endpush
</x-default-layout>
