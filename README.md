# TestSymfony
Testing Symfony 4

In this test will create a simple crud with some security business, to check it in some pages 

Primeros pasos

0) Añadir en el etc/hosts una entrada tal como:
           175.27.0.2 testing.hola.com
1) Arrancar docker compose mediante el comando:
```sh
docker-compose up -d (estando dentro de la carpeta docker)
```
2) Acceder al docker mediante el comando  
```sh
docker-compose exec --u {user} client bash
```
3) Instalar mediante composer las dependencias necesisarias con el comando: 
```sh
composer install
```
3) En lo que respecta a la persistencia realizar los siguiente pasos
   3.1) Crear la BDD mediante el comando : 
           ```sh
           bin/console doctrine:database:create
           ```
   3.2) Crear el schema de la BDD mediante: 
           ```sh
           doctrine:schema:create
           ```
           
4) Añadimos los fixtures para crear los datos basicos para que funcione la aplicación mediante: 
           ```sh
           doctrine:fixtures:load
           ```
           

