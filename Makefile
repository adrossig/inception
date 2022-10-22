PATH_YML = ./srcs/docker-compose.yml

all:
	@mkdir -p /home/arossign/data
	@mkdir -p /home/arossign/data/wordpress
	@mkdir -p /home/arossign/data/mariadb
	@sudo docker-compose -f $(PATH_YML) up -d --build

stop:
	@sudo docker-compose -f $(PATH_YML) stop

clean: stop
	@sudo docker-compose -f $(PATH_YML) down -f

flcean: clean
	@sudo rm -fr /home/arossign/data/wordpress
	@sudo rm -fr /home/arossign/data/mariadb
	@docker system prune -af

re: clean all

