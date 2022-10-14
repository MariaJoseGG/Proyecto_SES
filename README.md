# Control Hemodinámico

## Integrantes

Tatiana Alexandra Betancurth Paiba

Dayane Michelle Ceballos Cardona

María José Giraldo Gutiérrez

### Notas

- Para ingresar al sistema como Administrador, hay que registrarse (por defecto se es Auxiliar de enfermería) y luego editar el registro en la tabla de la base de datos, cambiando el 0 en el campo "tipo_usuario" por un 1

- Se necesita, en phpMyAdmin, una base de datos llamada 'hemodinamico'

- Desde la terminal, escribir 'composer install' y luego cambiarse a la carpeta proyecto, para ejecutar desde ahí 'php artisan serve' e iniciar el proyecto

- Para visualizar el cuadro del Ingreso de líquidos (opción que se encuentra en el menú de Servicios), es necesario llenar la tabla 'hours' de la base de datos con el seeder FluidSeeder. Sin embargo, en el archivo adjunto a la entrega se encuentra la base de datos exportada con dicha tabla llena, por lo que no sería necesario utilizar el seeder