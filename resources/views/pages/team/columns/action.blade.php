<!--begin::Menu-->
<div class="menu" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item">
        <a href="{{route('team.edit', ['id' => $query->id])}}" class="menu-link">
            <i class="fas fa-edit"></i>
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item">
        <span class="menu-link" onclick="deleteItem({{$query->id}})">
            <i class="fas fa-trash"></i>
        </span>
    </div>
    <!--end::Menu item-->
</div>
