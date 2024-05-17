<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Proveedores</title>
</head>

<body>

    <div class="flex justify-center items-center flex-col gap-10 pt-28">
        <h1 class="text-xl font-black">Proveedores</h1>

        @if(count($response) > 0)
            <ul class="flex justify-center flex-col items-center gap-18">
                @foreach($response as $index => $provider)
                    <li class="gap-18">
                        <span class="text-black font-bold">{{  $index + 1}}:</span> {{ $provider['name'] }},
                        <span class="text-black font-bold">Dirección:</span> {{$provider['address'] }},
                        <span class="text-black font-bold">Ciudad:</span> {{ $provider['city']}},
                        <span class="text-black font-bold">Teléfono:</span> {{ $provider['phone'] }},
                        <span class="text-black font-bold">Email:</span> {{ $provider['email'] }}

                        <button onclick="editProvider({{ json_encode($provider) }})"
                            class="pl-10 text-blue-600 font-bold">Editar</button>

                        <form action="{{ route('provider.destroy', $provider['id']) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="pl-10 text-red-700 font-bold">Eliminar</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No hay proveedores disponibles.</p>
        @endif

        <div id="editProviderForm" style="display: none;">
            <form id="editForm" action="" method="POST">
                @csrf
                <label for="editName" class="text-black font-bold">Nombre:</label>
                <input type="text" id="editName" name="name" required><br><br>

                <label for="editAddress" class="text-black font-bold">Dirección:</label>
                <input type="text" id="editAddress" name="address" required><br><br>

                <label for="editCity" class="text-black font-bold">Ciudad:</label>
                <input type="text" id="editCity" name="city" required><br><br>

                <label for="editPhone" class="text-black font-bold">Teléfono:</label>
                <input type="tel" id="editPhone" name="phone" required><br><br>

                <label for="editEmail" class="text-black font-bold">Email:</label>
                <input type="email" id="editEmail" name="email" required><br><br>

                <button type="submit" class="text-black font-bold">Guardar Cambios</button>
            </form>
        </div>
    </div>

    <div class="flex justify-center flex-col gap-8 items-center pt-28">
        <button onclick="toggleForm()" class="text-black font-bold">Agregar Proveedor</button>

        <div id="providerForm" class="flex justify-center flex-col items-center gap-10" style="display: none;">
            <form action="{{ route('provider.store') }}" method="POST" class="border-black border-double">
                @csrf
                <label for="name" class="text-black font-bold">Nombre:</label>
                <input type="text" id="name" name="name" required><br><br>

                <label for="address" class="text-black font-bold">Dirección:</label>
                <input type="text" id="address" name="address" required><br><br>

                <label for="city" class="text-black font-bold">Ciudad:</label>
                <input type="text" id="city" name="city" required><br><br>

                <label for="phone" class="text-black font-bold">Teléfono:</label>
                <input type="tel" id="phone" name="phone" required><br><br>

                <label for="email" class="text-black font-bold">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <button type="submit" class="text-black font-bold">Guardar</button>
            </form>
        </div>
        <a href="{{route('dashboard.index')}}" class=" text-xl font-bold items-center">Ir al Dash</a>
    </div>

    <script>
        function toggleForm() {
            var form = document.getElementById("providerForm");
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }

        function editProvider(provider) {
            document.getElementById("editName").value = provider.name;
            document.getElementById("editAddress").value = provider.address;
            document.getElementById("editCity").value = provider.city;
            document.getElementById("editPhone").value = provider.phone;
            document.getElementById("editEmail").value = provider.email;

            var form = document.getElementById("editProviderForm");
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }
    </script>
</body>

</html>