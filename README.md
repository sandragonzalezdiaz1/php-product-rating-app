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

# 🛠 Tecnologías utilizadas

- **PHP**
- **MySQL**
- **PDO**
- **JavaScript**
- **BladeOne**
- **Composer**

### Conceptos aplicados

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
```
## 2️⃣ Instalar dependencias
composer install

# ⭐ Sistema de valoración

El sistema de estrellas permite a los usuarios votar productos.

Funciona mediante:

-JavaScript para capturar la interacción del usuario

-Peticiones al servidor para registrar el voto

-Persistencia en base de datos

-Cálculo automático de la media de votos

Las estrellas se generan con un helper personalizado ubicado en:

src/estrellas_helper.php





