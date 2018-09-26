# Consulta-Nombres-Reniec
Pequeña aplicación web para consultar nombres de Reniec, usando Laravel 5.7 y Vuejs. 

## Configuraciónes e instalaciones

### Agregando libreria php-simple-html-dom-parser
Para extraer data de html usaremos la libreria php-simple-html-dom-parser de Sunra,
para esto agregamos mediante composer la libreria a nuestro proyecto:

composer require sunra/php-simple-html-dom-parser

Luego en nuestro caso copiamos la carpeta Sunra ubicada en vendor\sunra\php-simple-html-dom-parser\Src hacia App\ debido a que haremos un cambio en el archivo simple_html_dom.php y no debemos tocar la libreria original unicada en vendor.

En nuestra copia de la carpeta Sunra abrimos el archivo simple_html_dom.php 
y ubicamos la funcion file_get_html en la cual cambiaremos el argumento $offset = -1 por $offset = 0 para habilitar la busqueda. Habiendo hecho los cambios ya podemos usar nuestra libreria desde nuestro controlador:
use App\Sunra\PhpSimple\HtmlDomParser;

### Compilando Assets
En nuestro proyecto hacemos uso de Bootstrap4 y Vuejs por lo tanto necesitamos compilar
los assets de css y js incluidos en nuestro archivo webpack.mix.js mediante Laravel-Mix.
Este archivo lo compilaremos mediante npm por lo tanto primero debemos instalar las dependencias por defecto del package.json:

- **npm install**

Con esto tenemos habilitado el uso de los componentes de Vue,Bootstrap y Axios(para usar ajax)
entre otras librerias. Ahora solo nos queda compilar nuestro archivo webpack.mix.js para que todo funcione correctamente:

npm run dev

### Nota Importante
En el archivo .env se tiene la variable de entorno APP_URL=http://localhost/consulta_reniec/public la cual contiene la ruta local de la raiz del proyecto, en mi computador. Cada persona debera poner aqui su propia ruta local o publica de la raiz de su proyecto, ya que esta variable se usa en el componente vuejs, para el correcto funcionamiento del proyecto.
