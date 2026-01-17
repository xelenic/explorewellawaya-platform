# Explore Wellawaya Platform

A comprehensive tourism and destination management platform for Wellawaya, Sri Lanka. Built with Laravel 12.

## About

Explore Wellawaya is a platform designed to showcase the natural beauty, rich culture, and tourist destinations of Wellawaya, a charming town in the Uva Province of Sri Lanka.

## Features

- **Blog System**: Dynamic blog posts with categories, tags, and rich content
- **Destinations**: Showcase tourist destinations with detailed information, images, and location data
- **Business Registration**: Multi-type business registration system for:
  - Hotels
  - Tour Guides
  - Travel Agencies
  - Passenger Transport Services
  - Social Media Activists
  - Restaurants
  - Handy Crafts
  - Innovations
  - Cultured Sectors
  - Translators
  - Mass Media
  - Experience Providers
- **Admin Panel**: Full admin dashboard for managing content, users, and permissions
- **User Authentication**: Secure user authentication and role-based access control

## Technology Stack

- **Framework**: Laravel 12
- **PHP**: 8.2+
- **Database**: SQLite (can be configured for MySQL/PostgreSQL)
- **Frontend**: Blade Templates with Tailwind CSS
- **Authentication**: Laravel Auth with Spatie Permissions

## Installation

1. Clone the repository:
```bash
git clone https://github.com/xelenic/explorewellawaya-platform.git
cd explorewellawaya-platform
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Configure environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Run migrations:
```bash
php artisan migrate
```

5. Build assets:
```bash
npm run build
```

6. Start the development server:
```bash
php artisan serve
```

## Usage

- Access the website at: `http://localhost:8000`
- Admin panel: `http://localhost:8000/admin/dashboard`
- Blog: `http://localhost:8000/blog`
- Destinations: `http://localhost:8000/destinations`
- Business Registration: `http://localhost:8000/business-registration`

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contact

For more information about Wellawaya tourism, visit [Explore Wellawaya](https://github.com/xelenic/explorewellawaya-platform).
