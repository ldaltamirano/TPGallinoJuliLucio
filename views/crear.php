<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear nueva noticia</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/estilosLogin.css">
</head>
<body>
    <main class="main-content container">
        <h1>Nueva noticia</h1>
        <p>Completá los datos</p>
        <form action="../actions/create.php" method="post">
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="text" name="fecha" id="fecha" class="form-control" value="fecha">
            </div>
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" class="form-control">
            </div>
            <div class="form-group">
                <label for="informacion">Información</label>
                <textarea class="form-control" rows="5" id="informacion" name="info"></textarea>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria" class="form-control">
                </select>
            </div>
            
            <button class="btn btn-primary btn-block">Crear noticia</button>
            <a href="../index.php" class="btn btn-primary btn-block" id="backButton">Atras</a>
        </form>
    </main>
    <script src="../js/ajax.js"></script>
    <script src="../js/news.js"></script>
</body>
</html>