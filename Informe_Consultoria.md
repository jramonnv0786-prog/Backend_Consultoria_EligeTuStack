CLIENTE Y SERVIDOR
CLIENTE
El cliente es el dispositivo o programa que realiza una solicitud a un servidor. En una página web, normalmente es el navegador del usuario (Chrome, Firefox… etc).

El navegador es el encargado de:

Interpretar el HTML y mostrar la estructura de página.
Aplicar estilos CSS.
Ejecutar JavaScript del lado del cliente.
Recibir información del servidor.
Permitir que el usuario interactúe con botones, formularios y menús.

El ejemplo perfecto sería:
Cuando visitamos una tienda online , el navegador muestra las imágenes de los productos, precios y botones para añadir al carrito.
El navegador puede ejecutar código JavaScript para actualizar una cantidad del carrito sin recargar toda la página.



SERVIDOR
El servidor es el equipo o sistema que percibe peticiones y proporciona respuestas. Puede estar alojado en un centro de datos, en la nube o en tu propio ordenador mediante Xampp.
En una aplicación PHP, el servidor puede:

Ejecutar código PHP.
Consultar Base De Datos,
Comprobar las credenciales del usuario.
Validar pedidos
Calcular importes
Generar HTML o respuestas JSON

El navegador solicita el archivo a Apache.
Apache solicita la ejecución del código PHP.
PHP obtiene la hora actual.
PHP genera el HTML con la hora.
Apache devuelve el resultado al navegador

El navegador no necesita ejecutar el código PHP para mostrar la hora. Recibe el resultado que ha generado el propio servidor. 



LA REGLA DE ORO DE SEGURIDAD
“Nunca debe de confiarse en los datos dados por el cliente” 

Esta regla significa que todo dato recibido desde el navegador debe de considerarse potencialmente manipulado hasta que el servidor lo valide. 

Porque el usuario tiene el control sobre su navegador y tiene la posibilidad de modificar las peticiones que envía. Puede utilizar herramientas de desarrollo, scripts o aplicaciones para enviar valores diferentes de los que ofrece la interfaz normal.

EJEMPLO
Imagina que una tienda vende un producto por 50 €:

El navegador envía:
 producto= 15
precio= 50 €
cantidad= 1

Un usuario malintencionado podría intentar cambiar el precio enviado: 
producto= 15
precio= 1 €
cantidad= 1

Si el servidor acepta directamente el precio recibido , podría permitirse una compra incorrecta.
Ahí entra el servidor, que es el que consulta el precio real del producto en la Base de Datos, valida la cantidad y calcula el importe por su cuenta.

LA SEGURIDAD XSS
XSS (Cross-Site Scripting) es una vulnerabilidad que puede producirse  cuando una aplicación muestra contenido controlado por un atacante como código ejecutable en el navegador.

Ejemplo de texto malicioso que puede enviarse como nombre:

HTML
<script>alert('Ataque')</script>

Si se inserta sin escapar en un contexto HTML, el navegador puede interpretar las etiquetas como código.

Nuestro código utiliza:
htmlspecialchars($horaActual, ENT_QUOTES, 'UTF-8');

Esta función convierte determinados caracteres especiales en entidades HTML. Así, un texto que contiene etiquetas no es interpretado automáticamente como marcado HTML en un contexto apropiado.

No obstante, htmlspecialchars() es una medida de escape de salida, no una solución completa para todas las vulnerabilidades XSS. El escape debe adaptarse al contexto (HTML, atributo, JavaScript, URL…), y destacar la importancia además de la validación, politicas de seguridad y otras defensas.


WEB ESTÁTICA VS DINÁMICA


WEB ESTÁTICA
Una web estática entrega archivos cuyo contenido está preparado previamente, normalmente HTML, CSS y JavaScript.


Características de una web estática:

Sencilla de alojar
Puede tener un coste de infraestructura reducido
Es adecuada para información que cambia poco
No necesita obligatoriamente un lenguaje de servidor para mostrar páginas estáticas
Puede incorporar JavaScript y consumir APIs externas

Una web estática no siempre quiere decir que sea anticuada, insegura o de menor calidad. A veces puede ser una gran elección para determinados proyectos.

WEB DINÁMICA
Una web dinámica genera o modifica el contenido en función de los datos, peticiones, usuarios o reglas de negocio.
En una tienda online, el servidor podría consultar una base de datos para obtener:
Nombre del producto
Precio
Stock disponible
Categoría
Imágenes
Información del vendedor
Después genera una respuesta para el usuario.

VENTAJAS DE UNA WEB DINÁMICA PARA UNA TIENDA ONLINE
Las principales ventajas de una web dinámica para una tienda online:
Gestión centralizada de productos: Los vendedores pueden actualizar precios, descripciones y stock en una base de datos.
Carrito de compra: El servidor puede mantener y comprobar los productos seleccionados y sus cantidades.
 Usuarios y pedidos: Permite implementar cuentas, historial de compras y gestión de pedidos.
