<x-default-layout>
    @section('page-title', 'Products')
    <div class="row g-4">
        <!-- <form action=""> -->
            <!-- Featured Image Section -->
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
                        <form action="/upload" method="POST" enctype="multipart/form-data" id="featured-image-upload" class="dropzone custom-page-dropzone">
                            <div class="dz-message text-gray-600">
                                <span class="block text-lg font-semibold">Drag & Drop or Click to Upload PDF</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr class="dotted-line my-4">

            <!-- Gallery Section -->
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
                        <form action="/upload" method="POST" enctype="multipart/form-data" id="gallery-upload" class="dropzone custom-page-dropzone">
                            <div class="dz-message text-gray-600">
                                <span class="block text-lg font-semibold">Drag & Drop or Click to Upload Images</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr class="dotted-line my-4">

            <!-- Categories Section -->
            <div class="col-md-4">
                <label for="categories" class="form-label fw-semibold">Categories</label>
                <small class="text-muted d-block">
                    Select categories from here.
                </small>
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

            <!-- Description Section -->
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
                            <input type="text" id="name" class="form-control" placeholder="Enter product name">
                        </div>

                        <!-- Slug Input Field -->
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" id="slug" class="form-control" placeholder="Enter product slug" readonly>
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
                                <input class="form-check-input" type="radio" name="status" id="published" value="published">
                                <label class="form-check-label" for="published">Published</label>
                            </div>
                            <!-- Draft Radio Button -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="draft" value="draft" checked>
                                <label class="form-check-label" for="draft">Draft</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="dotted-line my-4">

            <!-- Product Type Section -->
            <div class="col-md-4">
                <label for="product-type" class="form-label fw-semibold">Product Type</label>
                <small class="text-muted d-block">
                    Select product type from here.
                </small>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body py-4">
                        <div class="mb-3">
                            <label for="productType" class="form-label">Product Type</label>
                            <select id="productType" class="form-select">
                                <option value="a">Simple Product</option>
                                <option value="b">Variable Product</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="dotted-line my-4">

            <!-- Product Variation Information Section -->
            <div class="col-md-4">
                <label for="product-variation" class="form-label fw-semibold">Product Variation Information</label>
                <small class="text-muted d-block">
                    Add your product variation and necessary information from here.
                </small>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body py-4">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" id="price" class="form-control" placeholder="Enter Price">
                        </div>

                        <div class="mb-3">
                            <label for="salePrice" class="form-label">Sale Price</label>
                            <input type="number" id="price" class="form-control" placeholder="Enter Sale Price">
                        </div>

                        <div class="mb-3">
                            <label for="SKU" class="form-label">SKU</label>
                            <input type="number" id="sku" class="form-control" placeholder="Enter SKU">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" style="margin-right: 5px;">Cancel</button>
                <button type="button" class="btn btn-primary" style="margin-left: 0px;">Save Product</button>
            </div>
            <hr class="dotted-line my-4">
        <!-- </form> -->
    </div>

    @include('partials.modals.product.delete')
    @push('scripts')
    <script>
        function deleteProduct(id) {
            document.querySelector("#product_id_delete").value = id;
            var deleteModal = new bootstrap.Modal(document.getElementById('delete_product_modal'));
            deleteModal.show();
        }

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
                    // You can add any cleanup or additional logic when a file is removed, if necessary
                    // Example: Send a request to the server to delete the file or update the UI accordingly
                    console.log('File removed:', file);
                    // You could also call a function like `deleteFileOnServer(file.file_id)` if needed
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
                    // You can add any cleanup or additional logic when a file is removed, if necessary
                    // Example: Send a request to the server to delete the file or update the UI accordingly
                    console.log('File removed:', file);
                    // You could also call a function like `deleteFileOnServer(file.file_id)` if needed
                });
            }
        });

        $(document).ready(function() {
            // Initialize Select2 on the select element
            $('#parent-category').select2({
                placeholder: "Select Parent Category", // Placeholder text
                allowClear: true // Option to clear selection
            });

            $('#category').select2({
                placeholder: "Select Category", // Placeholder text
                allowClear: true, // Option to clear selection
            });

            $('#tags').select2({
                placeholder: "Select Tags", // Placeholder text
                allowClear: true, // Option to clear selection
            });

            $('#productType').select2({
                placeholder: "Select Type", // Placeholder text
                allowClear: true, // Option to clear selection
            });
        });

        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
    @endpush
</x-default-layout>
