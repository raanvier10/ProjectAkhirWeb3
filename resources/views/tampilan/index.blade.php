<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LatihanLaravelP4</title>
</head>
<body>
    <a></a><b>LATIHAN LARAVEL PERTEMUAN 4</b>
    <pre><a href ="{{ route('products.create')}}">Tambah Produk </a></pre>
    <table border = "1">
        <tr>
            <td>Nama</td>
            <td>Deskripsi</td>
            <td>Harga</td>
            <td>Stok</td>
            <td>Pilihan</td>
        </tr>
        @forelse($products as $product)
        <tr>
            <td>{{$product->title}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->stock}}</td>
            <td>
                <a href ="{{ route('products.edit', $product->id)}}">Edit </a></pre>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
            </td>
        </tr>
        @empty
        Data belum ada

        @endforelse
    </table>
</body>
</html>