## Sqaure1 Blogging platform Service


### Summary
Create a simple blogging platform that allows users create and ready post, and import blog article from 3rd sites.

### Goals
My goal is to show my understand of `PHP | Laravel | Vuejs` and how to put togther with `API's` and the `Client` side

 #### Design parttens used
 - Repository parttens
 - Service parttens
 - Service Provider

### Features
- Request Validation
- Laravel Eloquent Relationships
- Json REST API response
- Command Line developer tool
- Vuex


#### Step 1 -> clone and startup the app:
- run ```git clone https://dev_emeka@bitbucket.org/dev_emeka/wunder.git``` to clone
- cd into folder and run ```composer install```
- create your ```.env```, you can see example of this in the ```.env.example file```
- run ``` php -S localhost:8080 ``` to start the app

#### Step 2 -> setup your env file:

```
- DATABASE_DRIVER=YOUR_DB_DRIVE
- DATABASE_PORT=YOUR_DB_PORT
- DATABASE_HOST=YOUR_DB_HOST
- DATABASE=YOUR_DB_NAME
- DATABASE_USERNAME=YOUR_DB_USERNAME
- DATABASE_PASSWORD=YOUR_DB_PASSWORD
```
```
- APP_NAME=virtuagym
```

```
- API_URL=https://37f32cl571.execute-api.eu-central-1.amazonaws.com/default/wunderfleet-recruiting-backend-dev-save-payment-data
```

#### Step 3 -> setup database migrates with the virtuagym console app:
- run ```php console ``` to see list of command available
- run ```php console wunder:migrate``` to create database tables
- run ```php console wunder:drop-table``` to drop all database tables


#### Step 3 -> setup database migrates with the virtuagym console app:
- goto ```http://localhost:8080/ ``` on your browser to use the app


# Thanks
