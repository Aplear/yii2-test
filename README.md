<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">* README.md з інструкціями для запуску проєкту.</h1>
    <br>
</p>


```
configurate by next commands:
    docker-compose up
    docker exec -it --user root yii2-backend-1 bash
    composer install
    php init --env=Development --overwrite=All --delete=All
    php yii migrate/up
    
    ----
    common/config/main-local.php  
        - you can set your own mailtrap credentials name and pass
        
            'transport' => [
                'dsn' => 'smtp://name:pass@smtp.mailtrap.io:25',
            ],
```
