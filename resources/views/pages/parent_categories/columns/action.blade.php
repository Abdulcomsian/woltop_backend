<!--begin::Menu-->
<div class="menu" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item">
        <a href="#" class="menu-link" data-bs-toggle="modal" onclick="editParentCategory({{$query->id}})" data-bs-target="#kt_modal_add_user" data-kt-action="update_row">
            <i class="fas fa-edit"></i>
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item">
        <span class="menu-link" id="delete_parent_category" onclick="deleteParentCategory({{$query->id}})" data-kt-action="delete_row">
            <i class="fas fa-trash"></i>
        </span>
    </div>
    <!--end::Menu item-->
</div>
