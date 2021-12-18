## Project set up example with Laravel 8 | Vuejs 3 Composable Api | typescript + vue jest tests starter

##### We will build a simple online book store to the help cover the following stack, these are well documented on their own but together not so much.
1. Laravel 8<br />
2. Vue-3 ( with composition api)<br />
3. Typescript for all our front end syntax<br />
4. Front end tests on using jest and Vue-test-utils <br />

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

And there you go.... <br>
You can go ahead and customize as you please. <br><br>

# B. Tutorial 
## Our example app

A simple books store where i can log in and see available books and leave reviews. ( I've ommitted roles so we will not have admin adding new books for example).
Er diagram:

<img src="https://github.com/LufunoMaphwanya/laravel-8-vuejs-3-typescript-with-jests-online-bookstore/blob/main/github/er.png?raw=true" width='500'><br>

## Creating a Laravel online bookstore 
### Backend 
1. - [Set up laravel project](#completeproject-set-up)<br>
2. - [Models ](#completeproject-set-up)<br>
3. - [Model relationships ](#completeproject-set-up)<br>
3. - [Controllers and routes ](#completeproject-set-up)<br>
4. - [Very optional - Seed database ](#completeproject-set-up)<br>

### Frontend 
4. - [Set up complete project](#completeproject-set-up)<br>
5. - [Set up complete project](#completeproject-set-up)<br><br>

## 1. Set up laravel project

Let's set up new laravel project
```bash
laravel new laravel-online-books && cd laravel-online-books
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
Run composer install and migrate your database 
```bash
composer install
php artisan migrate
```

Set up laravel/ui scaffolding and scaffold ui
```bash
composer require Laravel/ui		
php artisan ui bootstrap
php artisan ui bootstrap --auth
npm install && npm run dev 
```

```bash
php artisan key:generate
php artisan serve
```
<img src="https://github.com/LufunoMaphwanya/laravel-8-vuejs-3-typescript-with-jests-online-bookstore/blob/main/github/test-img-1.png?raw=true" width="590">

		
## 2. Models
MVC ref: https://www.tutorialspoint.com/design_pattern/mvc_pattern.htm

Use artisan to generate all our models with migrations ( -m flag)
```bash
php artisan make:model Book -m
php artisan make:model Author -m
php artisan make:model Review -m
php artisan make:model Page -m
php artisan make:model Genre -m
```

This will generate a model and a migration for each of our entities for our application, now let's go ahead and edit them to our specs.<br>
* Book model 
```php
// database/migrations/2021_xxx_create_books_table.php 

public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->integer('year');
        $table->timestamps();
    });
}
public function down()
{
    Schema::dropIfExists('books');
}

// app/models/book.php
class Book extends Model
{
    use HasFactory;

    protected $fillable = ['year', 'title'];

}
```
* Book model 
```php
// database/migrations/2021_xxx_create_books_table.php 

public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->integer('year');
        $table->timestamps();
    });
}
public function down()
{
    Schema::dropIfExists('books');
}

// app/models/book.php
class Book extends Model
{
    use HasFactory;

    protected $fillable = ['year', 'title'];

}
```
* Author model 
```php
// database/migrations/2021_xxx_create_authors_table.php 
public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('bio');
            $table->timestamps();
        });
    }

public function down()
    {
        Schema::dropIfExists('authors');
    }


// app/models/Author.php
class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'bio'];

}
```

* Genre model 
```php
// database/migrations/2021_xxx_create_genres_table.php 
public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }
public function down()
    {
        Schema::dropIfExists('genres');
    }

// app/models/Genre.php
class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}
```

* Review model 
```php
// database/migrations/2021_xxx_create_reviews_table.php 
public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('rating');
            $table->string('comment');
            $table->timestamps();
        });
    }

public function down()
    {
        Schema::dropIfExists('reviews');
    }

// app/models/Genre.php
class Review extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'rating'];
}
```

* Page model 
```php
// database/migrations/2021_xxx_create_pages_table.php 
public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->timestamps();
        });
    }
public function down()
    {
        Schema::dropIfExists('pages');
    }

// app/models/Page.php
class Page extends Model
{
    use HasFactory;

    protected $fillable = ['content'];
}

```

Finally, migrate db
```bash
php artisan migrate

