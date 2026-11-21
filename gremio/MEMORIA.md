# Memoria · Gremio de Aventureros

**Código de alumno/a:** Brunhilda Guerrera (no pongas tu nombre)

## 1. Mi aventurero
- Usuario que he añadido a la tabla: Brunhilda Guerrera
- Comando o pasos que he usado para generar el hash: el comadno que he utilizado es php -r "echo password_hash('1234_MMM', PASSWORD_DEFAULT);"

## 2. Parte 1 · match
¿Has puesto `default` en `etiquetaRango()`? ¿Qué pasa si llega el rango `'Z'`? ¿Por qué lo prefieres así?
No he puesto default en esa etiqueta, porque así va directamente al grano.
## 3. Parte 2 · Validación de la URL
Escribe a mano en la barra `tablon.php?rango=Z&oro=hola`. ¿Qué ocurre y qué línea de tu código lo evita?

## 4. Parte 3 · Sesión frente a cookie
Explica con tus palabras qué guardas en `$_SESSION` y qué guardas en cookies, y por qué no al revés.
Se guarda los datos del aventurero, con $_SESSION['aventurero'] las misiones aceptadas en el zurrón,con $_SESSION['zurron'] la hora de entrada, con $_SESSION['entrada'] y el contador de visitas al tablón con $_SESSION['visitas'] 

En las cookies se guardan preferencias no sensibles en el navegador del cliente.  

Pues, el usuario podría manipular los datos desde la herramientas del desarrollador.
## 5. Parte 3 · Seguridad del login
- ¿Qué pasa si en el usuario escribes `' OR '1'='1`? ¿Por qué?
No inicia sesión y aparece un mensaje con contrasela o usuario incorrectos.

- ¿Para qué sirve `session_regenerate_id(true)`?
Sirve para generar un contador nuevo en la identificación de la sesión.

- ¿Por qué el mensaje de error es el mismo si falla el usuario o la contraseña?
Pues, podría haber un atacante que sabría el nombre de los usuarios que están registrados.

## 6. Pruebas que he hecho
| Prueba | Resultado esperado | Resultado obtenido |
|---|---|---| 
| Entrar en tablon.php sin login | | | Me aparece como un pequeño formulario para meter los datos 
| Login con contraseña mala | | | Me muestra un mensaje de que el usuario o la contraseña son incorrectas
| Aceptar la misma misión dos veces | | | No se repite
| Cerrar sesión y volver al zurrón | | | Aparece la visita que tiene
| Cambiar el tema y cerrar sesión | | | Se matiene el mismo tema

## 7. Dificultades y cómo las he resuelto
He tenido dificultades a contectar con la base de datos, y al realizar varias funciones, y para hacer el login e iniciar sesión. La he resuelto, preguntando a la IA, para poder contectarme con la base de datos, hacer el login e iniciar sesión y poder realizar correctamente las funciones.