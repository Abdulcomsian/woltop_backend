<x-default-layout>
    @section('page-title', 'Dashboard')
    <!--begin::Row-->
    <div class="row g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-md-4">
            <!--begin::Card widget 20-->
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-100 mb-5 mb-xl-10"
                style="background-color: #F1416C;background-image:url('assets/media/patterns/vector-1.png')">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ $products }}</span>
                        <!--end::Amount-->
                        <!--begin::Subtitle-->
                        <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Total Products</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 20-->
        </div>
        <div class="col-md-4">
            <!--begin::Card widget 7-->
            <div class="card card-flush mb-5 mb-xl-10 h-md-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $users }}</span>
                        <!--end::Amount-->
                        <!--begin::Subtitle-->
                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Users</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 7-->
        </div>
        <div class="col-md-4">
            <!--begin::Card widget 17-->
            <div class="card card-flush h-md-100 mb-5 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $orders }}</span>
                            <!--end::Amount-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Subtitle-->
                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Orders</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 17-->
        </div>
        {{-- <div class="col-md-3">
            <!--begin::Card widget 17-->
            <div class="card card-flush h-md-100 mb-5 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $orders }}</span>
                            <!--end::Amount-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Subtitle-->
                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Conversion Rate</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 17-->
        </div>
        <!--end::Col--> --}}
    </div>
    <!--end::Row-->

    <!--begin:: Charts Row-->
    <div class="row g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-md-6">
            <!--begin::Card -->
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-100 mb-5 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Revenue Trend</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <canvas id="revenueTrendChart"></canvas>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card -->
        </div>
        <div class="col-md-6">
            <!--begin::Card-->
            <div class="card card-flush mb-5 mb-xl-10 h-md-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Popular Categories</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <canvas id="popularCategoriesChart"></canvas>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Charts Row-->

    <!--begin:: Table Row-->
    <div class="row g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-md-12">
            <!--begin::Card -->
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-100">
                <!--begin::Header-->
                <div class="card-header">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Recent Orders</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-0">
                    <!-- Add a wrapper div with overflow-x: auto -->
                    <div style="overflow-x: auto;">
                        <table class="table table-row-bordered gy-5">
                            <thead>
                                <tr class="fw-bold fs-6 text-muted">
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Product</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($recentOrders)
                                @foreach($recentOrders as $item)
                                <tr>
                                    <td>{{$item->order_id ?? ''}}</td>
                                    <td>{{$item->user->name ?? ''}}</td>
                                    <td>{{$item->products->pluck("title")->implode(", ") ?? ''}}</td>
                                    <td>₹{{$item->total_amount ?? ''}}</td>
                                    <td>{{$item->order_status ?? ''}}</td>
                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card -->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Table Row-->

</x-default-layout>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Revenue Trend Chart
    var revenueTrendCtx = document.getElementById('revenueTrendChart').getContext('2d');
    var revenueTrendChart = new Chart(revenueTrendCtx, {
        type: 'line',
        data: {
            labels: @json($monthlyEarnings->pluck("month")),
            datasets: [{
                label: 'Revenue',
                data: @json($monthlyEarnings->pluck("total_earnings")),
                borderColor: '#F1416C',
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Popular Categories Chart
    var popularCategoriesCtx = document.getElementById('popularCategoriesChart').getContext('2d');
    var popularCategoriesChart = new Chart(popularCategoriesCtx, {
        type: 'bar',
        data: {
            labels: @json($categories),
            datasets: [{
                label: 'Popularity',
                data: @json($productCategories),
                backgroundColor: '#50CD89'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