```


## 3. Model relationships

Author has many Books  Book belongs to one Author   (one to many)
Genre has many Books  Book belongs many Genres     ( many-to-many)
Book has many Pages  Page belongs to one Book.         (one to many)  
Book has many Reviews  Review belongs to one Book  (one to many)

Let's go:

Generate our relationship migrations.

```bash
php artisan make:migration adds_author_books_one_to_many_relationship 
php artisan make:migration adds_book_reviews_one_to_many_relationship 
php artisan make:migration adds_book_pages_one_to_many_relationship 
php artisan make:migration adds_book_genres_many_to_many_relationship

```

Now let's dive into our migrations:

* Author has many books

One to many relationship 

```php
// database/migrations/xxx_adds_author_books_one_to_many_relationship.php

public function up()
{
    Schema::table('books', function (Blueprint $table) {
        $table->unsignedBigInteger('author_id')->nullable();
        $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('books', function (Blueprint $table) {
        $table->dropColumn(['author_id']);
    });
}
```

* Book has many reviews

One to many relationship 

```php
// database/migrations/xxx_adds_book_reviews_one_to_many_relationship.php

public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id')->nullable();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn(['book_id']);
        });
    }
```

* Book has many pages

One to many relationship 

```php
// database/migrations/xxx_adds_book_pages_one_to_many_relationship.php
public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id')->nullable();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['book_id']);
        });
    }

```

* Many Book belong many genres

many to many relationship 

```php
// database/migrations/xxx_adds_book_genres_many_to_many_relationship.php
public function up()
    {
        Schema::create('book_genre', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('genre_id')->unsigned();
            $table->integer('book_id')->unsigned();
        });
    }

public function down()
    {
        Schema::dropIfExists('book_genre');
    }


```

Now let’s tell the models about these relationships so that we can enjoy our delicious Eloquent API in our app.
Append the following  to the following models. Don’t forget to import the class you’re mapping ( if you need to ).

* Author has many books
```php
// App/models/Author.php
...
public function books()
{
   return $this->hasMany(Book::class);
}
...
```

* Genre has many books
```php
// App/models/Genre.php
...

public function books()
{
   return $this->belongsToMany(Book::class);
}

...
```

* Book has many reviews
```php
// App/models/Review.php
..
public function book()
    {
        return $this->belongsTo(Book::class);

    }
..
```

* Book has many pages
```php
// App/models/Page.php
..
public function book()
    {
        return $this->belongsTo(Book::class);

    }
..
```

* Book class
```php
// App/models/Book.php
..
/**
     * Get the genres of the book.
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    /**
     * Get the author of the book.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);

    }

    /**
     * Get the reviews for the book
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the pages for the book
     */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }
..
```

All done, now run a php artisan migrate, all should be well with your database. 
```bash
php artisan migrate
```

## 3. Controllers and routes

Create the books controller (this will be our library so to speak). 
```bash
php artisan make:controller Api/BookController --resource --api --model=Book
```

Create resources and leave as is. 
```bash
php artisan make:resource BookResource 
php artisan make:resource ReviewResource 
php artisan make:resource GenreResource 
php artisan make:resource AuthorResource 
php artisan make:resource PageResource
```

Create requests and update the rules array as follows 
```bash
php artisan make:request BookRequest 
php artisan make:request ReviewRequest 
php artisan make:request AuthorRequest 
php artisan make:request GenreRequest 
php artisan make:request PageRequest
```
Rules 
```php
// app/Http/Requests/AuthorRequest.php
public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'bio' => ['nullable', 'string']
        ];
    }
``` 
```php
// app/Http/Requests/BookRequest.php
public function rules()
    {
        return [
            'year' => ['required', 'integer'],
            'title' => ['required', 'string']
        ];
    }

```
```php
// app/Http/Requests/ReviewRequest.php
public function rules()
    {
        return [
            'rating' => ['int', 'string'],
            'comment' => ['required', 'string'],
        ];
    }

```
```php
// app/Http/Requests/GenreRequest.php
public function rules()
    {
        return [
            'name' => ['required', 'string']
        ];
    }

```
```php
// app/Http/Requests/PageRequest.php
public function rules()
    {
        return [
            'content' => ['required', 'string'],
        ];
    }
```

Now finally our controller - support CRUD operations. 

App/http/controllers/api/BookController.php
```php

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return BookResource::collection(Book::all());
    }

    public function store(BookRequest $request)
    {
        $book = Book::create($request->validated());

        return new BookResource($book);
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->validated());

        return new BookResource($book);
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return response()->noContent();
    }
}
```

Now let's tie this to our routes
```php
// App/routes/api.php

use App\Http\Controllers\Api\BookController;

