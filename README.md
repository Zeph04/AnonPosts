Install Dependencies

```bash
composer install
npm install && npm run build
```

Configure Environment

Copy the example environment file:

```bash
cp .env.example .env
```

Update your `.env` file with database credentials:

```
DB_DATABASE=anon
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

Run Migrations and Seed Admin User

```bash
php artisan migrate
php artisan db:seed --class=AdminUserSeeder
```

Serve the Application

```bash
php artisan serve
```

Visit: `http://localhost:8000`

---

## 👤 Admin Credentials

```
Email: admin@example.com
Password: password
```

> You can customize this in `database/seeders/AdminUserSeeder.php`.

## 📄 License

This project is open-source and available under the [MIT license](LICENSE).
