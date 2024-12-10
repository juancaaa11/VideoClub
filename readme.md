# 📀 **Proyecto Videoclub** 🎮

Bienvenido a mi proyecto de **Videoclub**. Este es un sistema de gestión de un videoclub, donde los usuarios pueden alquilar, devolver y gestionar productos como **DVDs**, **Juegos** y **Cintas de Video**. ¡Todo ello con un enfoque orientado a objetos en PHP!

---

## 🚀 **Características**:

- **Gestión de productos**: Añadir, listar y alquilar productos como Cintas de Video, DVDs y Juegos.
- **Gestión de socios**: Los socios pueden alquilar hasta un número máximo de productos.
- **Excepciones personalizadas**: Manejo de errores mediante excepciones para situaciones como productos ya alquilados o socos no encontrados.
- **Encadenamiento de métodos**: Métodos que permiten encadenar operaciones de manera fluida.
- **Autoloading**: Carga automática de clases para facilitar la gestión del código.

---

## 🔧 **Instalación**:

Para comenzar a trabajar con este proyecto, sigue estos pasos:

1. **Clonar el repositorio**:

    ```bash
    git clone https://github.com/tu-usuario/videoclub.git
    cd videoclub
    ```

2. **Instalar dependencias** (si las hay):

    Asegúrate de tener Composer instalado. Luego ejecuta:

    ```bash
    composer install
    ```

3. **Autoloading de clases**:

    Se utiliza un archivo `autoload.php` para cargar automáticamente todas las clases.

---

## 🛠 **Uso**:

Una vez que tengas el proyecto configurado, puedes empezar a utilizarlo creando objetos y realizando operaciones como alquilar, devolver productos y gestionar socios.

### Ejemplo de uso:

```php
// Crear un Videoclub
$videoclub = new Videoclub("Mi Videoclub");

// Añadir productos y socios
$videoclub->incluirCintaVideo("Cinta de Acción", 10.99, 120, "16:9")
         ->incluirDvd("DVD de Drama", 1, 15.49, "Español, Inglés", "16:9")
         ->incluirJuego("FIFA 2024", 49.99, "PS5", 1, 4);

$videoclub->incluirSocio("Juan", 5);

// Alquilar productos
$videoclub->alquilarSocioProducto(1, 2);

// Devolver productos
$videoclub->devolverSocioProducto(1, 2);
