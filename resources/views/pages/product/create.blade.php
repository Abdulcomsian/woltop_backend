<x-default-layout>
    <style>
        /* navigation style start.. */
        .nav-tabs .nav-link {
            color: black;
        }

        .nav-tabs .nav-link:hover {
            color: #3E97FF;
        }

        .nav-tabs .nav-link.active {
            color: #3E97FF;
            font-weight: 500;
        }

        .nav-tabs .nav-link.active:hover {
            color: #3E97FF;
        }

        /* navigation style end... */

        /* drags imags styles start.. */
        .gallery-images .image-item {
            cursor: grab;
        }

        .gallery-images .image-item:active {
            cursor: grabbing;
        }

        .gallery-images .card {
            position: relative;
        }

        .gallery-images .delete-btn,
        .gallery-images .drag-handle {
            padding: 0.25rem 0.5rem;
        }

        .gallery-images .drag-handle {
            cursor: move;
        }

        /* drags imags styles end.. */
    </style>
    @section('page-title', 'Products')
    <div class="row g-4">
        <!-- Tabs Navigation -->
        <div class="nav-tabs-container" style="overflow-x: auto; white-space: nowrap;">
            <ul class="nav nav-tabs mb-4 text-white" id="product-tabs" role="tablist"
                style="display: inline-flex; flex-wrap: nowrap;">
                <li class="nav-item">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                        data-bs-target="#description-section" type="button" role="tab"
                        aria-controls="description-section" aria-selected="false">
                        Basic Info
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="featured-tab" data-bs-toggle="tab" data-bs-target="#featured"
                        type="button" role="tab" aria-controls="featured" aria-selected="true">
                        Featured Image
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery"
                        type="button" role="tab" aria-controls="gallery" aria-selected="false">
                        Gallery
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="categories-tab" data-bs-toggle="tab" data-bs-target="#categories"
                        type="button" role="tab" aria-controls="categories" aria-selected="false">
                        Categories
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="product-type-tab" data-bs-toggle="tab" data-bs-target="#product-type"
                        type="button" role="tab" aria-controls="product-type" aria-selected="false">
                        Product Type
                    </button>
                </li>
            </ul>
        </div>

        <!-- Tab Content -->
        <div class="tab-content" id="product-tabs-content">
            <!-- Description Tab -->
            <div class="tab-pane fade show active" id="description-section" role="tabpanel"
                aria-labelledby="description-tab">
                <div class="col-md-4">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <small class="text-muted d-block">
                        Edit your product description and necessary information from here.
                    </small>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body py-4">
                            <!-- Name Input Field -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" class="form-control"
                                    placeholder="Enter product name">
                            </div>

                            <!-- Slug Input Field -->
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" id="slug" class="form-control"
                                    placeholder="Enter product slug" readonly>
                            </div>

                            <!-- Description Textarea -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Status</label><br>
                                <!-- Published Radio Button -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="published"
                                        value="published">
                                    <label class="form-check-label" for="published">Published</label>
                                </div>
                                <!-- Draft Radio Button -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="draft"
                                        value="draft" checked>
                                    <label class="form-check-label" for="draft">Draft</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="dotted-line my-4">
            </div>
            <!-- Featured Image Tab -->
            <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab"
                style="flex-wrap: nowrap;">
                <div class="col-md-4">
                    <label for="featured-image" class="form-label fw-semibold">Featured Image</label>
                    <small class="text-muted d-block">
                        Upload your product featured image here.<br>
                        Image size should not be more than 2 MB.
                    </small>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body py-4">
                            <!-- Featured Image Dropzone -->
                            <form action="/upload" method="POST" enctype="multipart/form-data"
                                id="featured-image-upload" class="dropzone custom-page-dropzone">
                                <div class="dz-message text-gray-600">
                                    <span class="block text-lg font-semibold">Drag & Drop or Click to Upload PDF</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr class="dotted-line my-4">
            </div>

            <!-- Gallery Tab -->
            <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                <div class="col-md-4">
                    <label for="gallery-upload" class="form-label fw-semibold">Gallery</label>
                    <small class="text-muted d-block">
                        Upload your product image gallery here.<br>
                        Image size should not be more than 2 MB.
                    </small>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body py-4">
                            <!-- Gallery Dropzone -->
                            <form action="/upload" method="POST" enctype="multipart/form-data" id="gallery-upload"
                                class="dropzone custom-page-dropzone">
                                <div class="dz-message text-gray-600">
                                    <span class="block text-lg font-semibold">Drag & Drop or Click to Upload
                                        Images</span>
                                </div>
                            </form>

                            <!-- Gallery Images Section -->
                            <div class="gallery-images mt-4">
                                <div class="row">
                                    <!-- Example Image 1 -->
                                    <div class="col-md-4 mb-3 image-item" draggable="true">
                                        <div class="card">
                                            <img src="https://via.placeholder.com/150" class="card-img-top"
                                                alt="Gallery Image 1">
                                            <div class="card-body d-flex justify-content-end">
                                                <button class="btn btn-sm btn-danger me-2 delete-btn" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <button class="btn btn-sm btn-secondary drag-handle"
                                                    title="Drag to Sort">
                                                    <i class="fas fa-arrows-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Example Image 2 -->
                                    <div class="col-md-4 mb-3 image-item" draggable="true">
                                        <div class="card">
                                            <img src="https://via.placeholder.com/150" class="card-img-top"
                                                alt="Gallery Image 2">
                                            <div class="card-body d-flex justify-content-end">
                                                <button class="btn btn-sm btn-danger me-2 delete-btn" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <button class="btn btn-sm btn-secondary drag-handle"
                                                    title="Drag to Sort">
                                                    <i class="fas fa-arrows-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Example Image 3 -->
                                    <div class="col-md-4 mb-3 image-item" draggable="true">
                                        <div class="card">
                                            <img src="https://via.placeholder.com/150" class="card-img-top"
                                                alt="Gallery Image 3">
                                            <div class="card-body d-flex justify-content-end">
                                                <button class="btn btn-sm btn-danger me-2 delete-btn" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <button class="btn btn-sm btn-secondary drag-handle"
                                                    title="Drag to Sort">
                                                    <i class="fas fa-arrows-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="dotted-line my-4">
            </div>

            <!-- Categories Tab -->
            <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
                <div class="col-md-4">
                    <label for="categories" class="form-label fw-semibold">Categories</label>
                    <small class="text-muted d-block">Select categories from here.</small>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body py-4">
                            <!-- Parent Category Select -->
                            <div class="mb-3">
                                <label for="parent-category" class="form-label">Parent Category</label>
                                <select id="parent-category" class="form-select">
                                    <option value="">Select Parent Category</option>
                                    <option value="1">Category 1</option>
                                    <option value="2">Category 2</option>
                                    <option value="3">Category 3</option>
                                </select>
                            </div>

                            <!-- Category Select -->
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select id="category" class="form-select" multiple="multiple">
                                    <option value="a">Category A</option>
                                    <option value="b">Category B</option>
                                    <option value="c">Category C</option>
                                </select>
                            </div>

                            <!-- Tags Select -->
                            <div class="mb-3">
                                <label for="tags" class="form-label">Tags</label>
                                <select id="tags" class="form-select" multiple="multiple">
                                    <option value="a">Tag A</option>
                                    <option value="b">Tag B</option>
                                    <option value="c">Tag C</option>
                                </select>
                                <small class="text-muted">Select multiple tags if needed.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="dotted-line my-4">
            </div>

            <!-- Product Type Tab -->
            <div class="tab-pane fade" id="product-type" role="tabpanel" aria-labelledby="product-type-tab">
                <div class="col-md-4">
                    <label for="productType" class="form-label fw-semibold">Product Type</label>
                    <small class="text-muted d-block">Select product type from here.</small>
                </div>
                <div class="col-md-8 mb-5">
                    <div class="card">
                        <div class="card-body py-4">
                            <div class="mb-3">
                                <label for="productType" class="form-label">Product Type</label>
                                <select id="productType" class="form-select">
                                    <option value="simple">Simple Product</option>
                                    <option value="variable">Variable Product</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Simple Product Form -->
                <div id="simpleProductForm" class="col-md-8" style="display: none;">
                    <div class="col-md-4">
                        <label for="product-variation" class="form-label fw-semibold">Simple Product
                            Information</label>
                        <small class="text-muted d-block">
                            Add your simple product description and necessary information
                        </small>
                    </div>
                    <div class="card">
                        <div class="card-body py-4">
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" id="price" class="form-control" placeholder="Enter Price">
                            </div>
                            <div class="mb-3">
                                <label for="salePrice" class="form-label">Sale Price</label>
                                <input type="number" id="salePrice" class="form-control"
                                    placeholder="Enter Sale Price">
                            </div>
                            <div class="mb-3">
                                <label for="SKU" class="form-label">SKU</label>
                                <input type="number" id="sku" class="form-control" placeholder="Enter SKU">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Variable Product Form -->
                <div id="variableProductForm" class="col-md-8" style="display: none;">
                    <div class="col-md-4">
                        <label for="product-variation" class="form-label fw-semibold">Product Variation
                            Information</label>
                        <small class="text-muted d-block">
                            Add your product variation and necessary information from here
                        </small>
                    </div>
                    <div id="sectionsContainer">
                        <!-- Initial section -->
                        <div class="card mb-3 section">
                            <div class="card-body d-flex gap-2 py-4">
                                <div class="row w-100 relative">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="attributeName" class="form-label">Attribute Name</label>
                                            <select class="form-select attributeName">
                                                <option value="">Select...</option>
                                                <option value="1">File Type</option>
                                                <option value="2">Color</option>
                                                <option value="3">Size</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="mb-3">
                                            <label for="attributeValue" class="form-label">Attribute Value</label>
                                            <input type="text" class="form-control attributeValue"
                                                placeholder="Enter Attribute Value">
                                        </div>
                                    </div>
                                </div>
                                <span class="text-danger removeSection">Remove</span>
                            </div>
                        </div>
                    </div>
                    <button id="addSection" class="btn btn-primary mt-3">Add New Section</button>
                </div>

                <hr class="dotted-line my-4">
            </div>
        </div>
        <div class="d-flex justify-content-end">
            {{-- <button type="button" class="btn btn-secondary me-2">Cancel</button> --}}
            <button type="button" class="btn btn-primary next-tab-btn me-2">Next</button>
            <button type="button" class="btn btn-primary">Save Product</button>
        </div>
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
