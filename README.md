# Portal de Adopciones

Proyecto web desarrollado con **Laravel 12 + Livewire + TailwindCSS**.

Me permite gestionar la adopcion de animales (perros o gatos), (de momento) a traves solicitudes, hay un control de roles (admin / usuario). no hace falta que usuarios se registren para ver los animales ni para enviar las solicitudes.
Los administrdores si que tienen un login para poder gestionar las adopciones.

---

## Funcionalidades

### Los usuarios

- Pueden ver los animales disponibles y enviar sus solicitudes si lo desean, ademas de ver el
estado de adopción de los mismos.

### Los administradores

- Podran crear y editar los animales diponibles
- Ver y gestionar las solicitudes de adopcion
- Aprobar o rechazar dichas solicitudes
- Acceder a un dashboard con las estadísticas del portal

---

## Roles

- **Admin**: gestiona animales y solicitudes
- **Usuario**: puede solicitar adopciones

---

## Imágenes

A los animales  se les pueden asociar una imagen mediante URL.

---

## Las tecnologías usadas son

- Laravel 12
- Livewire
- Tailwind CSS
- SQLite
- PHP 8.4

---

## La instalación

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

## Usuario Admin de prueba

Email: [admin@test.com](mailto:admin@test.com)
Password: password

---

## Autora

Hebe Stark

---
