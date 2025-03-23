<x-default-layout>
    <style>
        /* navigation style start.. */
        .nav-tabs .nav-link {
            color: black;
            width: 220px;
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

        .nav-pills .nav-link {
            border-radius: 0;
            text-align: left;
            padding: 1rem;
            color: #333;
        }

        .nav-pills .nav-link.active {
            background-color: #007bff;
            color: white;
            border-radius: 4px !important;
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

        #addSection {
            display: block !important;
        }
    </style>
    @section('page-title', 'Products')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row g-4">
        <form action="{{ route('product.store') }}" class="submitForm"  method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Parent Tabs Navigation -->
            <div class="nav-tabs-container">
                <ul class="nav nav-tabs mb-4 text-white" id="parent-tabs" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="ps1-tab" data-bs-toggle="tab"
                            data-bs-target="#ps1-content" type="button" role="tab" aria-controls="ps1-content"
                            aria-selected="true">
                            Basic Information
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="ps2-tab" data-bs-toggle="tab" data-bs-target="#ps2-content"
                            type="button" role="tab" aria-controls="ps2-content" aria-selected="false">
                            Advanced Information
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="ps4-tab" data-bs-toggle="tab" data-bs-target="#ps4-content"
                            type="button" role="tab" aria-controls="ps4-content" aria-selected="false">
                            Product Features
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="ps3-tab" data-bs-toggle="tab" data-bs-target="#ps3-content"
                            type="button" role="tab" aria-controls="ps3-content" aria-selected="false">
                            SEO Details
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="ps5-tab" data-bs-toggle="tab" data-bs-target="#ps5-content"
                            type="button" role="tab" aria-controls="ps5-content" aria-selected="false">
                            UpSell Product
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Parent Tab Content -->
            <div class="tab-content" id="parent-tabs-content">

                <!-- PS1 Content -->
                <div class="tab-pane fade show active" id="ps1-content" role="tabpanel" aria-labelledby="ps1-tab">
                    <div class="row">
                        <!-- Vertical Child Tabs Navigation -->
                        <div class="col-md-3">
                            <div class="nav flex-column nav-pills me-3" id="ps1-child-tabs" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="pill"
                                    data-bs-target="#description-section" type="button" role="tab"
                                    aria-controls="description-section" aria-selected="true">
                                    Basic Info
                                </button>
                                <button class="nav-link" id="featured-tab" data-bs-toggle="pill"
                                    data-bs-target="#featured" type="button" role="tab" aria-controls="featured"
                                    aria-selected="false">
                                    Featured Image
                                </button>
                                <button class="nav-link" id="gallery-tab" data-bs-toggle="pill"
                                    data-bs-target="#gallery" type="button" role="tab" aria-controls="gallery"
                                    aria-selected="false">
                                    Gallery
                                </button>
                                <button class="nav-link" id="categories-tab" data-bs-toggle="pill"
                                    data-bs-target="#categories" type="button" role="tab"
                                    aria-controls="categories" aria-selected="false">
                                    Categories
                                </button>
                                <button class="nav-link" id="product-type-tab" data-bs-toggle="pill"
                                    data-bs-target="#product-type" type="button" role="tab"
                                    aria-controls="product-type" aria-selected="false">
                                    Product Type
                                </button>
                            </div>
                        </div>

                        <!-- Child Tab Content -->
                        <div class="col-md-9">
                            <div class="tab-content" id="ps1-child-tabs-content">
                                <!-- Description Tab -->
                                <div class="tab-pane fade show active" id="description-section" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    <div class="col-md-4">
                                        <label for="description" class="form-label fw-semibold">Description</label>
                                        <small class="text-muted d-block mb-2">
                                            Edit your product description and necessary information from here.
                                        </small>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-body py-4">
                                                <!-- Name Input Field -->
                                                <div class="mb-3">
                                                    <label for="name" class="required form-label">Name</label>
                                                    <input type="text" id="name" name="product_name"
                                                        class="form-control" placeholder="Enter product name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Short Description</label>
                                                    <textarea class="form-control"
                                                        name="short_description"
                                                        placeholder="Enter short description"></textarea>
                                                </div>

                                                <!-- Description Textarea -->
                                                <div class="mb-3">
                                                    <label for="description" class="required form-label">Description</label>
                                                    <textarea id="description" name="description"></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Status</label><br>
                                                    <!-- Published Radio Button -->
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="published" value="publish">
                                                        <label class="form-check-label"
                                                            for="published">Published</label>
                                                    </div>
                                                    <!-- Draft Radio Button -->
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="draft" value="draft" checked>
                                                        <label class="form-check-label" for="draft">Draft</label>
                                                    </div>
                                                </div>

                                                {{-- <div class="mb-3">
                                                    <label class="form-label fw-semibold">Is this an installable product or not?</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="is_installable" checked id="installable">
                                                        <label class="form-check-label"
                                                            for="installable">Is Installable</label>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="dotted-line my-4">
                                </div>

                                <!-- Featured Image Tab -->
                                <div class="tab-pane fade" id="featured" role="tabpanel"
                                    aria-labelledby="featured-tab" style="flex-wrap: nowrap;">
                                    <div class="col-md-4">
                                        <label for="featured-image" class="required form-label fw-semibold">Featured
                                            Image</label>
                                        <small class="text-muted d-block mb-2">
                                            Upload your product featured image here.<br>
                                            Image size should not be more than 2 MB.
                                        </small>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-body py-4">
                                                <!-- Featured Image Dropzone -->
                                                {{-- <div class="featured-image-dropzone dropzone custom-page-dropzone">
                                                    <div class="dz-message">
                                                        <div>
                                                            <img class="drop-img"
                                                                src="{{ asset('images/dropbox.png') }}"
                                                                alt="">
                                                        </div>
                                                        <h5 class="drop-zone__prompt2" style="color:black;">Upload Featured Image</h5>
                                                    </div>
                                                </div> --}}
                                                <input type="file" name="featured_image"
                                                    class="form-control form-control-solid" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="video" class="form-label fw-semibold">Video</label>
                                        <small class="text-muted d-block">
                                            Upload your product featured video here.<br>
                                            video size should not be more than 50 MB.
                                        </small>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-body py-4">
                                                <!-- Featured Image Dropzone -->
                                                {{-- <form action="/upload" method="POST" enctype="multipart/form-data"
                                                    id="featured-image-upload" class="dropzone custom-page-dropzone">
                                                    <div class="dz-message text-gray-600">
                                                        <span class="block text-lg font-semibold">Drag & Drop or Click to Upload
                                                            Video</span>
                                                    </div>
                                                </form> --}}
                                                <input type="file" name="video"
                                                    class="form-control form-control-solid" accept="video/*">
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="dotted-line my-4">
                                </div>

                                <!-- Gallery Tab -->
                                <div class="tab-pane fade" id="gallery" role="tabpanel"
                                    aria-labelledby="gallery-tab">
                                    <div class="col-md-4">
                                        <label for="gallery-upload" class="required form-label fw-semibold">Gallery</label>
                                        <small class="text-muted d-block mb-2">
                                            Upload your product image gallery here.<br>
                                            Image size should not be more than 2 MB.
                                        </small>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-body py-4">
                                                <!-- Gallery Dropzone -->
                                                {{-- <form action="/upload" method="POST" enctype="multipart/form-data" id="gallery-upload"
                                                        class="dropzone custom-page-dropzone">
                                                        <div class="dz-message text-gray-600">
                                                            <span class="block text-lg font-semibold">Drag & Drop or Click to Upload
                                                                Images</span>
                                                        </div>
                                                    </form> --}}

                                                <input type="file" name="gallery_images[]"
                                                    class="form-control form-control-solid" accept="image/*" multiple>

                                                <!-- Gallery Images Section -->
                                                {{-- <div class="gallery-images mt-4">
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
                                                        </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="dotted-line my-4">
                                </div>

                                <!-- Categories Tab -->
                                <div class="tab-pane fade" id="categories" role="tabpanel"
                                    aria-labelledby="categories-tab">
                                    <div class="col-md-4">
                                        <label for="categories" class="form-label fw-semibold">Categories</label>
                                        <small class="text-muted d-block mb-2">Select categories from here.</small>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-body py-4">
                                                <!-- Parent Category Select -->
                                                <div class="mb-3">
                                                    <label for="parent-category" class="form-label">Parent
                                                        Category</label>
                                                    <select id="parent-category" name="parent_category"
                                                        class="form-select">
                                                        <option value="">Select Parent Category</option>
                                                        <option value="all" selected>All</option>
                                                        <option value="none">None <small>(Those who don`t have parent
                                                                category)</small>
                                                        </option>
                                                        @isset($parent_categories)
                                                            @foreach ($parent_categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                </div>

                                                <!-- Category Select -->
                                                <div class="mb-3">
                                                    <label for="category" class="required form-label">Category</label>
                                                    <select id="category" class="form-select" name="categories[]"
                                                        multiple="multiple">
                                                        @isset($categories)
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                </div>

                                                <!-- Tags Select -->
                                                <div class="mb-3">
                                                    <label for="tags" class="form-label">Tags</label>
                                                    <select id="tags" class="form-select" name="tags[]"
                                                        multiple="multiple">
                                                        @isset($tags)
                                                            @foreach ($tags as $tag)
                                                                <option value="{{ $tag->id }}">{{ $tag->name }}
                                                                </option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                    <small class="text-muted">Select multiple tags if needed.</small>
                                                </div>
                                                <!-- Color Select -->
                                                <div class="mb-3">
                                                    <label for="color" class="form-label">Colors</label>
                                                    <select id="color" class="form-select" name="color">
                                                        <option value="">Select Color</option>
                                                        @isset($colors)
                                                            @foreach ($colors as $color)
                                                                <option value="{{ $color->id }}">{{ $color->name }}
                                                                </option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="dotted-line my-4">
                                </div>

                                <!-- Product Type Tab -->
                                <div class="tab-pane fade" id="product-type" role="tabpanel"
                                    aria-labelledby="product-type-tab">
                                    <div class="col-md-4">
                                        <label for="productType" class="form-label fw-semibold">Product Type</label>
                                        <small class="text-muted d-block mb-2">Select product type from here.</small>
                                    </div>
                                    <div class="col-md-8 mb-5">
                                        <div class="card">
                                            <div class="card-body py-4">
                                                <div class="mb-3">
                                                    <label for="productType" class="form-label">Product Type</label>
                                                    <select id="productType" class="form-select" name="product_type">
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
                                            <label for="product-variation" class="form-label fw-semibold">Simple
                                                Product
                                                Information</label>
                                            <small class="text-muted d-block">
                                                Add your simple product description and necessary information
                                            </small>
                                        </div>
                                        <div class="card">
                                            <div class="card-body py-4">
                                                <div class="mb-3">
                                                    <label for="price" class="required form-label">Price</label>
                                                    <input type="number" id="price" name="simple_price"
                                                        class="form-control" placeholder="Enter Price">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="salePrice" class="required form-label">Sale Price</label>
                                                    <input type="number" id="salePrice" name="simple_sale_price"
                                                        class="form-control" placeholder="Enter Sale Price">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="SKU" class="required form-label">SKU</label>
                                                    <input type="number" id="sku" name="simple_sku"
                                                        class="form-control" placeholder="Enter SKU">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="units" class="required form-label">How many number of units are there for this product?</label>
                                                    <input type="number" id="units" name="simple_units"
                                                        class="form-control" placeholder="Enter Units">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Variable Product Form -->
                                    <div id="variableProductForm" class="col-md-8">
                                        <div class="col-md-4">
                                            <label for="product-variation" class="form-label fw-semibold">Product
                                                Variation Information</label>
                                            <small class="text-muted d-block">
                                                Add your product variation and necessary information from here
                                            </small>
                                        </div>
                                        <div id="sectionsContainer">
                                            <!-- Initial section matching dynamic structure -->
                                        </div>

                                        <!-- Moved value-container OUTSIDE sectionsContainer -->
                                        <div id="valuesContainer">
                                            <!-- Selected attribute values will appear here dynamically -->
                                        </div>

                                        <button id="addSection" type="button" class="btn btn-primary mt-3">Add Option</button>
                                    </div>

                                    <hr class="dotted-line my-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PS2 Content -->
                <div class="tab-pane fade" id="ps2-content" role="tabpanel" aria-labelledby="ps2-tab">
                    <div class="row">
                        <!-- Vertical Child Tabs Navigation -->
                        <div class="col-md-3">
                            <div class="nav flex-column nav-pills me-3" id="ps2-child-tabs" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link show active" id="dos_dont-tab" data-bs-toggle="pill"
                                    data-bs-target="#dos_dont" type="button" role="tab"
                                    aria-controls="dos_dont" aria-selected="true">
                                    Dos Dont
                                </button>
                                <button class="nav-link" id="design_application_details-tab" data-bs-toggle="pill"
                                    data-bs-target="#design_application_details" type="button" role="tab"
                                    aria-controls="design_application_details" aria-selected="false">
                                    Design Application
                                </button>
                                <button class="nav-link" id="storage_usage_details-tab" data-bs-toggle="pill"
                                    data-bs-target="#storage_usage_details" type="button" role="tab"
                                    aria-controls="storage_usage_details" aria-selected="false">
                                    Storage Usage
                                </button>
                                <button class="nav-link" id="installation_steps-tab" data-bs-toggle="pill"
                                    data-bs-target="#installation_steps" type="button" role="tab"
                                    aria-controls="installation_steps" aria-selected="false">
                                    Installation Steps
                                </button>
                            </div>
                        </div>

                        <!-- Child Tab Content -->
                        <div class="col-md-9">
                            <div class="tab-content" id="ps2-child-tabs-content">
                                <!-- dos_dont Tab -->
                                <div class="tab-pane fade show active" id="dos_dont" role="tabpanel"
                                    aria-labelledby="dos_dont-tab" style="flex-wrap: nowrap;">
                                    <div class="col-md-4">
                                        <label for="featured-image" class="form-label fw-semibold">Dos Dont</label>
                                        <small class="text-muted d-block mb-2">
                                            Add Your Dos Dont details from here.
                                        </small>
                                    </div>
                                    <div class="col-md-8">
                                        <div id="dynamicFieldsContainer">
                                            <!-- Initial input field -->
                                        </div>
                                        <button id="addFieldButton" class="btn btn-primary mt-3" type="button">Add
                                            More</button>
                                    </div>
                                    <hr class="dotted-line my-4">
                                </div>

                                <!-- design_application_details Tab -->
                                <div class="tab-pane fade" id="design_application_details" role="tabpanel"
                                    aria-labelledby="design_application_details-tab" style="flex-wrap: nowrap;">
                                    <div class="col-md-4">
                                        <label for="featured-image" class="form-label fw-semibold">Design_Application
                                            Details</label>
                                        <small class="text-muted d-block mb-2">
                                            Add Your Design_Application Details from here.
                                        </small>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-body py-4">
                                                <div class="mb-3">
                                                    <label for="room_type" class="form-label">Room Type</label>
                                                    <input type="text" id="room_type" class="form-control"
                                                        placeholder="Enter Room Type" name="room_type">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="finish_type" class="form-label">Finish Type</label>
                                                    <input type="text" id="finish_type" class="form-control"
                                                        name="finish_type" placeholder="Enter Finish Type">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pattern_repeat" class="form-label">Pattern
                                                        Repeat</label>
                                                    <input type="text" id="pattern_repeat" class="form-control"
                                                        name="pattern_repeat" placeholder="Enter Pattern Repeat">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pattern_match" class="form-label">Pattern
                                                        Match</label>
                                                    <input type="text" id="pattern_match" class="form-control"
                                                        name="pattern_match" placeholder="Enter Pattern Match">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="application_guide" class="form-label">Application
                                                        Guide</label>
                                                    <input type="text" id="application_guide" class="form-control"
                                                        name="application_guide"
                                                        placeholder="Enter product Application Guide">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="dotted-line my-4">
                                </div>

                                <!-- storage_usage_details Tab -->
                                <div class="tab-pane fade" id="storage_usage_details" role="tabpanel"
                                    aria-labelledby="storage_usage_details-tab" style="flex-wrap: nowrap;">
                                    <div class="col-md-4">
                                        <label for="featured-image" class="form-label fw-semibold">Storage Usage
                                            Details</label>
                                        <small class="text-muted d-block mb-2">
                                            Add Your Storage Usage Details from here.
                                        </small>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-body py-4">
                                                <div class="mb-3">
                                                    <label for="storage" class="form-label">Storage</label>
                                                    <input type="text" id="storage" class="form-control"
                                                        name="storage" placeholder="Enter product Storage">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="net_weight" class="form-label">Net Weight</label>
                                                    <input type="number" id="net_weight" class="form-control"
                                                        name="net_weight" placeholder="Enter product net_weight">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="coverage" class="form-label">Coverage</label>
                                                    <input type="text" id="coverage" class="form-control"
                                                        name="coverage" placeholder="Enter product coverage">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="dotted-line my-4">
                                </div>

                                <!-- installation_steps Tab -->
                                <div class="tab-pane fade" id="installation_steps" role="tabpanel"
                                    aria-labelledby="installation_steps-tab" style="flex-wrap: nowrap;">
                                    <div class="col-md-4">
                                        <label for="installation_steps" class="form-label fw-semibold">Installation
                                            Steps
                                            Details</label>
                                        <small class="text-muted d-block mb-2">
                                            Add Your Installation Steps Details from here.
                                        </small>
                                    </div>
                                    <div class="col-md-8">
                                        <!-- Dynamic fields container -->
                                        <div id="installationFieldsContainer">
                                            <!-- Initial card -->
                                        </div>
                                        <!-- Add More button -->
                                        <button id="addInstallationFieldButton" class="btn btn-primary mt-3"
                                            type="button">Add
                                            More</button>
                                    </div>
                                    <hr class="dotted-line my-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PS3 Content -->
                <div class="tab-pane fade" id="ps3-content" role="tabpanel" aria-labelledby="ps3-tab">
                    <div class="row">
                        <!-- Vertical Child Tabs Navigation -->
                        <div class="col-md-3">
                            <div class="nav flex-column nav-pills me-3" id="ps3-child-tabs" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active" id="product_seo-tab" data-bs-toggle="pill"
                                    data-bs-target="#product_seo" type="button" role="tab"
                                    aria-controls="product_seo" aria-selected="false">
                                    Products SEO
                                </button>
                            </div>
                        </div>

                        <!-- Child Tab Content -->
                        <div class="col-md-9">
                            <div class="tab-content" id="ps3-child-tabs-content">
                                <!-- product_seo Tab -->
                                <div class="tab-pane fade show active" id="product_seo" role="tabpanel"
                                    aria-labelledby="product_seo-tab" style="flex-wrap: nowrap;">
                                    <div class="col-md-4">
                                        <label for="featured-image" class="form-label fw-semibold">Product Seo</label>
                                        <small class="text-muted d-block mb-2">
                                            Add Your Product Seo Details from here.
                                        </small>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-body py-4">
                                                <div class="mb-3">
                                                    <label for="metaTitle" class="form-label">Meta Title </label>
                                                    <input type="text" id="metaTitle" class="form-control"
                                                        name="meta_title" placeholder="Enter product Meta Title">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="metaDesc" class="form-label">Meta Description</label>
                                                    <input type="text" id="metaDesc" class="form-control"
                                                        name="meta_description"
                                                        placeholder="Enter product Meta Description">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="dotted-line my-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PS4 Content -->
                <div class="tab-pane fade" id="ps4-content" role="tabpanel" aria-labelledby="ps4-tab">
                    <div class="row">
                        <!-- Vertical Child Tabs Navigation -->
                        <div class="col-md-3">
                            <div class="nav flex-column nav-pills me-3" id="ps4-child-tabs" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active" id="products_features-tab" data-bs-toggle="pill"
                                    data-bs-target="#products_features" type="button" role="tab"
                                    aria-controls="products_features" aria-selected="true">
                                    Products Features
                                </button>
                            </div>
                        </div>

                        <!-- Child Tab Content -->
                        <div class="col-md-9">
                            <div class="tab-content" id="ps4-child-tabs-content">
                                <!-- Products Features Tab -->
                                <div class="tab-pane fade show active" id="products_features" role="tabpanel"
                                    aria-labelledby="products_features-tab" style="flex-wrap: nowrap;">
                                    <div class="col-md-4">
                                        <label for="products_features" class="form-label fw-semibold">Products
                                            Features</label>
                                        <small class="text-muted d-block mb-2">
                                            Add your products features details from here.
                                        </small>
                                    </div>
                                    <div class="col-md-8">
                                        <!-- Dynamic fields container -->
                                        <div id="featuresFieldsContainer">
                                            <!-- Initial card -->
                                        </div>
                                        <!-- Add More button -->
                                        <button id="addFeatureFieldButton" class="btn btn-primary mt-3"
                                            type="button">Add
                                            More</button>
                                    </div>
                                    <hr class="dotted-line my-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PS5 Content -->
                <div class="tab-pane fade" id="ps5-content" role="tabpanel" aria-labelledby="ps5-tab">
                    <div class="row">
                        <!-- Vertical Child Tabs Navigation -->
                        <div class="col-md-3">
                            <div class="nav flex-column nav-pills me-3" id="ps5-child-tabs" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active" id="products_upsell-tab" data-bs-toggle="pill"
                                    data-bs-target="#products_upsell" type="button" role="tab"
                                    aria-controls="products_upsell" aria-selected="true">
                                    Products UpSell
                                </button>
                            </div>
                        </div>

                        <!-- Child Tab Content -->
                        <div class="col-md-9">
                            <div class="tab-content" id="ps5-child-tabs-content">
                                <!-- Products Features Tab -->
                                <div class="tab-pane fade show active" id="products_upsell" role="tabpanel"
                                    aria-labelledby="products_upsell-tab" style="flex-wrap: nowrap;">
                                    <div class="col-md-4">
                                        <label for="products_upsell" class="form-label fw-semibold">Products
                                            Upsell</label>
                                        <small class="text-muted d-block mb-2">
                                            Add your products upsell details from here.
                                        </small>
                                    </div>
                                    <div class="col-md-8">
                                        <!-- Dynamic fields container -->
                                        <div id="upsellFieldContainer">
                                            <!-- Initial card -->
                                        </div>
                                        <!-- Add More button -->
                                        <button id="addUpsellFieldButton" class="btn btn-primary mt-3"
                                            type="button">Add
                                            More</button>
                                    </div>
                                    <hr class="dotted-line my-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary next-tab-btn me-2">Next</button>
                    <button type="submit" class="btn btn-primary save-btn">Save Product</button>
                </div>
            </div>
        </form>
    </div>

    @include('partials.modals.product.delete')
    @push('scripts')
    <script>
        var attributes = {!! json_encode($attributes) !!};
        var products = {!! json_encode($products) !!};
        var get_attribute_route = "{{ route('product.attributes.values') }}";
        var category_route = "{{ route('product.get.categories') }}";
    </script>
    <script src="{{ asset('assets/js/product.js') }}"></script>
    <script src="{{ asset('assets/js/product-validations.js') }}"></script>
    @endpush
</x-default-layout>
