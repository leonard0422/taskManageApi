
# Comandos Backend
- **Version laravel:** 11.23.5
- **Version PHP:** 8.2.23
- **Type DB:** pgsql
- **Name DB:** task_manager_db
- Definir token Api .env

- **cargar paquetes:** composer install
- **crear tabla base de datos (Solo si el usuario tiene accesos a postgres y permisos de creación, sino omitir):** php artisan db:create
- **Ejecutar migraciones:** php artisan migrate
- **Correr el servidor back:** php artisan serve

## Si no carga la api limpiar cache
    composer dump-autoload
    php artisan config:clear
    php artisan config:cache
    php artisan cache:clear


