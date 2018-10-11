<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Noticia</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/estilosLogin.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
                <input type="text" name="fecha" id="fecha" class="form-control" value="<?php echo "" ?>">
            </div>
            <div class="form-group">
                <label for="genero">Categoria</label>
                <select name="categoria" id="categoria" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="nombre">Titulo</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo "" ?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Informacion</label>
                <textarea name="informacion" id="informacion" class="form-control"><?php echo " " ?></textarea>
            </div>
            
            <button class="btn btn-primary btn-block" id="saveButton">Guardar cambios</button>
            <button class="btn btn-primary btn-block" id="deleteButton">Borrar noticia</button>
            <button class="btn btn-primary btn-block" id="backButton">Atras</button>
        </form>

        <script src="../js/ajax.js"></script>
        <script src="../js/acciones.js"></script>
    </main>
</body>
</html>