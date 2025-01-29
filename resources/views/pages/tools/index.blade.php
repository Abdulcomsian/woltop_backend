<x-default-layout>
    @section('page-title', 'Manage Tools')
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                 <!--begin::Toolbar-->
                 <div data-kt-user-table-toolbar="base">
                    <span>Tools</span>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Add user-->
                <a href="#"> {{-- open model here --}}
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tool_modal_id">
                        <span><i class="fa fa-plus"></i></span>
                        Add
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

    @include('partials.modals.tools.add')
    @include('partials.modals.tools.edit')
    @include('partials.modals.tools.delete')
    @push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        function deleteItem(id){
            document.querySelector("#tool_id_delete").value = id;
            var deleteModal = new bootstrap.Modal(document.getElementById('delete_tool_modal'));
            deleteModal.show();
        }

        function editItem(id){
            let tool_id = id;
            let url = `{{ route('tool.edit', ':tool_id') }}`.replace(':tool_id', tool_id);
            console.log('url',url)
            fetch(url)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((data) => {
                    document.querySelector("#name").value = data.data.name;
                    document.querySelector("#description").value = data.data.description;
                    document.querySelector("#price").value = data.data.price;
                    document.querySelector("#sale_price").value = data.data.sale_price;
                    document.querySelector("#edit_id").value = data.data.id;
                    if(data.data.image != ""){
                        let imageName = data.data.image;
                        let url = `{{asset("assets/wolpin_media/tools/" . ':imageurl')}}`.replace(":imageurl", imageName);
                        document.querySelector("#tool_image").style.backgroundImage = `url('${url}')`
                        document.querySelector("input[name='avatar_remove']").value = 0; // means there is picture
                    }
                    var editModal = new bootstrap.Modal(document.getElementById('edit_modal'));
                    editModal.show();
                })
                .catch((error) => {
                    console.error('Error fetching tool:', error);
                });
        }


        function validateForm(form, isEdit = false) {
            let fields = [
                { selector: "input[name='name']", type: "input" },
                { selector: "textarea[name='description']", type: "textarea" },
                { selector: "input[name='price']", type: "input" },
                { selector: "input[name='sale_price']", type: "input" }
            ];
            if(isEdit){ // means its edit
                fields.push({selector: "input[name='avatar_remove']", type: "input"});
            }else{ // means its add
                fields.push({ selector: "input[name='image']", type: "input" });
            }

            form.querySelectorAll(".text-danger").forEach(el => el.remove());
            let isValid = true;
            fields.forEach(field => {
                let element = form.querySelector(field.selector);
                if (element && (element.value.trim() === "" || element.value.trim() == 1)) {
                    isValid = false;
                    let errorSpan = document.createElement("span");
                    errorSpan.classList.add("text-danger");
                    errorSpan.innerText = "This field is required";
                    if (!element.parentNode.querySelector(".text-danger")) {
                        element.parentNode.appendChild(errorSpan);
                    }
                }
            });

            return isValid;
        }

        document.querySelector(".submitFormAdd").addEventListener("submit", function(e) {
            e.preventDefault();
            if (validateForm(this)) {
                this.submit();
            }
        });

        document.querySelector(".submitFormEdit").addEventListener("submit", function(e) {
            e.preventDefault();
            if (validateForm(this, true)) { // true means it's edit mode
                this.submit();
            }
        });
    </script>
    @endpush
</x-default-layout>
