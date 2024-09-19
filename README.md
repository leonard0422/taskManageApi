
# Comandos Backend
- **Version laravel:** 11.23.5
- **Version PHP:** 8.2.23
- **Type DB:** pgsql
- **Name DB:** task_manager_db
- Definir token Api

- **cargar paquetes:** composer install
- **crear tabla base de datos (Solo si el usuario tiene accesos a postgres y permisos de creación, sino omitir):** php artisan db:create
- **Ejecutar migraciones:** php artisan migrate
- **Correr el servidor back:** php artisan serve

## Prueba Práctica para Desarrollador PHP 2

Se requiere la creación de una API Restful básica (CRUD), con su respectivo front, puedes utilizar framework si lo deseas.
##### Instrucciones Generales:
- Al finalizar, sube tu código a un repositorio público en GitHub o Gitlab.
1. La API debe manejar un recurso sencillo: Tareas (tasks).
    - Cada tarea debe tener un id, un título, una descripción, y un estado
(pendiente, completada).
2. Implementa las operaciones necesarias para un CRUD de tareas.
3. Validación: Asegúrate de que se validen los datos de entrada (por ejemplo, título no debe estar vacío).
4. Almacenamiento: Guarda las tareas en una base de datos PostgreSQL.

##### Criterios de Evaluación:
- Correcta implementación de las operaciones CRUD.
- Implementación de patrón de diseño MVC
- Implementación de patrones de diseño DAO o Repository.
- Buen manejo de errores, validaciones y códigos de respuesta.
- Limpieza y organización del código.
- Uso adecuado de PostgreSQL para la persistencia de datos.
- Deseable, implementación de seguridad al api.

## Si no carga la api limpiar cache
    composer dump-autoload
    php artisan config:clear
    php artisan config:cache
    php artisan cache:clear


