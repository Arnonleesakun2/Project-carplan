$(document).ready(function () {
//------------------------------------------------------แสดงข้อมูลตามที่เลือกลูกค้า--------------------------------------------------//
    var customerId = $("#customer_id").val(); //โหลดหน้าก้ดึงลูกค้าที่ส่งมาจากหน้าแก้ไขแล้วใช้ฟังชั่นloadBranches
    loadBranches(customerId);
    function loadBranches(customerId) {//ฟังชั่นเรียกข้อมูลสาขามาแสดงตามลูกค้าที่เลือก
        if (!customerId) return; // ถ้าไม่มีลูกค้า ไม่ต้องทำอะไร

        $.ajax({
            url: "/GetBranchsByCustomer/" + customerId,
            type: "GET",
            dataType: "json",
            success: function (response) {
                $("#branch-select").empty();
                $("#branch-select").append(
                    "<option disabled selected>เลือกสาขา</option>"
                );

                $.each(response.branchs, function (index, branch) {
                    $("#branch-select").append(
                        `<option data-branch="${branch.branch}" value="${branch.id}">${branch.branch}</option>`
                    );
                });

                // ถ้าหน้าแก้ไขมีค่าเดิมของ branch_id ให้เลือกอัตโนมัติ
                var selectedBranch = $("#branch-select").data("selected");
                if (selectedBranch) {
                    $("#branch-select").val(selectedBranch);
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    }
    $("#customer_id").on("change", function () {//ดึงข้อมูลสาขาตามลูกค้า
        var customerId = $(this).val();
        loadBranches(customerId);
    });
    var customerId = $("#customer_id").val(); //โหลดหน้าก้ดึงลูกค้าที่ส่งมาจากหน้าแก้ไขแล้วใช้ฟังชั่นloadProducts
    loadProducts(customerId);
    $("#customer_id").on("change", function () {//ดึงข้อมูลสินค้าตามลูกค้า
        var customerId = $(this).val();
        loadProducts(customerId);
    });
    function loadProducts(customerId) {//ฟังชั่นเรียกข้อมูลสินค้ามาแสดงตามลูกค้าที่เลือก
        if (!customerId) return; // ถ้าไม่มีลูกค้า ไม่ต้องทำอะไร

        $.ajax({
            url: "/GetProductsByCustomer/" + customerId,
            type: "GET",
            dataType: "json",
            success: function (response) {
                $("#product-select").empty();
                $("#product-select").append(
                    "<option disabled selected>เลือกสินค้า</option>"
                );

                $.each(response.products, function (index, product) {
                    $("#product-select").append(
                        `<option data-weight="${product.weight}" 
                         data-product="${product.product}" 
                         data-id="${product.id}" 
                         value="${product.id}">
                    ${product.product}
                </option>`
                    );
                });

                // ถ้าหน้าแก้ไขมีค่า product_id เดิม ให้เลือกอัตโนมัติ
                var selectedProduct = $("#product-select").data("selected");
                if (selectedProduct) {
                    $("#product-select").val(selectedProduct);
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    }
//-----------------------------------------------------ถ้าไม่เลือกลูกค้าคลิกปุ่มเพิ่มสินค้าไม่ได้----------------------------------------// 
    function updateButtonState() {// ถ้าไม่มีลูกค้า ปิดปุ่ม
        var customerId = $("#customer_id").val();
        $("#add-product-btn").prop("disabled", !customerId);
    }
    updateButtonState(); // ตรวจสอบค่าตั้งแต่แรกตอนโหลดหน้า
    $("#customer_id").on("change", function () {// อัปเดตปุ่มเมื่อเปลี่ยนลูกค้า
        updateButtonState(); 
    });
//-----------------------------------------------------แสดงเวลาตามที่เลือกเส้นทาง--------------------------------------------------//
    $("#select-road").change(function () {//แสดงเวลาตามที่เลือกเส้นทาง
        var selectedTime = $(this).find(":selected").data("time"); // ดึงค่า time จาก data-time

        if (selectedTime) {
            var formattedTime = selectedTime.split(".")[0]; // ตัดทศนิยมออก
            $("#roadtime").val(formattedTime); // ใส่ค่าเวลาใน input[type="time"]
        } else {
            $("#roadtime").val(""); // ถ้าไม่มี time ให้เคลียร์ค่า
        }
    });
//-----------------------------------------------------แสดงข้อมูลรถตามที่เลือกเบอร์รถ--------------------------------------------------//
    $('#select-cars').change(function() {//แสดงข้อมูลรถตามที่เลือก
        var selectedLicense = $(this).find(':selected').data(
            'license'); // ดึงค่า license จาก data-license
        var selectedSize = $(this).find(':selected').data('size'); // ดึงค่า size จาก data-size
        var selectedWeight = $(this).find(':selected').data(
            'weight'); // ดึงค่า weight จาก data-weight

        // ตั้งค่าให้กับช่องป้อนข้อมูล license
        if (selectedLicense) {
            $('#license-input').val(selectedLicense);
        } else {
            $('#license-input').val(''); // ถ้าไม่มี license ให้เคลียร์ค่า
        }

        // ตั้งค่าให้กับช่องป้อนข้อมูล size
        if (selectedSize) {
            $('#size-input').val(selectedSize);
        } else {
            $('#size-input').val(''); // ถ้าไม่มี size ให้เคลียร์ค่า
        }

        // ตั้งค่าให้กับช่องป้อนข้อมูล weight
        if (selectedWeight) {
            $('#weight-input').val(selectedWeight);
        } else {
            $('#weight-input').val(''); // ถ้าไม่มี weight ให้เคลียร์ค่า
        }
    });
//-----------------------------------------------------เพิ่มลบสินค้า------------------------------------------------------------//
    $('#btnaddporduct').click(function(e) {//เพิ่มรายการสินค้า
        e.preventDefault();
        var branch = $('#branch-select').val();
        var branchName = $('#branch-select option:selected').data('branch');
        var product = $('#product-select').val();
        var productName = $('#product-select option:selected').data('product');
        var productweight = $('#product-select option:selected').data('weight');
        var weight = $('#weightproduct-input').val();

        if (branch && product && weight) {
            var newRow = `
                <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b"">
                    <th class="px-4 py-1 rounded-l-[7px]">${branchName}</th>
                    <th class="px-4 py-1">${productName}</th>
                    <th class="weight px-4 py-1">${weight}</th> <!-- เพิ่ม class="weight" -->
                    <th class="px-4 py-1 rounded-r-[7px]"><button type="button" id="remove-product" class="">ลบ</button></th>
                    <input type="hidden" class="branch_id" value="${branch}" />
                    <input type="hidden" class="product_id" value="${product}" />
                    <input type="hidden" class="weightproduct" value="${weight}" />
                    <input type="hidden" class="weighttoproduct" value="${productweight}" />
                </tr>
            `;
            $('#product-table tbody').append(newRow);
            // ปิดการใช้งานตัวเลือกสินค้าที่ถูกเลือกแล้ว
            // ปิดการใช้งานตัวเลือกสินค้าที่ถูกเลือกแล้ว
            $('#product-select option[value="' + product + '"]').prop('disabled', true);

            $('#branch-select').val('');
            $('#product-select').val('');
            $('#weightproduct-input').val('');
            document.getElementById('my_addproduct').close();

            // Update the total weight
            updateTotalWeight();
        } else {
            alert('กรุณากรอกข้อมูลให้ครบถ้วน');
        }
    });
    $('#product-table').on('click', '#remove-product', function() {//ลบสินค้า
        var productID = $(this).closest('tr').find('.product_id').val();
        // เปิดการใช้งานตัวเลือกที่ถูกลบ
        $('#product-select option[value="' + productID + '"]').prop('disabled', false);
        $(this).closest('tr').remove();
        updateTotalWeight();
    });
    function updateTotalWeight() {//คำนวณน้ำหนัก
        var totalWeight = 0; // น้ำหนักรวมเริ่มจาก 0
        var totalBaskets = 0; // จำนวนตะกร้ารวมเริ่มจาก 0
        if (typeof baskets === "undefined" || baskets.length === 0) {
            console.error("ไม่พบข้อมูล baskets");
            return;
        }
    
        // คำนวณน้ำหนักรวมของสินค้า
        $('#product-table tbody .weight').each(function() {
            totalWeight += parseFloat($(this).text()) || 0;
        });
        $('#tatolweight').val(totalWeight.toFixed(2)); // แสดงผลรวมในช่อง input
    
        // คำนวณจำนวนตะกร้าของสินค้าทั้งหมด
        $('#product-table tbody tr').each(function() {
            var productWeightCapacity = parseFloat($(this).find('.weighttoproduct').val()) || 0;
            var weightInput = parseFloat($(this).find('.weight').text()) || 0;
    
            // คำนวณจำนวนตะกร้าสำหรับสินค้านั้น
            if (!isNaN(productWeightCapacity) && !isNaN(weightInput)) {
                var basketsForThisProduct = weightInput / productWeightCapacity;
                totalBaskets += basketsForThisProduct; // รวมจำนวนตะกร้าทั้งหมด
            }
        });
    
        $('#tatolbasket').val(totalBaskets.toFixed(2)); // แสดงจำนวนตะกร้าใน input
    
        var totalBasketWeight = baskets[0].basketweight * totalBaskets; // น้ำหนักตะกร้า
        var totalWeightBasket = totalWeight + totalBasketWeight; // น้ำหนักสินค้ารวมกับน้ำหนักตะกร้า
        $('#tatolweightbasket').val(totalWeightBasket.toFixed(2)); // แสดงผลรวมใน input
    
        // เรียกใช้ฟังก์ชันตรวจสอบการกรองรถ
        updateCarSelection(totalWeightBasket); // ส่งน้ำหนักรวมที่คำนวณแล้ว
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
                var carWeight = parseFloat($(this).data("weight")) || 0;
    
                if (carWeight >= totalWeightBasket) {
                    $(this).show(); // แสดงตัวเลือก
                    hasValidCar = true;
                } else {
                    $(this).hide(); // ซ่อนตัวเลือก
                }
            });
    
            // ถ้ามีรถที่รับน้ำหนักได้ → เปิดให้เลือก
            if (hasValidCar) {
                $selectCars.prop("disabled", false);
            } else {
                $selectCars.val("").prop("disabled", true); // ถ้าไม่มีรถที่รับน้ำหนักได้
            }
        }
    }
    $(document).ready(function() {//นำข้อมูลมาแสดงตอนโหลด
        var totalWeightBasket = parseFloat($('#tatolweightbasket').val()) || 0; // ดึงน้ำหนักรวมจาก input
        updateCarSelection(totalWeightBasket); // คำนวณและกรองรถที่รับน้ำหนักได้
    });
    $(document).on("input", ".weighttoproduct, .weight", function() {// เรียกใช้ฟังก์ชันคำนวณน้ำหนักเมื่อกรอกข้อมูลใหม่
        updateTotalWeight();  // เรียกฟังก์ชันคำนวณน้ำหนัก
    });
//-----------------------------------------------------เพิ่มลบรายการเพิ่มเติม------------------------------------------------------------//
    $('#btnadditionalcost').click(function(e) { //เพิ่มรายการเพิ่มเติม
        e.preventDefault(); // ป้องกันการ submit ฟอร์ม
        // ดึงค่าจาก input ใน modal
        var additionalcost_id = $('#list-input').val();
        var list = $('#list-input').val();
        var price = $('#price-input').val();


        // ตรวจสอบว่าข้อมูลถูกกรอกครบหรือไม่
        if (list && price) {
            // เพิ่มแถวใหม่ในตาราง
            var newRow = `
                <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b"">
                    <th class="px-4 py-1 rounded-l-[7px]">${list}</th>
                    <th class="px-4 py-1">${price}</th>
                    <th class="px-4 py-1 rounded-r-[7px]"><button type="button" id="remove-additionalcost">ลบ</button></th>
                    <input type="hidden" class="list" value="${list}" />
                    <input type="hidden" class="price" value="${price}" />
                </tr>
            `;
            $('#additionalcost-table tbody').append(newRow);

            // เคลียร์ฟอร์มหลังจากเพิ่มสินค้าแล้ว
            $('#list-input').val('');
            $('#price-input').val('');
            // ปิด modal หลังจากเพิ่มสินค้า
            document.getElementById('my_Additionalcosts').close(); // ปิดโมดัล
        } else {
            alert('กรุณากรอกข้อมูลให้ครบถ้วน');
        }
    });
    $('#additionalcost-table').on('click', '#remove-additionalcost', function() { //ลบรายการเพิมเติม
        $(this).closest('tr').remove();
    });
//-----------------------------------------------------บันทึกข้อมูลทั้งหมด------------------------------------------------------------//
    $('#edit-form').submit(function(e) { //บันทึกข้อมูลทั้งหมด
        e.preventDefault();
        var products = [];
        $('#product-table tbody tr').each(function() {
            var branchId = $(this).find('.branch_id').val();
            var productId = $(this).find('.product_id').val();
            var weight = $(this).find('.weightproduct').val();
            if (branchId && productId && weight) { // ตรวจสอบข้อมูลก่อนเพิ่ม
                products.push({
                    branch_id: branchId,
                    product_id: productId,
                    weightproduct: weight
                });
            }
        });
        var additionalcosts = [];
        $('#additionalcost-table tbody tr').each(function() {
            var list = $(this).find('.list').val();
            var price = $(this).find('.price').val();
            if (list && price) { // ตรวจสอบข้อมูลก่อนเพิ่ม
                additionalcosts.push({
                    list: list,
                    price: price,
                });
            }
        });
        var id = $('#id').val(); // รับค่าจากฟิลด์ซ่อนที่เก็บ ID ของรายการที่ต้องการแก้ไข
        var customer_id = $('#customer_id').val();
        var date = $('#date').val();
        var road_id = $('#select-road').val();
        var temperature = $('#temperature').val();
        var roadback = $('#select-roadback').val();
        var driver1_id = $('#driver1_id').val();
        var allowance1_id = $('#allowance1_id').val();
        var driver2_id = $('#driver2_id').val();
        var allowance2_id = $('#allowance2_id').val();
        var assistant_driver_id = $('#assistant_driver_id').val();
        var assistant_allowance_id = $('#assistant_allowance_id').val();
        var tatolweight = $('#tatolweight').val();
        var tatolbasket = $('#tatolbasket').val();
        var tatolweightbasket = $('#tatolweightbasket').val();
        var car_id = $('#select-cars').val();


        $.ajax({
            url: '/UpdateCarPlanner',
            method: 'PATCH',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // ตรวจสอบการใช้โทเค็น
                id: id,
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
                tatolbasket: tatolbasket,
                tatolweightbasket: tatolweightbasket,
                car_id: car_id,
            },
            success: function(response) {
                Swal.fire({
                    title: 'สำเร็จ!',
                    text: "ข้อมูลได้รับการอัปเดตเรียบร้อยแล้ว",
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500,
                }).then(() => {
                    window.location.href = '/CarPlannerReport';
                });

            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText); // แสดงข้อความจากเซิร์ฟเวอร์
            }
        });
    });
//-----------------------------------------------------select2------------------------------------------------------------//    
    $("#driver1_id").select2({
        width: "60%",
    });
    $("#driver2_id").select2({
        width: "60%",
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
        "border-color": "#CED4DA",
    });
    $(".select2-selection__arrow").hide();
});
