# Job Portal

A web-based Job Portal built with **Laravel** and **Blade** that connects job seekers with employers through a simple and user-friendly platform. The system provides dedicated dashboards and features for three different roles: **Admin**, **Company**, and **User**.

## Features

### User (Job Seeker)
- Register and log in
- Manage personal profile
- Browse and search job listings
- View job details
- Apply for jobs
- Track application history
- Save favorite jobs

### Company (Employer)
- Register and log in
- Manage company profile
- Create, edit, and delete job postings
- View applications for posted jobs
- Manage recruitment process

### Admin
- Dashboard overview
- Manage users
- Manage companies
- Manage job postings
- Monitor system activities

## Tech Stack

- **Framework:** Laravel
- **Template Engine:** Blade
- **Database:** MySQL
- **Frontend:** HTML, CSS, Bootstrap, JavaScript
- **Authentication:** Laravel Authentication

## Project Structure

```
job-portal/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
│   ├── views/
│   ├── css/
│   └── js/
├── routes/
├── storage/
├── tests/
└── vendor/
```

## Installation

### Clone the repository

```bash
git clone https://github.com/solinda-cheab/job-portal.git
cd job-portal
```

### Install dependencies

```bash
composer install
npm install
```

### Configure environment

```bash
cp .env.example .env
```

Update your database credentials in `.env`.

### Generate application key

```bash
php artisan key:generate
```

### Run migrations

```bash
php artisan migrate
```

If your project includes seeders:

```bash
php artisan db:seed
```

### Start the development server

```bash
php artisan serve
```


## Roles

| Role | Description |
|------|-------------|
| Admin | Manages the entire system, users, companies, and job postings. |
| Company | Posts and manages job vacancies and reviews applications. |
| User | Searches for jobs and submits applications. |

## Future Improvements

- Resume upload (PDF)
- Email notifications
- Advanced job filtering
- Company verification
- Saved searches
- Interview scheduling
- Analytics dashboard

## Contributors

Solinda Cheab

## License

This project is developed for educational purposes.