// ... 

Route::apiResource('books', BookController::class);
```

Now test this by hitting localhost:8000/api/books

## 4. Seed the database with test data
For now we want to have a bunch of books that we can read online
```bash
php artisan make:seeder BookSeeder
``` 
```php
// database/seeders/BookSeeder.php

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
    ...
     */
    public function run()
    {
        for ($x = 0; $x <= 200; $x++) {
            DB::table('books')->insert([
                'year' => rand(1995,2010),
                'title' => "Book title {$x}"
            ]);
        }
    }
}

```

Let's add random pages to our books
```bash
php artisan make:seeder PageSeeder
``` 
```php
// database/seeders/PageSeeder.php

<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Author;
use App\Models\Book;

class PageSeeder extends Seeder
{
    /**
     * ...
     */
    public function run()
    {
        foreach (Book::all() as $book) {
            for ($p=0; $p <= rand(50,200); $p++){
                DB::table('pages')->insert([
                    'content' => Str::random(1000),
                    'book_id' => $book->id,
                ]);
            }
        }

    }
}

```
All done, now all you need to run is 
```bash
php artisan migrate:fresh --seed
```




## Front end 
### 

## 1. Set up our vuejs3 front end 

make sure you are on node v12 -- recommended
```bash
nvm use v12
```

Install 
vuejs3, 
vuejs3-loader, 
vue-router@next and 
typescript

```bash
npm install --save vue@next vue-router@next vue-loader@next
npm install typescript ts-loader --save-dev
```

Configure our typescript
create tsconfig.json
```json
/* tsconfig.json */ 

{
    "compilerOptions":
    {
        "module": "commonjs",
        "strict": true,
        "jsx": "preserve",
        "moduleResolution": "node"
    }
}
```
create tsconfig.json
```ts
// resources/shims-vue.d.ts
declare module '*.vue' {
    import type { DefineComponent } from 'vue'
    const component: DefineComponent<{}, {}, any>
    export default component
 }
```

enable vue loader for our app
```js
// webpack.mix.js

