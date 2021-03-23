  
# patient appointment API

## 1. install Laravel 7 using composer  https://laravel.com/docs and confirm it runs

npm install

composer install

## 2. MUST install MySQL & create  database

1. REQUIRED:  mysql create database 'patientappointment' 
2. To create tables: run in terminal at root of project:
  
  php artisan db:wipe 
  
  php artisan migrate:install
  
  php artisan migrate

   

## MUST to start the server from command line
   
   php artisan serve

## MUST Load Data: one of two ways

1. run inserts from  /database/SQL/patientappointment.sql
 
 or
  
 2. Run Tinker below for fake data
#### Load  Testing  with thousands of records
  
  php artisan tinker
  
#### tinker to create patient
   
   factory(App\Patient::class,100)->create();

#### tinker to create patient appointment
    factory(App\PatientAppointment::class,100)->create(); 
   
   
#### tinker to create User
   factory(App\User::class,100)->create();
      
      
                 
     
     
     
    
## Reset project
 

#### To delete tables: run in terminal at root of project:
    
   php artisan db: wipe 
  
#### delete cache and compiled files
      
sudo php artisan clear-compiled

sudo composer dump-autoload

sudo php artisan optimize

sudo php artisan cache:clear

sudo php artisan route:cache

sudo php artisan config:clear

## wipe and rebuild database

php artisan db:wipe

php artisan migrate:install

php artisan migrate

php artisan migrate:refresh

php artisan key:generate

## start server
php artisan serve
 
 
## clear cache
php artisan clear-compiled

composer dump-autoload

php artisan optimize

php artisan cache:clear

php artisan route:cache

php artisan view:clear

 
     
