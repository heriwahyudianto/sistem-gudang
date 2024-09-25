# Cara Install

 1. clone project dari github dari link berikut ini 
 [github.com/heriwahyudianto/sistem-gudang](https://github.com/heriwahyudianto/sistem-gudang)
 2. jika anda menggunakan os Windows, aktifkan apache dan mysql.
 3. lalu command berikut di folder yang sudah di clone tadi.
      `composer install`
 4. lalu command
       php artisan migrate
       php artisan serve
  5. jika berhasil, buka browser untuk mendaftar sebagai user terlebih dahulu
  [register](http://localhost:8000/register)
6. buka desktop postman untuk CRUD user, barang, dan mutasi. Daftar endpoint API ada di link sbb:
[enpoint API list](https://id-grow-9375.postman.co/workspace/id-grow-Workspace~3840b814-6df8-4f6c-ac22-cdce009ff799/collection/3638444-e6e3f834-5286-490b-a755-27d2aac336b9?action=share&creator=3638444)

# API doc

1. GET CRSF TOKEN 
 http://localhost:8000/sanctum/csrf-cookie
 
	The `GET` request to `http://localhost:8000/sanctum/csrf-cookie` is used to retrieve a CSRF cookie for Sanctum authentication.

	The response for this request is expected to have a status code of `204` and a `Content-Type` of `text/xml`. However, the response body is `null`.

	As per the user's request, the response can be documented as a JSON schema, but since the response is `null`, there are no specific properties to define in the JSON schema.

2. Login
http://localhost:8000/login
This API endpoint is used to log in a user.
	##### Request Body
	-  	 email (text)    
	-   password (text)
	##### Response
	The response is in HTML format and contains the content of a web page. To document the response as a JSON schema, you may need to convert the HTML content to a structured JSON format using an appropriate tool.
	
3.  GET /barang
http://localhost:8000/barang
This endpoint retrieves a list of barang.
	##### Request
	No request body is required for this request.
	##### Response
	The response will be in JSON format with the following schema:
[
    {
        "id": "",
        "kode": "",
        "name": "",
        "kategori": "",
        "lokasi": "",
        "dimensi": "",
        "berat": "",
        "created_at": "",
        "updated_at": ""
    }
]