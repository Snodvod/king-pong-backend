.PHONY: seed
seed:
	php bin/console cache:clear
	bin/console doctrine:database:drop --force
	bin/console doctrine:database:create
	bin/console do:mi:mi --no-interaction
	bin/console do:fi:lo --no-interaction

.PHONY: serve
serve:
	symfony server:start

.PHONY: all
all: seed serve
