$(document).ready(function() {
    //เพิ่มภาค
    $('#form-sector').on('submit', function(e) { 
        e.preventDefault()
        $.ajax({
            url: Storesector,
            type: 'POST',
            data: {
                _token: csrf_token,
                sector: $('#sector').val(),
            },
            success: function(response) {
                if (response.success) {
                    alert("เพิ่มข้อมูลเสร็จสิ้น");
                    $('#tablesector tbody').append(`    
                        <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b">
                            <th class="px-4 py-1 rounded-l-[7px] border-l-[1px]">${response.data.name}</th>
                            <th class="px-4 py-1 rounded-r-[7px] border-r-[1px]">
                                <a href="" id="sectordelete" data-id="${response.data.id}">
                                    <i class="fa-solid fa-trash hover:scale-125 duration-700"></i>
                                </a>
                            </th>
                        </tr>
                    `);
                    // เคลียร์ฟอร์ม
                    $('#form-sector')[0].reset();
                    document.getElementById('my_sector').close(); // ปิดโมดัล
                } else {
                    alert('Something went wrong');
                }
            },
            error: function(xhr, status, error) {
                alert("มีบางอย่างผิดพลาด");
            }
        });
    });
    //ลบภาค
    $('#tablesector').on('click', '#sectordelete', function(e) { 
        e.preventDefault()
        var button = $(this);
        var id = $(this).data('id'); // ดึงค่า id จากปุ่ม
        if (!id) {
            alert("ไม่พบ ID");
            return;
        }

        var SectorDelete = `/SectorDelete/${id}`; // ใช้ template literal แบบถูกต้อง
        var row = button.closest('tr');
        if (confirm('แน่ใจว่าจะลบ')) {
            $.ajax({
                url: SectorDelete,
                type: 'DELETE',
                data: {
                    _token: csrf_token,
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.message);

                        // ลบแถวจากตาราง
                        row.remove();
                    } else {
                        alert('Error deleting data' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert("มีบางอย่างผิดพลาด");
                }
            });
        }
    });
});
