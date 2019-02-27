include .env

init:
	docker build -t $(IMAGE) .
	./scripts/network.sh

deploy:
	docker-compose up -d

remove_all:
#	docker kill raspberry
#	docker rm raspberry
#	docker network rm $(NETWORK)
	./scripts/remove_all.sh
