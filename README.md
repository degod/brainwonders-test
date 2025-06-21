# School Partners CodeIgniter App

This project is a simple School Partners management system built with CodeIgniter 3, styled using Bootstrap, and containerized with Docker.

## Features

- List school partners with pagination and search
- Create new partner
- Edit existing partner
- Delete partner
- Uses MySQL as the database
- phpMyAdmin for DB management

## Getting Started

### Prerequisites

- Docker and Docker Compose installed.
- Docker up and running
- Shell terminal

### Setup Instructions

1. Clone the project:

   ```bash
   git clone https://github.com/degod/brainwonders-test.git
   cd brainwonders-test
   ```

2. Start the containers:

   ```bash
   docker compose up --build -d
   ```

   This will start:

   - Nginx (http://localhost:9090)
   - PHP (running CodeIgniter app)
   - MySQL (port 3306)
   - phpMyAdmin (http://localhost:9091)

3. Database Setup:

   - Visit phpMyAdmin at http://localhost:9091
   - Login with:
     - Username: root
     - Password: root
   - Create the database brainwonders_db (or it will be auto-created via container)
   - Import database/schema.sql if you have it.

4. App Configuration:
   Edit `application/config/config.php`:

   ```php
   $config['base_url'] = 'http://localhost:9090/';
   ```

   Edit `application/config/database.php`:

   ```php
   'hostname' => 'db',
   'username' => 'bw_user',
   'password' => 'bw_pass',
   'database' => 'brainwonders_db',
   'dbdriver' => 'mysqli',
   ```

## Testing

Visit the app at http://localhost:9090 or navigate to `/partners` to view, create, or edit partners.

## Common Issues (Ignore this - Everything works)

- If URLs redirect to container IPs, make sure `base_url` is correctly set to `http://localhost:9090/`
- `mysqli_init()` errors usually mean missing extensions. Make sure your Dockerfile for PHP includes:
  ```dockerfile
  RUN docker-php-ext-install mysqli pdo pdo_mysql
  ```

## Directory Structure (HMVC Pattern)

```
/docker
  /nginx
    default.conf
  /php
    Dockerfile
/application
  /modules
    /SchoolPartners
      /controllers/SchoolPartners.php
      /models/SchoolPartnerRepository.php
      /views/list.php
      /views/form.php
```

## Docker Services

| Service    | Port | Description         |
| ---------- | ---- | ------------------- |
| Nginx      | 9090 | Web server          |
| PHP        | -    | Application runtime |
| MySQL      | 3306 | Database            |
| phpMyAdmin | 9091 | DB management tool  |

## Author

Created by DeGod. Contributions welcome!

## Contributing

If you encounter bugs or wish to contribute, please follow these steps:

- Fork the repository and clone it locally.
- Create a new branch (`git checkout -b feature/fix-issue`).
- Make your changes and commit them (`git commit -am 'Fix issue'`).
- Push to the branch (`git push origin feature/fix-issue`).
- Create a new Pull Request against the `main` branch, tagging `@degod`.

## Contact

For inquiries or assistance, you can reach out to Godwin Uche:

- `Email:` degodtest@gmail.com
- `Phone:` +2348024245093
