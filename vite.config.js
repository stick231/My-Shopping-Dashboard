import { defineConfig } from 'vite';
import { ngrok } from 'vite-plugin-ngrok'; // Используйте именованный импорт
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        ngrok('2rFPhLlerN56riEZLjhL6IaBiJY_7Bz4GSEs2kYDvUFtJiPT9'), // Вставьте ваш токен ngrok
        laravel({
            input: [],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            clientPort: 443, // Используйте 443 для HTTPS или 80 для HTTP
        }
    }
});
