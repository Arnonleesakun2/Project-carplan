@extends('layout/Navbar/Navbar')
@section('title')
    เซ็นชื่อ
@endsection
@section('script')
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
    <div class="w-[97%]  mx-auto text-[20px] py-[3px] text-text">
        <p>ลายเซ็น</p>
    </div>
    <div
        class="rounded-[5px] max-w-[97%] my-[10px] p-[30px] mx-auto shadow-[1px_2px_6px_rgba(0,0,0,0.38)] border-solid border-[1px] border-[#DFDFDF]">
        <div class="flex justify-end">
            <div class="button">
                <a class="py-[7px] px-[21px] bg-[#FF5861] text-white rounded-[10px] hover:bg-[#EF4C53] duration-300"
                    href="{{ url('/UserMeeting') }}">ย้อนกลับ</a>
            </div>
        </div>
        <div class="max-w-full ">
            <form class="text-center" method="POST" action="{{ url('/AddUserUpdate') }}">
                @csrf
                <input type="hidden" value="{{ $id }}" name="id">
                <div class="col-md-12">
                    <label for="">ลายเซ็น:</label>
                    <br />
                    <div id="sig"></div>
                    <br />
                    <a id="clear" class=" cursor-pointer"><i class="fa-solid fa-arrow-rotate-left fa-2xl mt-8   "></i>
                    </a>
                    <textarea id="signature64" name="signature" style="display: none"></textarea>
                </div>
                <br />
                <div class="button">
                    <button type="submit"
                        class="py-[7px] px-[21px] bg-[#111827] text-white cursor-pointer rounded-[10px] hover:bg-[#374151] duration-300">Save</button>
                </div>

            </form>
        </div>
    @endsection
    @section('endscript')
        <script type="text/javascript">
            var sig = $('#sig').signature({
                syncField: '#signature64',
                syncFormat: 'PNG'
            });
            $('#clear').click(function(e) {
                e.preventDefault();
                sig.signature('clear');
                $("#signature64").val('');
            });
        </script>
    @endsection
