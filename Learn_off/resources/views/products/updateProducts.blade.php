<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <h1>Sửa sản phẩm</h1>
        <form action="{{ route('product.updatePostProducts') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $product->id}}" name="idPro">
            <label for="">Tên Sản phẩm</label>
            <input type="text" name="namePro" class="form-control" value="{{ $product->name}}">
            <br>

            <label for="">Danh mục sản phẩm</label>
            <select name="phongbanUser" class="form-control">
              @foreach ($category as $value)
                  <option
                    @if ($product->category_id === $value->id)
                        selected
                    @endif
                  value="{{ $value->id }}">{{ $value->name }}</option>
              @endforeach
          </select>
            <br>

            <label for="">Price sản phẩm</label>
            <input type="text" name="pricePro" class="form-control" value="{{ $product->price}}">
            <br>

            <label for="">View sản phẩm</label>
            <input type="text" name="viewPro" class="form-control" value="{{ $product->view}}">
            <br>


            <button class="btn btn-primary">Xác nhận</button>
        </form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>