Búsqueda y filtros: Se pueden consultar productos según categoría, precio, disponibilidad o localidad.
Actualización automática: Los cambios de la base de datos pueden reflejarse en las páginas sin editar manualmente cada HTML.

DESVENTAJAS DE UNA WEB ESTÁTICA
Una web estática es posible que sea útil para catálogos más pequeños, pero si la startup necesita que muchos más comercios  gestionen productos , stock y pedidos… una arquitectura backend y base de datos hace más fácil la centralización de las reglas de negocio.
Por otro lado, la web dinámica exigirá más componentes como: Aplicaciones, base de datos, mantenimiento, seguridad y monitorización.


¿LA INFRAESTRUCTURA: QUÉ ES UN SERVIDOR WEB?
Un servidor web es un programa que recibe peticiones HTTP/HTTPS y entrega recursos o respuestas. 
Por ejemplo: Apache o Nginx.

Sus funciones habituales son:

Escuchar peticiones de red.
Entregar archivos estáticos.
Gestionar conexiones HTTP.
Aplicar configuraciones de acceso.
Dirigir peticiones dinámicas a un intérprete o gestor de aplicaciones.
Participar en la configuración TLS/HTTPS, según la arquitectura.

¿QUÉ ES PHP - FPM?
PHP-FPM (PHP FastCGI Process Manager) es una implementación de FastCGI para PHP que incluye gestión de procesos, especialmente útil en sitios con mayor carga. 
En lugar de crear un proceso PHP nuevo para cada petición, PHP-FPM mantiene trabajadores (denominados “workers”) que pueden atender sucesivas solicitudes.

VENTAJAS TÉCNICAS DE PHP-FPM FRENTE AL CGI TRADICIONAL
Las principales ventajas técnicas de PHP-FPM frente al CGI son:

Gestión de procesos: Permite mantener trabajadores y administrar su ciclo de vida, evitando el coste de crear un proceso completo en cada solicitud.
Pools configurables: Permite configurar grupos de trabajadores y recursos, con opciones como diferentes usuarios, grupos y parámetros de PHP según el entorno.
Gestión de carga: Puede configurar el número de procesos y estrategias de creación de trabajadores según la carga.
Administración y observabilidad: Ofrece funciones de registro, estadísticas y reinicios controlados.
¿QUÉ ES LARAVEL Y QUÉ FUNCIONES CUBRE?
Laravel 12 es un framework de PHP que proporciona una estructura organizada y herramientas para desarrollar aplicaciones web de forma más eficiente. 

Arquitectura MVC: Separa los modelos, las vistas y los controladores, facilitando la organización y el mantenimiento del código. 
Seguridad: Incorpora mecanismos para la protección frente a ataques habituales, como CSRF, además de herramientas de validación y gestión de contraseñas.
Estructura de directorios organizada: Separa las rutas, controladores, modelos, vistas y otros componentes, lo que facilita el trabajo en equipo. 
Productividad: Ofrece funcionalidades integradas para gestionar rutas, bases de datos, sesiones, autenticación y validación de formularios. 

Con Laravel , disponemos de una estructura de aplicación y herramientas que reducen un trabajo tan repetitivo.


¿POR QUÉ ELEGIMOS PHP?
Porque PHP es un lenguaje de programación ampliamente utilizado en el desarrollo web del lado del servidor, permitiendo integrarse con HTML y utilizarse en servidores web y bases de datos.
HTML: Permitiendo generar así páginas dinámicas mediante código ejecutado en el servidor.
Amplio ecosistema: Dispone de numerosas bibliotecas, herramientas y recursos para desarrollar aplicaciones web.
Compatibilidad con bases de datos:  Hace sencilla la conexión con sistemas como MySQL, utilizados online normalmente.
Facilidad de despliegue: Es compatible con los servidores de Apache y entornos Xampp.
Mantenimiento y evolución: Permite desarrollar aplicaciones de forma progresiva, incorporando funcionalidades según las necesidades del proyecto.

APLICACIÓN AL PROYECTO
Para una tienda online local, PHP permite ejecutar la lógica del servidor, procesar las peticiones y comunicarse con la base de datos. Laravel 12 facilita la implementación organizada de funcionalidades como:
Gestión de productos y categorías.
Control de usuarios y autenticación.
Carrito de compra y pedidos.
Validación de datos procedentes del cliente.
Separación entre la lógica de negocio y la presentación.
Conclusión: PHP ofrece una base compatible y flexible para el desarrollo web, mientras que Laravel 12 aporta una arquitectura organizada, herramientas de seguridad y funcionalidades que facilitan la creación y el mantenimiento de la aplicación de comercio electrónico.
