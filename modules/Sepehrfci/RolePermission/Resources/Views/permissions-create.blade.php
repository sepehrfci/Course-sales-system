<div class="col-12 bg-white">
    <p class="box__title">ایجاد سطح جدید</p>
    <form action="{{ route('permissions.store') }}" method="post" class="padding-30">
        @csrf
        <input name="name" type="text" placeholder="عنوان سطح(انگلیسی)" class="text" value="{{ old('name') }}">
        @error('name')
        <strong>{{ $message }}</strong>
        @enderror
        <input name="name_fa" type="text" placeholder="عنوان سطح(فارسی)" class="text" value="{{ old('name_fa') }}">
        @error('name_fa')
        <strong>{{ $message }}</strong>
        @enderror
        <button class="btn btn-webamooz_net mt-2">اضافه کردن</button>
    </form>
</div>
