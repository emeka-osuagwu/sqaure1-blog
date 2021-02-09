## Sqaure1 Blogging platform Service


### Summary
Create a simple blogging platform that allows users create and ready post, and import blog article from 3rd sites.

### Goals
My goal is to show my understand of `PHP | Laravel | Vuejs` and how to put togther with `API's` and the `Client` side

#### Simple Architecture
![alt text](https://res.cloudinary.com/arm/image/upload/v1612849887/Untitled_Diagram_ncokfa.png)

 #### Design parttens used
 - Repository parttens
 - Service parttens
 - Service Provider

### Features
- Request Validation
- Laravel Eloquent Relationships
- User Role Management
- Json REST API response
- Command Line developer tool
- Vuex

#### Step 1 -> clone and startup the app:

##### API Setup
- run ```git clone https://github.com/emeka-osuagwu/sqaure1-blog``` to clone
- cd into folder and run ```composer install```
- create your ```.env```, you can see example of this in the ```.env.example``` file
- run ``` php artisan serve ``` to start the app

##### Import Post
- run ```php artisan import:post``` or run ``` * * * * * cd /path-to-your-project && php artisan import:post >> /dev/null 2>&1 ```

##### Frontend Setup
- cd into folder and run ```yarn install``` or ```npm install```
- run ``` yarn dev ``` or ```npm run dev``` to start the app

##### Login credentials

###### Admin
- email => admin@gmail.com
- password => password

###### User
- email => user@gmail.com
- password => password


# Thanks
