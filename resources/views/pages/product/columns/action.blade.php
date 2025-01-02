<!--begin::Menu-->
<div class="menu" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item">
        <a href="#" class="menu-link" data-bs-toggle="modal" onclick="editProduct({{$query->id}})" data-bs-target="#kt_modal_add_user" data-kt-action="update_row">
            <i class="fas fa-edit"></i>
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item">
        <span class="menu-link" id="delete_product" onclick="deleteProduct({{$query->id}})" data-kt-action="delete_row">
            <i class="fas fa-trash"></i>
        </span>
    </div>
    <!--end::Menu item-->
</div>
