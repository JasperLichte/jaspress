# jaspress

## API
## authentication
| description | path | paramaters |
| --- | --- | --- |
| create a new user | `/api/auth/register.php` | <ul><li>`email`</li><li>`password`</li></ul> |
| login a user | `/api/auth/login.php` | <ul><li>`email`</li><li>`password`</li></ul> |
| logout | `/api/auth/logout.php` |  |

## .env
The .env file in the root directory may hold following key-value pairs:

| key | use | required |
| --- | --- | --- |
| ROOT_URL | root url of application | no | 
| APP_ID | unique id for application | no |
| DB_HOST | host address of database server | yes |
| DB_NAME | name of database | yes |
| DB_USER | username for accessing database | yes |
| DB_PASSWORD | password for accessing database | yes |
| ROOT_USER | username of initial root user | yes |
| ROOT_PASSWORD | password of initial root user | yes |