const mix = require('laravel-mix');
mix.ts('resources/js/app.ts', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

 ```
 
let's create our components and our composable module
create composables/books.ts
```ts
// resources/js/composables/books.ts

import { ref } from 'vue'
import axios from "axios";

export default function useBooks() {
    const books = ref([])
    const book = ref([])

    const getBooks = async () => {
        const response = await axios.get('/api/books');
        books.value = response.data.data;
    }

    const getBook = async (id: number) => {
        let response = await axios.get('/api/books/' + id)
        book.value = response.data;
    }

    return {
        books,
        book,
        getBook,
        getBooks
    }
}
 ```

let's create our components 
```vue
// resources/js/components/BookIndex.vue

<template>
    <div class="container">
        <div class="card" style="width: 18rem; float: left; margin: 5px" v-for="book in books" :key="book.id">
            <router-link :to="{ name: 'books.show' , params: { id: book.id }}">
                <div class="card-body">
                        <h5 class="card-title">{{ book.title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ book.year}}</h6>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script lang='ts'>
import useBooks from '../../composables/books';
import { onMounted } from 'vue';

export default {
    setup() {
        const { books, getBooks } = useBooks()
        onMounted(getBooks)

        return {
            books
        }
    }
}
</script>
 ```
 ```vue
// resources/js/components/BookShow.vue

<template>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card" style="width: 90%;  margin: 5px">
                    <div class="card-body">
                            <h5 class="card-title">{{ book.title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ book.year}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-9 border">
                <div class="card" style="width: 100%;  margin: 10px; padding: 10px;" v-for="page in book.pages" :key="page.id">
                    <div class="card-body">
                            {{ page.content}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang='ts'>
import useBooks from '../../composables/books';
import { onMounted } from 'vue';

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },

    setup(props: any) {
        const { book, getBook } = useBooks()

        onMounted(() => getBook(props.id))

        return {
            book
        }
    }
}
</script>

 ```
 
 
 Now let's configure our vue-router routes
 create router/index.ts
```ts
// resources/js/router/index.ts

import { createRouter, createWebHistory } from 'vue-router';

import BookIndex from '../components/books/BookIndex.vue';
import BookShow from '../components/books/BookShow.vue';

const routes = [
    {
        path: '/home',
        name: 'books.index',
        component: BookIndex
    },
    {
        path: '/books/:id/show',
        name: 'books.show',
        component: BookShow,
        props: true
    },
    { path: "/:pathMatch(.*)", component: { template: "Not found"} }
];

export default createRouter({
    history: createWebHistory(),
    routes
});

 ```
 
 and update our laravel routeer
 ```php
// routes/web.php

// .. 

 Route::view('/{any}', 'home')
    ->middleware(['auth'])
    ->where('any', '.*');
```

let's mount our app  
```ts
// resources/js/app.ts

require('./bootstrap');

import { createApp } from "vue";
import router from './router';
import BookIndex from './components/books/BookIndex.vue';

const app = createApp({
    components: {
        BookIndex,
    },
}).use(router).mount('#app')

```

in our home.blade file lets include our router iew tag

```blade
// resources/views/home.blade.php

...
<div>
    <router-view />
</div>
...

```

rerun mix
seerver your app and enjoy



## 2. Set up front end tests 
1. Jest
2. Vue-jest and babel-jest
3. ts-jest 

install jest and add test cmd

```bash
npm install jest --save-dev
```


```js
// jest.config.js

module.exports = {
  testRegex: 'resources/assets/js/test/.*.spec.js$'
}```

```js
// package.json

scripts : {
    ...
    "test": "jest"
}```

Add vue-jest and babel-jest:
v-j: @vue/vue3-jest for jest 27 and vuejs3
```bash
npm install --save-dev @vue/vue3-jest babel-jest
```
v-j-test-utils-3:

```bash
npm install --save-dev @vue/test-utils@next
``` 

ts-jest and @types\jest:

```bash
npm install --save-dev ts-jest
npm install --save-dev @types/jest
``` 

update jest config

```js
// jest.config.js

module.exports = {
    "testEnvironment": "jsdom",
    testRegex: 'resources/js/tests/.*.spec.ts$',
    moduleFileExtensions: [
      'js',
      'json',
      'vue',
      'ts'
    ],
    'transform': {
      '^.+\\.js$': '<rootDir>/node_modules/babel-jest',
      '.*\\.(vue)$': '@vue/vue3-jest',
      "^.+\\.tsx?$": "ts-jest"
    },
  }
```

Now write your component tests
```ts 
//resources/js/tests/components/books/BookIndex.spec.ts

import { mount, shallowMount, flushPromises } from "@vue/test-utils";
import BookIndex from "../../../components/books/BookIndex.vue";
import router from "../../../router";
import axios from 'axios';

jest.mock('axios');
const mockedAxios = axios as jest.Mocked<typeof axios>;

const fakeBooks = [{ "id": "1", "title": "book1", "subtitle": "hello1", "year": 1938}, { "id": "1", "title": "book1", "subtitle": "hello1", "year": 1938}, { "id": "1", "title": "book1", "subtitle": "hello1", "year": 1938}];
const fakeData = Promise.resolve({"data": {"data": fakeBooks}});

describe("BookIndex.vue", () => {

    beforeEach(() => {
    })

  it("correctly mounts with correct data", async () => {

    mockedAxios.get.mockReturnValueOnce(fakeData);

    const wrapper = shallowMount(BookIndex, {
      global: {
        plugins: [router],
      }
    } as any);

    expect(axios.get).toBeCalledWith("/api/books");

    await flushPromises();
    expect(wrapper.vm.books.length).toBe(3);
  });

});

```

```ts 
//resources/js/tests/components/books/BookShow.spec.ts

import { mount, shallowMount, flushPromises } from "@vue/test-utils";
import BookShow from "../../../components/books/BookShow.vue";
import router from "../../../router";
import axios from 'axios';

jest.mock('axios');
const mockedAxios = axios as jest.Mocked<typeof axios>;

const testId = '3';
const fakeBook = { "id": "3", "title": "book1", "subtitle": "hello1", "year": 1938}
const fakeData = Promise.resolve({"data": fakeBook});


describe("BookShow.vue", () => {

    beforeEach(() => {
    })

  it("correctly mounts with correct data", async () => {

    mockedAxios.get.mockReturnValueOnce(fakeData);

    const wrapper = shallowMount(BookShow, {
    propsData: {
        id: testId
    },
      global: {
        plugins: [router],
      }
    } as any);

    expect(axios.get).toBeCalledWith("/api/books/"+testId);

    await flushPromises();
    expect(wrapper.vm.book.id).toBe(testId);
  });

});

```

this is all you needed for our application, f corse you can write more tests.

```bash
npm run test
```

## License
[MIT](https://choosealicense.com/licenses/mit/)
