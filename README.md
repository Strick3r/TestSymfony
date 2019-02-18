# TestSymfony
Testing Symfony 4

In this test will create a simple crud with some security business, to check it in some pages 

Primeros pasos

1) Arrancar docker compose mediante el comando docker-compose up -d (estando dentro de la carpeta docker)
2) Acceder al docker mediante el comando  docker-compose exec --u {user} client bash
3) Instalar mediante composer las dependencias necesisarias con el comando: composer install
3) En lo que respecta a la persistencia realizar los siguiente pasos
   3.1) Crear la BDD mediante el comando : doctrine:database:create
   3.2) Crear el schema de la BDD mediante: doctrine:schema:create
4) Añadimos los fixtures para crear los datos basicos para que funcione la aplicación mediante: doctrine:fixtures:load

