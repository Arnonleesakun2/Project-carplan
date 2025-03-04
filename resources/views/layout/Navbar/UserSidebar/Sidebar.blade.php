
<div class="h-screen lg:grid lg:grid-cols-[15%,85%] ">
    <div class="hidden lg:block sticky top-0 left-0 bg-gray-700 shadow-right-custom ">
        {{-- PCsidebar --}}
        <div class="py-[8px] max-w-[80%] mx-auto">
            <div class="flex items-center space-x-2">
                <div>
                    <img class="rounded-[100%] w-[40px] border-2 border-black" src="{{ asset('img/logo.jpg') }}"
                        alt="">
                </div>
                <div class="text-bg">
                    Tatong/Sp
                </div>
            </div>
        </div>
        <div class="max-w-[95%] mx-auto">
            <div class="flex flex-col">
                <a class="text-[15px] text-bg p-[8px] rounded-md hover:bg-bg hover:text-text duration-500 flex items-center gap-2"
                    href="{{ url('/UserDashBoard') }}">
                    <i class="fa-solid fa-house text-lg w-[25px] text-center"></i>หน้าแรก
                </a>
                <a class="text-[15px] text-bg p-[8px] rounded-md hover:bg-bg hover:text-text duration-500 flex items-center gap-2"
                    href="{{ url('/UserInfo') }}">
                    <i class="fa-solid fa-user text-lg w-[25px] text-center"></i>ข้อมูล
                </a>
                <a class="text-[15px] text-bg p-[8px] rounded-md hover:bg-bg hover:text-text duration-500 flex items-center gap-2"
                    href="{{url('/UserMeeting')}}">
                    <i class="fa-solid fa-handshake text-lg w-[25px] text-center"></i>ประชุม
                </a>
                <div>
                    <details
                        class="text-[15px] text-bg p-[8px] rounded-md hover:bg-bg hover:text-text duration-500 cursor-pointer">
                        <summary class="flex items-center gap-2">
                            <i class="fa-solid fa-user text-lg w-[25px] text-center"></i>ชื่อ:{{ Auth::user()->name }}
                        </summary>
                        <ul class="pt-2">
                            <a href="{{ url('/Logout') }}">
                                <li class="w-full p-2 hover:bg-slate-400 hover:text-white rounded-lg">
                                    ออกจากระบบ
                                </li>
                            </a>
                        </ul>
                    </details>
                </div>
            </div>
        </div>
    </div>
    {{-- Mobilenavbar --}}
    <div class="lg:hidden bg-black ">
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
                        <li><a href="{{ url('/UserDashBoard') }}"><i
                                    class="fa-solid fa-house text-lg w-[25px] text-center"></i>หน้าแรก</a></li>
                        <li><a href="{{ url('/UserInfo') }}"><i
                                    class="fa-solid fa-person text-lg w-[25px] text-center"></i>ข้อมูล</a>
                        </li>
                        <li><a href="{{url('/UserMeeting')}}"><i
                                    class="fa-solid fa-pen text-lg w-[25px] text-center"></i>ประชุม</a></li>                           
                    </ul>
                </div>
            </div>
            <div class="w-[30%] text-end">
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
    <div class="overflow-auto">
        @yield('content')
    </div>
</div>