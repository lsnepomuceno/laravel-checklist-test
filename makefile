SHELL=/bin/bash

# define standard colors
ifneq (,$(findstring xterm,${TERM}))
	BLACK        := $(shell tput -Txterm setaf 0)
	RED          := $(shell tput -Txterm setaf 1)
	GREEN        := $(shell tput -Txterm setaf 2)
	YELLOW       := $(shell tput -Txterm setaf 3)
	LIGHTPURPLE  := $(shell tput -Txterm setaf 4)
	PURPLE       := $(shell tput -Txterm setaf 5)
	BLUE         := $(shell tput -Txterm setaf 6)
	WHITE        := $(shell tput -Txterm setaf 7)
	RESET := $(shell tput -Txterm sgr0)
else
	BLACK        := ""
	RED          := ""
	GREEN        := ""
	YELLOW       := ""
	LIGHTPURPLE  := ""
	PURPLE       := ""
	BLUE         := ""
	WHITE        := ""
	RESET        := ""
endif

# set target color
TARGET_COLOR := $(BLUE)

POUND = \#

.PHONY: no_targets__ info help build deploy doc
	no_targets__:

.DEFAULT_GOAL := help


SERVICE := "checklist-test-app"
ARTISAN := "php artisan"

install:
	@ echo "${BLUE}---------------------------------------${RESET}"
	@ echo "${BLUE}-- 1) STARTING LARAVEL APP CONTAINER --${RESET}"
	@ echo "${BLUE}---------------------------------------${RESET}"
	@ docker-compose up -d --force-recreate --build
	@ echo ""

	@ echo "${BLUE}---------------------------------------${RESET}"
	@ echo "${BLUE}-- 2) INSTALLING COMPOSER PACKAGES ----${RESET}"
	@ echo "${BLUE}---------------------------------------${RESET}"
	@ docker exec -it ${SERVICE} composer install
	@ echo ""

	@ echo "${BLUE}---------------------------------------${RESET}"
	@ echo "${BLUE}-- 3) COPYING DATA FROM .ENV.EXAMPLE --${RESET}"
	@ echo "${BLUE}---------------------------------------${RESET}"
	@ docker exec -it ${SERVICE} php -r "file_exists('.env') || copy('.env.example', '.env');"
	@ echo "${GREEN}Env file copied or already exists.${RESET}"
	@ echo ""

	@ echo "${BLUE}---------------------------------------${RESET}"
	@ echo "${BLUE}-- 4) GENERATING LARAVEL APP_KEY ------${RESET}"
	@ echo "${BLUE}---------------------------------------${RESET}"
	@ docker exec -it ${SERVICE} php artisan key:generate
	@ echo ""

	@ echo "${BLUE}---------------------------------------${RESET}"
	@ echo "${BLUE}-- 5) RUNNING LARAVEL MIGRATIONS ------${RESET}"
	@ echo "${BLUE}---------------------------------------${RESET}"
	@ echo ""
	@ docker exec -it ${SERVICE} php artisan migrate

	@ echo "${BLUE}---------------------------------------${RESET}"
	@ echo "${BLUE}-- 6) RUNNING APP TESTS ---------------${RESET}"
	@ echo "${BLUE}---------------------------------------${RESET}"
	@ echo ""
	@ docker exec -it ${SERVICE} php artisan test
