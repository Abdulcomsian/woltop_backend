<!--begin::Menu-->
<div class="menu" data-kt-menu="true">
    <div class="menu-item d-flex justify-content-center align-items-center">
        <div class="form-check form-switch mb-0">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" onclick="changeStatus(event, {{$query->id}})" @if($query->status == "approved") checked @endif>
        </div>
    </div>
    <!--begin::Menu item-->
    <div class="menu-item">
        <span class="menu-link" onclick="deleteItem({{$query->id}})">
            <i class="fas fa-trash"></i>
        </span>
    </div>
    <!--end::Menu item-->
</div>
