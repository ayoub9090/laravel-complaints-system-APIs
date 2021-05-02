# LaravelJWTAuthenticationWithComplaintsSystemAPI's

#backend 
Laravel version 8.18.0

## Development server
run `php artisan key:generate` to sets the APP_KEY value in your . env file
run `php artisan migrate` for generating the database tables after create tabel 'laravel' in the database
run `php artisan serve` for a dev server.
run `php artisan route:list` to list all API's 


## list of API's
+--------+----------+---------------------------------+------+-------------------------------------------------------+------------+
| Domain | Method   | URI                             | Name | Action                                                | Middleware |
+--------+----------+---------------------------------+------+-------------------------------------------------------+------------+
|        | GET|HEAD | /                               |      | Closure                                               | web        |
|        | POST     | api/auth/signin                 |      | App\Http\Controllers\JwtAuthController@login          | api        |
|        | POST     | api/auth/signout                |      | App\Http\Controllers\JwtAuthController@signout        | api        |
|        |          |                                 |      |                                                       | auth:api   |
|        | POST     | api/auth/signup                 |      | App\Http\Controllers\JwtAuthController@register       | api        |
|        | POST     | api/auth/token-refresh          |      | App\Http\Controllers\JwtAuthController@refresh        | api        |
|        |          |                                 |      |                                                       | auth:api   |
|        | GET|HEAD | api/auth/user                   |      | App\Http\Controllers\JwtAuthController@user           | api        |
|        |          |                                 |      |                                                       | auth:api   |
|        | GET|HEAD | api/complaint/getComplaint/{id} |      | App\Http\Controllers\ComplaintController@getComplaint | api        |
|        |          |                                 |      |                                                       | auth       |
|        | GET|HEAD | api/complaint/listing           |      | App\Http\Controllers\ComplaintController@listing      | api        |
|        |          |                                 |      |                                                       | auth       |
|        | POST     | api/complaint/register          |      | App\Http\Controllers\ComplaintController@register     | api        |
|        |          |                                 |      |                                                       | auth       |
|        | POST     | api/complaint/update/{id}       |      | App\Http\Controllers\ComplaintController@update       | api        |
|        |          |                                 |      |                                                       | auth       |
+--------+----------+---------------------------------+------+-------------------------------------------------------+------------+