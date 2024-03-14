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
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Chuyên mục</th>
                                        <th scope="col">Mô tả</th>
                                        <th scope="col">Tình trạng</th>
                                        <th style="width:7%" scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listProduct as $product )
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ str_replace(',', ' ', number_format($product->price)) }} | {{ str_replace(',', ' ', number_format($product->price_sale)) }}</td>
                                        <td>{{ $product->menu->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{!! $product->active == 1 ? "<span class='btn btn-success'>Kích hoạt</span>" : "<span class='btn btn-warning'>Không kích hoạt</span>" !!}</td>
                                        <td>
                                            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a onclick="removeRow({{$product->id}}, '{{route('admin.product.destroy', $product->id)}}')" class='btn btn-danger btn-sm'>
                                                <i class='fa fa-trash-o'></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $listProduct->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
