@extends('Dashboard::master')
@section('title','بروزرسانی دسته بندی')

@section('content')
    <div class="padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-4 bg-white">
                <p class="box__title">بروزرسانی دسته بندی</p>
                <form action="{{ route('categories.update',$category->id) }}" method="post" class="padding-30">
                    @csrf
                    @method('patch')
                    <input name="title" type="text" placeholder="نام دسته بندی" class="text"
                           value="{{ $category->title }}">
                    @error('title')
                    <strong>{{ $message }}</strong>
                    @enderror
                    <input name="slug" type="text" placeholder="نام انگلیسی دسته بندی" class="text"
                           ` value="{{ $category->slug }}">
                    @error('slug')
                    <strong>{{ $message }}</strong>
                    @enderror
                    <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
                    <select name="parent_id" id="">
                        <option value="">ندارد</option>
                        @foreach($categories as $categoryItem)
                            <option value="{{ $categoryItem->id }}"
                                    @if($categoryItem->id == $category->parent_id)
                                        selected
                                    @endif
                            >{{ $categoryItem->title }}</option>
                        @endforeach
                    </select>
                    @error('parent_id')
                    <strong>{{ $message }}</strong>
                    @enderror
                    <button class="btn btn-webamooz_net">بروزرسانی</button>
                </form>
            </div>
        </div>
    </div>
@stop


