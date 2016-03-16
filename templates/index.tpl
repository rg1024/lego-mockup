<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset="utf-8">
    <title>Lego de Nora</title>
    <link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/disenno.css" type="text/css">
</head>
<body>
<section id="page">
    <header id="page-header">
        <div class='wrapper'>
            <h1>Noraren LEGO KITS</h1>
            <form method="get">
                <label>Buscar</label><input type='text' size='20' value='%buscar%' name='buscar'>
                <input type='submit' value='Buscar' name='accion'>
                <input type='submit' value='Todos'  name='accion'>
            </form>
            <nav class='secciones'>%secciones%</nav>
        </div>    
    </header>
    <section id="page-body" role="main">
        <section class='wrapper'>
            %contenido%
        </section>    
    </section>
    <footer id="page-footer">
        <div class='wrapper'>
        </div>    
    </footer>
</section>

</body>
</html>