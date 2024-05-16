<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class=" bg-gray-200 ">
    <div class=" flex justify-center flex-col items-center gap-10 pt-20">
        <h1 class=" text-xl font-black">DASHBOARD</h1>
        <nav class="flex justify-center gap-8 flex-row">
            <a href="{{route('products.index')}}">Products</a>
            <a href="{{route('provider.index')}}">Provider</a>
        </nav>
    </div>


</body>

</html>