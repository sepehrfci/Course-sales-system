@extends('Dashboard::master')
@section('title','دسته بندی ها')
@section('style')
@stop
@section('content')
    <div class="padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">دسته بندی ها</p>
                @if(session('success'))
                    <div class="alert alert-success w-50" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام دسته بندی</th>
                            <th>نام انگلیسی دسته بندی</th>
                            <th>دسته پدر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr role="row" class="">
                                <td><a href="">{{ $category->id }}</a></td>
                                <td><a href="">{{ $category->title }}</a></td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->parent }}</td>
                                <td>
                                    <a href="" class="item-delete mlg-15" title="حذف"></a>
                                    <a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                                    <a href="{{ route('categories.edit' , $category->id) }}" class="item-edit "
                                       title="ویرایش"></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد دسته بندی جدید</p>
                <form action="{{ route('categories.store') }}" method="post" class="padding-30">
                    @csrf
                    <input name="title" type="text" placeholder="نام دسته بندی" class="text">
                    @error('title')
                    <strong>{{ $message }}</strong>
                    @enderror
                    <input name="slug" type="text" placeholder="نام انگلیسی دسته بندی" class="text">
                    @error('slug')
                    <strong>{{ $message }}</strong>
                    @enderror
                    <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
                    <select name="parent_id" id="">
                        <option value="">ندارد</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('parent_id')
                    <strong>{{ $message }}</strong>
                    @enderror
                    <button class="btn btn-webamooz_net">اضافه کردن</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/panel/js/tagsInput.js"></script>
    <script>
        // Get all elements with class="closebtn"
        var close = document.getElementsByClassName("closebtn");
        var i;

        // Loop through all close buttons
        for (i = 0; i < close.length; i++) {
            // When someone clicks on a close button
            close[i].onclick = function () {

                // Get the parent of <span class="closebtn"> (<div class="alert">)
                var div = this.parentElement;

                // Set the opacity of div to 0 (transparent)
                div.style.opacity = "0";

                // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
                setTimeout(function () {
                    div.style.display = "none";
                }, 600);
            }
        }
    </script>
@endsection
