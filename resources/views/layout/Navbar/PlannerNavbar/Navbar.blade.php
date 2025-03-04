<div id="screen" class="w-full h-screen  grid grid-rows-[10%,90%] ">
    {{-- Navbar --}}
    <div id="navbar" class="hidden lg:block w-full bg-gradient-to-r from-gray-950 via-gray-800 to-gray-700 ">
        <div class="w-[90%] h-full mx-auto flex items-center justify-between sticky top-0 z-[1000] ">
            <div class="Font-Eng drop-shadow-topic text-white text-[25px] font-bold">Dashboard</div>
            <nav class="flex space-x-6 text-[20px] text-white drop-shadow-text ">
                <a href="{{ url('/PlannerDashBoard') }}"
                    class="Font-Eng hover:text-[#b76e79] hover:translate-x-1 duration-700">Home</a>
                <a href="{{ url('/CarPlanner') }}"
                    class="Font-Eng hover:text-[#b76e79] hover:translate-x-1 duration-700">Plan</a>
                <a href="{{ url('/CarPlannerReport') }}"
                    class="Font-Eng hover:text-[#b76e79] hover:translate-x-1 duration-700">Reports</a>
            </nav>
            <div class="profile flex items-center space-x-3">
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button"
                        class="Font-Eng p-[7px] rounded-[7px] border-[1.5px] border-transparent text-[20px] font-medium text-white hover:bg-white/40 duration-700">
                        User: {{ Auth::user()->name }}</div>
                    <ul tabindex="0"
                        class="dropdown-content menu bg-black rounded-box z-[1] w-52 mt-[10px] shadow border-white/20 text-white">
                        <li class="w-full text-[17px] font-semibold rounded-lg ">
                            <a class="Font-Eng" href="{{ url('/Logout') }}">
                                ออกจากระบบ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Mobilenavbar --}}
    <div class="lg:hidden bg-gradient-to-r from-gray-950 via-gray-800 to-gray-700">
        <div class="max-w-[90%] mx-auto flex content-between p-3">
            <div class="drawer ">
                <input id="my-drawer" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content">
                    <label for="my-drawer" class="text-bg">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                </div>
                <div class="drawer-side z-10">
                    <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                    <ul class="menu bg-base-200 text-base-content min-h-full w-[70%] p-4">
                        <!-- Sidebar content here -->
                        <li><a href="{{ url('/PlannerDashBoard') }}"><i
                                    class="fa-solid fa-house text-lg w-[25px] text-center"></i>หน้าแรก</a></li>
                        </li>
                        <li><a href="{{ url('/CarPlanner') }}"><i
                                    class="fa-solid fa-truck text-lg w-[25px] text-center"></i>จัดแผนเดินรถ</a></li>
                        <li><a href="{{ url('/CarPlannerReport') }}"><i
                                    class="fa-solid fa-pen text-lg w-[25px] text-center"></i>ออกรายงาน</a></li>
                    </ul>
                </div>
            </div>
            <div class="">
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="text-bg">ชื่อ:{{ Auth::user()->name }}</div>
                    <ul tabindex="0" class="dropdown-content menu bg-black rounded-box z-[1] w-[110px] p-2 shadow">
                        <li><a href="{{ url('/Logout') }}"
                                class="block w-full text-bg hover:text-text   p-[4px] duration-500 ">
                                ออกจากระบบ
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div id="content" class="z-[1] overflow-auto no-scrollbar bg-gradient-to-r from-gray-950 via-gray-800 to-gray-700">
        @yield('content')
    </div>
</div>

@yield('endscript')






{{-- <div class="overflow-auto h-screen">
        @yield('content')
</div>  --}}
