<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Noticia</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/estilosLogin.css">
</head>
<body>
    <main class="main-content container">
        <h1>Noticia</h1>
        <p>Aca podes ver los datos de esta noticia.</p>
        <form>
            <div class="hidden">
                <input type="text" value="<?php echo $_GET['id']; ?>" id="idCat">
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="text" name="fecha" id="fecha" class="form-control">
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" class="form-control">
            </div>
            <div class="form-group">
                <label for="informacion">Informacion</label>
                <textarea name="informacion" id="informacion" class="form-control"></textarea>
            </div>
            
            <div id="botones">
                <a class="btn btn-primary btn-block" id="saveButton">Guardar cambios</a>
                <a class="btn btn-primary btn-block" id="deleteButton">Borrar noticia</a>
                <a href="../index.php" class="btn btn-primary btn-block" id="backButton">Atras</a>
            </div>
        </form>

        <script src="../js/ajax.js"></script>
        <script src="../js/acciones.js"></script>
    </main>
</body>
</html>