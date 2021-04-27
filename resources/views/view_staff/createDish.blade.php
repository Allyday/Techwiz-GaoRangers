@extends('layout_admin.base')

@section('content')
<h2 class="text-center">Add Menu Item</h2>

<div class="panel-form my-5">
    <form action="/staff/dish/store" method="get">
        @csrf
        <div class="col-lg-8 mx-auto">

    
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Dish name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Item name" required >
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
                <label for="desc" class="form-label fw-bold">Item Details</label>
                <textarea id="desc" name="description" required ></textarea>
                
            </div>
            <div class="mb-3">
                <div class="row mt-3">
                    <div class="col">
                        <label for="import_price" class="form-label fw-bold">Price</label>
                        <input name="price" type="number" class="form-control" id="price" placeholder="Price" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Image</label>
                <input name="photo" type="text" class="form-control" id="name" placeholder="Enter a link to the image" required>
                @foreach ($restaurant as $r)
                <input name="restaurantId" type="hidden" required value="{{ $r->restaurantId }}">

                @endforeach

            </div>
            <hr class="my-4 py-1">
            <div class="row">
                <div class="text-end">
                    <a href="/staff/dishes"  class="btn btn-danger fw-bold" name="cancel">Cancel</a>
                    <button type="submit" class="btn btn-success fw-bold" id="btn-update">Add item</a>
                </div>
            </div>
        </div>
    </form>
    
</div>
@endsection