@extends('Admin.Layout.main')

@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{{ $title }}</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên slider</th>
                                        <th scope="col">Order</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Mô tả</th>
                                        <th scope="col">Tình trạng</th>
                                        <th style="width:7%" scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listSlider as $slider)
                                        <tr>
                                            <th scope="row">{{ $slider->id }}</th>
                                            <td>{{ $slider->name }}</td>
                                            <td>{{ $slider->order }}</td>
                                            <td>
                                                <a href="{{ $slider->image }}" target="_blank">
                                                    <img width="100px" src="{{ $slider->image }}">
                                                </a>
                                            </td>
                                            <td>{{ $slider->description }}</td>
                                            <td>{!! $slider->active == 1
                                                ? "<span class='btn btn-success'>Kích hoạt</span>"
                                                : "<span class='btn btn-warning'>Không kích hoạt</span>" !!}</td>
                                            <td>
                                                <a href="{{ route('admin.slider.edit', $slider->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a onclick="removeRow({{ $slider->id }}, '{{ route('admin.slider.destroy', $slider->id) }}')"
                                                    class='btn btn-danger btn-sm'>
                                                    <i class='fa fa-trash-o'></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $listSlider->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
