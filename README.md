# Multiplication table
### Instalation
1. Clone github repository
```
git clone https://github.com/adamigz/multiplication.git
```
2. Run composer install 
```
composer install
```
or
```
composer update
```
3. Create .env
```
cp .env.example .env
```
Then you should adjust the variables like CACHE_STORE and any corresponding variables. I used redis with predis driver for cache.
4. Generate key
```
php artisan key:generate
```
5. Run npm install
```
npm install
```

### Usage
|URL|Query parameters|Description|
|------|-------------------------|----------------|
|/|size: int (required) (1<=size<=100)|Provide size parameter to set the multiplication table size|
##### Example
`http://yourdomain.pl/?size=10`

Response:
```
{"1":{"1":1,"2":2,"3":3,"4":4,"5":5,"6":6,"7":7,"8":8,"9":9,"10":10},"2":{"1":2,"2":4,"3":6,"4":8,"5":10,"6":12,"7":14,"8":16,"9":18,"10":20},"3":{"1":3,"2":6,"3":9,"4":12,"5":15,"6":18,"7":21,"8":24,"9":27,"10":30},"4":{"1":4,"2":8,"3":12,"4":16,"5":20,"6":24,"7":28,"8":32,"9":36,"10":40},"5":{"1":5,"2":10,"3":15,"4":20,"5":25,"6":30,"7":35,"8":40,"9":45,"10":50},"6":{"1":6,"2":12,"3":18,"4":24,"5":30,"6":36,"7":42,"8":48,"9":54,"10":60},"7":{"1":7,"2":14,"3":21,"4":28,"5":35,"6":42,"7":49,"8":56,"9":63,"10":70},"8":{"1":8,"2":16,"3":24,"4":32,"5":40,"6":48,"7":56,"8":64,"9":72,"10":80},"9":{"1":9,"2":18,"3":27,"4":36,"5":45,"6":54,"7":63,"8":72,"9":81,"10":90},"10":{"1":10,"2":20,"3":30,"4":40,"5":50,"6":60,"7":70,"8":80,"9":90,"10":100}}
```

### Tests
To run all tests simply run command 
```
php artisan test
```
