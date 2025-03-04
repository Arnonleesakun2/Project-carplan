{{-- แสดงปฏิทิน --}}
@extends('layout/Navbar/Navbar')
@section('title')
    ปฏิทิน
@endsection
@section('script')
    <script src="{{ asset('calender/script1.js') }}"></script>
    <script src="{{ asset('calender/script2.js') }}"></script>
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
        <p>ปฏิทิน</p>
    </div>
    <div
        class="rounded-[5px] max-w-[97%] my-[10px] p-[30px] mx-auto shadow-[1px_2px_6px_rgba(0,0,0,0.38)] border-solid border-[1px] border-[#DFDFDF]">
        <div class="button flex justify-between">
            <div class="btn-group mb-3" role="group" aria-label="Calendar Actions">
                <a href="{{ URL('/AddSchedule') }}"
                    class="py-[7px] px-[25px] bg-[#111827] text-white rounded-[10px] hover:bg-[#374151] duration-300">เพิ่มข้อมูล</a>
                <button id="exportButton"
                    class="py-[7px] px-[25px]  bg-[#111827] text-white rounded-[10px] hover:bg-[#374151] duration-300">Export Excel</button>
            </div>
        </div>
        <div class="container mx-auto mt-4">
            <div id='calendar'>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content'),
            }
        });
        var calendarEl = document.getElementById('calendar');
        var events = [];
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            views: {
                dayGridMonth: {
                    buttonText: 'เดือน'
                },
                timeGridWeek: {
                    buttonText: 'สัปดาห์'
                },
                timeGridDay: {
                    buttonText: 'วัน'
                }
            },
            windowResize: function(view) {
                if (window.innerWidth < 768) {
                    calendar.changeView('timeGridDay'); // เปลี่ยนเป็นมุมมองรายวันบนหน้าจอขนาดเล็ก
                } else {
                    calendar.changeView('dayGridMonth'); // เปลี่ยนเป็นมุมมองรายเดือนบนหน้าจอขนาดใหญ่
                }
            },
            initialView: 'dayGridMonth',
            timeZone: 'UTC',
            events: '/GetEvents',
            editable: true,
            // Deleting The Event
            eventContent: function(info) {
                var eventTitle = info.event.title;
                var eventElement = document.createElement('div');
                eventElement.innerHTML = '<span style="cursor: pointer;">❌</span> ' + eventTitle;

                eventElement.querySelector('span').addEventListener('click', function() {
                    if (confirm("ต้องการจะลบข้อมูลใช่หรือไม่")) {
                        var eventId = info.event.id;
                        $.ajax({
                            method: 'get',
                            url: '/Delete/' + eventId,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                console.log('Event deleted successfully.');
                                calendar.refetchEvents(); // Refresh events after deletion
                            },
                            error: function(error) {
                                console.error('Error deleting event:', error);
                            }
                        });
                    }
                });
                return {
                    domNodes: [eventElement]
                };
            },
            // Drag And Drop
            eventDrop: function(info) {
                var eventId = info.event.id;
                var newStartDate = info.event.start;
                var newEndDate = info.event.end || newStartDate;
                var newStartDateUTC = newStartDate.toISOString().slice(0, 10);
                var newEndDateUTC = newEndDate.toISOString().slice(0, 10);

                $.ajax({
                    method: 'post',
                    url: `/UpdateSchedule/${eventId}`,
                    data: {
                        '_token': "{{ csrf_token() }}",
                        start_date: newStartDateUTC,
                        end_date: newEndDateUTC,
                    },
                    success: function() {
                        console.log('Event moved successfully.');
                    },
                    error: function(error) {
                        console.error('Error moving event:', error);
                    }
                });
            },
            // Event Resizing
            eventResize: function(info) {
                var eventId = info.event.id;
                var newEndDate = info.event.end;
                var newEndDateUTC = newEndDate.toISOString().slice(0, 10);

                $.ajax({
                    method: 'post',
                    url: `/Events/${eventId}/Resize`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        end_date: newEndDateUTC
                    },
                    success: function() {
                        console.log('Event resized successfully.');
                    },
                    error: function(error) {
                        console.error('Error resizing event:', error);
                    }
                });
            },
        });
        // Exporting Function
        document.getElementById('exportButton').addEventListener('click', function() {
            var events = calendar.getEvents().map(function(event) {
                return {
                    title: event.title,
                    start: event.start ? event.start.toISOString() : null,
                    end: event.end ? event.end.toISOString() : null,
                    color: event.backgroundColor,
                    description: event.extendedProps.description || '',
                };
            });

            var wb = XLSX.utils.book_new();

            var ws = XLSX.utils.json_to_sheet(events);

            XLSX.utils.book_append_sheet(wb, ws, 'Events');

            var arrayBuffer = XLSX.write(wb, {
                bookType: 'xlsx',
                type: 'array'
            });

            var blob = new Blob([arrayBuffer], {
                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            });

            var downloadLink = document.createElement('a');
            downloadLink.href = URL.createObjectURL(blob);
            downloadLink.download = 'events.xlsx';
            downloadLink.click();
        })

        calendar.render();
        // ตรวจสอบขนาดหน้าจอ
        function resizeCalendar() {
            if ($(window).width() <= 768) { // ถ้าหน้าจอขนาดเล็กกว่า 768px (เช่นโทรศัพท์)
                $('.fc-toolbar-title').css('font-size', '12px'); // ลดขนาด title
                $('.fc-button').css({
                    'font-size': '10px', // ลดขนาดตัวอักษรปุ่ม
                    'padding': '3px 7px' // ลดขนาด padding ของปุ่ม
                });
                $('.fc-toolbar').css('padding', '0 5px'); // ลดระยะห่างรอบๆ ปุ่ม
            } else {
                $('.fc-toolbar-title').css('font-size', '16px'); // ขนาดปกติสำหรับหน้าจอใหญ่
                $('.fc-button').css({
                    'font-size': '14px',
                    'padding': '5px 10px'
                });
                $('.fc-toolbar').css('padding', '0 10px');
            }
        }

        // เรียกใช้ resizeCalendar เมื่อหน้าจอเปลี่ยนขนาด
        $(window).resize(function() {
            resizeCalendar();
        });

        // เรียกใช้ครั้งแรกเมื่อโหลดหน้า
        resizeCalendar();
    </script>
@endsection
