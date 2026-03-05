# ⭐ PHP Product Rating App

[![PHP](https://img.shields.io/badge/PHP-8.x-blue)]()
[![MySQL](https://img.shields.io/badge/MySQL-Database-orange)]()
[![Composer](https://img.shields.io/badge/Composer-Dependency%20Manager-brown)]()
[![BladeOne](https://img.shields.io/badge/BladeOne-Template%20Engine-green)]()

Aplicación web desarrollada en **PHP** que permite a los usuarios **valorar productos mediante un sistema de estrellas**.

Este proyecto fue desarrollado como **proyecto final del módulo Desarrollo Web en Entorno Servidor (DWES)** y forma parte de mi **portfolio como desarrolladora web junior**.

La aplicación implementa una arquitectura organizada con separación entre **modelo, acceso a datos y vistas**, siguiendo buenas prácticas de desarrollo backend.

---

# ✨ Funcionalidades

- 🔐 Login de usuarios
- 📦 Listado de productos
- ⭐ Sistema de valoración mediante estrellas
- 👤 Registro de votos por usuario
- 📊 Cálculo automático de valoración media
- 🖥 Interfaz dinámica con JavaScript
- 🎨 Renderizado de vistas con BladeOne
- 🗄 Persistencia de datos en MySQL

---

# 🧱 Arquitectura del proyecto

El proyecto sigue una estructura organizada para separar responsabilidades y facilitar el mantenimiento.

php-product-rating-app
│
├── public/ # Punto de entrada de la aplicación
│ ├── index.php
│ ├── productos.php
│ └── js/
│
├── src/
│ ├── BD/ # Conexión a la base de datos
│ ├── DAO/ # Acceso a datos
│ │ ├── ProductoDao.php
│ │ ├── UsuarioDao.php
│ │ └── VotoDao.php
│ │
│ ├── Modelo/ # Entidades del dominio
│ │ ├── Producto.php
│ │ ├── Usuario.php
│ │ └── Voto.php
│ │
│ ├── bd_esquema/ # Script de base de datos
│ │ └── valoraciones.sql
│ │
│ ├── estrellas_helper.php
│ └── error_handler.php
│
├── vistas/ # Plantillas Blade
│ ├── app.blade.php
│ ├── login.blade.php
│ ├── productos.blade.php
│ └── cnxderror.blade.php
│
├── cache/ # Cache de plantillas Blade
└── composer.json

---

# 🛠 Tecnologías utilizadas

- **PHP**
- **MySQL**
- **PDO**
- **JavaScript**
- **BladeOne**
- **Composer**

Conceptos aplicados:

- Programación orientada a objetos
- Patrón **DAO**
- Separación de capas
- Renderizado con motor de plantillas
- Gestión de dependencias

---

# ⚙️ Instalación

## 1️⃣ Clonar el repositorio

```bash
git clone https://github.com/tuusuario/php-product-rating-app.git

## 2️⃣ Instalar dependencias
composer install

---

# ⭐ Sistema de valoración

El sistema de estrellas permite a los usuarios votar productos.

Funciona mediante:

JavaScript para capturar la interacción

Peticiones al servidor

Persistencia en base de datos

Cálculo de media de votos

Las estrellas se generan con un helper personalizado:

src/estrellas_helper.php

