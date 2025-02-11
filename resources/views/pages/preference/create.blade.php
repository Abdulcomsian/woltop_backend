<x-default-layout>
    <style>
        #addSection {
            display: block !important;
        }
    </style>

    @section('page-title', 'Add Delivery Preferences')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('preference.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-4">
            <div class="col-md-8">
                <label for="delivery" class="form-label fw-semibold">Delivery Preference</label>
                <small class="text-muted d-block mb-2">
                    Add your Delivery preferences below.
                </small>
                <div id="dynamicFieldsContainer">
                    <!-- Initial question and answer field -->
                    <div class="card relative mb-3">
                        <div class="card-body p-4">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control mb-2" placeholder="Name" name="preferences[0][name]"/>
                            <label class="form-label">Time</label>
                            <input type="text" class="form-control" placeholder="Time" name="preferences[0][time]"/>
                            <span class="text-danger remove-field cursor-pointer position-absolute p-2"
                                style="top: 0; right: 10px;">
                                Remove
                            </span>
                        </div>
                    </div>
                </div>
                <button id="addFieldButton" class="btn btn-primary mt-3" type="button">Add More</button>
            </div>
            <hr class="dotted-line my-4">
        </div>
    
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const container = document.getElementById('dynamicFieldsContainer');
                const addButton = document.getElementById('addFieldButton');
                let index = 0;

                function addField() {
                    index++;
                    const fieldHTML = `
                         <div class="card relative mb-3">
                            <div class="card-body p-4">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control mb-2" placeholder="Name" name="preferences[${index}][name]"/>
                                <label class="form-label">Time</label>
                                <input type="text" class="form-control" placeholder="Time" name="preferences[${index}][time]"/>
                                <span class="text-danger remove-field cursor-pointer position-absolute p-2"
                                    style="top: 0; right: 10px;">
                                    Remove
                                </span>
                            </div>
                        </div>
                    `;
                    container.insertAdjacentHTML('beforeend', fieldHTML);
                }

                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-field')) {
                        e.target.closest('.card').remove(); // Target the closest card to remove
                    }
                });

                addButton.addEventListener('click', addField);
            });
        </script>
    @endpush
</x-default-layout>
