# Laravel Rest Api service.
#### Version 1.0b
#### Author: Vitalii Minenko

A simple application for adding and showing actual flights.

##### Requriments
Docker
WSL 2.0
PowerShell
IDE
Postman
##### Haw to start.
For start application you should install docker and set WSL engine.
Clone application into the folder with docker.
Open your project with command-line shell application for example PowerShell and do next command.
```
./vendor/bin/sail up
```
By default your application will be use http://localhost/

Next please do migration and seed main data with next command.
```
sail artisan migrate:refresh --seed
```

If application start successfully you should setup config files.
* Copy .env.example and paste with name .env and setup all necessary fields (now we have only one additional field is pagination).
* Metthod post and put allow only with content-type application/json.

```
Content-Type:application/json
```

For correct work with the postman please set header at your request for the post and put Methods
```
X-Requested-With:XMLHttpRequest
```
* Now application is ready and you can use it and test it by Postman. Please enjoy ;)

* Postman collections you can find at folder addtional.





