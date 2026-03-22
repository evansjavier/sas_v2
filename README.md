# Simple Aviation Solution (SAS V2)

Sistema de gestión centralizada para escuelas de vuelo. SAS V2 unifica la administración de entrenamientos teóricos y en simulador, optimizando la planificación, asignación de recursos y el seguimiento de los alumnos bajo una misma estructura.

## Características Principales

### 1. Gestión de Usuarios y Roles Flexibles
- **Múltiples Roles:** Un usuario (Admin, Instructor, Alumno, etc.) puede tener más de un rol simultáneamente a través de una tabla pivot (`role_user`).
- **Atribuciones:** Los instructores pueden tener certificaciones específicas (ej. SFI320, TRI330) a través de la relación `attribution_user`.

### 2. Infraestructura y Recursos
- **Sucursales (Branches):** Gestión de bases de operación.
- **Aulas (Classrooms) y Simuladores (Simulators):** Los recursos físicos disponibles para la programación de clases teóricas y sesiones de entrenamiento sintético.

### 3. Planificación Académica
- **Cursos (Courses):** Programas de estudio globales (ej. Habilitación de Tipo A320).
- **Programas Reutilizables (Programs):** Módulos que componen un curso. Un mismo programa puede reutilizarse en varios cursos (`course_program`). Existen cuatro tipos: `theory`, `synthetic`, `ffs` y `flight`.
- **Lecciones (Lessons):** Instancias específicas dentro de un programa.

### 4. Inscripciones y Clases (Grupos)
- **Grupos (Groups):** Cohortes o promociones de alumnos.
- **Inscripciones (Enrollments):** Registro de a qué grupo/curso está asignado el estudiante.

### 5. Programación Centralizada (Bookings)
- **Bookings:** El corazón del sistema para la programación de recursos. Aquí se integran tanto las clases en aulas (teoría) como las reservas en simuladores o vuelos. Soporta tipos de eventos unificados (`theory`, `synthetic`, `ffs`, `flight`).
- **Participantes (Booking Participants):** Asignación de todos los instructores y alumnos vinculados a una reservación particular.

### 6. Seguimiento (Training Records)
- **Calificaciones y Registros:** Una vez ejecutado un `Booking`, los instructores generan un `Training Record` detallado por cada alumno, registrando su progreso, anotaciones, tipo de sesión, estatus (pass/fail) y nota final evaluativa (grade numérico).

## Tecnologías
- **Backend:** Laravel 12.x (PHP 8.4)
- **Base de Datos:** MySQL / MariaDB (Relacional)
- **ORM:** Eloquent de relaciones Polimórficas (Documentos), y Pivots con datos extra.

## Configuración del Entorno de Desarrollo

1. Clonar el repositorio.
2. Hacer una copia del archivo de configuración inicial: `cp .env.example .env`
3. Instalar dependencias backend: `composer install`
4. Generar la key de Laravel: `php artisan key:generate`
5. Configurar la base de datos en el archivo `.env`.
6. Migrar la base de datos (Estructura final): `php artisan migrate:fresh`

