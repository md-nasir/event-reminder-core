
# Event Reminder Application Core Service with Admin Portal

This application serves as the core backend service for managing events and sending reminders. It includes an admin portal for creating, managing, and scheduling event reminders, as well as API endpoints for interacting with the frontend.

## Features
- **Events CRUD**: Create, Read, Update, and Delete events.
- **Specific Event Reminders**: Send reminders for individual events.
- **Bulk Event Reminders from CSV**: Import events from a CSV file and send bulk reminders.

## Prerequisites
- PHP: `^8.2`
- Laravel Framework: `^11.9`

## Setup Guide

1. **Clone the repository:**
   ```bash
   git clone https://github.com/md-nasir/event-reminder-core.git
   ```
2. **Navigate to the project directory:**
   ```bash
   cd event-reminder-core
   ```
3. **Install dependencies:**
   ```bash
   composer install
   ```
4. **Set up environment configuration:**
   - Copy `.env.example` to `.env` and configure the necessary details.
5. **Generate application key:**
   ```bash
   php artisan key:generate
   ```
6. **Run migrations with seed data:**
   ```bash
   php artisan migrate:fresh --seed
   ```
7. **Install and build frontend assets:**
   ```bash
   npm install
   npm run build
   
 8. **Finally run the server:**
     ```bash
     php artisan serve
     ``` 

Now, you can register a new account, log in, and start using the app!

## Available APIs

- **Get Completed Events**: `{base_url}/api/v1/events/completed`
- **Get Upcoming Events**: `{base_url}/api/v1/events/upcoming`

## Frontend Setup

For the frontend, you can set up the headless Vue application found here:
[Event Reminder PWA Frontend](https://github.com/md-nasir/event-reminder-pwa)

## Screenshots
Screenshots of the application are included in the `/screenshots` directory.

---

Enjoy using the Event Reminder Application Core!
