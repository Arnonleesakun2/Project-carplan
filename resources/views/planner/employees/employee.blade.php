@extends('layout/Navbar/Navbar')
@section('title')
    ข้อมูลพนักงาน
@endsection
@section('content')
    @if (session('message'))
        <script>
            Swal.fire({
                title: 'สำเร็จ!',
                text: "{{ session('message') }}",
                icon: 'success',
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                title: 'ผิดพลาด!',
                text: "{{ session('error') }}",
                icon: 'error',
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif
    <div class="w-[90%] mx-auto space-y-[40px] py-[50px] ">
        @include('planner.employees.employee.employeeTable'){{-- EmployeeTable --}}
        <div class="grid grid-cols-1 gap-[20px] md:grid-cols-1 lg:grid-cols-2 ">
            @include('planner.employees.allowances.allowanceTable'){{-- AllowancesTable --}}
            @include('planner.employees.customers.customerTable'){{-- CustomerTable --}}
            @include('planner.employees.sectors.sectorTable'){{-- SectorTable --}}
            @include('planner.employees.branchs.branchTable'){{-- BranchTable --}}
            @include('planner.employees.cartypes.cartypeTable'){{-- CartypeTable --}}
        </div>
        @include('planner.employees.products.productTable'){{-- ProductTable --}}
        @include('planner.employees.roads.roadTable'){{-- RoadTable --}}
        @include('planner.employees.cars.carTable'){{-- CarTable --}}
    </div>
    @include('planner.employees.baskets._basket_modal'){{-- ตระกร้า --}}
    @include('planner.employees.allowances._allowance_modal'){{-- เบี่ยเลี้ยง --}}
    @include('planner.employees.products._product_modal'){{-- สินค้า --}}
    @include('planner.employees.customers._customer_modal'){{-- ลูกค้า --}}
    @include('planner.employees.sectors._sector_modal'){{-- ภาค --}}
    @include('planner.employees.branchs._branch_modal'){{-- สาขา --}}
    @include('planner.employees.roads._road_modal'){{-- เส้นทาง --}}
    @include('planner.employees.cartypes._cartype_modal'){{-- ชนิดของรถ --}}
    @include('planner.employees.cars._car_modal'){{-- รถ --}}
    <script>
        var Editbasket = "{{ url('/Editbasket') }}";
        var Storeallowance = "{{ url('/Storeallowance') }}";
        var Storeproduct = "{{ url('/Storeproduct') }}";
        var Editproduct = "{{ url('/Editproduct') }}";
        var Storecustomer = "{{ url('/Storecustomer') }}"
        var Storesector = "{{ url('/Storesector') }}"
        var Storebranch = "{{ url('/Storebranch') }}"
        var Storeroad = "{{ url('/Storeroad') }}"
        var Editroad = "{{ url('/Editroad') }}"
        var Statusroad = "{{ url('/RoadUpdateStatus') }}"
        var Storecartype = "{{ url('/Storecartype') }}"
        var Storecar = "{{ url('/Storecar') }}"
        var Editcar = "{{ url('/Editcar') }}"
        var Statuscar = "{{ url('/CarUpdateStatus') }}"
        var csrf_token = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('scripts/employees/employee.js') }}"></script>
    <script src="{{ asset('scripts/employees/basket.js') }}"></script>
    <script src="{{ asset('scripts/employees/allowance.js') }}"></script>
    <script src="{{ asset('scripts/employees/product.js') }}"></script>
    <script src="{{ asset('scripts/employees/customer.js') }}"></script>
    <script src="{{ asset('scripts/employees/sector.js') }}"></script>
    <script src="{{ asset('scripts/employees/branch.js') }}"></script>
    <script src="{{ asset('scripts/employees/road.js') }}"></script>
    <script src="{{ asset('scripts/employees/cartype.js') }}"></script>
    <script src="{{ asset('scripts/employees/car.js') }}"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
@endsection
