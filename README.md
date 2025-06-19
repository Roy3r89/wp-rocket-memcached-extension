# 🚀 WP Rocket Memcached Extension

> **EN:** Extend WP Rocket with Memcached support, asynchronous purging, multi-server management, and admin UI.  
> **ES:** Extiende WP Rocket con soporte Memcached, purgado asíncrono, administración multi-servidor e interfaz de administración.

---

## 🌐 Features | Características

| EN (English)                           | ES (Español)                          |
|----------------------------------------|----------------------------------------|
| ✅ Integrates Memcached with WP Rocket | ✅ Integra Memcached con WP Rocket     |
| ✅ Asynchronous purge system           | ✅ Sistema de purgado asíncrono        |
| ✅ Multi-server Memcached support      | ✅ Soporte para múltiples servidores   |
| ✅ Admin dashboard UI                  | ✅ Interfaz de administración          |
| ✅ Real-time stats and logs            | ✅ Estadísticas y logs en tiempo real |
| ✅ Fully translatable (.pot/.po/.mo)   | ✅ Totalmente traducible (.pot/.po/.mo)|

---

## 📦 Installation (ZIP)

### 🇪🇸 Español

1. Descarga el archivo `.zip` del plugin desde la sección de [Releases](https://github.com/Roy3r89/wp-rocket-memcached-extension/releases).
2. Accede a tu panel de WordPress.
3. Ve a **Plugins → Añadir nuevo → Subir plugin**.
4. Selecciona el archivo `.zip` y haz clic en **Instalar ahora**.
5. Activa el plugin después de la instalación.

---

### 🇬🇧 English

1. Download the `.zip` plugin file from the [Releases](https://github.com/Roy3r89/wp-rocket-memcached-extension/releases) section.
2. Go to your WordPress admin panel.
3. Navigate to **Plugins → Add New → Upload Plugin**.
4. Select the `.zip` file and click **Install Now**.
5. Activate the plugin after installation.

---

## 🖥️ Admin Panel | Panel de Administración

Find the plugin menu at:  
**`Settings → WP Rocket Memcached`**

There you can:

| EN                                      | ES                                         |
|----------------------------------------|-------------------------------------------|
| 🔹 See cache stats & Memcached status | 🔹 Ver estadísticas y estado del sistema  |
| 🔹 Add/remove Memcached servers        | 🔹 Añadir/quitar servidores Memcached      |
| 🔹 Set cache TTL and key prefix        | 🔹 Definir TTL y prefijo de claves         |
| 🔹 Manually purge cache or logs        | 🔹 Borrar caché o logs manualmente         |

---

## 🌍 Languages | Idiomas

- 🇬🇧 English (default)
- 🇪🇸 Español
- 📁 Ready for translation with `.pot` file in `/languages/`

---

## 📝 Requirements | Requisitos

- PHP 7.4 or higher
- WordPress 5.8+
- WP Rocket (installed & activated)
- Memcached PHP extension enabled

---

## 🛠️ Developer Notes

- Custom log file stored in `wp-content/uploads/memcached.log`
- Cache key index stored optionally in custom table
- Hooks available for extending purge system

---

## 📜 License | Licencia

MIT © [Roy3r89](https://github.com/Roy3r89)

---

## 🤝 Contributing | Contribuir

> PRs and translations are welcome!  
> ¡Se aceptan Pull Requests y traducciones!
