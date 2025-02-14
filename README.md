## 📌 Introducción
`clicko/reporterrors` es un paquete de Laravel que gestiona la captura y el reporte de errores enviándolos por correo electrónico. Automatiza el manejo de excepciones y los envía a un correo configurado en el sistema.

---

## 🚀 Instalación

1. **Requerir el paquete mediante Composer:**
   ```sh
   composer require clicko/reporterrors

2. **Sino funciona:**
   ```sh
   composer require "clicko/reporterrors @dev"

3. **Publicar la configuración del paquete:**
   ```sh
   php artisan vendor:publish --tag=config

4. **Configurar el correo de destino en el archivo .env**
   ```sh
   MAIL_TO_DEVELOPMENT=ejemplo@ejemplo.com

5. **Limpiar y actualizar la configuración:**
   ```sh
   php artisan config:clear
   php artisan cache:clear