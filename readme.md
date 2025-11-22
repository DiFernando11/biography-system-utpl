# Página Biográfica con Formulario de Contacto

Proyecto desarrollado como parte de la actividad **“Diseño de Página Web Personal con Formulario de Contacto en PHP”** dentro del tema de la unidad de **Programación en PHP**.

El sitio consiste en una página personal con una breve biografía y un formulario de contacto funcional que guarda los mensajes en una base de datos MySQL y muestra un mensaje de confirmación al usuario.

---

## 📌 Objetivos del proyecto

- Diseñar y desarrollar una página web personal con:
  - Información básica del usuario (biografía, foto, hobbies).
  - Formulario de contacto funcional.
- Aplicar conceptos de:
  - HTML5 y etiquetas semánticas.
  - CSS y/o framework CSS (Tailwind CSS vía CDN en este proyecto).
  - PHP para procesar formularios y conectarse a una base de datos.
  - MySQL para almacenar los mensajes enviados.
- Desplegar el proyecto en un **hosting gratuito**.

---

## 🌐 Enlace al sitio en producción

- Hosting: **InfinityFree**
- URL del proyecto:  
  👉 `<https://difer-utpl.infinityfreeapp.com>`
- Repository: 
  👉 `<https://github.com/DiFernando11/biography-system-utpl>`

---

## 🧱 Características principales

- **Página principal (`index.php`)**

  - Presentación personal.
  - Biografía corta.
  - Foto del usuario.
  - Sección con hobbies o intereses.
  - Enlace al formulario de contacto.

- **Página de contacto (`contact.php`)**

  - Formulario con los campos:
    - Nombre
    - Correo electrónico
    - Mensaje
  - Validación básica en el cliente.
  - Minimo de 8 caracteres para el mensaje y maximo de 120 caracteres.
  - Minimo de 4 caracteres para el nombre y maximo de 40 caracteres.
  - Que el correo sea valido.
  - Procesamiento en el servidor con PHP.
  - Al enviar:
    - Se guarda los datos en la base de datos.
    - Se muestra un mensaje de confirmación al usuario.

- **Base de datos**

  - Motor: MySQL.
  - Tabla para almacenar los mensajes del formulario (ejemplo: `contacts`).
  - Campos típicos: `id`, `name`, `email`, `message`, `created_at`.
  - Script de creación disponible en `sql/schema.sql`.

- **Diseño**
  - Uso de HTML5 semántico.
  - Estilos con CSS / Tailwind CSS (via CDN) para una visualización clara y agradable.

---

## 🛠️ Tecnologías utilizadas

- **Frontend**

  - HTML5
  - Tailwind CSS (CDN)

- **Backend**

  - PHP

- **Base de datos**

  - MySQL

- **Servidor local de desarrollo**

  - MAMP

- **Hosting**
  - InfinityFree

---

## 📁 Estructura del proyecto

```bash
bibliography-system/
├── assets/           # Imágenes, estilos, etc.
├── config/
│   └── config.php    # Configuración de la conexión a la BD (constantes)
├── sql/
│   └── schema.sql    # Script SQL para crear la base de datos/tablas
├── src/
│   └── db.php        # Función para obtener la conexión PDO
├── contact.php       # Página y lógica del formulario de contacto
└── index.php         # Página principal con la información personal
```
