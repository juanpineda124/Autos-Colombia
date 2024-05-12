# Autos Colombia - Sistema de Gestión de Parqueaderos

Este proyecto es una aplicación web desarrollada con Laravel que simula un sistema de gestión de un parqueadero. Permite gestionar las entradas y salidas de vehículos, así como la gestión de empleados y celdas, proporciona una solución completa para administrar un parqueadero de manera eficiente 

1. [Funcionalidades](#funcionalidades)
2. [Requisitos](#requisitos)
3. [Instalacion](#instalación)
4. [Licencia](#licencia)

## Funcionalidades

- **Registro de celda:** Permite registrar las celdas de estacionamiento disponibles en el parqueadero. Permite marcar una celda como ocupada cuando un vehículo ingresa al parqueadero y liberar una celda cuando un vehículo sale. Permite el modificado y eliminado de la informacion almacenada.
- **Registro de vehículos:** Permite registrar la entrada de nuevos vehículos al parqueadero, incluyendo información como la placa, nombre del propietario, telefono del propietario, hora de entrada y la celda de ocupacion. Permite el modificado y eliminado de la informacion almacenada. 
- **Registro de salidas:** Permite registrar la salida de vehículos del parqueadero. Permite el modificado y eliminado de la informacion almacenada.
- **Registro de empleado:** Permite el acceso al sistema por parte del personal encargado del parqueadero. Permite autenticar a los empleados para que puedan registrar entradas y salidas de vehículos, así como administrar las celdas de estacionamiento.

## Requisitos

- PHP >= 8.2
- Composer
- Servidor web (por ejemplo, Apache, Nginx)
- Base de datos compatible con Laravel (MySQL)

## Instalación

1. **Clona este repositorio en tu máquina local:** Abre tu terminal y navega al directorio donde deseas clonar el repositorio. Luego, ejecuta el siguiente comando para clonar el repositorio de Git:

git clone https://github.com/juanpineda124/Autos-Colombia.git


2. **Instala las dependencias utilizando Composer:** Una vez que hayas clonado el repositorio, navega al directorio del proyecto clonado, Abre tu terminal y ejecuta el siguiente comando para instalar todas las dependencias de PHP a través de Composer:

cd Autos-Colombia

composer install

3. **Crea archivo de configuración de entorno:** Laravel utiliza un archivo  .env para almacenar las variables de entorno del proyecto. Puedes crear una copia del archivo .env.example y renombrarlo como .env. Luego, ajusta las configuraciones según tu entorno.

cp .env.example .env

Ajusta las configuraciones según tu entorno.

4. **Generar una clave de aplicación:** Laravel requiere una clave de aplicación única. Ejecuta el siguiente comando para generarla:

php artisan key:generate

5. **Configurar la base de datos:** Si tu proyecto Laravel utiliza una base de datos, configura las credenciales de la base de datos en el archivo   .env.

Asegúrate de configurar las credenciales de la base de datos en el archivo .env.

6. **Migrar la base de datos:** Si el proyecto Laravel utiliza migraciones de base de datos, ejecuta los siguientes comandos para migrar la base de datos:

php artisan migrate

7. **Servir la aplicación:** Finalmente, puedes servir tu aplicación Laravel localmente ejecutando el siguiente comando:

php artisan serve

Esto iniciará un servidor de desarrollo en tu máquina local. Luego, puedes acceder a tu aplicación a través de la URL que se te proporcionará en la terminal.

## Licencia

Este proyecto está bajo la [Licencia MIT](LICENSE).

---
© 2024 Grupo:
Juan Diego Urrego Gutiérrez,
Juan Gabriel Pineda Mora,
Marco Del Boccio Azuaje.




