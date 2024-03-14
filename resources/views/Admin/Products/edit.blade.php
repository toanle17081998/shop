@extends('Admin.Layout.main')

@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{{ $title }}</strong>
                        </div>
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    @include('Admin.Layout.Component.alert')
                                    <form action="{{ route('admin.product.update', $productCurrent->id) }}" method="post"
                                        novalidate="novalidate">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="control-label mb-1">Tên sản phẩm</label>
                                                    <input id="name" name="name" type="text" class="form-control"
                                                        aria-required="true" aria-invalid="false"
                                                        value="{{ old('name') ?? $productCurrent->name }}">
                                                    @if ($errors->has('name'))
                                                        <span class="error-message">
                                                            {{ $errors->first('name') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="menu_id" class="control-label mb-1">Chọn chuyên
                                                        mục</label>
                                                    <select name="menu_id" id="menu_id" class="form-control">
                                                        <option value="0">--Chọn chuyên mục--</option>
                                                        @foreach ($menus as $menu)
                                                            <option
                                                                {{ $menu->id == $productCurrent->menu_id ? 'selected' : '' }}
                                                                value="{{ $menu->id }}">{{ $menu->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="price" class="control-label mb-1">Giá ban đầu</label>
                                                    <input id="price" name="price" type="number" class="form-control"
                                                        aria-required="true" aria-invalid="false"
                                                        value="{{ old('price') ?? $productCurrent->price }}">
                                                    @if ($errors->has('price'))
                                                        <span class="error-message">
                                                            {{ $errors->first('price') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="price_sale" class="control-label mb-1">Giá khuyến
                                                        mãi</label>
                                                    <input id="price_sale" name="price_sale" type="number"
                                                        class="form-control" aria-required="true" aria-invalid="false"
                                                        value="{{ old('price_sale') ?? $productCurrent->price_sale }}">
                                                    @if ($errors->has('price_sale'))
                                                        <span class="error-message">
                                                            {{ $errors->first('price_sale') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="description" class="control-label mb-1">Mô tả</label>
                                            <input id="description" name="description" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false"
                                                value="{{ old('description') ?? $productCurrent->description }}">
                                            @if ($errors->has('description'))
                                                <span class="error-message">
                                                    {{ $errors->first('description') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="content-menus" class="control-label mb-1">Nội dung</label>
                                            <textarea id="content-menus" name="content" type="text" class="form-control" rows="6">{{ old('content') ?? $productCurrent->content }}</textarea>
                                            @if ($errors->has('content'))
                                                <span class="error-message">
                                                    {{ $errors->first('content') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Ảnh đại diện</label>
                                                <input type="file" id="formFile" class="form-control-file uploadfile">
                                                <input type="hidden" name="image" id="fileImg"
                                                    value="{{ $productCurrent->image }}">
                                                <div class="image_show">
                                                    <a href="{{ $productCurrent->image }}" target="_blank">
                                                        <img width="100px" src="{{ $productCurrent->image }}"
                                                            alt="{{ $productCurrent->name }}">
                                                    </a>
                                                </div>
                                            </div>
                                            @if ($errors->has('image'))
                                                <span class="error-message">
                                                    {{ $errors->first('image') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="active" class="control-label mb-1">Trạng thái</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="active"
                                                    id="active1" value="1"
                                                    {{ $productCurrent->active == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="active1">
                                                    Kích hoạt
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="active"
                                                    id="active2" value="0"
                                                    {{ $productCurrent->active == 0 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="active2">
                                                    Không kích hoạt
                                                </label>
                                            </div>
                                        </div>
                                        <div>
                                            <button id="payment-button" type="submit"
                                                class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-check fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Chỉnh sửa</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->

                </div><!--/.col-->

            </div>


        </div>
    </div>
@endsection


@section('css')
@endsection

@section('js')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content-menus'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
