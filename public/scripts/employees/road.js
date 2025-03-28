$(document).ready(function () {
    var map = L.map("map").setView([15.87, 100.9925], 6);
    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 30,
        attribution:
            '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    }).addTo(map);
    var currentMarker = null;
    // ฟังก์ชันสร้าง Marker
    function createMarker(lat, lng) {
        if (currentMarker) {
            map.removeLayer(currentMarker);
        }

        currentMarker = L.marker([lat, lng])
            .addTo(map)
            .bindPopup("Latitude: " + lat + "<br>Longitude: " + lng)
            .openPopup();

        $("#lat").val(lat);
        $("#lng").val(lng);

        // กำหนด event เมื่อคลิกที่ Marker ให้ลบ Marker นั้นออก
        currentMarker.on("click", function () {
            map.removeLayer(currentMarker);
            currentMarker = null;
            $("#lat").val("");
            $("#lng").val("");
        });
    }
    // Event คลิกบนแผนที่
    map.on("click", function (e) {
        var lat = e.latlng.lat.toFixed(6);
        var lng = e.latlng.lng.toFixed(6);
        createMarker(lat, lng);
    });
    //เพิ่มเส้นทาง
    $("#form-road").on("submit", function (e) {
        e.preventDefault(); // ยกเลิกการส่งฟอร์ม
        var lat = $("#lat").val().trim();
        var lng = $("#lng").val().trim();
        if (lat && lng) {
            $.ajax({
                url: Storeroad,
                type: "POST",
                data: {
                    _token: csrf_token,
                    road: $("#road").val(),
                    time: $("#time").val(),
                    lat: $("#lat").val(),
                    lng: $("#lng").val(),
                },
                success: function (response) {
                    if (response.success) {
                        alert("เพิ่มข้อมูลเสร็จสิ้น");
                        $("#tableroad tbody").append(`
                            <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b">
                                <th class="px-4 py-3 rounded-l-[7px] border-l-[1px]">${
                                    response.data.road
                                }</th>
                                <th class="px-4 py-3">${
                                    response.data.time.split(".")[0]
                                }</th>
                                <th class="px-4 py-1 flex justify-center items-center">
                                <button
                                        class="road-toggle-status w-8 h-8 flex items-center justify-center rounded-full shadow-lg transition-all duration-500 ease-in-out"
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
                                <th class="px-4 py-3">
                                    <button  
                                        id="btneditroad" 
                                        onclick="my_road_edit.showModal()"
                                        data-id="${response.data.id}"
                                        data-road="${response.data.road}"
                                        data-time="${response.data.time}"
                                        data-lat="${response.data.lat}"
                                        data-lng="${response.data.lng}"
                                    >
                                        <i class="fa-solid fa-pen-to-square hover:scale-125 duration-700"></i>
                                    </button>
                                </th>
                                <th class="px-4 py-3 rounded-r-[7px] border-r-[1px]">
                                    <a href="" data-id="${
                                        response.data.id
                                    }"  id="roaddelete" >
                                        <i class="fa-solid fa-trash hover:scale-125 duration-700"></i>
                                    </a>
                                 </th>
                            </tr>
                        `);
                        // เคลียร์ฟอร์ม
                        $("#form-road")[0].reset();
                        document.getElementById("my_road").close(); // ปิดโมดัล
                    } else {
                        alert("Something went wrong");
                    }
                },
                error: function (xhr, status, error) {
                    alert("มีบางอย่างผิดพลาด");
                },
            });
        } else {
            alert("กรุณาเลือกตำแหน่งบนแผนที่ก่อนบันทึกข้อมูล!");
        }
    });
    //นำข้อมูลไปหน้าแก้ไข
    var editmap = null; // เก็บตัวแปรแผนที่ไว้ข้างนอก
    var currentMarker = null; // เก็บ Marker ปัจจุบัน
    $("#tableroad").on("click", "#btneditroad", function (e) {
        e.preventDefault();
        var roadId = $(this).data("id"); // ชื่อของสินค้าที่เก็บไว้ใน data-id
        e.preventDefault();

        var roadId = $(this).data("id");
        var roadName = $(this).data("road");
        var roadTime = $(this).data("time");
        var lat = parseFloat($(this).data("lat")); // แปลงเป็นตัวเลข
        var lng = parseFloat($(this).data("lng"));

        var formattedTime = roadTime.split(".")[0];

        $("#editidroad").val(roadId);
        $("#editroad").val(roadName);
        $("#edittime").val(formattedTime);
        $("#latedit").val(lat);
        $("#lngedit").val(lng);

        // ตรวจสอบว่าแผนที่มีอยู่หรือยัง
        if (!editmap) {
            editmap = L.map("editmap").setView([15.87, 100.9925], 5);
            L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
                maxZoom: 30,
                attribution:
                    '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            }).addTo(editmap);
        } else {
            editmap.invalidateSize(); // รีเซ็ตขนาดแผนที่
        }

        // ลบ Marker เดิมก่อนสร้างใหม่
        if (currentMarker) {
            editmap.removeLayer(currentMarker);
        }

        if (!isNaN(lat) && !isNaN(lng)) {
            currentMarker = L.marker([lat, lng])
                .addTo(editmap)
                .bindPopup("Latitude: " + lat + "<br>Longitude: " + lng)
                .openPopup();

            editmap.setView([lat, lng], 13);
        }

        // ให้คลิกแผนที่เพื่ออัปเดตค่า lat/lng
        editmap.off("click").on("click", function (e) {
            var newLat = e.latlng.lat.toFixed(6);
            var newLng = e.latlng.lng.toFixed(6);

            if (currentMarker) {
                editmap.removeLayer(currentMarker);
            }

            currentMarker = L.marker([newLat, newLng])
                .addTo(editmap)
                .bindPopup("Latitude: " + newLat + "<br>Longitude: " + newLng)
                .openPopup();

            $("#latedit").val(newLat);
            $("#lngedit").val(newLng);
        });
    });
    //แก้ไข
    $("#form-editroad").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: Editroad,
            type: "PATCH",
            data: {
                _token: csrf_token,
                id: $("#editidroad").val(),
                road: $("#editroad").val(),
                time: $("#edittime").val(),
                lat: $("#latedit").val(),
                lng: $("#lngedit").val(),
            },

            success: function (response) {
                if (response.success) {
                    alert("แก้ไขข้อมูลเสร็จสิ้น");
                    document.getElementById("my_road_edit").close(); // ปิดโมดัล
                    var rowToRemove = $("#tableroad")
                        .find(`[data-id='${response.data.id}']`)
                        .closest("tr");
                    rowToRemove.remove(); // ลบแถวเก่า
                    // เพิ่มแถวใหม่ที่มีข้อมูลที่แก้ไข
                    var newRow = `
                        <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b">
                        <th class="px-4 py-3 rounded-l-[7px] border-l-[1px]">${
                            response.data.road
                        }</th>
                        <th class="px-4 py-3">${response.data.time
                            .split(":")
                            .slice(0, 2)
                            .join(":")}</th>
                        <th class="px-4 py-1 flex justify-center items-center z-1">
                            <button
                                class="road-toggle-status w-8 h-8 flex items-center justify-center rounded-full shadow-lg transition-all duration-500 ease-in-out"
                                data-id="${response.data.id}" 
                                data-status="${response.data.status}"
                                style="background: ${
                                    response.data.status
                                        ? "linear-gradient(135deg, #16A085, #1ABC9C)"
                                        : "linear-gradient(135deg, #E74C3C, #C0392B)"
                                };">
                                <i class="fa-solid ${
                                    response.data.status ? "fa-check" : "fa-times"
                                } text-white text-lg transition-all duration-500 ease-in-out"></i>
                            </button>
                        </th>
                        <th class="px-4 py-3">
                            <button  
                                id="btneditroad" 
                                onclick="my_road_edit.showModal()"
                                data-id="${response.data.id}"
                                data-road="${response.data.road}"
                                data-time="${response.data.time}"
                                data-lat="${response.data.lat}"
                                data-lng="${response.data.lng}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </th>
                        <th class="px-4 py-3 rounded-r-[7px] border-r-[1px]">
                            <a href="" data-id="${response.data.id}" id="roaddelete">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </th>
                    </tr>
                    `;
                    $("#tableroad").append(newRow); // เพิ่มแถวใหม่เข้าไปในตาราง
                    // เคลียร์ฟอร์ม
                    $("#form-editroad")[0].reset(); // ปรับชื่อฟอร์มให้ตรงกับ ID ของฟอร์ม
                } else {
                    alert("Something went wrong");
                }
            },
            error: function (xhr, status, error) {
                alert("มีบางอย่างผิดพลาด");
            },
        });
    });
    //ลบเส้นทาง
    $("#tableroad").on("click", "#roaddelete", function (e) {
        e.preventDefault();
        var button = $(this); // เลือกปุ่มที่ถูกคลิก
        var id = $(this).data("id"); // ดึงค่า id จากปุ่ม
        if (!id) {
            alert("ไม่พบ ID");
            return;
        }
        var row = button.closest("tr"); // หาแถวที่ปุ่มลบอยู่

        var RoadDelete = `/RoadDelete/${id}`; // ใช้ template literal แบบถูกต้อง
        if (confirm("แน่ใจว่าจะลบ")) {
            $.ajax({
                url: RoadDelete,
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
    //เปลี่ยนสถานะเส้นทาง
    $(document).on("click", ".road-toggle-status", function (e) {
        e.preventDefault();
        var button = $(this);
        var icon = button.find("i");
        var carId = button.data("id");
        var currentStatus = button.data("status");
        var newStatus = currentStatus ? 0 : 1;
        $.ajax({
            url: Statusroad,
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
// var markers = {}; // เก็บ marker ตามตำแหน่ง LatLng

// var markers = {}; // เก็บ marker ตามพิกัด
// // คลิกที่แผนที่เพื่อเพิ่ม Marker
// map.on("click", function (e) {
//     var lat = e.latlng.lat.toFixed(6);
//     var lng = e.latlng.lng.toFixed(6);
//     var key = lat + "," + lng;

//     if (!markers[key]) {
//         var marker = L.marker([lat, lng])
//             .addTo(map)
//             .bindPopup("Latitude: " + lat + "<br>Longitude: " + lng)
//             .openPopup();

//         markers[key] = marker;
//         marker.on("click", function () {
//             map.removeLayer(marker);
//             delete markers[key];
//         });
//     }
//     $("#lat").val(lat);
//     $("#lng").val(lng);
// });
