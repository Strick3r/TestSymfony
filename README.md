# TestSymfony
Testing Symfony 4

In this test will create a simple crud with some security business, to check it in some pages 

Primeros pasos

1. Añadir en el etc/hosts una entrada tal como:
           175.27.0.2 testing.hola.com
2. Arrancar docker compose mediante el comando:
```s
docker-compose up -d (estando dentro de la carpeta docker)
```
3. Acceder al docker mediante el comando  
```sh
docker-compose exec --u {user} client bash
```
4. Instalar mediante composer las dependencias necesisarias con el comando: 
```sh
composer install
```
5. En lo que respecta a la persistencia realizar los siguiente pasos
   5.1 Crear la BDD mediante el comando : 
           ```sh
           bin/console doctrine:database:create
           ```
   5.2 Crear el schema de la BDD mediante: 
           ```sh
           doctrine:schema:create
           ```
           
6. Añadimos los fixtures para crear los datos basicos para que funcione la aplicación mediante: 
           ```sh
           doctrine:fixtures:load
           ```
           

