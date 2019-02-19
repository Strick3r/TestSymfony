# TestSymfony
Testing Symfony 4

In this test will create a simple crud with some security business, to check it in some pages 

Primeros pasos

1. Añadir en el etc/hosts una entrada tal como:
```
175.27.0.2 testing.hola.com
```
2. Docker
   - Crear el fichero .env cogiendo de base el .env-sample y modificando tan solo los siguiente datos:
      ```
      # HOST USER & GROUP
      HOST_USER=YOUR_USER_NAME
      HOST_USER_ID=YOUR_USER_ID
      HOST_GROUP=YOUR_USER_GROUP
      HOST_GROUP_ID=YOUR_USER_GROUP_ID
      ```
   - Levantar stack mediante el comando:
      ```
      docker-compose up -d (estando dentro de la carpeta docker)
      ```
   - Acceder al docker mediante el comando  
      ```
      docker-compose exec --u {user} client bash
      ```
4. Instalar mediante composer las dependencias necesisarias con el comando: 
```
composer install
```
5. En lo que respecta a la persistencia realizar los siguiente pasos
   - Crear la BDD mediante el comando : 
           ```
           bin/console doctrine:database:create
           ```
   - Crear el schema de la BDD mediante: 
           ```
           doctrine:schema:create
           ```
           
6. Añadimos los fixtures para crear los datos basicos para que funcione la aplicación mediante: 
           ```
           doctrine:fixtures:load
           ```
           

