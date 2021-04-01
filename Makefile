# all our targets are phony (no files to check).
.PHONY: dev shell root rshell tests tests_commit

# suppress makes own output
.SILENT:

help:
	@echo ''
	@echo 'Usage: make [TARGET] (example: make dev)'
	@echo 'Targets:'
	@echo '  dev            start docker development environment'
	@echo '  shell          start a new (non-root) shell inside the container'
	@echo '  rshell         start a new (root) shell inside the container'
	@echo '  tests          run tests'
	@echo ''

shell:
	docker exec -it -u nginx web ash

rshell:
	docker exec -it -u root web ash

dev: killenv updateenv startenv

killenv:
	docker stop $$(docker ps -a -q) > /dev/null 2>&1 || true
	docker rm $$(docker ps -a -q) > /dev/null 2>&1 || true

updateenv:
	docker-compose pull

startenv:
	docker-compose up -d

tests:
	./vendor/bin/phpunit --bootstrap vendor/autoload.php --testdox tests

tests_commit:
	docker exec -it -u nginx web ./vendor/bin/phpunit --bootstrap vendor/autoload.php --testdox tests
