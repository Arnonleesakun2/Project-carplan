$(document).ready(function () {
    
//---------------------------------------------------------แสดงเวลาตามที่เลือกเส้นทาง-----------------------------------------------------------//    
    $("#customer_id").on("change", function () {//ดึงข้อมูลสาขาตามลูกค้า
        var customerId = $(this).val(); // ดึงค่า ID ลูกค้าที่เลือก
        // ส่งคำขอ AJAX เพื่อดึงข้อมูลสาขาที่มีลูกค้าตาม ID
        $.ajax({
            url: "/GetBranchsByCustomer/" + customerId, // URL ที่จะส่งไปยัง Laravel
            type: "GET",
            dataType: "json",
            success: function (response) {
                $("#branch-select").empty(); // ล้างตัวเลือกเก่าจาก select
                $("#branch-select").append(
                    "<option disabled selected>เลือกสาขา</option>"
                ); // เพิ่มตัวเลือกค่าเริ่มต้น

                // Loop ข้อมูลสาขาที่ได้รับจากเซิร์ฟเวอร์และเพิ่มเข้าใน select
                $.each(response.branchs, function (index, branch) {
                    $("#branch-select").append(
                        `<option data-branch="${branch.branch}" value="${branch.id}">${branch.branch}</option>`
                    );
                });
            },
            error: function (xhr) {
                console.log(xhr.responseText); // แสดงข้อผิดพลาดถ้ามี
            },
        });
    });
    $("#customer_id").on("change", function () { //ดึงข้อมูลสินค้าตามลูกค้า
        var customerId = $(this).val(); // ดึงค่า ID ลูกค้าที่เลือก
        // ส่งคำขอ AJAX เพื่อดึงข้อมูลสินค้าตามลูกค้าที่เลือก
        $.ajax({
            url: "/GetProductsByCustomer/" + customerId, // URL ที่จะส่งไปยัง Laravel
            type: "GET",
            dataType: "json",
            success: function (response) {
                $("#product-select").empty(); // ล้างตัวเลือกเก่าจาก select
                $("#product-select").append(
                    "<option disabled selected>เลือกสินค้า</option>"
                ); // เพิ่มตัวเลือกค่าเริ่มต้น

                // Loop ข้อมูลสินค้าที่ได้รับจากเซิร์ฟเวอร์และเพิ่มเข้าใน select
                $.each(response.products, function (index, product) {
                    $("#product-select").append(
                        `<option data-weight="${product.weight}" data-product="${product.product}" data-id="${product.id}" value="${product.id}">${product.product}</option>`
                    );
                });
            },
            error: function (xhr) {
                console.log(xhr.responseText); // แสดงข้อผิดพลาดถ้ามี
            },
        });
    });    
//----------------------------------------------ปรับ disibleDropdown เลือกรถถ้ายังไม่่เลือกสินค้า---------------------------------------//    
    $(document).ready(function() {//ปรับ disibleDropdown เลือกรถ
        // ปิดการเลือก Dropdown รถตั้งแต่เริ่มโหลดหน้าเว็บ
        $("#select-cars").prop("disabled", true);
        // คำนวณน้ำหนักตอนโหลดหน้าเว็บ
        updateTotalWeight();
    });
//------------------------------------ถ้ายังไม่เลือกลูกค้าก้ไม่สามารถกดปุ่มได้ แต่พอเลือกลูกก้ ก้ให้ dissible false---------------------------------------//    
    $('#customer_id').on('change', function() {//ถ้ายังไม่เลือกลูกค้าก้ไม่สามารถกดปุ่มได้ แต่พอเลือกลูกก้ ก้ให้ dissible false
        var customerId = $(this).val(); // ดึงค่า ID ของลูกค้าที่เลือก

        // ถ้ามีการเลือกลูกค้า ให้เปิดการใช้งานปุ่ม "เพิ่มสินค้า"
        if (customerId) {
            $('#add-product-btn').prop('disabled', false);
        } else {
            // ถ้าไม่มีการเลือก ให้ปิดการใช้งานปุ่ม
            $('#add-product-btn').prop('disabled', true);
        }
    });
//---------------------------------------------------------แสดงเวลาตามที่เลือกเส้นทาง-----------------------------------------------------------//        
    $("#select-road").change(function () {//แสดงเวลาตามที่เลือกเส้นทาง
        var selectedTime = $(this).find(":selected").data("time"); // ดึงค่า time จาก data-time
        console.log(selectedTime); // ตรวจสอบค่า time
        if (selectedTime) {
            var formattedTime = selectedTime.split(".")[0]; // ตัดทศนิยมออก
            $("#roadtime").val(formattedTime); // ใส่ค่าเวลาใน input[type="time"]
        } else {
            $("#roadtime").val(""); // ถ้าไม่มี time ให้เคลียร์ค่า
        }
    });
//-----------------------------------------------------------แสดงข้อมูลรถตามที่เลือก-----------------------------------------------------------//    
    $("#select-cars").change(function () {//แสดงข้อมูลรถตามที่เลือก
        var selectedLicense = $(this).find(":selected").data("license"); // ดึงค่า license จาก data-license
        var selectedSize = $(this).find(":selected").data("size"); // ดึงค่า size จาก data-size
        var selectedWeight = $(this).find(":selected").data("weight"); // ดึงค่า weight จาก data-weight

        // ตั้งค่าให้กับช่องป้อนข้อมูล license
        if (selectedLicense) {
            $("#license-input").val(selectedLicense);
        } else {
            $("#license-input").val(""); // ถ้าไม่มี license ให้เคลียร์ค่า
        }

        // ตั้งค่าให้กับช่องป้อนข้อมูล size
        if (selectedSize) {
            $("#size-input").val(selectedSize);
        } else {
            $("#size-input").val(""); // ถ้าไม่มี size ให้เคลียร์ค่า
        }

        // ตั้งค่าให้กับช่องป้อนข้อมูล weight
        if (selectedWeight) {
            $("#weight-input").val(selectedWeight);
        } else {
            $("#weight-input").val(""); // ถ้าไม่มี weight ให้เคลียร์ค่า
        }
    });
//-------------------------------------------------------เก็บค่าที่เลือกเพิ่อไม่ให้เลือกคนขับซ้ำกัน----------------------------------------------------//      
    $("#driver1_id").on("change", function () {// เก็บค่าที่เลือกเพิ่อไม่ให้เลือกคนขับซ้ำกัน
        var selectedDriver1 = $(this).val();
        // ทำให้ driver คนที่ 2 ไม่สามารถเลือกคนเดียวกันได้
        $("#driver2_id option").each(function () {
            if ($(this).val() === selectedDriver1) {
                $(this).attr("disabled", "disabled"); // ปิดการใช้งาน
            } else {
                $(this).removeAttr("disabled"); // เปิดการใช้งานคนอื่น
            }
        });
    }); 
//---------------------------------------------------------------เพิ่มลบสินค้า-----------------------------------------------------------//  
    $("#btnaddporduct").click(function(e) { //เพิ่มสินค้าสินค้า
        e.preventDefault();
        var branch = $("#branch-select").val();
        var branchName = $("#branch-select option:selected").data("branch");
        var product = $("#product-select").val();
        var productName = $("#product-select option:selected").data("product");
        var productweight = $("#product-select option:selected").data("weight");
        var weight = $("#weightproduct-input").val();
        if (branch && product && weight) {
            var newRow = `
            <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b">
                <th class="px-4 py-1 rounded-l-[7px] ">${branchName}</th>
                <th class="px-4 py-1">${productName}</th>
                <th class="weight px-4 py-1">${weight}</th>
                <th class="px-4 py-1 rounded-r-[7px] ">
                    <button type="button" id="remove-product" >
                    <i class="fa-solid fa-trash"></i></button>
                </th>
                <input type="hidden" class="branch_id" value="${branch}" />
                <input type="hidden" class="product_id" value="${product}" />
                <input type="hidden" class="weightproduct" value="${weight}" />
                <input type="hidden" class="weighttoproduct" value="${productweight}" />
            </tr>
        `;
            $("#product-table tbody").append(newRow);
            // ปิดการใช้งานตัวเลือกสินค้าที่ถูกเลือกแล้ว
            $('#product-select option[value="' + product + '"]').prop(
                "disabled",
                true
            );

            $("#branch-select").val("");
            $("#product-select").val("");
            $("#weightproduct-input").val("");
            document.getElementById("my_addproduct").close();

            // Update the total weight
            updateTotalWeight();
        } else {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
        }
    });
    $("#product-table").on("click", "#remove-product", function() { //ลบสินค้า
        var productID = $(this).closest("tr").find(".product_id").val();
        // เปิดการใช้งานตัวเลือกที่ถูกลบ
        $('#product-select option[value="' + productID + '"]').prop(
            "disabled",
            false
        );
        $(this).closest("tr").remove();
        updateTotalWeight();
    });
    function updateTotalWeight() { //คำนวณน้ำหนัก
        var totalWeight = 0; // น้ำหนักรวมเริ่มจาก 0
        var totalBaskets = 0; // จำนวนตะกร้ารวมเริ่มจาก 0
        if (typeof baskets === "undefined" || baskets.length === 0) {
            console.error("ไม่พบข้อมูล baskets");
            return;
        }

        // ตรวจสอบว่ามีข้อมูลตะกร้าหรือไม่
        var basketWeight = baskets.length > 0 ? parseFloat(baskets[0].basketweight) : 0;

        // คำนวณน้ำหนักรวมของสินค้า
        $('#product-table tbody .weight').each(function() {
            var weight = parseFloat($(this).text()) || 0; // ตรวจสอบค่า NaN
            totalWeight += weight;
        });

        $('#tatolweight').val(totalWeight.toFixed(2)); // แสดงผลรวมในช่อง input

        // คำนวณจำนวนตะกร้า
        $('#product-table tbody tr').each(function() {
            var productWeightCapacity = parseFloat($(this).find('.weighttoproduct').val()) || 0;
            var weightInput = parseFloat($(this).find('.weight').text()) || 0;

            // คำนวณจำนวนตะกร้าเฉพาะกรณีที่ค่าถูกต้อง
            if (productWeightCapacity > 0 && weightInput > 0) {
                totalBaskets += weightInput / productWeightCapacity;
            }
        });

        $('#tatolbasket').val(totalBaskets.toFixed(2)); // แสดงจำนวนตะกร้าใน input

        // คำนวนน้ำหนักของตะกร้า
        var totalBasketWeight = basketWeight * totalBaskets;

        // คำนวนน้ำหนักรวมของสินค้า + ตะกร้า
        var totalWeightBasket = totalWeight + totalBasketWeight;

        $('#tatolweightbasket').val(totalWeightBasket.toFixed(2));
        // ตรวจสอบว่ามีน้ำหนักสินค้าแล้วหรือไม่
        updateCarSelection(totalWeightBasket);
    }
    function updateCarSelection(totalWeightBasket) {//คำนวณน้ำหนักกับรถว้าบรรทุกได้หรือไม่
        var $selectCars = $("#select-cars");
        var hasWeight = totalWeightBasket > 0;
        if (!hasWeight) {
            // ถ้าไม่มีน้ำหนักสินค้า → ปิด dropdown และล้างค่า
            $selectCars.val("").prop("disabled", true);
        } else {
            var hasValidCar = false;
            // ตรวจสอบเงื่อนไขของรถ
            $selectCars.find("option").each(function() {
                //ดึงข้อมูลน้ำหนักในช่องเลือกรถ
                var carWeight = parseFloat($(this).data("weight")) || 0;

                if (carWeight >= totalWeightBasket) {
                    $(this).show();
                    hasValidCar = true;
                } else {
                    $(this).hide();
                }
            });

            // ถ้ามีรถที่รับน้ำหนักได้ → เปิดให้เลือก, ถ้าไม่มี → ปิดไว้
            if (hasValidCar) {
                $selectCars.prop("disabled", false);
            } else {
                $selectCars.val("").prop("disabled", true);
            }
        }
    }
    $(document).on("input", ".weighttoproduct, .weight", function() {//เรียกใช้เมื่อมีการเปลี่ยนแปลงข้อมูลสินค้า
        updateTotalWeight();
    });
//-------------------------------------------------------------เพิ่มลบรายการเพิ่มเติม-----------------------------------------------------------//    
    $("#btnadditionalcost").click(function(e) {//เพิ่มรายการเพิ่มเติม
        e.preventDefault(); // ป้องกันการ submit ฟอร์ม
        // ดึงค่าจาก input ใน modal
        var additionalcost_id = $("#list-input").val();
        var list = $("#list-input").val();
        var price = $("#price-input").val();

        // ตรวจสอบว่าข้อมูลถูกกรอกครบหรือไม่
        if (list && price) {
            // เพิ่มแถวใหม่ในตาราง
            var newRow = `
            <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b">
                <th class="px-4 py-1 rounded-l-[7px]">${list}</th>
                <th class="px-4 py-1">${price}</th>
                <th class="px-4 py-1 rounded-r-[7px]"><button type="button" id="remove-additionalcost"><i class="fa-solid fa-trash"></i></button></th>
                <input type="hidden" class="list" value="${list}" />
                <input type="hidden" class="price" value="${price}" />
            </tr>
        `;
            $("#additionalcost-table tbody").append(newRow);

            // เคลียร์ฟอร์มหลังจากเพิ่มสินค้าแล้ว
            $("#list-input").val("");
            $("#price-input").val("");
            // ปิด modal หลังจากเพิ่มสินค้า
            document.getElementById("my_Additionalcosts").close(); // ปิดโมดัล
        } else {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
        }
    });
    $("#additionalcost-table").on( //ลบรายการเพิมเติม
        "click",
        "#remove-additionalcost",
        function() {
            $(this).closest("tr").remove();
        }
    );
//-------------------------------------------------------------บันทึกข้อมูลทั้งหมด-----------------------------------------------------------//  
    
    $("#main-form").submit(function(e) {//บันทึกข้อมูลทั้งหมด
        e.preventDefault();
    
        var submitBtn = $("#submit-button"); // ปุ่มบันทึก
        if (submitBtn.prop('disabled')) return; // ป้องกันการกดซ้ำ
    
        // ปิดปุ่มกดซ้ำ & แสดงไอคอนโหลด
        submitBtn.prop('disabled', true);
        submitBtn.html('<i class="fas fa-spinner fa-spin"></i> กำลังบันทึก...');
    
        var customer_id = $("#customer_id").val();
        var date = $("#date").val();
        var road_id = $("#select-road").val();
        var temperature = $("#temperature").val();
        var roadback = $("#select-roadback").val();
        var driver1_id = $("#driver1_id").val();
        var allowance1_id = $("#allowance1_id").val();
        var driver2_id = $("#driver2_id").val();
        var allowance2_id = $("#allowance2_id").val();
        var assistant_driver_id = $("#assistant_driver_id").val();
        var assistant_allowance_id = $("#assistant_allowance_id").val();
        var tatolweight = $("#tatolweight").val();
        var totalbasket = $("#tatolbasket").val();
        var tatolweightbasket = $("#tatolweightbasket").val();
        var car_id = $("#select-cars").val();
    
        if (!tatolweight) {
            alert("กรุณาเลือกสินค้า");
            submitBtn.prop('disabled', false).html('บันทึกข้อมูล'); // เปิดปุ่มกลับ
            return false;
        }
    
        var products = [];
        $("#product-table tbody tr").each(function() {
            var branchId = $(this).find(".branch_id").val();
            var productId = $(this).find(".product_id").val();
            var weight = $(this).find(".weightproduct").val();
            if (branchId && productId && weight) {
                products.push({
                    branch_id: branchId,
                    product_id: productId,
                    weightproduct: weight,
                });
            }
        });
    
        var additionalcosts = [];
        $("#additionalcost-table tbody tr").each(function() {
            var list = $(this).find(".list").val();
            var price = $(this).find(".price").val();
            if (list && price) {
                additionalcosts.push({
                    list: list,
                    price: price,
                });
            }
        });
    
        $.ajax({
            url: '/StoreCarPlanner',
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                additionalcosts: additionalcosts,
                products: products,
                customer_id: customer_id,
                date: date,
                road_id: road_id,
                temperature: temperature,
                roadback: roadback,
                driver1_id: driver1_id,
                allowance1_id: allowance1_id,
                driver2_id: driver2_id,
                allowance2_id: allowance2_id,
                assistant_driver_id: assistant_driver_id,
                assistant_allowance_id: assistant_allowance_id,
                tatolweight: tatolweight,
                totalbasket: totalbasket,
                tatolweightbasket: tatolweightbasket,
                car_id: car_id,
            },
            success: function(response) {
                alert("บันทึกข้อมูลเสร็จสิ้น");
                location.reload();
            },
            error: function(xhr) {
                console.error("Error:", xhr.responseText);
                submitBtn.prop('disabled', false).html('บันทึกข้อมูล'); // เปิดปุ่มกลับ
            },
        });
    });
//-------------------------------------------------------------select2-----------------------------------------------------------//    
    $("#driver1_id").select2({
        width: "60%",
    });
    $("#driver1_id").on("change", function () {
        $(".select2-selection__rendered").css("color", "#D1D5DB");
    });
    $("#driver2_id").select2({
        width: "60%",
    });
    $("#driver2_id").on("change", function () {
        $(".select2-selection__rendered").css("color", "#D1D5DB");
    });
    $("#assistant_driver_id").select2({
        width: "60%",
    });
    $(".select2-selection--single").css({
        height: "40px", // ความสูงของ select2
        "line-height": "40px", // กำหนด line-height ให้ตรงกับความสูง เพื่อให้อยู่กลางแนวตั้ง
        display: "flex",
        "align-items": "center",
        "border-radius": "8px",
        "border-color": "#000000",
    });
    $(".select2-selection__arrow").hide();    
});
