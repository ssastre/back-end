# Laravel Rest API / Project


## Get tests ids for a test type or get Image for an image_id

```
GET /show-tests?type=oneRecord&id=3

201 {"Datos del Test": {"id Solicitado": "3", "resultado": {"id":3, "tipo_id":1 , "num_corr":10 , "path_img_testeo":"C:\\DATA\\tomi\\Images\\10.jpg"}, "img_testeo":Base24 }}
```
```
GET /show-tests?type=allRecords&tipo_id=2

201 {"Datos del Test": {"Tipo id Solicitado": "2", "Cantidad de registros": "2", "resultado": {"id":6, "tipo_id":2 , "path":10 , "num_corr":"22"}}
```


## Create a test_id

```
POST /eval-test {"type":"deposit", "destination":"100", "amount":10}

201 {"destination": {"id":"100", "balance":10}}
```

## Deposit into existing account

```
POST /event {"type":"deposit", "destination":"100", "amount":10}

201 {"destination": {"id":"100", "balance":20}}
```

## Get balance for existing account

```
GET /balance?account_id=100

200 20
```

## Withdraw from non-existing account

```
POST /event {"type":"withdraw", "origin":"200", "amount":10}

404 0
```

## Withdraw from existing account

```
POST /event {"type":"withdraw", "origin":"100", "amount":5}

201 {"origin": {"id":"100", "balance":15}}
```

## Transfer from existing account

```
POST /event {"type":"transfer", "origin":"100", "amount":15, "destination":"300"}

201 {"origin": {"id":"100", "balance":0}, "destination": {"id":"300", "balance":15}}
```

## Transfer from non-existing account

```
POST /event {"type":"transfer", "origin":"200", "amount":15, "destination":"300"}

404 0
```


Route::post(uri:'/eval-test', action:'App\Http\Controllers\EvalTestControlle@store');

Route::get(uri:'/show-results', action:'App\Http\Controllers\ShowResultController@show');
