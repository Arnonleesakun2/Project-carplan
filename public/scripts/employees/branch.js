$(document).ready(function () {
    //เลือกภาคไปแสดงสาขา
    $("#selectsector").change(function () {
        var sectorId = $(this).val();
        if (sectorId) {
            $.ajax({
                url: "/SelectforBranch/" + sectorId, // URL ที่จะส่งไป
                type: "GET",
                success: function (response) {
                    // Clear existing rows in the table
                    $("#tablebranch tbody").empty();
                    // Loop ผ่านข้อมูลที่ได้รับจากเซิร์ฟเวอร์และเพิ่มแถวใน table
                    $.each(response, function (index, branch) {
                        $("#tablebranch tbody").append(`
                            <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b">
                                <th class="px-4 py-1 rounded-l-[7px] border-l-[1px]">${branch.customers.customer}</th>
                                <th class="px-4 py-1">${branch.sectors.name}</th>
                                <th class="px-4 py-1">${branch.branch}</th>
                                <th class="px-4 py-1 rounded-r-[7px] border-r-[1px]">
                                    <a href="" id="branchdelete" data-id="${branch.id}">
                                        <i class="fa-solid fa-trash hover:scale-125 duration-700"></i>
                                    </a>
                                </th>
                            </tr>
                        `);
                    });
                },
                error: function (xhr) {
                    console.log(xhr.responseText); // ดูข้อผิดพลาดที่เกิดขึ้น
                },
            });
        }
    });
    //เพิ่มสาขา
    $('#form-branch').on('submit', function(e) { 
        e.preventDefault()
        $.ajax({
            url: Storebranch,
            type: 'POST',
            data: {
                _token: csrf_token,
                branch: $('#branchname').val(),
                customer: $('#branchcustomer').val(),
                sector: $('#branchsector').val(),
            },
            success: function(response) {
                if (response.success) {
                    alert("เพิ่มข้อมูลเสร็จสิ้น");
                    console.log(response);
                    $('#tablebranch tbody').append(`
                        <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b" >
                            <th class="px-4 py-1 rounded-l-[7px] border-l-[1px]">${response.customer.customer}</th>
                            <th class="px-4 py-1">${response.sector.name}</th>
                            <th class="px-4 py-1">${response.branch.branch}</th>
                            <th class="px-4 py-1 rounded-r-[7px] border-r-[1px]">
                                <a href="#" id="branchdelete" data-id="${response.branch.id}">
                                    <i class="fa-solid fa-trash hover:scale-125 duration-700"></i></a>
                            </th>
                        </tr>
                    `);
                    // เคลียร์ฟอร์ม
                    $('#form-branch')[0].reset();
                    document.getElementById('my_branch').close(); // ปิดโมดัล
                } else {
                    alert('Something went wrong');
                }
            },
            error: function(xhr, status, error) {
                alert("มีบางอย่างผิดพลาด");
            }
        });
    });
    //ลบสาขา
    $('#tablebranch').on('click', '#branchdelete', function(e) {
        e.preventDefault();
        var button = $(this); // เลือกปุ่มที่ถูกคลิก  
        var id = $(this).data('id'); // ดึงค่า id จากปุ่ม
        if (!id) {
            alert("ไม่พบ ID");
            return;
        }
        var BranchDelete = `/BranchDelete/${id}`; // ใช้ template literal แบบถูกต้อง
        var row = button.closest('tr'); // หาแถวที่ปุ่มลบอยู่
        if (confirm('แน่ใจว่าจะลบ')) {
            $.ajax({
                url: BranchDelete,
                type: 'DELETE',
                data: {
                    _token:csrf_token,
                },
                success: function(response) {
                    console.log(response);
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
