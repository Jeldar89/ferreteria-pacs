# Laravel Ferretería

Proyecto de gestión para ferreterías desarrollado con Laravel y configurado para ejecutarse utilizando Docker Compose.

## Requisitos

Antes de comenzar, asegúrate de tener instalados los siguientes programas en tu sistema:

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

## Estructura del Proyecto

- `docker/`: Contiene los archivos necesarios para la configuración de los contenedores Docker.
- `src/`: Carpeta principal del proyecto Laravel.
- `docker-compose.yml`: Archivo de configuración para levantar los contenedores.

## Instalación

Sigue los pasos a continuación para instalar y configurar el proyecto.

### 1. Clonar el repositorio

Clona el repositorio a tu máquina local:

```bash
git clone https://github.com/Jeldar89/ferreteria-pacs
cd laravel-ferreteria
```

### 2. Configurar el entorno de Laravel

Copia el archivo `.env.example` y renómbralo como `.env` en la carpeta `laravel-ferreteria/`:

```bash
cp laravel-ferreteria/.env.example laravel-ferreteria/.env
```

Abre el archivo .env y configura las siguientes variables relacionadas con la base de datos:

```env
    DB_HOST=mariadb
    DB_PORT=3306
    DB_USERNAME=bn_myapp
    DB_PASSWORD=
    DB_DATABASE=bitnami_myapp
```

### 3. Construir y levantar los contenedores

Ejecuta el siguiente comando desde la raíz del proyecto para construir y levantar los contenedores:

```bash
docker-compose up -d
```

Esto levantará los siguientes servicios:

MariaDB: Base de datos para la aplicación Laravel.
Laravel: Contenedor de la aplicación, basado en la imagen oficial de Bitnami Laravel.

### 4. Instalar dependencias de Laravel

Accede al contenedor de Laravel ejecutando:

```bash
docker exec -it laravel-ferreteria-laravel-1 bash
```

Dentro del contenedor, instala las dependencias utilizando Composer:

```bash
composer install
```

Genera la clave de la aplicación Laravel:

```bash
php artisan key:generate
```

### 5. Configurar permisos

Asegúrate de que las carpetas storage y bootstrap/cache tengan los permisos adecuados:

```bash
chmod -R 775 storage bootstrap/cache
```

### 6. Migrar la base de datos

Desde el contenedor de Laravel, ejecuta las migraciones para configurar la base de datos:

```bash
php artisan migrate
```

### 7. Instalar paquetes npm (opcional)

Si tu proyecto utiliza recursos front-end, ejecuta los siguientes comandos dentro del contenedor para instalar y compilar los recursos:

```bash
npm install
npm run dev
```

### 8. Subir el servicio

Para subir el servicio, ejecuta el siguiente comando:

```bash
php artisan serve --port=9980
```

### 9. Acceder a la aplicación

Una vez que los contenedores estén en ejecución, abre tu navegador y visita:

<http://localhost:8000>
La aplicación Laravel estará corriendo en este puerto.

## Comandos útiles

Aquí tienes algunos comandos adicionales para trabajar con los contenedores:
Detener los contenedores:

```bash
docker-compose down
```

Reiniciar los contenedores:

```bash
docker-compose restart
```

Ver logs de los contenedores:

```bash
docker-compose logs -f
```

Acceder al contenedor de Laravel:

```bash
docker exec -it laravel-ferreteria-laravel-1 bash
```

Drop All Tables and Migrate

```bash
php artisan migrate:fresh
or
php artisan migrate:fresh --seed
```
