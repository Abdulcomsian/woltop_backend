<!--begin::Menu-->
<div class="menu" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item">
        <a href="#" class="menu-link" data-bs-toggle="modal" onclick="editItem({{$query->id}})">
            <i class="fas fa-edit"></i>
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item">
        <span class="menu-link" id="delete_product" onclick="deleteItem({{$query->id}})">
            <i class="fas fa-trash"></i>
        </span>
    </div>
    <!--end::Menu item-->
</div>
