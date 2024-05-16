<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Products</title>
</head>

<body>



    <div class=" flex justify-center items-center flex-col gap-10 pt-28">
        <h1 class=" text-xl font-black ">Products</h1>

        @if(count($response) > 0)
            <ul class="flex justify-center flex-col items-center gap-18">
                @foreach($response as $index => $product)
                    <li class="gap-18"><span class="text-black font-bold">{{ $index + 1 }}:</span> {{ $product['name'] }},
                        <span class="text-black font-bold"> Descripción:</span> {{$product['description']}},
                        <span class="text-black font-bold"> Precio:</span> {{ $product['price'] }}

                        <button onclick="editProduct({{ json_encode($product) }})" class="pl-10 text-blue-600 font-bold">Editar</button>

                        <form action="{{ route('products.destroy', $product['id']) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" pl-10 text-red-700 font-bold">Eliminar</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No hay productos disponibles.</p>
        @endif

        <div id="editProductForm" style="display: none;">

            <form id="editForm" action="{{ route('products.update', $product['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <label class="text-black font-bold">Nombre:</label>
                <input type="text" id="editName" name="name"><br><br>

                <label class="text-black font-bold">Descripción:</label>
                <input type="text" id="description" name="description"><br><br>

                <label class="text-black font-bold">Precio:</label>
                <input type="number" id="editPrice" name="price"><br><br>

                <button type="submit" class=" text-black font-bold">Guardar Cambios</button>
            </form>
        </div>

    </div>

    <div class=" flex justify-center flex-col gap-8 items-center pt-28">
        <button onclick="toggleForm()" class=" text-black font-bold">Agregar Producto</button>

        <div id="productForm" class="flex justify-center flex-col items-center gap-10" style="display: none;">
            <form action="{{ route('products.store') }}" method="POST" class=" border-black border-double">
                @csrf
                <label class=" text-black font-bold" for="name">Nombre:</label>
                <input type="text" id="name" name="name"><br><br>

                <label class="text-black font-bold" for="name">Descripción:</label>
                <input type="text" id="description" name="description"><br><br>

                <label class=" text-black font-bold" for="price">Precio:</label>
                <input type="number" id="price" name="price"><br><br>

                <button type="submit" class="text-black font-bold">Guardar</button>
            </form>
        </div>
        <a href="{{route('dashboard.index')}}" class=" text-xl font-bold items-center">Ir al Dash</a>
    </div>
    <div>

    </div>
   

    <script>
        function toggleForm() {
            var form = document.getElementById("productForm");
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }

        function editProduct(product) {
            document.getElementById("editName").value = product.name;
            document.getElementById("description").value = product.description;
            document.getElementById("editPrice").value = product.price;

            var form = document.getElementById("editProductForm");
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }
    </script>
</body>

</html>