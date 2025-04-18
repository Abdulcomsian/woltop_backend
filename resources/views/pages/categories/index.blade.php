<x-default-layout>
    @section('page-title', 'Manage Categories')
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
                    Add
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
        ClassicEditor
                .create(document.querySelector("#description"))
                .catch(error => {
                    console.error(error);
                });


        ClassicEditor
                .create(document.querySelector("#edit_description"))
                .then( editor => {
                    window.editor = editor;
                })
                .catch(error => {
                    console.error(error);
                });
    
         
        function deleteCategory(id){
            document.querySelector("#category_id_delete").value = id;
            var deleteModal = new bootstrap.Modal(document.getElementById('delete_category_modal'));
            deleteModal.show();
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
                    if(data.data.description != null){
                        editor.setData(data.data.description);
                    }
                    document.querySelector("#category_name_edit").value = data.data.name;
                    document.querySelector("#category_id").value = data.data.id;
                    if(data.data.video != null){
                        let baseUrl = "{{ asset('assets/wolpin_media/categories/') }}";
                        let videoLink = `${baseUrl}/${data.data.video}`;
                        let video = `
                        <video width="400" controls>
                            <source src="${videoLink}" type="video/mp4">
                            Your browser does not support HTML video.
                        </video>
                        `;
                        document.querySelector("#video").innerHTML = video;
                    }else{
                        document.querySelector("#video").innerHTML = '';
                    }


                    if(data.data.banner_image != null){
                        let baseUrl = "{{ asset('assets/wolpin_media/categories/') }}";
                        let link = `${baseUrl}/${data.data.banner_image}`;
                        let video = `
                        <img src="${link}" alt="Banner Image" height="100">
                        `;
                        document.querySelector("#banner").innerHTML = video;
                    }else{
                        document.querySelector("#banner").innerHTML = '';
                    }

                    if(data.data.image != ""){
                        let imageName = data.data.image;
                        let url = `{{asset("assets/wolpin_media/categories/" . ':imageurl')}}`.replace(":imageurl", imageName);
                        document.querySelector("#category_image_style").style.backgroundImage = `url('${url}')`;
                    }
                    const parentCategorySelect = document.querySelector('select[name="edit_parent_cat_id"]');
                    const parentCatId = data.data.parent_category_id;
                    if(parentCatId != null){
                        parentCategorySelect.value = parentCatId;
                        $(parentCategorySelect).val(parentCatId).trigger('change');
                    }else{
                        parentCategorySelect.value = 'none';
                        $(parentCategorySelect).val('none').trigger('change');
                    }

                    document.querySelector("#intro_heading").value = data.data.intro_heading;
                    document.querySelector("#intro_description").value = data.data.intro_description;
                    var editModal = new bootstrap.Modal(document.getElementById('edit_category_modal'));
                    editModal.show();
                })
                .catch((error) => {
                    console.error('Error fetching category:', error);
                });
        }

        // add modal validation
        let add_categoy_form = document.querySelector("#add_categoy_form");
        add_categoy_form.addEventListener("submit", function(e){
            e.preventDefault();
            let formSubmit  = true;
            let category_image = document.querySelector("#category_imege_add").value;
            let category_name = document.querySelector("#category_name_add").value;
            if(category_image == ""){
                document.querySelector("#add_category_image_err").style.display = "block";
                formSubmit = false;
            }
            
            if(category_name == ""){
                document.querySelector("#add_category_name_err").style.display = "block";
                formSubmit = false;
            }


            if(formSubmit == true){
                this.submit()
            }
        })

        //edit modal validation
        let edit_categoy_form = document.querySelector("#edit_categoy_form");
        edit_categoy_form.addEventListener("submit", function(e){
            e.preventDefault();
            let formSubmit  = true;
            let category_image = document.querySelector("#category_image_edit").value;
            let category_name = document.querySelector("#category_name_edit").value;
            let avatar_image = document.querySelector("#avatar_image").value;
            if(category_image == "" && avatar_image == 1){
                document.querySelector("#edit_category_image_err").style.display = "block";
                formSubmit = false;
            }
            
            if(category_name == ""){
                document.querySelector("#edit_category_name_err").style.display = "block";
                formSubmit = false;
            }


            if(formSubmit == true){
                this.submit()
            }
        })

    </script>
    @endpush
</x-default-layout>