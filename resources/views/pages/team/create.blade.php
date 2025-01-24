<x-default-layout>
@section('page-title', 'Add Team Member')

<div class="card scroll-y ">
<div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                 <!--begin::Toolbar-->
                 <div data-kt-user-table-toolbar="base">
                    <span>Team information</span>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--begin::Card toolbar-->
            
            <!--end::Card toolbar-->
        </div>
<div class="card-body py-4">
<div class="row">
    {{-- add form content here  --}}
    


  <!--begin::Form-->
  <form action="{{route('store.category')}}" id="add_categoy_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column  " id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                           
                            <!--begin::Image placeholder-->
                            <style>
                                .image-input-placeholder {
                                    background-image: url('{{ image(' svg/files/blank-image.svg') }}');
                                }

                                [data-bs-theme="dark"] .image-input-placeholder {
                                    background-image: url('{{ image(' svg/files/blank-image-dark.svg') }}');
                                }
                            </style>

                             <!-- Featured Image Tab -->
             
                      
                            <!--begin::Image input-->
                           
                           
                         
                      
                            
                    
                      
                    </div>
                  
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Image</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="file" name="image" id="category_name_add" 
                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Image" />
                        <span class="text-danger" id="add_category_name_err"
                         style="display: none;">Category name is required</span>
                        <!--end::Input-->
              
                        <span class="text-danger"></span> 
                    </div>
                    <!--end::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="name" id="category_name_add" 
                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder=" Name" />
                        <span class="text-danger" id="add_category_name_err"
                         style="display: none;">Category name is required</span>
                        <!--end::Input-->
              
                        <span class="text-danger"></span> 
                    </div>
                    <!--end::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Designation</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="designation" id="category_name_add" 
                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Designation" />
                        <span class="text-danger" id="add_category_name_err"
                         style="display: none;">Category name is required</span>
                        <!--end::Input-->
              
                        <span class="text-danger"></span> 
                    </div>
                    <!--end::Input group-->
                    <!--end::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Bio</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <!-- <input type="textarea" name="bio" id="bio_add" 
                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="bio" /> -->
                        <textarea class="form-control " id="exampleFormControlTextarea1" rows="3"></textarea>
                        <span class="text-danger" id="add_category_name_err"
                         style="display: none;">Category name is required</span>
                        <!--end::Input-->
              
                        <span class="text-danger"></span> 
                    </div>
                    <!--end::Input group-->
              
            </div>
            <!--end::Scroll-->
           
            </form>

           
            <!--end::Form-->


</div>
</div>
</div>


<div>


<div class="card mt-4 mb-4 ">
<div class="card-header border-0  pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                 <!--begin::Toolbar-->
                 <div data-kt-user-table-toolbar="base">
                    <span>Social Media</span>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--begin::Card toolbar-->
            
            <!--end::Card toolbar-->
        </div>
    <div class="card-body">
             <!--end::Input group-->
             <div class="row mb-4 ">
             <div class="col-md-4">
                <label for="inputCity" class="form-label">Portfolio website</label>
                   <!--begin::Input-->
                   <input type="text" name="portfolio_website" id="portfolio_website_add" 
                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Portfolio Website" />
                        <span class="text-danger" id="add_category_name_err"
                         style="display: none;">Category name is required</span>
                        <!--end::Input-->
            </div>
             <div class="col-md-4">
                <label for="inputCity" class="form-label">LinkedIn Profile</label>
                 <!--begin::Input-->
                 <input type="text" name="linkedIn_profile" id="linkedIn_profile_add" 
                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="LinkedIn Profile" />
                        <span class="text-danger" id="add_category_name_err"
                         style="display: none;">Category name is required</span>
                        <!--end::Input-->
            </div>
             <div class="col-md-4">
                <label for="inputCity" class="form-label">Facebook Profile</label>
                <!--begin::Input-->
                <input type="text" name="facebook_profile" id="linkedIn_profile_add" 
                         class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Facebook Profile" />
                        <span class="text-danger" id="add_category_name_err"
                         style="display: none;">Category name is required</span>
                        <!--end::Input-->
              
                        <span class="text-danger"></span> 
            </div>
    </div>
            
                    
                
                    <!--end::Input group-->
                      <!--end::Input group-->
                      <div class="row mb-7">
                      <div class="col-md-6">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">X Profile</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="x_profile" id="x_profile_add" 
                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="X Profile" />
                        <span class="text-danger" id="add_category_name_err"
                         style="display: none;">Category name is required</span>
                        <!--end::Input-->
              
                        <span class="text-danger"></span> 
                    </div>
                   
                      <div class="col-md-6">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Youtube Profile</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="youtube_profile" id="youtube_profile_add" 
                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Youtube Profile" />
                        <span class="text-danger" id="add_category_name_err"
                         style="display: none;">Category name is required</span>
                        <!--end::Input-->
              
                        <span class="text-danger"></span> 
                    </div>
                    </div>
                    <!--end::Input group-->
                  
    </div>
