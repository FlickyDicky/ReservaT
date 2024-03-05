create database reservat;

create user
    'reservat'@'localhost'
    identified by 'reservat';
/* el usuario es reservat y la contraseña es reservat*/

grant all privileges on
    reservat.*
    to 'reservat'@'localhost';

flush privileges;

use reservat;
