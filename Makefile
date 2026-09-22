#################################################
# Paxlet Web Portal — Makefile
# PHP website with Docker dev environment
# Optimized for Plesk Obsidian deployment
#################################################

PORT ?= 8799
CONTAINER_NAME ?= www-paxlet-com
DIST_NAME ?= www-paxlet-com-$(shell cat VERSION 2>/dev/null || echo "0.1.0")

.PHONY: help
help: ## Show this help message
	@echo "Paxlet Web Portal (www-paxlet-com) commands:"
	@echo ""
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[36m%-16s\033[0m %s\n", $$1, $$2}'

.PHONY: build
build: ## Build the Docker image
	@echo "==> Building Docker image..."
	docker compose build

.PHONY: up
up: ## Start Docker development environment
	@echo "==> Starting container on port $(PORT)..."
	PORT=$(PORT) docker compose up -d
	@echo "Waiting for container to become healthy..."
	@sleep 3
	@curl -sf http://127.0.0.1:$(PORT)/health.php > /dev/null && echo "✓ Container running at http://127.0.0.1:$(PORT)" || echo "⚠️ Container started, check 'make logs'"

.PHONY: down
down: ## Stop Docker development environment
	@echo "==> Stopping container..."
	docker compose down

.PHONY: restart
restart: down up ## Restart Docker container

.PHONY: logs
logs: ## View container logs
	docker compose logs -f

.PHONY: shell
shell: ## Open shell in the running web container
	docker compose exec web bash

.PHONY: lint
lint: ## Lint PHP files for syntax errors
	@echo "==> Linting PHP files..."
	@find . -maxdepth 3 -name "*.php" -not -path "./dist/*" -exec php -l {} \;

.PHONY: test
test: ## Test running website and health endpoints
	@echo "==> Testing site at http://127.0.0.1:$(PORT)..."
	@curl -sf http://127.0.0.1:$(PORT)/ > /dev/null && echo "✓ Landing page: 200 OK" || (echo "✗ Landing page failed" && exit 1)
	@curl -sf http://127.0.0.1:$(PORT)/health.php | grep -q '"status": "ok"' && echo "✓ Healthcheck (/health.php): OK" || (echo "✗ Healthcheck failed" && exit 1)
	@curl -sf http://127.0.0.1:$(PORT)/api/health | grep -q '"status": "ok"' && echo "✓ Health API (/api/health): OK" || (echo "✗ API health route failed" && exit 1)
	@curl -sf http://127.0.0.1:$(PORT)/styles.css > /dev/null && echo "✓ Static assets (styles.css): OK" || (echo "✗ Static assets failed" && exit 1)
	@echo "==> All tests passed!"

.PHONY: dist package
package: dist
dist: lint ## Create clean production archive for Plesk deployment
	@echo "==> Packaging production release..."
	@mkdir -p dist
	@rm -rf dist/$(DIST_NAME) dist/$(DIST_NAME).tar.gz dist/$(DIST_NAME).zip
	@mkdir -p dist/$(DIST_NAME)
	@rsync -av --exclude-from=.dockerignore \
		--exclude='dist/' \
		--exclude='docker-compose.yml' \
		--exclude='Dockerfile' \
		--exclude='.git/' \
		--exclude='.gitignore' \
		--exclude='.dockerignore' \
		--exclude='tests/' \
		./ dist/$(DIST_NAME)/
	@cd dist && tar -czf $(DIST_NAME).tar.gz $(DIST_NAME)
	@cd dist && zip -r $(DIST_NAME).zip $(DIST_NAME) > /dev/null
	@echo "✓ Production archives created in dist/:"
	@ls -lh dist/$(DIST_NAME).tar.gz dist/$(DIST_NAME).zip

.PHONY: deploy-plesk
deploy-plesk: package ## Output instructions for Plesk deployment
	@echo ""
	@echo "================================================================"
	@echo "Plesk Deployment Guide for paxlet.com:"
	@echo "================================================================"
	@echo "Method 1: Plesk Git Extension (Recommended)"
	@echo "  1. In Plesk -> Domains -> paxlet.com -> Git"
	@echo "  2. Repository: git@github.com:paxlet-com/www-paxlet-com.git"
	@echo "  3. Deployment mode: Automatic (on push) or Manual"
	@echo "  4. Document Root: /httpdocs"
	@echo ""
	@echo "Method 2: File Manager / Archive Upload"
	@echo "  1. Upload 'dist/$(DIST_NAME).zip' to Plesk File Manager in httpdocs"
	@echo "  2. Extract files into /httpdocs/"
	@echo "  3. Ensure PHP 8.1, 8.2, or 8.3 is enabled in PHP Settings"
	@echo "================================================================"
	@echo ""
