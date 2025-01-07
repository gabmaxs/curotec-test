## Project Description

This project is the backend part of a technical challenge proposed by **Curotec**. The goal of the challenge is to build a real-time collaborative application using **Laravel** and **Vue 3**. The backend handles:

- Data persistence using a database.
- WebSocket functionality with Pusher for real-time updates.
- API endpoints to support frontend functionalities like code execution and video chat.

The challenge focuses on real-time updates, data processing, API design, and robust backend development.

## Project Dependencies

- **PHP** (version 8.2 or higher)
- **Composer**
- **Docker**
- **PostgreSQL**
- **Git**

## Steps to Run the Project

### 1. Checkout the Projects

Clone the frontend and backend repositories to your local machine:

```bash
# Clone the backend repository
git clone https://github.com/gabmaxs/curotec-test

# Clone the frontend repository
git clone https://github.com/gabmaxs/curotec-app
```

### 2. Install Dependencies

Navigate to the backend directory and install the project dependencies using Composer:

```bash
cd <backend-directory>
composer install
```

### 3. Set Up Environment Variables

Configure the environment variables in the `.env` file. Below is an example configuration:

```env
DB_CONNECTION=pgsql
DB_HOST=<your-host>
DB_PORT=5432
DB_DATABASE=<your-database>
DB_USERNAME=<your-user>
DB_PASSWORD=<your-password>

PUSHER_APP_ID=your-pusher-app-id
PUSHER_APP_KEY=your-pusher-key
PUSHER_APP_SECRET=your-pusher-secret
PUSHER_HOST=
PUSHER_PORT=443
```

For details on obtaining Pusher credentials, refer to the [official documentation](https://pusher.com/docs).

### 4. Start a PostgreSQL Database with Docker

If you do not have a local PostgreSQL instance, you can start one using Docker:

```bash
docker run --name curotec_postgres -e POSTGRES_USER=root -e POSTGRES_PASSWORD= -e POSTGRES_DB=curotec_test -p 5432:5432 -d postgres
```

### 5. Run Migrations

Run the database migrations to set up the necessary tables:

```bash
php artisan migrate
```

### 6. Start the Local Development Server

Start the backend development server:

```bash
php artisan serve
```

The backend will be available at: `http://localhost:8000` (or another port specified in the terminal).

Ensure the frontend is also running to enable full application functionality.
