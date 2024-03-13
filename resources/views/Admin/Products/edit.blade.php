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
                                    <div class="card-title">
                                        <h3 class="text-center">Nhập thông tin danh mục</h3>
                                    </div>
                                    @include('Admin.Layout.Component.alert')
                                    <form action="{{ route('admin.menu.update', $menuCurrent->id) }}" method="post"
                                        novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="control-label mb-1">Tên danh mục</label>
                                            <input id="name" name="name" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false"
                                                value="{{ old('name') ?? $menuCurrent->name }}">
                                            @if ($errors->has('name'))
                                                <span class="error-message">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="parent_id" class="control-label mb-1">Danh mục cha</label>
                                            <select name="parent_id" id="parent_id" class="form-control">
                                                <option value="0">--Chuyên mục cha--</option>
                                                @foreach ($menus as $menu)
                                                    @if ($menu->id != $menuCurrent->id)
                                                        <option value="{{ $menu->id }}"
                                                            {{ $menu->id == $menuCurrent->parent_id ? 'selected' : '' }}>
                                                            {{ $menu->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="control-label mb-1">Mô tả</label>
                                            <input id="description" name="description" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false"
                                                value="{{ old('description') ?? $menuCurrent->description }}">
                                            @if ($errors->has('description'))
                                                <span class="error-message">
                                                    {{ $errors->first('description') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="content-menus" class="control-label mb-1">Nội dung</label>
                                            <textarea id="content-menus" name="content" type="text" class="form-control" rows="6">{{ old('content') ?? $menuCurrent->content }}</textarea>
                                            @if ($errors->has('content'))
                                                <span class="error-message">
                                                    {{ $errors->first('content') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="active" class="control-label mb-1">Trạng thái</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="active" id="active1"
                                                    value="1"
                                                    {{ (($menuCurrent->active) == 1) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="active1">
                                                    Kích hoạt
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="active" id="active2"
                                                    value="0"
                                                    {{ (($menuCurrent->active) == 0) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="active2">
                                                    Không kích hoạt
                                                </label>
                                            </div>
                                        </div>
                                        <div>
                                            <button id="payment-button" type="submit"
                                                class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-check fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Cập nhật</span>
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
