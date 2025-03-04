<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}">
    {{-- jquery --}}
    <script type="text/javascript" src="{{ asset('jquery/jquery.js') }}"></script>
    {{-- signature --}}
    <script type="text/javascript" src="{{ asset('signaturec/signature2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('signaturec/signature.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('signaturec/signature.css') }}">
    {{-- datatabel --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('datatable/style1.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('datatable/style2.css') }}" />
    <script type="text/javascript" src="{{ asset('datatable/script1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatable/script2.js') }}"></script>
    {{-- sweetalert --}}
    <script src="{{ asset('sweetalert/1.js') }}"></script>
</head>

<body>
    @if (Session::has('message'))
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
    @if (Session::has('error'))
        <script>
            Swal.fire({
                title: 'พิดพลาด!',
                text: "{{ session('error') }}",
                icon: 'error',
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif
    <div
        class="w-full h-screen flex items-center justify-center bg-gradient-to-r from-gray-950 via-gray-800 to-gray-700">
        <div
            class="w-[90%] md:w-[80%] grid grid-cols-1 md:grid-cols-[50%,50%] backdrop-blur-lg shadow-xl rounded-2xl text-white border border-white/20">
            <!-- Left Content -->
            <div class="p-[30px] w-[100%] mx-auto text-white">
                <div id="typewriter"
                    class="text-[40px] md:text-[50px] lg:text-[70px] font-bold border-b-2   border-white">
                </div>
                <div
                    class="text-[16px] md:text-[18px] lg:text-[20px] font-semibold  mt-[10px] md:mt-[20px] ">
                    ระบบสารสนเทศและวางแผนการขนส่ง บริษัท ตาตงนครสวรรค์ จำกัด
                </div>
                <div class="text-[16px] md:text-[18px] lg:text-[20px] font-semibold ">
                    Transportation Information and Planning System, Tatong Nakhon Sawan Co., Ltd.
                </div>
            </div>

            <!-- Right Content (Form) -->
            <div class="">
                <div class="p-[10px] md:p-[20px]">
                    <form class="w-[95%] md:w-[80%] mx-auto" action="{{ url('/login_post') }}" method="post">
                        @csrf
                        @if (Auth::check())
                            @if (Auth::user()->type == 'admin' || Auth::user()->type == 'user' || Auth::user()->type == 'planner')
                                <div class="text-center">คลิกเพื่อออกระบบ
                                    <a class="ml-2 text-red-500" href="{{ url('/Logout') }}">คลิก</a>
                                </div>
                            @endif
                        @else
                            <div class="font-bold text-center text-white text-[25px] md:text-[35px]">
                                Log <span class="border-b-2 text-[#b76e79] border-b-black/90">in</span>
                            </div>
                            <div class="mt-[10px] md:mt-[20px]">
                                <label class="input input-bordered flex items-center gap-2 bg-white relative">
                                    <div class="font-bold text-black/90">Email :</div>
                                    <input type="email" class="grow text-black" name="email" placeholder="Email" />
                                </label>
                            </div>
                            <div class="mt-[10px] md:mt-[20px]">
                                <label class="input input-bordered flex items-center gap-2 bg-white relative">
                                    <div class="font-bold text-black/90">Password :</div>
                                    <input id="password" type="password" placeholder="password" class="grow text-black"
                                        name="password" />
                                    <button type="button" id="togglePassword" class="text-[#514F59]">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                            class="w-4 h-4 opacity-70">
                                            <path fill-rule="evenodd" id="eyeIcon"
                                                d="M16 8s-2-5-8-5-8 5-8 5 2 5 8 5 8-5 8-5zm-8-3c2.21 0 4 1.79 4 4s-1.79 4-4 4-4-1.79-4-4 1.79-4 4-4zm0 1.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </label>
                            </div>
                            <div class="mt-[20px] md:mt-[40px]">
                                <button
                                    class="btn w-full bg-gradient-to-r from-purple-500 to-pink-500 border-0 shadow-xl rounded-[25px]  text-[16px] md:text-[20px] font-bold text-black hover:bg-[#b76e79] hover:translate-x-2 duration-700">
                                    Log <span class="border-b-2 border-black">in</span>
                                </button>
                            </div>
                            <div class="mt-[10px] md:mt-[15px] mb-[20px] md:mb-[30px]">
                                <a href="{{ url('/NewRegister') }}"
                                    class="btn border-0 shadow-xl bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 rounded-[25px] w-full text-[16px] md:text-[20px] font-bold text-black  hover:translate-x-2 duration-700">
                                    Register
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script>
    $(document).ready(function() {
        $('#togglePassword').click(function() {
            var passwordInput = $('#password');
            var eyeIcon = $('#eyeIcon');
            var type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
            passwordInput.attr('type', type);

            // เปลี่ยนไอคอนเมื่อแสดง/ซ่อนรหัสผ่าน
            if (type === 'text') {
                eyeIcon.attr('d',
                    'M8 5c4.14 0 8 5 8 5s-3.86 5-8 5-8-5-8-5 3.86-5 8-5zm0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0-2C3.67 5 0 8 0 8s3.67 3 8 3 8-3 8-3-3.67-3-8-3z'
                );
            } else {
                eyeIcon.attr('d',
                    'M16 8s-2-5-8-5-8 5-8 5 2 5 8 5 8-5 8-5zm-8-3c2.21 0 4 1.79 4 4s-1.79 4-4 4-4-1.79-4-4 1.79-4 4-4zm0 1.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5z'
                );
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/typewriter-effect@2.18.1/dist/core.js"></script>
<script>
    const app = document.getElementById('typewriter');
    const typewriter = new Typewriter(app, {
        loop: true,
        delay: 75,
    });
    typewriter
        .typeString('Welcome !')
        .pauseFor(8000)
        .deleteAll()
        .start();
</script>
