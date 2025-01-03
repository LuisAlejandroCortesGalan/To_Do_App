# To Do App

Este es un proyecto de una aplicación de gestión de tareas. Permite organizar tareas con diferentes estados, actualizar la información y eliminar tareas. Los usuarios pueden introducir, actualizar y visualizar tareas que contienen un título, una descripción, una fecha y un estado.

## Características

- **Visualización de tareas:** Las tareas se presentan en diferentes colores según su estado (Urgente, Pendiente, Ejecutando, Finalizado).
- **Filtrado de tareas:** Las tareas se ordenan por estado (con prioridad para Urgente) y por fecha.
- **Gestión de tareas:** El usuario puede agregar nuevas tareas, editar tareas existentes y eliminar tareas.
- **Interfaz amigable:** Uso de Bootstrap para la estructura de la interfaz.

## Tecnologías utilizadas

- **PHP:** Para el procesamiento de la lógica del lado del servidor y la interacción con la base de datos.
- **MySQL:** Para almacenar la información de las tareas.
- **Bootstrap:** Para el diseño y la estructura responsiva de la interfaz de usuario.
- **HTML/CSS:** Para la estructura básica y la personalización de la interfaz de usuario.

## Requisitos

- Un servidor que soporte PHP.
- Una base de datos MySQL configurada con la tabla `app`.
- Archivos de conexión PHP (`connection.php` y `colores.php`).

## Instalación

1. Clona este repositorio en tu máquina local o servidor.
2. Configura la conexión a la base de datos en el archivo `connection.php`.
3. Asegúrate de tener la tabla `app` creada en tu base de datos. Aquí tienes un ejemplo de SQL para crearla:

```sql
CREATE TABLE `app` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `estado` VARCHAR(20) NOT NULL,
  `titulo` VARCHAR(100) NOT NULL,
  `estado_user` VARCHAR(20) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `fecha_user` DATE NOT NULL
);
