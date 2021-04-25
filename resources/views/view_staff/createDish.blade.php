@extends('layout_admin.base')

@section('content')
<h2 class="text-center">THÊM MỚI MÓN ĂN</h2>

<div class="panel-form my-5">
    <form action="/staff/dish/store" method="get">
        @csrf
        <div class="col-lg-8 mx-auto">

    
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Dish name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" required value="Dish Name">
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <label for="type" class="form-label fw-bold" required>Dish category</label>
                        <select class="form-select" id="type" name="categoryId">
                            @foreach ($category as $c)
                                <option value="{{ $c->id }}" >{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- Text area editor -->
            <div class="mb-3">
                <label for="desc" class="form-label fw-bold">Chi tiết sản phẩm</label>
                <textarea id="desc" name="description" required ></textarea>
                
            </div>
            <div class="mb-3">
                <div class="row mt-3">
                    <div class="col">
                        <label for="import_price" class="form-label fw-bold">Giá bán</label>
                        <input name="price" type="number" class="form-control" id="price" placeholder="Giá bán" required value="Price">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Picture</label>
                <input name="photo" type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" required value="Photo">
                @foreach ($restaurant as $r)
                <input name="restaurantId" type="hidden" required value="{{ $r->restaurantId }}">

                @endforeach

            </div>
            <hr class="my-4 py-1">
            <div class="row">
                <div class="text-end">
                    <a href="./dish"  class="btn btn-danger fw-bold" name="cancel">Hủy</a>
                    <button type="submit" class="btn btn-success fw-bold" id="btn-update">Thêm mới món ăn</a>
                </div>
            </div>
        </div>
    </form>
    
</div>
@endsection