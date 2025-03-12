<!--begin::Menu-->
<div class="menu" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item">
        <a href="{{route('product.edit', ['id' => $query->id])}}" class="menu-link">
            <i class="fas fa-edit"></i>
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item">
        <span class="menu-link" id="delete_product" onclick="deleteItem({{$query->id}})" data-kt-action="delete_row">
            <i class="fas fa-trash"></i>
        </span>
    </div>
    <!--end::Menu item-->

    @if($query->is_optimized == false)
    <!--begin::Menu item-->
    <div class="menu-item">
        <a href="{{route('product.optimize', ['id' => $query->id])}}" class="menu-link">
            <i class="fa-solid fa-chart-line"></i>
        </a>
    </div>
    <!--end::Menu item-->
    @endif
</div>
