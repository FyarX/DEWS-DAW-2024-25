<?

    //! COOKIES
    
    // CREAR COOKIE
    setcookie("nombreCookie", "valorCookie", time() + 7*24*60*60, "/rutadelacookie");

    // ELIMINAR COOKIE
    setcookie("nombreCookie", "", time() - 1 ); // No hace falta poner el valor ni la ruta

    // LEER EL VALOR DE UNA COOKIE
    $_COOKIE["nombreCookie"];

    // COMPROBAR SI EXISTE UNA COOKIE
    if(isset($_COOKIE["nombreCookie"])) {
        echo "La cookie existe";
    } else {
        echo "La cookie no existe";
    }

    //! SESIONES (Finalizan cuando se cierra el navegador)

    // CAMBIAR NOMBRE DE LA SESIÓN ANTES DE INICIARLA (recomendado por seguridad)
    session_name("nombreSesion");

    // INICIAR SESIÓN
    session_start();

    // DESTRUIR SESIÓN
    session_destroy(); // Elimina la sesión actual y sus variables

    // LIMPIAR DATOS DE SESIÓN
    session_unset(); // Elimina todas las variables almacenadas en $_SESSION pero no la elimina en sí

    // CREAR VARIABLE DE SESIÓN
    $_SESSION["nombreSesion"] = "valorSesion";
    
    //? CAMBIAR TIEMPO DE VIDA DE LA SESIÓN

    $inactividad = 600; // El tiempo de inactividad es de 10 minutos

        // Comprobar si $_SESSION["timeout"] está creada
    if (isset($_SESSION["timeout"])) {
            // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if ($sessionTTL > $inactividad) {
            session_destroy();
            header("Location: /logout.php"); // Nos vamos a la página de salida
        }
    }
        // Si no estaba creada 'timeout' la creamos ahora
    $_SESSION["timeout"] = time();

?>