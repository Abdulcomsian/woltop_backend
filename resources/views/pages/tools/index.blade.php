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
        function deleteTool(id){
            document.querySelector("#tool_id_delete").value = id;
            var deleteModal = new bootstrap.Modal(document.getElementById('delete_tool_modal'));
            deleteModal.show();
        }

        function editTool(id){
            let tool_id = id;
            let url = `{{ route('tool.edit', ':tool_id') }}`.replace(':tool_id', id);
            console.log('url',url)
            fetch(url)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((data) => {
                    document.querySelector("#tool_name_edit").value = data.data.name;
                    document.querySelector("#tool_id").value = data.data.id;
                    if(data.data.image != ""){
                        let imageUrl = data.data.image;
                        let url = `${imageUrl}`;
                        document.querySelector("#tool_image_style").style.backgroundImage = `url('${url}')`;
                    }
                    // var editModal = new bootstrap.Modal(document.getElementById('edit_tool_modal'));
            var editModal = new bootstrap.Modal(document.getElementById('edit_tool_modal'));

                    editModal.show();
                })
                .catch((error) => {
                    console.error('Error fetching tool:', error);
                });
        }

        // add modal validation
        let add_tool_form = document.querySelector("#add_tool_form");
        add_tool_form.addEventListener("submit", function(e){
            e.preventDefault();
            let formSubmit  = true;
            let tool_image = document.querySelector("#tool_imege_add").value;
            let tool_name = document.querySelector("#tool_name_add").value;
            if(tool_image == ""){
                document.querySelector("#add_tool_image_err").style.display = "block";
                formSubmit = false;
            }
            
            if(tool_name == ""){
                document.querySelector("#add_tool_name_err").style.display = "block";
                formSubmit = false;
            }


            if(formSubmit == true){
                this.submit()
            }
        })

        //edit modal validation
        let edit_tool_form = document.querySelector("#edit_tool_form");
        edit_tool_form.addEventListener("submit", function(e){
            e.preventDefault();
            let formSubmit  = true;
            let tool_image = document.querySelector("#tool_image_edit").value;
            let tool_name = document.querySelector("#tool_name_edit").value;
            let avatar_image = document.querySelector("#avatar_image").value;
            if(tool_image == "" && avatar_image == 1){
                document.querySelector("#edit_tool_image_err").style.display = "block";
                formSubmit = false;
            }
            
            if(tool_name == ""){
                document.querySelector("#edit_tool_name_err").style.display = "block";
                formSubmit = false;
            }


            if(formSubmit == true){
                this.submit()
            }
        })

    </script>
    @endpush
</x-default-layout>
