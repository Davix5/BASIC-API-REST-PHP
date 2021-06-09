# BASIC API REST | PHP

API REST criada à fim de aprender conceitos relacionados a URL amigável e HttpRequest.

Não possui completamente um modelo estrutural como por exemplo MVC.

### UTILIZAÇÃO


É recomendável modificar o arquivo **config.php**, pois nele deve conter informações sobre o seu banco de dados e seu servidor local (se utilizado)

### Exemplo *Config.php*

```php

// URL RAIZ
const ROOT = "http://localhost/example";

define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "nome_do_banco",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);
```


### TECNOLOGIAS UTILIZADAS 


- PHP 7.4 ^
- BASIC MVC
- MODELO REST
- COMPOSER
- ROUTER - COMPONENTE DE ROTAS
- DATALAYER - COMPONENTE DE BANCO DE DADOS
- JSON
- AUTOLOAD E NAMESPACES
- MÉTODOS GET, PUT, POST e DELETE

### ROTAS UTILIZADAS

#### GET 

```http
/user/listar
```

```http
/user/listar/{$id}
```

#### POST 

```http
/user/inserir
```

#### PUT 

```http
/user/editar/{$id}
```

#### DELETE 

```http
/user/deletar/{$id}
```



