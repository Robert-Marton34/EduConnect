# EduConnect

A full-stack classroom management web app built with Laravel. Teachers create subjects and tasks; students enroll in subjects, submit solutions, and get graded — all behind role-based access control.

## Features

- **Authentication** — registration, login, email verification, and password reset via Laravel Breeze
- **Role-based access** — every user is either a `teacher` or a `student`, with separate dashboards and permissions
- **Teacher tools**
  - Create, edit, and delete subjects
  - Add tasks to a subject
  - View enrolled students and their submitted solutions
- **Student tools**
  - Browse and enroll in available subjects
  - View subjects they're enrolled in and leave them
  - Submit solutions to assigned tasks
- **Authorization policies** — subject/task ownership is enforced so teachers can only manage their own content

## Tech Stack

- **Backend:** Laravel 12, PHP 8.2+
- **Frontend:** Blade templates, Tailwind CSS, Alpine.js, Vite
- **Database:** SQLite (default), swappable for MySQL/PostgreSQL via `.env`
- **Auth scaffolding:** Laravel Breeze
- **Testing:** Pest

## Getting Started

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js and npm

### Installation

```bash
# Clone the repo
git clone https://github.com/your-username/educonnect.git
cd educonnect

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Set up environment file
cp .env.example .env
php artisan key:generate

# Create the SQLite database file
touch database/models.sqlite

# Run migrations
php artisan migrate

# (Optional) Seed sample data — creates two teacher accounts,
# students, subjects, tasks, and solutions
php artisan db:seed
```

### Running the app

```bash
# Terminal 1 — Laravel server
php artisan serve

# Terminal 2 — Vite dev server (for CSS/JS)
npm run dev
```

Visit `http://localhost:8000`.

### Test accounts (after seeding)

| Role    | Email               | Password   |
|---------|----------------------|------------|
| Teacher | smith@example.com     | password   |
| Teacher | johnson@example.com   | password   |

New registrations default to the `student` role.

## Project Structure

```
app/
├── Http/Controllers/     # SubjectController, TaskController, StudentController, SolutionController
├── Http/Middleware/      # RoleMiddleware (teacher/student route protection)
├── Models/               # User, Subject, Task, Solution
├── Policies/             # Authorization rules for subjects/tasks
database/
├── migrations/           # Schema for users, subjects, tasks, solutions
├── seeders/              # Sample data for local development
resources/views/
├── teacher/              # Teacher dashboard, subject & task views
├── student/              # Student dashboard, enrollment & submission views
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
