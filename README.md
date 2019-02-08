Plantill Symfony Api
========================

Proyecto plantilla que ya tiene configurados los bundles necesarios para montar una API REST con symfony 3.4:

* OAuthServerBundle
* FosRestBundle
* FosUserBundle
* JMSserializerBundle
* KNPpaginatorBundle
* NelmioApiDocBundle
* NelmioCorsBundle

¿Qué debo hacer?
========================

```
1 - composer install

2 - añadir datos de conexión de tu base de datos en el fichero parameters.yml

3 - php bin/console d:d:d --force && php bin/console d:d:c && php bin/console d:s:u --force && php bin/console d:f:l && php bin/console s:r

4 - Hacer una petición POST desde Postman para comprobar el login en la ruta 127.0.0.1:8000/app_dev.php/oauth/v2/token, 
con los headers Content-Type:application/json y el body:

grant_type:password
client_id:1_3bcbxd9e24g0gk4swg0kwgcwg4o8k8g4g888kwc44gcc0gwwk4
client_secret:4ok2x70rlfokc8g0wws8c8kwcokw80k44sg48goc0ok4w0so0k
username:administrador
password:administrador

Si todo ha ido correcto se recibirá una respuesta con el siguiente formato:

{
    "access_token": "MGIyOTY0NTljOWJmNzJiODYzZWI0MDIyZDc1MDVlZGU2N2RiMmVkZWQ3OTczZTQwODQ1ZTRhZTRkNzg3YjI0YQ",
    "expires_in": 99999999,
    "token_type": "bearer",
    "scope": null,
    "refresh_token": "NThjYWZhYWJlOGRhNGI2YTU4NTZhOWY4ZDhlMjNiYzVhMjAwYzkzMGUxMmNmOTNmNTRjMGNjNmQ3NWM2NGNiZA"
}


```
