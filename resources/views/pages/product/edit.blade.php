<x-default-layout>
    <style>
        /* navigation style start.. */
        .nav-tabs .nav-link {
            color: black;
            width: 320px;
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
        <form action="{{ route('product.update') }}" class="submitForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <!-- Parent Tabs Navigation -->
            <input type="hidden" name="id" value="{{ $data->id }}">
            <div id="removed_steps_container"></div>
            <div id="removed_features_container"></div>
            <div class="nav-tabs-container">
                <ul class="nav nav-tabs mb-4 text-white" id="parent-tabs" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="ps1-tab" data-bs-toggle="tab"
                            data-bs-target="#ps1-content" type="button" role="tab" aria-controls="ps1-content"
                            aria-selected="true">
                            Basic Information
                        </button>
                    </li>
                    @if ($data->is_installable == 'true')
                        <li class="nav-item">
                            <button class="nav-link" id="ps2-tab" data-bs-toggle="tab" data-bs-target="#ps2-content"
                                type="button" role="tab" aria-controls="ps2-content" aria-selected="false">
                                Advanced Information
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="ps3-tab" data-bs-toggle="tab" data-bs-target="#ps3-content"
                                type="button" role="tab" aria-controls="ps3-content" aria-selected="false">
                                SEO Details
                            </button>
                        </li>
                    @endif
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
                                @if ($data->is_installable == 'true')
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
                                @endif

                                @if ($data->is_installable == 'false')
                                    <button class="nav-link" id="product-type-tab" data-bs-toggle="pill"
                                        data-bs-target="#product-type" type="button" role="tab"
                                        aria-controls="product-type" aria-selected="false">
                                        Pricing
                                    </button>
                                @else
                                    <button class="nav-link" id="product-type-tab" data-bs-toggle="pill"
                                        data-bs-target="#product-type" type="button" role="tab"
                                        aria-controls="product-type" aria-selected="false">
                                        Product Type
                                    </button>
                                @endif
                            </div>
                        </div>
                        {{-- @dd($data) --}}
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
                                                        class="form-control" placeholder="Enter product name"
                                                        value="{{ $data->title }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Short Description</label>
                                                    <textarea class="form-control" name="short_description" placeholder="Enter short description">{{ $data->short_description }}</textarea>
                                                </div>

                                                <!-- Description Textarea -->
                                                <div class="mb-3">
                                                    <label for="description"
                                                        class="required form-label">Description</label>
                                                    <textarea id="description" name="description">{{ $data->description }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Status</label><br>
                                                    <!-- Published Radio Button -->
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="published" value="publish"
                                                            @if ($data->status == 'publish') checked @endif>
                                                        <label class="form-check-label"
                                                            for="published">Published</label>
                                                    </div>
                                                    <!-- Draft Radio Button -->
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="draft" value="draft"
                                                            @if ($data->status == 'draft') checked @endif>
                                                        <label class="form-check-label" for="draft">Draft</label>
                                                    </div>
                                                </div>

                                                {{-- <div class="mb-3">
                                                    <label class="form-label fw-semibold">Is this an installable product or not?</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="is_installable" @if ($data->is_installable == 'true') checked @endif id="installable">
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
                                        <label for="featured-image" class="form-label fw-semibold">Featured
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
                                                @if ($data->featured_image != null)
                                                    <img src="{{ asset('assets/wolpin_media/products/featured_images/' . $data->featured_image) }}"
                                                        alt="featured Image" height="300">
                                                @endif
                                                <input type="file" name="featured_image"
                                                    class="form-control form-control-solid mt-4" accept="image/*">
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
                                                <video controls class="mb-4" height="250">
                                                    <source
                                                        src="{{ asset('assets/wolpin_media/products/video/' . $data->video) }}"
                                                        type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
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
                                        <label for="gallery-upload"
                                            class="required form-label fw-semibold">Gallery</label>
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
                                                <div class="gallery-images mt-4">
                                                    <div class="row">
                                                        @if (isset($data->images) && count($data->images) > 0)
                                                            @foreach ($data->images as $image)
                                                                <!-- Example Image 2 -->
                                                                <div class="col-md-4 mb-3 image-item"
                                                                    draggable="true">
                                                                    <div class="card">
                                                                        <img src="{{ asset('assets/wolpin_media/products/gallery_images/' . $image->image_path) }}"
                                                                            class="card-img-top"
                                                                            alt="Gallery Image 2">
                                                                        <div class="card-body d-flex justify-content-end"
                                                                            style="padding: 10px;">
                                                                            <button type="button"
                                                                                data-id="{{ $image->id }}"
                                                                                class="btn btn-sm btn-danger delete-btn"
                                                                                id="image-delete-btn" title="Delete">
                                                                                <i class="fas fa-trash"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
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
                                                                <option value="{{ $category->id }}"
                                                                    @isset($data->categories)
                                                                    @foreach ($data->categories as $cat)
                                                                        @if ($cat->id == $category->id)
                                                                            selected
                                                                        @endif
                                                                    @endforeach
                                                                    @endisset>
                                                                    {{ $category->name }}
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
                                                                <option value="{{ $tag->id }}"
                                                                    @isset($data->tags)
                                                                        @foreach ($data->tags as $item)
                                                                            @if ($item->id == $tag->id)
                                                                                selected
                                                                            @endif 
                                                                        @endforeach
                                                                    @endisset>
                                                                    {{ $tag->name }}
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
                                                                <option value="{{ $color->id }}"
                                                                    @if (!empty($data->color) && $data->color->id == $color->id) selected @endif>
                                                                    {{ $color->name }}
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
                                @if ($data->is_installable == 'false')
                                    <div class="tab-pane fade" id="product-type" role="tabpanel"
                                        aria-labelledby="product-type-tab">
                                        @php
                                        $selectedAttributesValues = [];
                                        @endphp
                                        <input type="hidden" name="product_type" value="simple">
                                        <!-- Simple Product Form -->
                                        <div id="simpleProductForm" class="col-md-8">
                                            <div class="col-md-4">
                                                <label for="product-variation" class="form-label fw-semibold">Pricing</label>
                                                <small class="text-muted d-block">
                                                   Add your toolkit pricing
                                                </small>
                                            </div>
                                            <div class="card">
                                                <div class="card-body py-4">
                                                    <div class="mb-3">
                                                        <label for="price"
                                                            class="required form-label">Price</label>
                                                        <input type="number" id="price" name="simple_price"
                                                            class="form-control" placeholder="Enter Price"
                                                            value="{{ $data->price ?? '' }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="salePrice" class="required form-label">Sale
                                                            Price</label>
                                                        <input type="number" id="salePrice" name="simple_sale_price"
                                                            class="form-control" placeholder="Enter Sale Price"
                                                            value="{{ $data->sale_price ?? '' }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="SKU" class="required form-label">SKU</label>
                                                        <input type="text" id="sku" name="simple_sku"
                                                            class="form-control" placeholder="Enter SKU"
                                                            value="{{ $data->sku ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="dotted-line my-4">
                                    </div>
                                @else
                                    <div class="tab-pane fade" id="product-type" role="tabpanel"
                                        aria-labelledby="product-type-tab">
                                        <div class="col-md-4">
                                            <label for="productType" class="form-label fw-semibold">Product
                                                Type</label>
                                            <small class="text-muted d-block mb-2">Select product type from
                                                here.</small>
                                        </div>
                                        <div class="col-md-8 mb-5">
                                            <div class="card">
                                                <div class="card-body py-4">
                                                    <div class="mb-3">
                                                        <label for="productType" class="form-label">Product
                                                            Type</label>
                                                        <select id="productType" class="form-select"
                                                            name="product_type">
                                                            <option value="simple"
                                                                @if ($data->product_type == 'simple') selected @endif>
                                                                Simple
                                                                Product</option>
                                                            <option value="variable"
                                                                @if ($data->product_type == 'variable') selected @endif>
                                                                Variable
                                                                Product</option>
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
                                                        <label for="price"
                                                            class="required form-label">Price</label>
                                                        <input type="number" id="price" name="simple_price"
                                                            class="form-control" placeholder="Enter Price"
                                                            value="{{ $data->price ?? '' }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="salePrice" class="required form-label">Sale
                                                            Price</label>
                                                        <input type="number" id="salePrice" name="simple_sale_price"
                                                            class="form-control" placeholder="Enter Sale Price"
                                                            value="{{ $data->sale_price ?? '' }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="SKU" class="required form-label">SKU</label>
                                                        <input type="text" id="sku" name="simple_sku"
                                                            class="form-control" placeholder="Enter SKU"
                                                            value="{{ $data->sku ?? '' }}">
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
                                                @isset($groupedVariables)
                                                    @php
                                                        $selectedAttributesValues = [];
                                                    @endphp
                                                    @foreach ($groupedVariables as $key => $variable)
                                                        <div class="card mb-3 section" data-section="{{ $key }}"
                                                            data-selected-attribute-id="{{ $variable['attribute_id'] }}">
                                                            <div class="card-body py-4">
                                                                <div class="row w-100 relative">
                                                                    <div class="col-3">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Attribute
                                                                                Name</label>
                                                                            <select
                                                                                class="form-select attributeName attribute-change"
                                                                                name="variations[{{ $key }}][attribute_id]"
                                                                                data-section="">
                                                                                <option value="">Select...</option>
                                                                                @isset($attributes)
                                                                                    @foreach ($attributes as $attribute)
                                                                                        @if (!in_array($attribute->id, $selectedAttributes) || $variable['attribute_id'] == $attribute->id)
                                                                                            <option
                                                                                                value="{{ $attribute->id }}"
                                                                                                @if ($variable['attribute_id'] == $attribute->id) selected @endif>
                                                                                                {{ $attribute->name }}
                                                                                            </option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endisset
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Attribute
                                                                                Values</label>
                                                                            <select class="form-select attribute-values"
                                                                                name="variations[{{ $key }}][attribute_values][]"
                                                                                multiple>
                                                                                @foreach ($variable['values'] as $valueId => $valueName)
                                                                                    @php
                                                                                        $selectedAttributesValues[
                                                                                            $key
                                                                                        ][] = $valueName;
                                                                                    @endphp
                                                                                    <option value="{{ $valueId }}"
                                                                                        selected>{{ $valueName }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <span
                                                                    class="text-danger removeSection cursor-pointer position-absolute p-2"
                                                                    style="top: 0; right: 10px;">
                                                                    Remove
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endisset


                                            </div>

                                            <!-- Moved value-container OUTSIDE sectionsContainer -->
                                            <div id="valuesContainer">
                                                @isset($productVariations)
                                                    @foreach ($productVariations as $key => $variation)
                                                        <input type="hidden"
                                                            name="variation_options[{{ $key }}][id]"
                                                            value="{{ $variation->id }}">
                                                        <div class="card mb-3 value-section"
                                                            data-value-id="{{ formatString($variation->title) }}">
                                                            <div class="card-body">
                                                                <h5 class="mb-3">{{ $variation->title }}</h5>
                                                                <input type="hidden"
                                                                    name="variation_options[{{ $key }}][name]"
                                                                    value="{{ $variation->title }}" />
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label class="required form-label">Price</label>
                                                                        <input type="number"
                                                                            name="variation_options[{{ $key }}][price]"
                                                                            class="form-control" placeholder="Enter Price"
                                                                            value="{{ $variation->price }}">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label class="required form-label">Sale
                                                                            Price</label>
                                                                        <input type="number"
                                                                            name="variation_options[{{ $key }}][sale_price]"
                                                                            class="form-control"
                                                                            placeholder="Enter Sale Price"
                                                                            value="{{ $variation->sale_price }}">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label class="required form-label">SKU</label>
                                                                        <input type="text"
                                                                            name="variation_options[{{ $key }}][sku]"
                                                                            class="form-control" placeholder="Enter SKU"
                                                                            value="{{ $variation->sku }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endisset

                                            </div>

                                            <button id="addSection" type="button" class="btn btn-primary mt-3">Add
                                                Option</button>
                                        </div>

                                        <hr class="dotted-line my-4">
                                    </div>
                                @endif
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
                                            @isset($data->doDont)
                                                @foreach ($data->doDont as $item)
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter dos or dont" name="dos_dont[]"
                                                            value="{{ $item->name }}" />
                                                        <button class="btn btn-danger remove-field"
                                                            type="button">Remove</button>
                                                    </div>
                                                @endforeach
                                            @endisset
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
                                                        placeholder="Enter Room Type" name="room_type"
                                                        value="{{ $data->designApplicationGuide->room_type ?? '' }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="finish_type" class="form-label">Finish Type</label>
                                                    <input type="text" id="finish_type" class="form-control"
                                                        name="finish_type" placeholder="Enter Finish Type"
                                                        value="{{ $data->designApplicationGuide->finish_type ?? '' }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pattern_repeat" class="form-label">Pattern
                                                        Repeat</label>
                                                    <input type="text" id="pattern_repeat" class="form-control"
                                                        name="pattern_repeat" placeholder="Enter Pattern Repeat"
                                                        value="{{ $data->designApplicationGuide->pattern_repeat ?? '' }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pattern_match" class="form-label">Pattern
                                                        Match</label>
                                                    <input type="text" id="pattern_match" class="form-control"
                                                        name="pattern_match" placeholder="Enter Pattern Match"
                                                        value="{{ $data->designApplicationGuide->pattern_match ?? '' }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="application_guide" class="form-label">Application
                                                        Guide</label>
                                                    <input type="text" id="application_guide" class="form-control"
                                                        name="application_guide"
                                                        placeholder="Enter product Application Guide"
                                                        value="{{ $data->designApplicationGuide->application_guide ?? '' }}">
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
                                                        name="storage" placeholder="Enter product Storage"
                                                        value="{{ $data->storageUsage->storage ?? '' }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="net_weight" class="form-label">Net Weight</label>
                                                    <input type="number" id="net_weight" class="form-control"
                                                        name="net_weight" placeholder="Enter product net_weight"
                                                        value="{{ $data->storageUsage->net_weight ?? '' }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="coverage" class="form-label">Coverage</label>
                                                    <input type="text" id="coverage" class="form-control"
                                                        name="coverage" placeholder="Enter product coverage"
                                                        value="{{ $data->storageUsage->coverage ?? '' }}">
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
                                            @isset($data->installationSteps)
                                                @foreach ($data->installationSteps as $key => $step)
                                                    <div class="card mb-3" data-id="{{ $step->id }}">
                                                        <div class="card-body py-4">
                                                            <input type="hidden"
                                                                name="installation_steps[{{ $key }}][type]"
                                                                value="existing">
                                                            <input type="hidden"
                                                                name="installation_steps[{{ $key }}][id]"
                                                                value="{{ $step->id }}">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Name</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter product name"
                                                                    name="installation_steps[{{ $key }}][installation_name]"
                                                                    value="{{ $step->name }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="description"
                                                                    class="form-label">Description</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter product description"
                                                                    name="installation_steps[{{ $key }}][installation_description]"
                                                                    value="{{ $step->description }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="image" class="form-label">Replace
                                                                    Image</label>
                                                                <input type="file"
                                                                    name="installation_steps[{{ $key }}][installation_image]"
                                                                    class="form-control">
                                                                @if ($step->image != null)
                                                                    <img src="{{ asset('assets/wolpin_media/installation_steps/' . $step->image) }}"
                                                                        class="mt-4" height="200" alt="Image">
                                                                @endif
                                                            </div>
                                                            <span
                                                                class="text-danger remove-field cursor-pointer position-absolute p-2"
                                                                style="top: 0; right: 10px;">Remove</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endisset
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
                                <button class="nav-link active" id="products_features-tab" data-bs-toggle="pill"
                                    data-bs-target="#products_features" type="button" role="tab"
                                    aria-controls="products_features" aria-selected="true">
                                    Products Features
                                </button>
                                <button class="nav-link" id="product_seo-tab" data-bs-toggle="pill"
                                    data-bs-target="#product_seo" type="button" role="tab"
                                    aria-controls="product_seo" aria-selected="false">
                                    Products SEO
                                </button>
                            </div>
                        </div>

                        <!-- Child Tab Content -->
                        <div class="col-md-9">
                            <div class="tab-content" id="ps3-child-tabs-content">
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
                                            @isset($data->productsFeatures)
                                                @foreach ($data->productsFeatures as $key => $feature)
                                                    <div class="card mb-3" data-id="{{ $feature->id }}">
                                                        <div class="card-body py-4">
                                                            <input type="hidden"
                                                                name="product_features[{{ $key }}][type]"
                                                                value="existing">
                                                            <input type="hidden"
                                                                name="product_features[{{ $key }}][id]"
                                                                value="{{ $feature->id }}">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Name</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter product name"
                                                                    name="product_features[{{ $key }}][name]"
                                                                    value="{{ $feature->name }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="image" class="form-label">Image</label>
                                                                <input type="file"
                                                                    name="product_features[{{ $key }}][image]"
                                                                    class="form-control">
                                                                @if ($feature->image != null)
                                                                    <img src="{{ asset('assets/wolpin_media/products/features/' . $feature->image) }}"
                                                                        class="mt-4" height="200" alt="Image">
                                                                @endif
                                                            </div>
                                                            <span
                                                                class="text-danger remove-field cursor-pointer position-absolute p-2"
                                                                style="top: 0; right: 10px;">Remove</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endisset
                                        </div>
                                        <!-- Add More button -->
                                        <button id="addFeatureFieldButton" class="btn btn-primary mt-3"
                                            type="button">Add
                                            More</button>
                                    </div>
                                    <hr class="dotted-line my-4">
                                </div>

                                <!-- product_seo Tab -->
                                <div class="tab-pane fade" id="product_seo" role="tabpanel"
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
                                                        name="meta_title" placeholder="Enter product Meta Title"
                                                        value="{{ $data->meta_title }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="metaDesc" class="form-label">Meta Description</label>
                                                    <input type="text" id="metaDesc" class="form-control"
                                                        name="meta_description"
                                                        placeholder="Enter product Meta Description"
                                                        value="{{ $data->meta_description }}">
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
    @include('partials.modals.product.delete_image')
    @push('scripts')
        <script>
            var attributes = {!! json_encode($attributes) !!};
            var selectedAttributesId = {!! json_encode($selectedAttributes) !!}
            var selectedAttributesValues = {!! json_encode($selectedAttributesValues) !!}
            var get_attribute_route = "{{ route('product.attributes.values') }}";
            var category_route = "{{ route('product.get.categories') }}";
        </script>
        <script src="{{ asset('assets/js/product-edit.js') }}"></script>
        {{-- <script src="{{ asset('assets/js/product-validations.js') }}"></script> --}}
    @endpush
</x-default-layout>
