<html>
    <head>
        <title>Mi Web</title>
    </head>
    <body>
        <h1>¡Hola <?php echo "Mundo"; ?>!</h1>
        @foreach ($lista as $item)
            <p class="list-group-item-heading">ID: &nbsp {{ $item->id }}</p>
            <p class="list-group-item-heading">Nombre: &nbsp {{ $item->name }}</p>
        @endforeach
    </body>
</html>