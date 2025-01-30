<!--begin::Menu-->
<div class="menu" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item">
        <a href="{{route('blog.edit', [$query->id])}}" class="menu-link">
            <i class="fas fa-edit"></i>
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item">
        <span class="menu-link" onclick="deleteItem({{$query->id}})" data-kt-action="delete_row">
            <i class="fas fa-trash"></i>
        </span>
    </div>
    <!--end::Menu item-->
</div>