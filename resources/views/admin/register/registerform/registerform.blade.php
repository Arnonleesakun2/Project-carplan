<form action="{{ url('/register_post') }}" method="POST">
    @csrf
    <div class="w-3/4 mx-auto m-2">
        <!--เลือกให้คัย-->
        <select name="employee_id"
            class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
            <option disabled selected>เลือกพนักงาน</option>
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            @endforeach
        </select>
        @error('employee_id')
            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('employee_id') }}</div>
        @enderror
    </div>
    <div class="w-3/4 mx-auto  m-2">
        <input name="name" placeholder="ชื่อ" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" type="text" required>
        @error('name')
            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('name') }}</div>
        @enderror
    </div>
    <div class="w-3/4 mx-auto m-2">
        <input name="email" placeholder="อีเมล" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" type="text" required>
        @error('email')
            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('email') }}</div>
        @enderror
    </div>
    <div class="w-3/4 mx-auto m-2">
        <input name="password" placeholder="รหัสผ่าน" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" type="password" required>
        @error('password')
            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('password') }}</div>
        @enderror
    </div>
    <div class="w-3/4 mx-auto m-2">
        <input name="password_confirmation" placeholder="รหัสผ่านอีกครั้ง" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" type="password" required>
        @if ($errors->has('password_confirmation'))
            <div class="invalid-feedback d-block text-red-700">
                {{ $errors->first('password_confirmation') }}
            </div>
        @endif
    </div>
    <div class="w-3/4 mx-auto m-2">
        <select name="type"
            class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"required>
            <option value="" disabled selected>เลือกชนิด ID</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
            <option value="planner">Planner</option>
        </select>
        @error('type')
            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('type') }}</div>
        @enderror
    </div>
    <div class="w-3/4 mx-auto">
        <div class="my-6 ">
            <button
                class="  border-solid border-[1px] border-[#514F59] w-full text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                type="submit">Sigh up</button>
        </div>
    </div>
</form>