@foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->idProduct }}</th>
                            <td>{{ $product->nameProduct }}</td>
                            <td>
                                <img src="{{ asset($product->imgProduct) }}" alt="" style="width: 100px">
                            </td>
                            <td>{{ $product->quantityProduct }}</td>
                            <td>{{ number_format($product->priceProduct) }}đ</td>
                            <td>
                                <div class="row">
                                    <div class="col-4">
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                                            <i class="fa fa-pencil"></i>
                                            Sửa
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <form action="{{ route('products.delete', $product) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                                Xóa
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
