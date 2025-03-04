$(document).ready(function() {
    //เพิ่มสินค้า
    $('#form-product').on('submit', function(e) { 
        e.preventDefault();
        $.ajax({
            url: Storeproduct,
            type: 'POST',
            data: {
                _token: csrf_token,
                product: $('#product').val(),
                weight: $('#weight').val(),
                customer: $('#customer').val(),
            },
            success: function(response) {
                if (response.success) {
                    alert("เพิ่มข้อมูลเสร็จสิ้น");
                    console.log(response.customer);
                    $('#tableproduct tbody').append(` 
                    <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b">
                        <th class="px-4 py-1 rounded-l-[7px] border-l-[1px]">
                            ${response.customer.customer}
                        </th>
                        <th class="px-4 py-1">${response.data.product}</th>
                        <th class="px-4 py-1">${response.data.weight}</th>
                        <th class="px-4 py-1">
                            <button id="btneditproduct" onclick="my_product_edit.showModal()"
                                data-id="${response.data.id}" 
                                data-product="${response.data.product}"
                                data-weight="${response.data.weight}"
                                data-customer="${response.customer.id}">
                                <i class="fa-solid fa-pen-to-square hover:scale-125 duration-700"></i>
                        </button>
                        </th>
                        <th class="px-4 py-1 rounded-r-[7px] border-r-[1px]">
                            <a href="" id="productdelete" data-id="${response.data.id}">
                                <i class="fa-solid fa-trash hover:scale-125 duration-700"></i>
                            </a>
                        </th>
                    </tr>
                `);
                    // เคลียร์ฟอร์ม
                    $('#form-product')[0].reset();
                    document.getElementById('my_product').close(); // ปิดโมดัล
                } else {
                    alert('Something went wrong');
                }
            },
            error: function(xhr, status, error) {
                alert("มีบางอย่างผิดพลาด");
            }
        });
    });
    //นำข้อมูลไปหน้าแก้ไข
    $('#tableproduct').on('click', '#btneditproduct', function(e) { 
        e.preventDefault();
        var productId = $(this).data('id'); // ชื่อของสินค้าที่เก็บไว้ใน data-id
        var productName = $(this).data('product'); // ชื่อของสินค้าที่เก็บไว้ใน data-product
        var productWeight = $(this).data('weight'); // น้ำหนักของสินค้าที่เก็บไว้ใน data-weight
        var customer = $(this).data('customer');
        // ส่งข้อมูลไปยัง input fields ใน modal
        $('#editIdproduct').val(productId);
        $('#editproduct').val(productName);
        $('#editweight').val(productWeight);
        $('#editcustomer').val(customer); // ตั้งค่าลูกค้าใน select
        $('#editcustomer option').each(function() {
            if ($(this).val() == customer) {
                $(this).prop('selected', true); // ทำเครื่องหมายเป็นตัวเลือก
            }
        });
    });
    //แก้ไข
    $('#form-editproduct').on('submit', function(e) { 
        e.preventDefault();
        $.ajax({
            url: Editproduct,
            type: 'PATCH',
            data: {
                _token: csrf_token,
                id: $('#editIdproduct').val(),
                product: $('#editproduct').val(),
                weight: $('#editweight').val(),
                customer: $('#editcustomer').val(),
            },

            success: function(response) {
                if (response.success) {
                    alert("แก้ไขข้อมูลเสร็จสิ้น");
                    document.getElementById('my_product_edit').close(); // ปิดโมดัล
                    var rowToRemove = $('#tableproduct').find(
                        `[data-id='${response.data.id}']`).closest('tr');
                    rowToRemove.remove(); // ลบแถวเก่า
                    // เพิ่มแถวใหม่ที่มีข้อมูลที่แก้ไข
                    var newRow = `
                        <tr class="bg-transparent  hover:bg-black text-white">
                            <th class="px-6 py-4 text-center rounded-l-[7px] border-l-[1px]">
                                ${response.customer.customer}
                            </th>
                            <th class="px-6 py-4 text-center">${response.data.product}</th>
                            <th class="px-6 py-4 text-center">${response.data.weight}</th>
                            <th class="px-6 py-4 text-center">
                                <button id="btneditproduct" onclick="my_product_edit.showModal()"
                                    data-id="${response.data.id}" 
                                    data-product="${response.data.product}"
                                    data-weight="${response.data.weight}"
                                    data-customer="${response.customer.id}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </th>
                            <th class="px-6 py-4 text-center rounded-r-[7px] border-r-[1px]">
                                <a href="" id="productdelete" data-id="${response.data.id}"
                                    class="text-[#FFFFFF] transition">
                                    <i class="fa-solid fa-trash hover:scale-110 duration-700"></i>
                                </a>
                            </th>
                        </tr>
                    `;
                    $('#tableproduct').append(newRow); // เพิ่มแถวใหม่เข้าไปในตาราง

                    // เคลียร์ฟอร์ม
                    $('#form-editproduct')[0]
                        .reset(); // ปรับชื่อฟอร์มให้ตรงกับ ID ของฟอร์ม
                } else {
                    alert('Something went wrong');
                }
            },
            error: function(xhr, status, error) {
                alert("มีบางอย่างผิดพลาด");
            }
        });
    });
    //ลบสินค้า
    $('#tableproduct').on('click', '#productdelete', function(e) { 
        e.preventDefault();
        var button = $(this); // เลือกปุ่มที่ถูกคลิก 
        var id = $(this).data('id'); // ดึงค่า id จากปุ่ม
        if (!id) {
            alert("ไม่พบ ID");
            return;
        }

        var ProductDelete = `/ProductDelete/${id}`; // ใช้ template literal แบบถูกต้อง
        var row = button.closest('tr'); // หาแถวที่ปุ่มลบอยู่
        if (confirm('แน่ใจว่าจะลบ')) {
            $.ajax({
                url: ProductDelete,
                type: 'DELETE',
                data: {
                    _token: csrf_token,
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