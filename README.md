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
   `[
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
    ]` 
    
4. POST /barang
	This endpoint is used to create a new item in the inventory.
	##### Request Body
	-   `kode` (text): The code of the item.
	-   `name` (text): The name of the item.
	-   `kategori` (text): The category of the item.
    -   `lokasi` (text): The location of the item.
    -   `dimensi` (text): The dimensions of the item.
    -   `berat` (text): The weight of the item.
	##### Response
	The response is a JSON object with the following schema:
`{
  "type": "object",
  "properties": {
    "message": {
      "type": "string"
    },
    "barang": {
      "type": "object",
      "properties": {
        "name": {
          "type": "string"
        },
        "kode": {
          "type": "string"
        },
        "kategori": {
          "type": "string"
        },
        "lokasi": {
          "type": "string"
        },
        "dimensi": {
          "type": "string"
        },
        "berat": {
          "type": "string"
        },
        "id": {
          "type": "string"
        },
        "updated_at": {
          "type": "string"
        },
        "created_at": {
          "type": "string"
        }
      }
    }
  }
}`    

5. DELETE /barang
This endpoint is used to delete a specific item by its ID.
	##### Request
	-   Parameters
	    -   id (string, required): The unique identifier of the item to be deleted.
	##### Response
	The response is in JSON format with the following schema:
	    `{
    "type": "object",
    "properties": {
        "message": {
            "type": "string"
        }
    }
}`

6. PATCH/ update barang 
This endpoint makes an HTTP PATCH request to update a specific item with the given ID. The request URL includes query parameters for ID, kode, name, kategori, lokasi, dimensi, and berat. The request uses form-data as the request body type, but it does not include any specific parameters.

	##### Response
	The response of this request is a JSON schema, which will define the structure of the response data in a JSON format.

7. GET /mutasi
This endpoint retrieves mutasi data.
Request Body 
This request does not require a request body.

	Response 
	The response is a JSON array representing the mutasi data. The response schema is as follows: 
	[]

8. POST /mutasi
This endpoint is used to create a new mutasi entry.
	##### Request Body
	-   jenis_mutasi (text): Type of mutasi    
	-   jumlah (text): Amount of mutasi    
	-   tglMutasi (text): Date of mutasi    
	-   userId (text): ID of the use    
	-   barangId (text): ID of the barang
    ##### Response
	The response is a JSON object with the following schema:
`{
    "message": "",
    "mutasi": {
        "jenis_mutasi": "",
        "jumlah": "",
        "tglMutasi": "",
        "userId": "",
        "barangId": "",
        "id": "",
        "updated_at": "",
        "created_at": ""
    }
}`

9.  Delete /Mutasi
	This endpoint is used to delete a specific mutasi by providing its ID as a query parameter.
	##### Request
	-   Method: DELETE
    -   Endpoint: `http://localhost:8000/mutasi`
    -   Query Parameters:
        -   `id`: The ID of the mutasi to be deleted.
	##### Response
	The response is in JSON format with the following schema:
	`{
  "type": "object",
  "properties": {
    "message": {
      "type": "string"
    }
  }
}`


10. Retrieve History by User ID
This endpoint makes an HTTP GET request to retrieve the history for a specific user based on the user ID.
	##### Request
	-   URL: `http://localhost:8000/historyByUserId`
    -   Method: `GET`
    -   URL Parameters:
        -   `userid` (integer) - The ID of the user for whom the history is to be retrieved.
	##### Response
	The response is in JSON format and represents an array of history items. Each history item object has the following properties:
	-   `id` (string) - The ID of the history item.
	-   `jenis_mutasi` (string) - The type of mutation.
    -   `jumlah` (number) - The amount of mutation.
    -   `tglMutasi` (string) - The date of the mutation.
    -   `barangId` (string) - The ID of the item.
    -   `userId` (string) - The ID of the user.
    -   `created_at` (string) - The creation date of the history item.
    -   `updated_at` (string) - The last update date of the history item.
`[
  {
    "id": "",
    "jenis_mutasi": "",
    "jumlah": 0,
    "tglMutasi": "",
    "barangId": "",
    "userId": "",
    "created_at": "",
    "updated_at": ""
  }
]`

11. Retrieve History by Barang ID 
This endpoint retrieves the history of a specific item by its unique identifier (barangId). The response is a JSON array containing objects with the following properties:
	-   id (string): The unique identifier of the history entry.
    -   jenis_mutasi (string): The type of mutation.
    -   jumlah (number): The quantity of the item involved in the mutation.
    -   tglMutasi (string): The date of the mutation.
    -   barangId (string): The unique identifier of the item.
    -   userId (string): The unique identifier of the user associated with the mutation.
    -   created_at (string): The date and time when the history entry was created.
    -   updated_at (string): The date and time when the history entry was last updated.
