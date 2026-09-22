# www-paxlet-com

Official website portal for **Paxlet** ([paxlet.com](https://paxlet.com)).

Built with PHP 8.3 + Apache, containerized with Docker, and optimized for seamless deployment to **Plesk Obsidian** or standalone Docker environments.

---

## Features

- **PHP Architecture**: Modular templates, dynamic metadata, configurable endpoints.
- **REST Endpoints**:
  - `/api/health` or `/health.php` &mdash; Service health check.
  - `/api/version` &mdash; Current Paxlet specification and website version.
- **Plesk Ready**: Complete `.htaccess` with URL rewrites, gzip compression, caching rules, and security headers.
- **Docker Dev Environment**: Instant local startup with hot reload via Docker Compose.
- **Makefile Automation**: Simple targets for build, run, test, lint, and packaging.

---

## Quick Start (Docker & Makefile)

### 1. Start the Website

```bash
make up
```

The site will be running at [http://localhost:8799](http://localhost:8799).

### 2. Run Tests & Diagnostics

```bash
make test
```

### 3. View Logs

```bash
make logs
```

### 4. Stop Container

```bash
make down
```

---

## Available Make Commands

| Command | Description |
|---|---|
| `make help` | List all available make commands |
| `make build` | Build Docker container |
| `make up` | Run container in background (port 8799) |
| `make down` | Stop container |
| `make restart` | Restart container |
| `make test` | Curl verification of web page & API endpoints |
| `make lint` | Run PHP syntax check (`php -l`) |
| `make package` / `make dist` | Package production `.tar.gz` and `.zip` for Plesk |
| `make deploy-plesk` | Instructions for Plesk deployment |

---

## Plesk Obsidian Deployment

### Option A: Plesk Git Extension (Recommended)

1. Go to **Plesk** &rarr; **Domains** &rarr; **paxlet.com** &rarr; **Git**.
2. Add repository: `git@github.com:paxlet-com/www-paxlet-com.git`.
3. Set **Document root**: `/httpdocs`.
4. Enable **Automatic deployment** or use the Webhook trigger.
5. In **PHP Settings**, select **PHP 8.1 / 8.2 / 8.3 (FPM application served by Apache or Nginx)**.

### Option B: Upload Distribution Archive

1. Run:
   ```bash
   make package
   ```
2. In Plesk **File Manager**, upload `dist/www-paxlet-com-*.zip` into `httpdocs/`.
3. Extract archive contents.

---

## Project Structure

```text
├── assets/             # Brand logos, icons, patterns, OG social cards
├── config.php          # Central configuration (metadata, URLs, environment)
├── docker-compose.yml  # Local development compose configuration
├── Dockerfile          # Apache + PHP 8.3 container definition
├── health.php          # Standalone healthcheck endpoint
├── includes/           # Layout components (header, nav, footer)
├── index.php           # Front controller & route dispatcher
├── Makefile            # Development, test, and release tasks
├── README.md           # Documentation
├── robots.txt          # Search engine crawler policies
├── sitemap.xml         # XML Sitemap
├── styles.css          # Main stylesheet
├── templates/          # Content sections (hero, traits, how, cards, manifesto)
└── VERSION             # Version tracking
```

---

## License

Apache-2.0 or MIT.
