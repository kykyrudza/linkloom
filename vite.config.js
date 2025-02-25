import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0', // Делаем сервер доступным для всех интерфейсов
        port: 3000,
        hmr: {
            host: '192.168.0.108', // Ваш локальный IP-адрес
            port: 3000, // Порт, который будет использовать HMR (тот же самый)
        },
    }
});
