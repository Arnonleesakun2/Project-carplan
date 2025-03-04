$(document).ready(function() {
    $('#my_table').DataTable({
        responsive: true,
        autoWidth: false, // ปิดการตั้งค่า Auto Width
        columnDefs: [{
                width: '20%',
                targets: 0
            }, // กำหนดความกว้างของคอลัมน์
        ],
        language: {
            paginate: {
                previous: 'ก่อนหน้า',
                next: 'ถัดไป'
            },
            info: 'แสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ',
            infoEmpty: 'ไม่มีข้อมูล',
            emptyTable: 'ไม่มีข้อมูลในตาราง',
            lengthMenu: 'แสดง _MENU_ รายการต่อหน้า',
        }
    });
});