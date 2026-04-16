# ⭐ PHP Product Rating App

[![PHP](https://img.shields.io/badge/PHP-8.x-blue)]()
[![MySQL](https://img.shields.io/badge/MySQL-Database-orange)]()
[![Composer](https://img.shields.io/badge/Composer-Dependency%20Manager-brown)]()
[![BladeOne](https://img.shields.io/badge/BladeOne-Template%20Engine-green)]()

Aplicación web desarrollada en **PHP** que permite a los usuarios **valorar productos mediante un sistema de estrellas**.
Implementa una arquitectura organizada con separación entre **modelo, acceso a datos y vistas**, siguiendo buenas prácticas de desarrollo backend.

---

## 📌 Objetivo del proyecto

El objetivo de este proyecto es desarrollar una aplicación web en **PHP** que permita a los usuarios **valorar productos mediante un sistema de estrellas**, almacenando las valoraciones en una base de datos y calculando automáticamente la media de votos.

Este proyecto fue desarrollado como trabajo final del módulo **Desarrollo Web en Entorno Servidor (DWES)** y tiene como finalidad demostrar la aplicación práctica de conceptos como:

- **Programación orientada a objetos en PHP**
- **Acceso a bases de datos con PDO**
- Uso del patrón **DAO (Data Access Object)**
- Separación entre lógica de aplicación, acceso a datos y presentación
- Uso de un **motor de plantillas (BladeOne)**
- Integración entre **frontend (JavaScript)** y **backend (PHP)**

Además, el proyecto busca simular una **estructura de aplicación real**, aplicando buenas prácticas de organización del código y gestión de dependencias con **Composer**.

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

```bash
composer install
```

# ⭐ Sistema de valoración

El sistema de estrellas permite a los usuarios votar productos.

Funciona mediante:

-JavaScript para capturar la interacción del usuario

-Peticiones al servidor para registrar el voto

-Persistencia en base de datos

-Cálculo automático de la media de votos

Las estrellas se generan con un helper personalizado ubicado en:

src/estrellas_helper.php


### 🧩 Programación orientada a objetos

- Diseño de clases de dominio como `Producto`, `Usuario` y `Voto`.
- Aplicación de **encapsulación** para proteger los datos y gestionar la lógica mediante métodos.
- Organización del código en componentes reutilizables y mantenibles.

### 🗄 Acceso a datos y persistencia

- Implementación del patrón **DAO (Data Access Object)** para separar la lógica de negocio del acceso a base de datos.
- Uso de **PDO** para realizar consultas seguras y gestionar conexiones con la base de datos.
- Gestión de inserciones, consultas y cálculos de valoraciones.

### 🧱 Estructuración de un proyecto backend

Organización del proyecto en distintas capas:

- **Modelo** → representación de entidades del dominio  
- **DAO** → acceso a base de datos  
- **Vistas** → interfaz de usuario  
- **Lógica de aplicación** → coordinación entre componentes  

Este enfoque facilita el mantenimiento, la escalabilidad y la claridad del código.

### 🎨 Separación entre lógica y presentación

- Uso del motor de plantillas **BladeOne** para separar el código PHP del HTML.
- Creación de plantillas reutilizables para mejorar la organización de las vistas.

### ⭐ Implementación de lógica de negocio

- Desarrollo de un sistema de **valoración de productos mediante estrellas**.
- Registro de votos asociados a usuarios.
- Cálculo automático de la **media de valoraciones por producto**.

### 🔗 Integración frontend y backend

- Uso de **JavaScript** para gestionar la interacción del usuario con el sistema de valoración.
- Comunicación entre el frontend y el backend para registrar votos y actualizar resultados.

### 📦 Gestión de dependencias

- Uso de **Composer** para instalar y gestionar librerías externas.
- Organización del proyecto siguiendo estándares habituales en aplicaciones PHP.

---

## 🚀 Posibles mejoras futuras

- Implementar registro de nuevos usuarios.
- Añadir un sistema de comentarios en los productos.
- Incorporar filtros y búsqueda de productos.
- Implementar paginación en el listado.
- Añadir medidas de seguridad como **protección CSRF**.
- Mejorar la interfaz utilizando **Bootstrap** o **Tailwind CSS**.
- Crear una **API REST** para gestionar productos y valoraciones.

  ---
## 👩‍💻 Autora

Proyecto desarrollado por **[Sandra]** como parte de mi formación en **Desarrollo de Aplicaciones Web (DAW)**.

**[Sandra González Díaz](https://github.com/sandragonzalezdiaz1)**

  



