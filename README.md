# Overview

## To run

```bash
$ compose install
$ php artisan migrate
$ php artisan l5-swagger:generate
$ php artisan serve
```

## Test

1. Get Products

```bash
$ curl --location 'http://127.0.0.1:8000/api/products'
```

2. Register

```bash
$ curl --location 'http://127.0.0.1:8000/register' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'name=test1' \
--data-urlencode 'email=test5@test.com' \
--data-urlencode 'password=test1234'
```

3. Login

```bash
$ curl --location 'http://127.0.0.1:8000/api/login' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'email=test@test.com' \
--data-urlencode 'password=test1234'
```
4. Create Product

```bash
$ curl --location 'http://127.0.0.1:8000/api/products/' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiYTFjZGIyMzBiNWNiM2ViYjk2OTg3ZjVmNzY2NDVmODlhZTFlZDM4ZWJmZGVkNTEyNzM0ZmQxMDZiNDYzNTNhNmQ0NDZhZjYzYzliOGJiMWEiLCJpYXQiOjE2ODQxNjAyODYuNDA0NjM0LCJuYmYiOjE2ODQxNjAyODYuNDA0NjM3LCJleHAiOjE3MTU3ODI2ODYuMzc3NTY2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.m4GmJ4CMphbo1VfSzRtbIgQ7gAADKYICDosc8fA-6GoWEF_k19RLExKsftIXePCEJJkDvkUg0-Ook0spz46_Tx863i8Zx1uhB0fef71DwxSBsbf19KEApYEpUCaEyKAXWcwDjhanlyGEHKASreNXu0hz3k0cbqzWTKJAu2O692p0O0fxeU2HWOk3FsiDVlzoByVlovy4BVRN1LB6MLiBmocoGUmaM-9rGizyOm1xcTkwySpQuar_JLUUb-ZLQX0PBpCslh9e2a7ocHcraaMjVydgk7ghlTnSnFd4qcvdlWcc0Lh30ItP91U2kt2P3qF5xcnVBXH-OqFrAWeJJlknvP4bxnnGC7ceeDHPKVQh-DQTYT0NONy7ffN23FAoyy_v2sKaM0wPk-1Sg-MuicfTaL4M2k_zXq1RKYWLtjvBTTzQwNFBt7Jl_U4C7VF3u1Rd7kCm1AMjQILXfkmcz7RpmLTjmZhmP8UiVwhBqjs64QuoV7S0q-pf3fcEP5-6av_hpasxufqngKVEvoO8K-nW6WS8wO-F1C3R96guj9ydvsZnpzNXN2RqorThsOxDufH8qIoPlNXFg37iI3jDv7dVsD1HHlQTfv2lCwx1iC3dxinnNyePM9lhv6AeKKV2wH0txdjCvpS3e6RRQjj2ZXEwe9N9YYlk90RXWuqASCyyjyY' \
--data-urlencode 'name=testprod' \
--data-urlencode 'description=testprod1' \
--data-urlencode 'image=testprod.png' \
--data-urlencode 'price=10.0' \
--data-urlencode 'quantity=3'
```
## API Swagger Documentation

1. Visit `http://localhost:8000/api/documentation`

## Benchmark report:

1. Visit `http://localhost:8000/api/benchmark`

2. example report

```bash
$ curl http://localhost:8000/api/benchmark | json_pp
  % Total    % Received % Xferd  Average Speed   Time    Time     Time  Current
                                 Dload  Upload   Total   Spent    Left  Speed
100  1430    0  1430    0     0   3561      0 --:--:-- --:--:-- --:--:--  3566
{
   "data" : {
      "__meta" : {
         "datetime" : "2023-05-15 16:08:55",
         "id" : "Xc723f86ed60618494427f9d1cc8890bc",
         "ip" : "127.0.0.1",
         "method" : "GET",
         "uri" : "/api/benchmark",
         "utime" : 1684166935.28685
      },
      "exceptions" : {
         "count" : 0,
         "exceptions" : []
      },
      "gate" : {
         "count" : 0,
         "messages" : []
      },
      "memory" : {
         "peak_usage" : 19250072,
         "peak_usage_str" : "18MB"
      },
      "messages" : {
         "count" : 0,
         "messages" : []
      },
      "models" : {
         "count" : 0,
         "data" : []
      },
      "php" : {
         "interface" : "cli-server",
         "version" : "8.2.4"
      },
      "queries" : {
         "accumulated_duration" : 0,
         "accumulated_duration_str" : "0μs",
         "nb_failed_statements" : 0,
         "nb_statements" : 0,
         "statements" : []
      },
      "route" : {
         "as" : "shopify.api.benchmarking",
         "controller" : "App\\Http\\Controllers\\ApiBenchmarkController",
         "middleware" : "api",
         "namespace" : null,
         "prefix" : "api/benchmark",
         "uri" : "GET api/benchmark",
         "uses" : "App\\Http\\Controllers\\ApiBenchmarkController@__invoke",
         "where" : []
      },
      "time" : {
         "duration" : 0.36075496673584,
         "duration_str" : "361ms",
         "end" : 1684166935.28689,
         "measures" : [
            {
               "collector" : null,
               "duration" : 0.245374917984009,
               "duration_str" : "245ms",
               "end" : 1684166935.17151,
               "label" : "Booting",
               "params" : [],
               "relative_end" : 1684166935.17151,
               "relative_start" : 0,
               "start" : 1684166934.92614
            },
            {
               "collector" : null,
               "duration" : 0.114799976348877,
               "duration_str" : "115ms",
               "end" : 1684166935.28689,
               "label" : "Application",
               "params" : [],
               "relative_end" : 4.05311584472656e-06,
               "relative_start" : 0.245959043502808,
               "start" : 1684166935.17209
            }
         ],
         "start" : 1684166934.92614
      },
      "views" : {
         "nb_templates" : 0,
         "templates" : []
      }
   }
}
```



