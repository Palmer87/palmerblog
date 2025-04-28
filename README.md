# Palmer Blog

A modern blog application built with Laravel 12 and Vue.js.

## 🚀 Features

- Modern Laravel 12 backend
- Vue.js frontend with Vite
- Responsive design
- Blog post management
- User authentication
- Database migrations and seeding
- Docker support
- Testing setup with PHPUnit

## 📋 Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js and npm
- MySQL or SQLite
- Docker (optional)

## 🛠️ Installation

1. Clone the repository:
```bash
git clone https://github.com/yourusername/palmerblog.git
cd palmerblog
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install JavaScript dependencies:
```bash
npm install
```

4. Create environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure your database in `.env` file

7. Run migrations:
```bash
php artisan migrate
```

8. Start the development server:
```bash
php artisan serve
```

9. In a separate terminal, start Vite:
```bash
npm run dev
```

## 🐳 Docker Support

The project includes a Dockerfile for containerization. To build and run with Docker:

```bash
docker build -t palmerblog .
docker run -p 8000:8000 palmerblog
```

## 🧪 Testing

Run the test suite:

```bash
php artisan test
```

## 🔧 Development

The project uses Laravel's built-in development tools:

- Laravel Debugbar for debugging
- Laravel IDE Helper for better IDE support
- Laravel Pint for code style fixing
- Laravel Sail for Docker development environment

## 📝 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📞 Support

For support, please open an issue in the GitHub repository.
