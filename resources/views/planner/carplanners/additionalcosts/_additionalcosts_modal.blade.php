 {{-- ค่าใช้จ่ายเพิ่มเติม --}}
 <dialog id="my_Additionalcosts" class="modal">
     <div class="modal-box bg-white rounded-2xl shadow-custom">
         <div method="dialog">
             <button type="button" onclick="my_Additionalcosts.close()"
                 class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-black hover:bg-black/40">✕
             </button>
         </div>
         <div class="">
             <h3 class="text-[20px] font-bold text-black">เพิ่มสินค้าเพิ่มเติม</h3>
             <div class="pt-[20px]">
                 <div class="space-y-2">
                     <div class="space-y-2">
                         <div class="">
                             <input name="" id="list-input" placeholder="รายการ"
                                 class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                                 type="text" />
                         </div>
                         <div class="">
                             <input name="" id="price-input" placeholder="ราคา"
                                 class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                                 type="number" />
                         </div>
                     </div>

                     <div class="text-center">
                         <div class="text-center">
                            <button type="submit" id="btnadditionalcost"
                                class="py-[7px] px-[21px] text-white bg-black cursor-pointer rounded-[10px] hover:bg-[#4A5568] hover:translate-x-1 duration-700">
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                     </div>
                 </div>
             </div>
         </div>

     </div>
 </dialog>