</div>

 <!--begin::Actions-->
 <div class="d-flex justify-content-end mt-5 mb-5">
                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">
                        Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>
            </div>
            <!--end::Actions-->
</div>
@include('partials.modals.product.delete')
    @push('scripts')
        <script>
            // Existing deleteProduct function
            function deleteProduct(id) {
                document.querySelector("#product_id_delete").value = id;
                var deleteModal = new bootstrap.Modal(document.getElementById('delete_product_modal'));
                deleteModal.show();
            }

            // Existing Dropzone initialization
            Dropzone.autoDiscover = false;

            const featuredImageUploadDropzone = new Dropzone("#featured-image-upload", {
                // url: saveMultipleFilesFromDropZoneRoute, // Uncomment and provide actual URL if needed
                uploadMultiple: true,
                parallelUploads: 100,
                maxFiles: 100,
                acceptedFiles: ".pdf", // Accept only PDF files
                addRemoveLinks: true,
                dictRemoveFile: "Remove",
                dictDefaultMessage: "Drag & Drop or Click to Upload",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                init: function() {
                    // Validate file type when added
                    this.on("addedfile", function(file) {
                        if (!file.type.match('application/pdf')) {
                            this.removeFile(file); // Remove invalid file
                            showErrorNotification('Only PDFs are allowed.');
                        }
                    });

                    // Handle sending additional form data when a file is uploaded
                    this.on("sending", function(file, xhr, formData) {
                        formData.append('type', 'product_compatibility_files');
                        formData.append('page_id', pageId); // Assuming `pageId` is defined elsewhere
                        formData.append('folder', 'product_compatibility');
                    });

                    // Handle successful multiple file uploads
                    this.on("successmultiple", function(files, response) {
                        if (response.status && response.file_details.length === files.length) {
                            files.forEach((file, index) => {
                                const fileData = response.file_details[index];
                                file.file_id = fileData.file_id;
                            });
                            showSuccessNotification(response.message);
                        } else {
                            showErrorNotification("Mismatch between uploaded files and server response.");
                        }
                    });

                    // Handle file removal event
                    this.on("removedfile", function(file) {
                        console.log('File removed:', file);
                    });
                }
            });

            const galleryUploadDropzone = new Dropzone("#gallery-upload", {
                // url: saveMultipleFilesFromDropZoneRoute, // Uncomment and provide actual URL if needed
                uploadMultiple: true,
                parallelUploads: 100,
                maxFiles: 100,
                acceptedFiles: ".pdf", // Accept only PDF files
                addRemoveLinks: true,
                dictRemoveFile: "Remove",
                dictDefaultMessage: "Drag & Drop or Click to Upload",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                init: function() {
                    // Validate file type when added
                    this.on("addedfile", function(file) {
                        if (!file.type.match('application/pdf')) {
                            this.removeFile(file); // Remove invalid file
                            showErrorNotification('Only PDFs are allowed.');
                        }
                    });

                    // Handle sending additional form data when a file is uploaded
                    this.on("sending", function(file, xhr, formData) {
                        formData.append('type', 'product_compatibility_files');
                        formData.append('page_id', pageId); // Assuming `pageId` is defined elsewhere
                        formData.append('folder', 'product_compatibility');
                    });

                    // Handle successful multiple file uploads
                    this.on("successmultiple", function(files, response) {
                        if (response.status && response.file_details.length === files.length) {
                            files.forEach((file, index) => {
                                const fileData = response.file_details[index];
                                file.file_id = fileData.file_id;
                            });
                            showSuccessNotification(response.message);
                        } else {
                            showErrorNotification("Mismatch between uploaded files and server response.");
                        }
                    });

                    // Handle file removal event
                    this.on("removedfile", function(file) {
                        console.log('File removed:', file);
                    });
                }
            });

            // Existing Select2 initialization
            $(document).ready(function() {
                $('#parent-category').select2({
                    placeholder: "Select Parent Category",
                    allowClear: true
                });

                $('#category').select2({
                    placeholder: "Select Category",
                    allowClear: true,
                });

                $('#tags').select2({
                    placeholder: "Select Tags",
                    allowClear: true,
                });

                $('#productType').select2({
                    placeholder: "Select Type",
                    allowClear: true,
                });
            });

            // Existing ClassicEditor initialization
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });

            // Existing Next and Save Product button logic
            document.addEventListener('DOMContentLoaded', function() {
                const tabs = document.querySelectorAll('#product-tabs .nav-link');
                const nextButton = document.querySelector('.next-tab-btn');
                const saveButton = document.querySelector('.btn-primary:not(.next-tab-btn)');

                function updateButtons() {
                    const activeTabIndex = Array.from(tabs).findIndex(tab => tab.classList.contains('active'));

                    if (activeTabIndex === tabs.length - 1) {
                        nextButton.style.display = 'none';
                        saveButton.style.display = 'inline-block';
                    } else {
                        nextButton.style.display = 'inline-block';
                        saveButton.style.display = 'none';
                    }
                }

                nextButton.addEventListener('click', function() {
                    const activeTabIndex = Array.from(tabs).findIndex(tab => tab.classList.contains('active'));
                    if (activeTabIndex < tabs.length - 1) {
                        const currentTab = tabs[activeTabIndex];
                        const nextTab = tabs[activeTabIndex + 1];
                        currentTab.classList.remove('active');
                        nextTab.classList.add('active');
                        document.querySelector(currentTab.dataset.bsTarget).classList.remove('show', 'active');
                        document.querySelector(nextTab.dataset.bsTarget).classList.add('show', 'active');
                        updateButtons();
                    }
                });

                tabs.forEach(tab => {
                    tab.addEventListener('shown.bs.tab', updateButtons);
                });

                updateButtons();
            });

            // Existing gallery drag-and-drop logic
            document.addEventListener('DOMContentLoaded', function() {
                const gallery = document.querySelector('.gallery-images .row');

                gallery.addEventListener('dragstart', function(e) {
                    if (e.target.classList.contains('image-item')) {
                        e.target.classList.add('dragging');
                    }
                });

                gallery.addEventListener('dragend', function(e) {
                    if (e.target.classList.contains('image-item')) {
                        e.target.classList.remove('dragging');
                    }
                });

                gallery.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    const draggingItem = document.querySelector('.dragging');
                    const afterElement = getDragAfterElement(gallery, e.clientY);

                    if (afterElement == null) {
                        gallery.appendChild(draggingItem);
                    } else {
                        gallery.insertBefore(draggingItem, afterElement);
                    }
                });

                function getDragAfterElement(container, y) {
                    const draggableElements = [...container.querySelectorAll('.image-item:not(.dragging)')];

                    return draggableElements.reduce((closest, child) => {
                        const box = child.getBoundingClientRect();
                        const offset = y - box.top - box.height / 2;

                        if (offset < 0 && offset > closest.offset) {
                            return {
                                offset: offset,
                                element: child
                            };
                        } else {
                            return closest;
                        }
                    }, {
                        offset: Number.NEGATIVE_INFINITY
                    }).element;
                }

                document.querySelectorAll('.delete-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const imageItem = this.closest('.image-item');
                        imageItem.remove();
                    });
                });
            });

            // Product type logic
            document.addEventListener('DOMContentLoaded', function() {
                const productTypeDropdown = document.getElementById('productType');
                const simpleProductForm = document.getElementById('simpleProductForm');
                const variableProductForm = document.getElementById('variableProductForm');

                if (!productTypeDropdown || !simpleProductForm || !variableProductForm) {
                    console.error('One or more elements not found!'); // Debugging
                    return;
                }

                function toggleForms() {
                    if (productTypeDropdown.value === 'simple') {
                        simpleProductForm.style.display = 'block';
                        variableProductForm.style.display = 'none';
                    } else if (productTypeDropdown.value === 'variable') {
                        simpleProductForm.style.display = 'none';
                        variableProductForm.style.display = 'block';
                    }
                }

                toggleForms();

                $(productTypeDropdown).on('change', toggleForms);
            });


            // variation add remove login
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('addSection').addEventListener('click', function() {
                    const sectionsContainer = document.getElementById('sectionsContainer');
                    const newSection = document.querySelector('.section').cloneNode(
                        true);

                    newSection.querySelector('.attributeName').value = '';
                    newSection.querySelector('.attributeValue').value = '';

                    sectionsContainer.appendChild(newSection);
                });

                document.getElementById('sectionsContainer').addEventListener('click', function(e) {
                    if (e.target.classList.contains('removeSection')) {
                        e.target.closest('.section').remove();
                    }
                });
            });
        </script>
    @endpush
</x-default-layout>