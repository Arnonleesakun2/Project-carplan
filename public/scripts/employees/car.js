$(document).ready(function () {
    //เพิ่มรถ
    $("#form-car").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: Storecar,
            type: "POST",
            data: {
                _token: csrf_token,
                license: $("#license").val(),
                number: $("#number").val(),
                size: $("#size").val(),
                weight: $("#carweight").val(),
            },
            success: function (response) {
                if (response.success) {
                    alert("เพิ่มข้อมูลเสร็จสิ้น");
                    console.log(response);
                    $("#tablecar tbody").append(`
                        <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b">
                            <th class="px-4 py-1 rounded-l-[7px] border-l-[1px]">${
                                response.data.license
                            }</th>
                            <th class="px-4 py-1">${response.data.number}</th>
                            <th class="px-4 py-1">${response.data.size}</th>
                            <th class="px-4 py-1">${response.data.weight}</th>
                            <th class="px-4 py-1 flex justify-center items-center">
                                <button
                                    class="car-toggle-status w-8 h-8 flex items-center justify-center rounded-full shadow-lg transition-all duration-500 ease-in-out"
                                    data-id="${
                                        response.data.id
                                    }" data-status="${response.data.status}"
                                    style="background: ${
                                        response.data.status
                                            ? "linear-gradient(135deg, #16A085, #1ABC9C)"
                                            : "linear-gradient(135deg, #E74C3C, #C0392B)"
                                    };">
                                    <i class="fa-solid ${
                                        response.data.status
                                            ? "fa-check"
                                            : "fa-times"
                                    } text-white text-lg transition-all duration-500 ease-in-out"></i>
                                </button>
                            </th>
                            <th class="px-4 py-1">
                                <button  
                                    id="btneditcar" 
                                    onclick="my_car_edit.showModal()"
                                    data-id="${response.data.id}"
                                    data-license="${response.data.license}"
                                    data-number="${response.data.number}"
                                    data-size="${response.data.size}"
                                    data-carweight="${response.data.weight}"
                                >
                                    <i class="fa-solid fa-pen-to-square hover:scale-125 duration-700"></i>
                                </button>
                            </th>
                            <th class="px-4 py-1 rounded-r-[7px] border-r-[1px]">
                                <a href="" data-id="${
                                    response.data.id
                                }"  id="cardelete" >
                                    <i class="fa-solid fa-trash hover:scale-125 duration-700"></i>
                                </a>
                            </th>
                        </tr>
                    `);
                    // เคลียร์ฟอร์ม
                    $("#form-car")[0].reset();
                    document.getElementById("my_car").close(); // ปิดโมดัล
                } else {
                    alert("Something went wrong");
                }
            },
            error: function (xhr, status, error) {
                alert("มีบางอย่างผิดพลาด");
            },
        });
    });
    //นำข้อมูลไปหน้าแก้ไข
    $("#tablecar").on("click", "#btneditcar", function (e) {
        e.preventDefault();
        var carId = $(this).data("id"); // ชื่อของสินค้าที่เก็บไว้ใน data-id
        var carLicense = $(this).data("license"); // ชื่อของสินค้าที่เก็บไว้ใน data-license
        var carNumbert = $(this).data("number"); // น้ำหนักของสินค้าที่เก็บไว้ใน data-number
        var carSize = $(this).data("size"); // น้ำหนักของสินค้าที่เก็บไว้ใน data-size
        var carWeight = $(this).data("carweight"); // น้ำหนักของสินค้าที่เก็บไว้ใน data-carWeight
        // ส่งข้อมูลไปยัง input fields ใน modal
        $("#editIdcar").val(carId);
        $("#editlicense").val(carLicense);
        $("#editnumber").val(carNumbert);
        $("#editcarweight").val(carWeight);
    });
    //แก้ไข
    $("#form-editcar").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: Editcar,
            type: "PATCH",
            data: {
                _token: csrf_token,
                id: $("#editIdcar").val(),
                license: $("#editlicense").val(),
                number: $("#editnumber").val(),
                size: $("#select-cars").val(), // ตรวจสอบว่า size มีค่าและไม่เป็น null
                weight: $("#editcarweight").val(),
            },
            success: function (response) {
                if (response.success) {
                    alert("แก้ไขข้อมูลเสร็จสิ้น");
                    document.getElementById("my_car_edit").close(); // ปิดโมดัล
                    var rowToRemove = $("#tablecar")
                        .find(`[data-id='${response.data.id}']`)
                        .closest("tr");
                    rowToRemove.remove(); // ลบแถวเก่า
                    // เพิ่มแถวใหม่ที่มีข้อมูลที่แก้ไข
                    var newRow = `
                        <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b">
                            <th class="px-4 py-3 rounded-l-[7px] border-l-[1px]">${response.data.license}</th>
                            <th class="px-4 py-3">${response.data.number}</th>
                            <th class="px-4 py-3">${response.data.size}</th>
                            <th class="px-4 py-3">${response.data.weight}</th>
                            <th class="px-4 py-1 flex justify-center items-center z-1 ">
                                <button
                                    class="car-toggle-status w-8 h-8 flex items-center justify-center rounded-full shadow-lg transition-all duration-500 ease-in-out"
                                    data-id="${response.data.id}" data-status="${response.data.status}"
                                    style="background: ${response.data.status ? 'linear-gradient(135deg, #16A085, #1ABC9C)' : 'linear-gradient(135deg, #E74C3C, #C0392B)'};">
                                     <i class="fa-solid ${response.data.status ? 'fa-check' : 'fa-times'} text-white text-lg transition-all duration-500 ease-in-out"></i>
                                </button>
                            </th>
                            <th class="px-4 py-3">
                                <button  
                                    id="btneditcar" 
                                    onclick="my_car_edit.showModal()"
                                    data-id="${response.data.id}"
                                    data-license="${response.data.license}"
                                    data-number="${response.data.number}"
                                    data-size="${response.data.size}"
                                    data-carweight="${response.data.weight}"
                                    >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </th>
                            
                            <th class="px-4 py-3 rounded-r-[7px] border-r-[1px]">
                                <a href="" data-id="${response.data.id}"  id="cardelete" >
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </th>
                        </tr>
                    `;
                    $("#tablecar").append(newRow); // เพิ่มแถวใหม่เข้าไปในตาราง

                    // เคลียร์ฟอร์ม
                    $("#form-editcar")[0].reset(); // ปรับชื่อฟอร์มให้ตรงกับ ID ของฟอร์ม
                } else {
                    alert("Something went wrong");
                }
            },
            error: function (xhr, status, error) {
                alert("มีบางอย่างผิดพลาด");
            },
        });
    });
    //ลบรถ
    $("#tablecar").on("click", "#cardelete", function (e) {
        e.preventDefault();
        var button = $(this); // เลือกปุ่มที่ถูกคลิก
        var id = $(this).data("id"); // ดึงค่า id จากปุ่ม
        if (!id) {
            alert("ไม่พบ ID");
            return;
        }
        var row = button.closest("tr"); // หาแถวที่ปุ่มลบอยู่
        var CarDelete = `/CarDelete/${id}`; // ใช้ template literal แบบถูกต้อง

        if (confirm("แน่ใจว่าจะลบ")) {
            $.ajax({
                url: CarDelete,
                type: "DELETE",
                data: {
                    _token: csrf_token,
                },
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        alert(response.message);

                        // ลบแถวจากตาราง
                        row.remove();
                    } else {
                        alert("Error deleting data" + response.message);
                    }
                },
                error: function (xhr, status, error) {
                    alert("มีบางอย่างผิดพลาด");
                },
            });
        }
    });
    $(document).on("click", ".car-toggle-status", function (e) {
        e.preventDefault();
        var button = $(this);
        var icon = button.find("i");
        var carId = button.data("id");
        var currentStatus = button.data("status");
        var newStatus = currentStatus ? 0 : 1;

        $.ajax({
            url: Statuscar,
            type: "POST",
            data: {
                _token: csrf_token,
                id: carId,
                status: newStatus,
            },
            success: function (response) {
                if (response.success) {
                    button.data("status", newStatus);

                    // ใช้ animation เปลี่ยนสีเป็น Gradient
                    button.css({
                        background: newStatus
                            ? "linear-gradient(135deg, #16A085, #1ABC9C)"
                            : "linear-gradient(135deg, #E74C3C, #C0392B)",
                        transition:
                            "background 0.5s ease-in-out, transform 0.2s ease",
                    });

                    // Animation ตอนกด (เด้งเล็กๆ)
                    button.css("transform", "scale(0.9)");
                    setTimeout(() => {
                        button.css("transform", "scale(1)");
                    }, 200);

                    // เปลี่ยนไอคอนแบบ Smooth
                    icon.fadeOut(200, function () {
                        $(this)
                            .removeClass("fa-check fa-times")
                            .addClass(newStatus ? "fa-check" : "fa-times")
                            .fadeIn(200);
                    });
                }
            },
            error: function () {
                alert("เกิดข้อผิดพลาดในการอัปเดตสถานะ");
            },
        });
    });
});
