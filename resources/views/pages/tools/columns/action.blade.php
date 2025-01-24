<!--begin::Menu-->
<div class="menu" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item">
        <a href="#" class="menu-link" data-bs-toggle="modal" id="edit_tool_modal" onclick="editTool({{$query->id}})">
            <i class="fas fa-edit"></i>
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item">
        <span class="menu-link" id="tool_id_delete" onclick="deleteTool({{$query->id}})">
            <i class="fas fa-trash"></i>
        </span>
    </div>
    <!--end::Menu item-->
</div>
