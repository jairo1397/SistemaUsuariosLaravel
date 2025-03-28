# Proyecto Laravel 12 - Sistema de Autenticación por Roles

Este es un proyecto basado en **Laravel 12** que implementa un sistema de autenticación con roles de **Administrador** y **Estudiante**, permitiendo inicios de sesión independientes y la gestión de sesiones mediante cookies.

## 📌 Requisitos

Antes de instalar el proyecto, asegúrese de tener instalado:

- **PHP 8.1** o superior
- **Composer**
- **SQLite** o cualquier otra base de datos compatible con Laravel
- **Node.js y npm** (opcional, si desea compilar assets frontend)

## 🚀 Instalación

Siga estos pasos para instalar el proyecto en su entorno local:

### 1️⃣ Clonar el repositorio
```sh
git clone https://github.com/jairo1397/SistemaUsuariosLaravel
cd SistemaUsuariosLaravel
```

### 2️⃣ Instalar dependencias de PHP
```sh
composer install
```

### 3️⃣ Configurar el entorno
Copiar el archivo de entorno y configurar las variables necesarias:
```sh
cp .env.example .env
```
Generar la clave de aplicación:
```sh
php artisan key:generate
```

### 4️⃣ Configurar la base de datos
El proyecto usa **SQLite** por defecto. Cree un archivo `database.sqlite` en la carpeta `database`:
```sh
touch database/database.sqlite
```
En el archivo `.env`, asegúrese de que la configuración sea:
```
DB_CONNECTION=sqlite
DB_DATABASE=/database/database.sqlite
```

### 5️⃣ Ejecutar migraciones
```sh
php artisan migrate
```

### 6️⃣ Iniciar el servidor de desarrollo
```sh
php artisan serve
```
Ahora puede acceder a la aplicación en **http://127.0.0.1:8000**

## 🎯 Uso

- **Registro de usuarios**: Antes de iniciar sesión, cada usuario debe registrarse seleccionando su respectivo rol (**Administrador** o **Estudiante**).
- **Administrador**: Puede ver todos los usuarios registrados y gestionar la aplicación.
- **Estudiante**: Solo accede a su propio dashboard con información restringida a su cuenta.
- **Inicios de sesión independientes**: Cada rol tiene su propia pantalla de inicio de sesión (`/login/admin` y `/login/student`).
- **Restricción de acceso**:  
  - Si un **estudiante** intenta iniciar sesión en la pantalla de **administrador**, el acceso será denegado.  
  - Si un **administrador** intenta iniciar sesión en la pantalla de **estudiante**, el acceso también será denegado.  
- **Sesiones simultáneas**:  
  - Un usuario puede estar autenticado como **administrador** en una pestaña y como **estudiante** en otra sin conflictos.  
  - Se manejan sesiones y cookies separadas para cada rol.


