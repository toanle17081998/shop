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
                                    <form action="{{ route('admin.slider.store') }}" method="post"
                                        novalidate="novalidate">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="control-label mb-1">Tên slider</label>
                                                    <input id="name" name="name" type="text" class="form-control"
                                                        aria-required="true" aria-invalid="false"
                                                        value="{{ old('name') }}">
                                                    @if ($errors->has('name'))
                                                        <span class="error-message">
                                                            {{ $errors->first('name') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="url" class="control-label mb-1">Url</label>
                                                    <input id="url" name="url" type="text" class="form-control"
                                                        aria-required="true" aria-invalid="false"
                                                        value="{{ old('url') }}">
                                                    @if ($errors->has('url'))
                                                        <span class="error-message">
                                                            {{ $errors->first('url') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="order" class="control-label mb-1">Order</label>
                                                    <input id="order" name="order" type="number" class="form-control"
                                                        aria-required="true" aria-invalid="false"
                                                        value="{{ old('order') }}">
                                                    @if ($errors->has('order'))
                                                        <span class="error-message">
                                                            {{ $errors->first('order') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="description" class="control-label mb-1">Mô tả</label>
                                                    <input id="description" name="description" type="text" class="form-control"
                                                        aria-required="true" aria-invalid="false" value="{{ old('description') }}">
                                                    @if ($errors->has('description'))
                                                        <span class="error-message">
                                                            {{ $errors->first('description') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Ảnh đại diện</label>
                                                <input type="file" id="formFile" class="form-control-file uploadfile">
                                                <input type="hidden" name="image" id="fileImg">
                                                <div class="image_show"></div>
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
                                                <input class="form-check-input" type="radio" name="active" id="active1"
                                                    value="1" checked>
                                                <label class="form-check-label" for="active1">
                                                    Kích hoạt
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="active"
                                                    id="active2" value="0">
                                                <label class="form-check-label" for="active2">
                                                    Không kích hoạt
                                                </label>
                                            </div>
                                        </div>
                                        <div>
                                            <button id="payment-button" type="submit"
                                                class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-check fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Tạo mới</span>
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
    {{-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content-menus'))
            .catch(error => {
                console.error(error);
            });
    </script> --}}
@endsection
