Hello, I'm Navid Mansouri and this is snap pay test project.

As you can see this is lumen project and I implemented jwt authorization for my app here.
I also provided swagger api documentation you can check /api/documentation.
I used Repositories, Facades, Services, Observers and Request classes in these two apps.
Please once you cloned the project make database and config it in .env, run these 
commands :
    1.composer install
    2.php artisan migrate
    4.php -S localhost:8000 -t public
Now you can use postman to test this app.
Postman header configs :
    Content-Type    application/x-www-form-urlencoded
    Authorization   Bearer <token>

I implemented observers and job to get models changes and publish in message broker. 
 So for authentication in other project named microservice-product you need to run both
 projects at the same time and run <php artisan queue work> command on product app and
 register your user on auth app and get token. rabbitmq will publish changes on user model 
 and other app will create the user too. so you can use your token on other app too.
 please check .env and config/queue.php to configurate your rabbitmq server. I used
 https://www.cloudamqp.com/ free services. You can use it too.

I hope you have fun using this app.

Regards, Navid
navidmansourishsh@gmail.com
09139071587
 
