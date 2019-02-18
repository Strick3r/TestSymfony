############################################################
# Dockerfile to build CentOS,Nginx installed  Container
# Based on CentOS
############################################################

FROM centos:latest

ARG HOST_USER
ARG HOST_USER_ID
ARG HOST_GROUP
ARG HOST_GROUP_ID
ARG XDEDUG_ACTIVE

RUN groupadd --gid "${HOST_GROUP_ID}" "${HOST_GROUP}" && \
    useradd \
      --uid ${HOST_USER_ID} \
      --gid ${HOST_GROUP_ID} \
      --create-home \
      --shell /bin/bash \
      ${HOST_USER}

# Instalando software
RUN yum -y install http://rpms.famillecollet.com/enterprise/remi-release-7.rpm epel-release
RUN yum -y install yum-utils
RUN yum-config-manager --enable "remi-php72"
RUN yum install -y nginx php72 php-fpm php-mbstring php-opcache php-mysqlnd
RUN yum -y update
RUN yum clean all

#instalamos mysql
RUN yum -y install mysql 

# Instalando el supervisor
RUN yum install -y python-setuptools
RUN easy_install pip
RUN pip install supervisor

# Añadiendo configuración de nginx
ADD nginx.conf /etc/nginx/nginx.conf
ADD default.conf /etc/nginx/conf.d/default.conf
RUN chown -R nginx /var/log/nginx

# Creamos rutas de cache y log
RUN mkdir -p /var/cache/client
RUN mkdir -p /var/log/client
RUN mkdir -p /var/sessions/client

RUN chown -R ${HOST_USER}:${HOST_GROUP} /var/cache/client
RUN chown -R ${HOST_USER}:${HOST_GROUP} /var/log/client
RUN chown -R ${HOST_USER}:${HOST_GROUP} /var/sessions/client

# Configuraciones de phpfpm
ADD php-fpm.conf /etc/php-fpm.conf
ADD www.conf /etc/php-fpm.d/www.conf
RUN sed -i "s/user = apache/user = ${HOST_USER}/g" /etc/php-fpm.d/www.conf
RUN sed -i "s/group = apache/group = ${HOST_GROUP}/g" /etc/php-fpm.d/www.conf
ADD php.ini /etc/php.ini
RUN chown -R ${HOST_USER}:${HOST_GROUP} /var/log/php-fpm
RUN chown -R ${HOST_USER}:${HOST_GROUP} /var/lib/php/session


# Añadiendo configuración del supervisor
ADD supervisord.conf /etc/

# xdebug
ADD 15-xdebug.ini /tmp/15-xdebug.ini
RUN if  [[ ${XDEDUG_ACTIVE} == true ]]; \
then \
yum -y install php-pecl-xdebug \
&& cp /tmp/15-xdebug.ini /etc/php.d/15-xdebug.ini \
&& cp /tmp/15-xdebug.ini /etc/php-zts.d/15-xdebug.ini \
&& chmod 644 /etc/php.d/15-xdebug.ini /etc/php-zts.d/15-xdebug.ini; \
fi

# Instalo composer
RUN yum -y install composer

VOLUME ["/var/log/nginx", "/var/www"]

# Exponemos el puerto 80
EXPOSE 80


# Ejecutamos el supervisord
WORKDIR /var/www
CMD ["supervisord", "--nodaemon", "-c", "/etc/supervisord.conf"]
