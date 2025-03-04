$(document).ready(function() {
    //แก้ไขตระกร้า
    $('#form-basket').on('submit', function(e) { //แก้ไขตระกร้า
        e.preventDefault();
        $.ajax({
            url: Editbasket, // ใช้ค่าที่ส่งมาจาก Blade
            type: 'PATCH',
            data: {
                _token: csrf_token, // ใช้ค่าที่ส่งมาจาก Blade
                id: $('#basketweight_id').val(),
                basketweight: $('#basketweight').val(),
            },
            success: function(response) {
                if (response.success) {
                    alert("แก้ไขข้อมูลเสร็จสิ้น");
                    document.getElementById('my_basket').close(); // ปิดโมดัล
                    $('#basketweight_id').val(response.data.id);
                    $('#basketweight').val(response.data.basketweight);
                } else {
                    alert('Something went wrong');
                }
            },
            error: function(xhr, status, error) {
                alert("มีบางอย่างผิดพลาด");
            }
        });
    });
});
