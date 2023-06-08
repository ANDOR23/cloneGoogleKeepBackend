# Clone Google Keep (Backend)

Este es el backend para un clone de Google Keep. Un gestor de notas que permite realizar diversas acciones.

## Requisitos previos

Antes de comenzar, asegúrate de tener instaladas las siguientes herramientas:

- Laravel 9: [Instrucciones de instalación](https://laravel.com/docs/9.x/installation)
- Composer: [Instrucciones de instalación](https://getcomposer.org/doc/00-intro.md)
- Laragon: [Sitio web oficial](https://laragon.org/)

## Descarga

Clona el repositorio del proyecto en tu máquina local:

```bash
git clone <url-del-repositorio>
```

## Configuración

1. Accede al directorio del proyecto:

   ```bash
   cd <nombre-del-proyecto>
   ```

2. Instala las dependencias del proyecto utilizando Composer:

   ```bash
   composer install
   ```

3. Copia el archivo de configuración .env.example y renómbralo como .env:

   ```bash
   cp .env.example .env
   ```
4. Genera una clave de aplicación única:

   ```bash
   php artisan key:generate
   ```

5. Configura las variables de entorno en el archivo .env según tu entorno de desarrollo, como la conexión a la base de datos, el correo electrónico, etc.

6. Ejecuta las migraciones para crear las tablas en la base de datos:

   ```bash
   php artisan migrate
    ```

## Uso

1. Inicia el servidor de desarrollo de Laravel:

  ```bash
  php artisan serve
  ```

2. Accede a la aplicación en tu navegador web:

  ```bash
  http://localhost:8000
  ```



