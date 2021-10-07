.DEFAULT_GOAL := help
.PHONY: help git_hooks git_hooks_uninstall lint lint_fix lint_full codeclimate benchmark tests

%:
	@true

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

git_hooks: ## Set up git hooks.
	sudo chmod +x .hooks/*
	git config core.hooksPath ".hooks"

git_hooks_uninstall: ## Unset git hooks.
	git config --unset core.hooksPath

lint: ## Run linter, shows only errors.
	-./vendor/bin/phpcs --warning-severity=0 --standard=phpcs_ruleset.xml -s src tests
	-./vendor/bin/phpmd src,tests text phpmd_ruleset.xml
	-npx markdownlint-cli "./**/*.md"

lint_fix: ## Run automated fixing.
	./vendor/bin/phpcbf --standard=phpcs_ruleset.xml src tests
	-npx markdownlint-cli "./**/*.md" --fix

lint_full: ## Run linters, shows errors and warnings.
	-./vendor/bin/phpcs --standard=phpcs_ruleset.xml -s src tests
	-./vendor/bin/phpmd src,tests text phpmd_ruleset.xml
	-npx markdownlint-cli "./**/*.md"

codeclimate: ## Run Codeclimate and generate report in html.
	docker run \
      --interactive --tty --rm \
      --env CODECLIMATE_CODE="$(shell pwd)" \
      --volume "$(shell pwd)":/code \
      --volume /var/run/docker.sock:/var/run/docker.sock \
      --volume /tmp/cc:/tmp/cc \
      codeclimate/codeclimate analyze -f html > report_codeclimate.html

benchmark: ## Run phpbench tests.
	./vendor/bin/phpbench run --report=aggregate --retry-threshold=5

tests: ## Run tests with PHPUnit.
	export XDEBUG_MODE=coverage && ./vendor/bin/phpunit tests/Unit
