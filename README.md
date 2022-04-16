# Installation

Clone the repository:
```
git clone https://github.com/dxninob/onlineStore.git
```

Go inside project folder:
```
cd onlineStore
```

Rename the .env.example file to .env and write the database name, username and password.
```
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Run the following commands:
```
composer install
```
```
php artisan key:generate
```

Run the following command if you don't want to include any test data in the web page:
```
php artisan migrate:fresh
```

Or run the following command if you want to include test data in the web page:
```
php artisan migrate:fresh --seed
```

# Contributors

- Daniela Niño - dxninob
- Samuel Ceballos - sceballosp
- Juan Pablo Madrid - jpmadridf
