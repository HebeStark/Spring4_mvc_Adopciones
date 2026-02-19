# Plataforma de Gestión de Adopciones de Animales

Esta aplicación Web desarrollada con Laravel 12 – Arquitectura MVC con separación Público / Administrador
Descripción General del Proyecto

## Descripción General del Proyecto

La Plataforma de Gestión de Adopciones de Animales es una aplicación web desarrollada como proyecto académico con el objetivo de implementar un sistema estructurado para la publicación, gestión y solicitud de adopciones de animales.

El sistema distingue claramente entre:

Zona pública, donde los usuarios pueden visualizar animales disponibles y enviar solicitudes de adopción.

Zona administrativa, accesible únicamente mediante autenticación, desde donde se gestiona el CRUD completo de animales, las solicitudes recibidas y las métricas del sistema.

El proyecto no pretende simular un sistema empresarial completo, sino demostrar una implementación sólida de:

Arquitectura MVC

Control de acceso

Flujo de negocio estructurado

Gestión de estados

Interactividad controlada

Diseño coherente y responsive

---

## Stack Tecnológico

Backend

Laravel 12.43.1

PHP 8.4.12

Base de Datos

SQLite
Se ha utilizado SQLite por su ligereza y facilidad de configuración en entorno académico, permitiendo una base de datos funcional sin necesidad de servidor externo.

Frontend

Blade Templates

Tailwind CSS vía CDN

Tailwind se emplea para mantener consistencia visual, diseño responsive basado en grid y sistema de utilidades claro sin necesidad de configuración compleja.

### Arquitectura del Sistema

- Patrón MVC

El proyecto sigue el patrón Modelo – Vista – Controlador, distribuyendo responsabilidades de la siguiente manera:

Modelos: Representan entidades como Animal y SolicitudAdopcion.

Controladores: Gestionan la lógica de negocio y validaciones.

Vistas (Blade): Presentan la información estructurada mediante componentes visuales coherentes.

Esto garantiza separación de responsabilidades, mantenibilidad y escalabilidad.

-Organización de Rutas
Las rutas están organizadas en dos bloques principales:

Rutas públicas

Rutas bajo prefijo /admin

El uso de prefijo permite una segmentación clara entre el acceso público y el panel administrativo.

Se utiliza Route Model Binding, lo que simplifica la obtención automática de modelos en los controladores, reduciendo errores y mejorando legibilidad.

-Middleware y Control de Acceso

El acceso al panel administrativo está protegido mediante:

Middleware auth

Método isAdmin() en el modelo User

Este enfoque garantiza que únicamente usuarios con rol administrador puedan acceder a la gestión interna del sistema.

El login está restringido exclusivamente para administradores.

### Modelado y Base de Datos

-Entidades principales

Animal

SolicitudAdopcion

User

Estados de solicitud

Las solicitudes pueden encontrarse en uno de los siguientes estados:

pendiente

aprobada

rechazada

El sistema gestiona la lógica de aprobación, impidiendo solicitudes duplicadas para un mismo animal por parte del mismo usuario.

Se implementan validaciones tanto a nivel de aplicación como a nivel lógico para preservar la integridad de los datos.

---

## Flujo Funcional de la Aplicación

-Flujo Público

El usuario visualiza los animales disponibles.

Puede enviar una solicitud de adopción.

El sistema valida la información.

Se evita el envío de solicitudes duplicadas.

La solicitud queda en estado pendiente.

-Flujo Administrativo

El administrador accede mediante login.

Gestiona el CRUD completo de animales.

Visualiza y procesa solicitudes.

Puede aprobar o rechazar solicitudes.

El dashboard muestra métricas del sistema.

---

## Uso Estratégico de Livewire

Livewire se implementa exclusivamente en:

Gestión dinámica de solicitudes.

Dashboard con métricas en tiempo real.

No se utiliza en todo el proyecto para:

Mantener claridad arquitectónica.

No sobrecargar la aplicación innecesariamente.

Demostrar dominio del MVC tradicional antes de incorporar reactividad.

Su implementación mejora la experiencia administrativa sin alterar la estructura base del sistema.

---

## Decisiones Técnicas Clave

Separación estricta entre público y administrador.

Uso de prefijo /admin para segmentación clara.

Middleware + método isAdmin() para control de acceso.

Uso de SQLite por simplicidad en entorno académico.

Gestión de imágenes locales mediante asset().

Validaciones en controladores.

Estados definidos explícitamente para solicitudes.

Prevención de solicitudes duplicadas.

Cada decisión responde a criterios de claridad, coherencia estructural y control del flujo de negocio.

---

## Decisiones de Diseño

Paleta visual unificada basada en violet-700 y violet-800.

Diseño basado en grid responsive.

Uso consistente de cards.

Jerarquía visual clara.

Feedback visual en acciones administrativas.

Coherencia tipográfica y espaciado uniforme.

El diseño prioriza legibilidad, claridad y experiencia de usuario sin depender de configuraciones complejas.

## Estructura del Proyecto

El proyecto mantiene una estructura organizada:

app/Models

app/Http/Controllers

app/Livewire

resources/views

routes/web.php

Las vistas administrativas se encuentran separadas de las públicas, manteniendo coherencia estructural.

## La instalación y Puesta en Marcha

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve


La aplicación se ejecuta en:

http://127.0.0.1:8000

```

---

## Usuario Admin de prueba

Email: [admin@admin.com](mailto:admin@test.com)
Password: password

---

## Autora

Hebe Stark

---
