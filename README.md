# Project set up example with Laravel 8 | Vuejs 3 Composable Api | typescript + vue jest tests starter

## We will build a simple online book store to the help cover the following stack, these are well documented on their own but together not so much.
### 1. Laravel 8
### 2. Vue-3 ( with composition api)
### 3. Typescript for all our front end syntax
### 4. Front end tests on using jest and Vue-test-utils <br />

#### * all set up laravel mix<br /><br />

Option A - [Set up complete project](#completeproject-set-up)<br>
Option B - [ Go through mini tutorial ( sections skippable )](#tutorial)


## Complete project set up

To set up the complete version of this project


```bash
git clone git@github.com:LufunoMaphwanya/laravel-8-vuejs-3-typescript-with-jests-online-bookstore.git laravel-online-books
cd laravel-online-books
```

Create .env file.
```bash
cp .env.example .env
```

.env <br>
Default is mySQL but you can use whatever you like.
```config
APP_NAME="Online books"
...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<YOUR_DB>
DB_USERNAME=<YOUR_DB_USER>
DB_PASSWORD=<YOUR_DB_PASSWORD>

...
```

download project dependencies packages and run laravel mix
```bash
composer install
php artisan migrate
```

install front end dependencies and run mix
```bash
npm install 
npm run dev
```
Serve your application  :-)
```bash
php artisan key:generate
php artisan serve
```

it should be available http://localhost:8000/home

<img src="https://github.com/LufunoMaphwanya/laravel-8-vuejs-3-typescript-with-jests-online-bookstore/blob/main/github/test-img-1.png?raw=true" width="590">




Run front end tests
```bash
npm run test
```

Run project with test data 
```bash
php artisan migrate:fresh --seed
```

<img src="https://github.com/LufunoMaphwanya/laravel-8-vuejs-3-typescript-with-jests-online-bookstore/blob/main/github/test-img-2.png?raw=true" width="590">




```bash
git clone git@github.com:LufunoMaphwanya/laravel-8-vuejs-3-typescript-with-jests-online-bookstore.git
```
```bash
git clone git@github.com:LufunoMaphwanya/laravel-8-vuejs-3-typescript-with-jests-online-bookstore.git
```

To set up the complete version of this project


```bash
git clone git@github.com:LufunoMaphwanya/laravel-8-vuejs-3-typescript-with-jests-online-bookstore.git
```
```bash
git clone git@github.com:LufunoMaphwanya/laravel-8-vuejs-3-typescript-with-jests-online-bookstore.git
```

## Tutorial 
###  sections are skippable if you need just a subsection of this verbose info

```python
import foobar

# returns 'words'
foobar.pluralize('word')

# returns 'geese'
foobar.pluralize('goose')

# returns 'phenomenon'
foobar.singularize('phenomena')
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
