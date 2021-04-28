@extends('layout_admin.base')

@section('content')
<h2 class="text-center">UPDATE DISH</h2>

<div class="panel-form my-5">
    <form action="{{ route('edit-dish', $dish->id) }}" method="post">
        @csrf
        @method('POST')
        <div class="col-lg-8 mx-auto">
            <div class="mb-3">
                <label for="id" class="form-label fw-bold">Dish code</label>
                <input id="id" name="id" type="text" class="form-control" style="background-color: #81F7D8; text-align: center;" readonly="readonly" value="{{ $dish->id }}">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Dish name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" required value="{{ $dish->name }}">
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <label for="gender" class="form-label fw-bold">Restaurant</label>
                        @foreach ($restaurant as $r)
                        <input name="" type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" required value="{{ $r->restaurantName }}" disabled>
                        <input name="restaurantId" type="hidden" class="form-control" id="name" value="{{ $dish->restaurantId }}">
                        @endforeach
                        {{-- <option> -- Chọn giới tính -- </option>
                            <option value="1" >Nam</option>
                            <option value="2" >Nữ</option>
                            <option value="3" >Trẻ em</option>
                            <option value="4" >Cả nam và nữ</option> --}}
                        </select>
                    </div>
                    <div class="col">
                        <label for="type" class="form-label fw-bold" required>Dish category</label>
                        <select class="form-select" id="type" name="categoryId">
                            @foreach ($restaurant as $r)
                            <option value="{{ $r->categoryId }}">{{ $r->categoryName }}</option>
                            @endforeach
                            @foreach ($category as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- Text area editor -->
            <div class="mb-3">
                <label for="desc" class="form-label fw-bold">Detailed dishes</label>
                <textarea id="desc" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <div class="row mt-3">
                    <div class="col">
                        <label for="import_price" class="form-label fw-bold">Price</label>
                        <input name="price" type="number" class="form-control" id="price" placeholder="Giá bán" required value="{{ $dish->price }}">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Picture</label>
                <input name="photo" type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" required value="{{ $dish->photo }}">
            </div>
            <hr class="my-4 py-1">
            <div class="row">
                <div class="text-end">
                    <a href="./dish" class="btn btn-danger fw-bold" name="cancel">Cancel</a>
                    <button type="submit" class="btn btn-success fw-bold" id="btn-update">Update dish</a>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection