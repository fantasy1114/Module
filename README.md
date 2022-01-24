# GoodPayments\Datatrans Module


1: `Composer Install`
```php 
composer require goodpayments/datatrans
```

2: `assets creating`
```php 
php artisan vendor:publish --force  --provider="GoodPayments\Datatrans\Providers\DatatransServiceProvider
```

3: `Database Creating`
```php 
php artisan migrate
```  

4: `Table values add`
```php 
php artisan db:seed --class=SettingSeeder
```  

# Login Support

APP_URL/login

![This is loginpage](https://res.cloudinary.com/senior/image/upload/v1640449974/Login.png)


# Register Support

APP_URL/registration

![This is registerpage](https://res.cloudinary.com/senior/image/upload/v1640449974/Register.png)


# Booking  service Frontend

APP_URL/datatrans-service

![This is registerpage](https://res.cloudinary.com/senior/image/upload/v1640450795/service.png)
![This is registerpage](https://res.cloudinary.com/senior/image/upload/v1640450795/time.png)
![This is registerpage](https://res.cloudinary.com/senior/image/upload/v1640450795/details.png)

# Booking  service Backend Page

This needs LOGIN

APP_URL/datatrans-category

Admin can CRUD Categories
![This is registerpage](https://res.cloudinary.com/senior/image/upload/v1641238437/category_list.png)

APP_URL/datatrans-service-list

Admin can CRUD Services
![This is registerpage](https://res.cloudinary.com/senior/image/upload/v1641238445/service_list.png)

APP_URL/datatrans-setting

Admin can Edit Setting (Day number, Start Time, End Time, Payment enable)
![This is registerpage](https://res.cloudinary.com/senior/image/upload/v1641238456/backend_setting.png)

APP_URL/datatrans-order

Admin can CRUD All Orders
![This is registerpage](https://res.cloudinary.com/senior/image/upload/v1641238451/orders.png)


# Google calendar Integrate
`1 : oauth-credentials.json GET`

![This is 1](https://res.cloudinary.com/senior/image/upload/v1641254917/1projectselect.png)

![This is 2](https://res.cloudinary.com/senior/image/upload/v1641254917/2calendarapiendable.png)

![This is 3](https://res.cloudinary.com/senior/image/upload/v1641254918/3calendarfind.png)

![This is 4](https://res.cloudinary.com/senior/image/upload/v1641254918/4Calendarselect.png)

![This is 5](https://res.cloudinary.com/senior/image/upload/v1641254917/5Googlecalendarendable.png)

![This is 6](https://res.cloudinary.com/senior/image/upload/v1641254917/6Authidselect.png)

![This is 7](https://res.cloudinary.com/senior/image/upload/v1641254917/7createOauthClient.png)

![This is 8](https://res.cloudinary.com/senior/image/upload/v1641254916/8consentscreen.png)

![This is 9](https://res.cloudinary.com/senior/image/upload/v1641254917/9editapp.png)

![This is 10](https://res.cloudinary.com/senior/image/upload/v1641254917/9editapp.png)

![This is 11](https://res.cloudinary.com/senior/image/upload/v1641254915/11editapp3.png)

![This is 12](https://res.cloudinary.com/senior/image/upload/v1641254914/12editappsummary.png)

![This is 13](https://res.cloudinary.com/senior/image/upload/v1641254916/13clientIDcreating.png)

![This is 14](https://res.cloudinary.com/senior/image/upload/v1641254914/14Oauthsetting.png)

`This Json is oauth-credentials.json`

![This is 15](https://res.cloudinary.com/senior/image/upload/v1641254914/15Qauthjson.png)



`2 : Get Calendar and service-account-credentials.json`

![This is 16](https://res.cloudinary.com/senior/image/upload/v1641254915/16serviceaccounselect.png)


![This is 17](https://res.cloudinary.com/senior/image/upload/v1641254916/17servicecreating1.png)

![This is 18](https://res.cloudinary.com/senior/image/upload/v1641254914/18servicecreating2.png)


![This is 19](https://res.cloudinary.com/senior/image/upload/v1641254913/19servicecreating3.png)

![This is 20](https://res.cloudinary.com/senior/image/upload/v1641254913/20creatingeditselect.png)

![This is 21](https://res.cloudinary.com/senior/image/upload/v1641254913/21jsonget1.png)

![This is 22](https://res.cloudinary.com/senior/image/upload/v1641254915/22jsonget2.png)

`This Json is service-account-credentials.json and GOOGLE_CALENDAR_ID is your Gmail `

![This is 23](https://res.cloudinary.com/senior/image/upload/v1641254929/23jsonget.png)


`3 : You have to write your GOOGLE_CALENDAR_AUTH_PROFILE and GOOGLE_CALENDAR_ID`

```php
GOOGLE_CALENDAR_AUTH_PROFILE=oauth
```
```php
GOOGLE_CALENDAR_ID=yourgmail@gmail.com
```

`4 : oauth-token.json get`
[oauth-token.json creating](https://github.com/Websitedevelopement/tokencreating)

5 : all JSONs have to save yourapp/storage/app/google-calendar/`JSON`

![This is 39](https://res.cloudinary.com/senior/image/upload/v1641259682/40_rfj6pn.png)


# Sending mail via SendGrid

`you have to add your SendGrid API key in env file and Sender mail`

![This is 39](https://res.cloudinary.com/senior/image/upload/v1641478474/41_oyu5jo.png)

# Datatrans Payment Settin

`You have to use your merchantId and refno`

![This is 39](https://res.cloudinary.com/senior/image/upload/v1641478724/42_i1zfxx.png)




