---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)
<!-- END_INFO -->

#general
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## api/login

> Example request:

```bash
curl -X POST "http://localhost/api/login" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/login",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/login`


<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## api/register

> Example request:

```bash
curl -X POST "http://localhost/api/register" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/register",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/register`


<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_7e6ee60aafd6de54298e0e276a7451fe -->
## api/logout

> Example request:

```bash
curl -X GET "http://localhost/api/logout" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/logout",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": false,
    "code": 400,
    "messages": [
        "The token field is required."
    ],
    "result": null
}
```

### HTTP Request
`GET api/logout`

`HEAD api/logout`


<!-- END_7e6ee60aafd6de54298e0e276a7451fe -->

<!-- START_92ebb0ae5447ba2d36c45b1c62f3bff7 -->
## api/profile

> Example request:

```bash
curl -X GET "http://localhost/api/profile" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/profile",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": false,
    "code": 400,
    "messages": [
        "The token field is required."
    ],
    "result": null
}
```

### HTTP Request
`GET api/profile`

`HEAD api/profile`


<!-- END_92ebb0ae5447ba2d36c45b1c62f3bff7 -->

<!-- START_cf95104e8d1e3bda6b10e9b856955ac6 -->
## api/profile

> Example request:

```bash
curl -X PUT "http://localhost/api/profile" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/profile",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/profile`


<!-- END_cf95104e8d1e3bda6b10e9b856955ac6 -->

<!-- START_e7731888b2835785ff8a25559080e28a -->
## api/my-jobs

> Example request:

```bash
curl -X GET "http://localhost/api/my-jobs" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/my-jobs",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": true,
    "code": 200,
    "messages": [],
    "result": {
        "data": [
            {
                "id": 11,
                "title": "Laravel developer",
                "description": "this is description of the job",
                "estimate_time_per_week": 35,
                "estimate_month": 4,
                "level_id": 2,
                "budget": 11000000,
                "is_fixed_price": 1,
                "location": "Here_",
                "user_id": 1,
                "created_at": "2018-06-09 21:18:38",
                "updated_at": "2018-06-09 21:18:38",
                "level": {
                    "id": 2,
                    "level": "Intermediate"
                }
            },
            {
                "id": 10,
                "title": "Laravel developer",
                "description": "this is description of the job",
                "estimate_time_per_week": 35,
                "estimate_month": 4,
                "level_id": 2,
                "budget": 11000000,
                "is_fixed_price": 1,
                "location": "Here_",
                "user_id": 1,
                "created_at": "2018-06-09 21:18:37",
                "updated_at": "2018-06-09 21:18:37",
                "level": {
                    "id": 2,
                    "level": "Intermediate"
                }
            },
            {
                "id": 9,
                "title": "Laravel developer",
                "description": "this is description of the job",
                "estimate_time_per_week": 35,
                "estimate_month": 4,
                "level_id": 2,
                "budget": 11000000,
                "is_fixed_price": 1,
                "location": "Here_",
                "user_id": 1,
                "created_at": "2018-06-09 21:18:37",
                "updated_at": "2018-06-09 21:18:37",
                "level": {
                    "id": 2,
                    "level": "Intermediate"
                }
            },
            {
                "id": 8,
                "title": "Laravel developer",
                "description": "this is description of the job",
                "estimate_time_per_week": 35,
                "estimate_month": 4,
                "level_id": 2,
                "budget": 11000000,
                "is_fixed_price": 1,
                "location": "Here_",
                "user_id": 1,
                "created_at": "2018-06-09 21:18:36",
                "updated_at": "2018-06-09 21:18:36",
                "level": {
                    "id": 2,
                    "level": "Intermediate"
                }
            },
            {
                "id": 7,
                "title": "Laravel developer",
                "description": "this is description of the job",
                "estimate_time_per_week": 35,
                "estimate_month": 4,
                "level_id": 2,
                "budget": 11000000,
                "is_fixed_price": 1,
                "location": "Here_",
                "user_id": 1,
                "created_at": "2018-06-09 21:18:35",
                "updated_at": "2018-06-09 21:18:35",
                "level": {
                    "id": 2,
                    "level": "Intermediate"
                }
            },
            {
                "id": 6,
                "title": "Laravel developer",
                "description": "this is description of the job",
                "estimate_time_per_week": 35,
                "estimate_month": 4,
                "level_id": 2,
                "budget": 11000000,
                "is_fixed_price": 1,
                "location": "Here_",
                "user_id": 1,
                "created_at": "2018-06-09 21:18:35",
                "updated_at": "2018-06-09 21:18:35",
                "level": {
                    "id": 2,
                    "level": "Intermediate"
                }
            },
            {
                "id": 5,
                "title": "Laravel developer",
                "description": "this is description of the job",
                "estimate_time_per_week": 35,
                "estimate_month": 4,
                "level_id": 2,
                "budget": 11000000,
                "is_fixed_price": 1,
                "location": "Here_",
                "user_id": 1,
                "created_at": "2018-06-09 21:18:34",
                "updated_at": "2018-06-09 21:18:34",
                "level": {
                    "id": 2,
                    "level": "Intermediate"
                }
            },
            {
                "id": 4,
                "title": "Laravel developer",
                "description": "this is description of the job",
                "estimate_time_per_week": 35,
                "estimate_month": 4,
                "level_id": 2,
                "budget": 11000000,
                "is_fixed_price": 1,
                "location": "Here_",
                "user_id": 1,
                "created_at": "2018-06-09 21:18:33",
                "updated_at": "2018-06-09 21:18:33",
                "level": {
                    "id": 2,
                    "level": "Intermediate"
                }
            },
            {
                "id": 3,
                "title": "Laravel developer 3",
                "description": "this is description of the job 3",
                "estimate_time_per_week": 40,
                "estimate_month": 5,
                "level_id": 3,
                "budget": 15000000,
                "is_fixed_price": 0,
                "location": "Here",
                "user_id": 1,
                "created_at": "2018-06-09 20:56:30",
                "updated_at": "2018-06-09 20:56:30",
                "level": {
                    "id": 3,
                    "level": "Expert"
                }
            },
            {
                "id": 2,
                "title": "Laravel developer 2",
                "description": "this is description of the job 2",
                "estimate_time_per_week": 20,
                "estimate_month": 2,
                "level_id": 1,
                "budget": 8000000,
                "is_fixed_price": 0,
                "location": "Here",
                "user_id": 1,
                "created_at": "2018-06-09 20:56:06",
                "updated_at": "2018-06-09 20:56:06",
                "level": {
                    "id": 1,
                    "level": "Entry"
                }
            }
        ],
        "total": 10
    }
}
```

### HTTP Request
`GET api/my-jobs`

`HEAD api/my-jobs`


<!-- END_e7731888b2835785ff8a25559080e28a -->

<!-- START_ca1dda7cbf349fa43a74c913eb5ea3f9 -->
## api/my-jobs/{jobs}

> Example request:

```bash
curl -X GET "http://localhost/api/my-jobs/{jobs}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/my-jobs/{jobs}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": false,
    "code": 404,
    "messages": [
        "Data not found"
    ],
    "result": null
}
```

### HTTP Request
`GET api/my-jobs/{jobs}`

`HEAD api/my-jobs/{jobs}`


<!-- END_ca1dda7cbf349fa43a74c913eb5ea3f9 -->

<!-- START_ef7c80e7297085180a25bd36646efc40 -->
## api/jobs/{jobs}/submit

> Example request:

```bash
curl -X POST "http://localhost/api/jobs/{jobs}/submit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/jobs/{jobs}/submit",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/jobs/{jobs}/submit`


<!-- END_ef7c80e7297085180a25bd36646efc40 -->

<!-- START_bf0ffaba374b4bdb759ede18d0044afa -->
## api/jobs/{jobs}/cancel

> Example request:

```bash
curl -X POST "http://localhost/api/jobs/{jobs}/cancel" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/jobs/{jobs}/cancel",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/jobs/{jobs}/cancel`


<!-- END_bf0ffaba374b4bdb759ede18d0044afa -->

<!-- START_81d1c2fc78507d16a8fc69636128802b -->
## api/jobs

> Example request:

```bash
curl -X GET "http://localhost/api/jobs" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/jobs",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": true,
    "code": 200,
    "messages": [],
    "result": {
        "data": [
            {
                "id": 11,
                "title": "Laravel developer",
                "description": "this is description of the job",
                "estimate_time_per_week": 35,
                "estimate_month": 4,
                "level_id": 2,
                "budget": 11000000,
                "is_fixed_price": 1,
                "location": "Here_",
                "user_id": 1,
                "created_at": "2018-06-09 21:18:38",
                "updated_at": "2018-06-09 21:18:38",
                "level": {
                    "id": 2,
                    "level": "Intermediate"
                }
            },
            {
                "id": 10,
                "title": "Laravel developer",
                "description": "this is description of the job",
                "estimate_time_per_week": 35,
                "estimate_month": 4,
                "level_id": 2,
                "budget": 11000000,
                "is_fixed_price": 1,
                "location": "Here_",
                "user_id": 1,
                "created_at": "2018-06-09 21:18:37",
                "updated_at": "2018-06-09 21:18:37",
                "level": {
                    "id": 2,
                    "level": "Intermediate"
                }
            },
            {
                "id": 9,
                "title": "Laravel developer",
                "description": "this is description of the job",
                "estimate_time_per_week": 35,
                "estimate_month": 4,
                "level_id": 2,
                "budget": 11000000,
                "is_fixed_price": 1,
                "location": "Here_",
                "user_id": 1,
                "created_at": "2018-06-09 21:18:37",
                "updated_at": "2018-06-09 21:18:37",
                "level": {
                    "id": 2,
                    "level": "Intermediate"
                }
            },
            {
                "id": 8,
                "title": "Laravel developer",
                "description": "this is description of the job",
                "estimate_time_per_week": 35,
                "estimate_month": 4,
                "level_id": 2,
                "budget": 11000000,
                "is_fixed_price": 1,
                "location": "Here_",
                "user_id": 1,
                "created_at": "2018-06-09 21:18:36",
                "updated_at": "2018-06-09 21:18:36",
                "level": {
                    "id": 2,
                    "level": "Intermediate"
                }
            },
            {
                "id": 7,
                "title": "Laravel developer",
                "description": "this is description of the job",
                "estimate_time_per_week": 35,
                "estimate_month": 4,
                "level_id": 2,
                "budget": 11000000,
                "is_fixed_price": 1,
                "location": "Here_",
                "user_id": 1,
                "created_at": "2018-06-09 21:18:35",
                "updated_at": "2018-06-09 21:18:35",
                "level": {
                    "id": 2,
                    "level": "Intermediate"
                }
            },
            {
                "id": 6,
                "title": "Laravel developer",
                "description": "this is description of the job",
                "estimate_time_per_week": 35,
                "estimate_month": 4,
                "level_id": 2,
                "budget": 11000000,
                "is_fixed_price": 1,
                "location": "Here_",
                "user_id": 1,
                "created_at": "2018-06-09 21:18:35",
                "updated_at": "2018-06-09 21:18:35",
                "level": {
                    "id": 2,
                    "level": "Intermediate"
                }
            },
            {
                "id": 5,
                "title": "Laravel developer",
                "description": "this is description of the job",
                "estimate_time_per_week": 35,
                "estimate_month": 4,
                "level_id": 2,
                "budget": 11000000,
                "is_fixed_price": 1,
                "location": "Here_",
                "user_id": 1,
                "created_at": "2018-06-09 21:18:34",
                "updated_at": "2018-06-09 21:18:34",
                "level": {
                    "id": 2,
                    "level": "Intermediate"
                }
            },
            {
                "id": 4,
                "title": "Laravel developer",
                "description": "this is description of the job",
                "estimate_time_per_week": 35,
                "estimate_month": 4,
                "level_id": 2,
                "budget": 11000000,
                "is_fixed_price": 1,
                "location": "Here_",
                "user_id": 1,
                "created_at": "2018-06-09 21:18:33",
                "updated_at": "2018-06-09 21:18:33",
                "level": {
                    "id": 2,
                    "level": "Intermediate"
                }
            },
            {
                "id": 3,
                "title": "Laravel developer 3",
                "description": "this is description of the job 3",
                "estimate_time_per_week": 40,
                "estimate_month": 5,
                "level_id": 3,
                "budget": 15000000,
                "is_fixed_price": 0,
                "location": "Here",
                "user_id": 1,
                "created_at": "2018-06-09 20:56:30",
                "updated_at": "2018-06-09 20:56:30",
                "level": {
                    "id": 3,
                    "level": "Expert"
                }
            },
            {
                "id": 2,
                "title": "Laravel developer 2",
                "description": "this is description of the job 2",
                "estimate_time_per_week": 20,
                "estimate_month": 2,
                "level_id": 1,
                "budget": 8000000,
                "is_fixed_price": 0,
                "location": "Here",
                "user_id": 1,
                "created_at": "2018-06-09 20:56:06",
                "updated_at": "2018-06-09 20:56:06",
                "level": {
                    "id": 1,
                    "level": "Entry"
                }
            }
        ],
        "total": 10
    }
}
```

### HTTP Request
`GET api/jobs`

`HEAD api/jobs`


<!-- END_81d1c2fc78507d16a8fc69636128802b -->

<!-- START_5753edb5e23ce63b4ec24bdd90c63e75 -->
## api/jobs

> Example request:

```bash
curl -X POST "http://localhost/api/jobs" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/jobs",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/jobs`


<!-- END_5753edb5e23ce63b4ec24bdd90c63e75 -->

<!-- START_74b5a40ba9a070476f09a9e7fd7e146a -->
## api/jobs/{job}

> Example request:

```bash
curl -X GET "http://localhost/api/jobs/{job}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/jobs/{job}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": false,
    "code": 404,
    "messages": [
        "Data not found"
    ],
    "result": null
}
```

### HTTP Request
`GET api/jobs/{job}`

`HEAD api/jobs/{job}`


<!-- END_74b5a40ba9a070476f09a9e7fd7e146a -->

<!-- START_4ef22be2a3ff6e0429534982d36a87df -->
## api/jobs/{job}

> Example request:

```bash
curl -X PUT "http://localhost/api/jobs/{job}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/jobs/{job}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/jobs/{job}`

`PATCH api/jobs/{job}`


<!-- END_4ef22be2a3ff6e0429534982d36a87df -->

<!-- START_f3e8ed3405c6c954d91caa96f88d0302 -->
## api/jobs/{job}

> Example request:

```bash
curl -X DELETE "http://localhost/api/jobs/{job}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/jobs/{job}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/jobs/{job}`


<!-- END_f3e8ed3405c6c954d91caa96f88d0302 -->

<!-- START_67cba5daad0df93f2a15f8987da2f555 -->
## api/my-portfolios

> Example request:

```bash
curl -X GET "http://localhost/api/my-portfolios" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/my-portfolios",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": true,
    "code": 200,
    "messages": [],
    "result": {
        "data": [
            {
                "id": 5,
                "title": "my portfolio",
                "as": "back-end developer",
                "url": null,
                "description": "this is description of my portfolio",
                "project_start": "2018-01-01 00:00:00",
                "project_end": "2018-01-02 00:00:00",
                "ongoing_project": 1,
                "user_id": 1,
                "created_at": "2018-06-09 23:05:36",
                "updated_at": "2018-06-09 23:05:36"
            },
            {
                "id": 4,
                "title": "my portfolio",
                "as": "back-end developer",
                "url": null,
                "description": "this is description of my portfolio",
                "project_start": "2017-12-31 00:00:00",
                "project_end": "2018-01-02 00:00:00",
                "ongoing_project": null,
                "user_id": 1,
                "created_at": "2018-06-09 23:05:27",
                "updated_at": "2018-06-09 23:05:27"
            }
        ],
        "total": 2
    }
}
```

### HTTP Request
`GET api/my-portfolios`

`HEAD api/my-portfolios`


<!-- END_67cba5daad0df93f2a15f8987da2f555 -->

<!-- START_f26e19ec57ced8fa92bb40dca27bd6d8 -->
## api/my-portfolios/{portfolios}

> Example request:

```bash
curl -X GET "http://localhost/api/my-portfolios/{portfolios}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/my-portfolios/{portfolios}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": false,
    "code": 404,
    "messages": [
        "Data not found"
    ],
    "result": null
}
```

### HTTP Request
`GET api/my-portfolios/{portfolios}`

`HEAD api/my-portfolios/{portfolios}`


<!-- END_f26e19ec57ced8fa92bb40dca27bd6d8 -->

<!-- START_30154cbeff1964b780de371253476f56 -->
## api/portfolios

> Example request:

```bash
curl -X POST "http://localhost/api/portfolios" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/portfolios",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/portfolios`


<!-- END_30154cbeff1964b780de371253476f56 -->

<!-- START_07ca2a909df71abbf7aef3b2d730e81c -->
## api/portfolios/{portfolio}

> Example request:

```bash
curl -X PUT "http://localhost/api/portfolios/{portfolio}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/portfolios/{portfolio}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/portfolios/{portfolio}`

`PATCH api/portfolios/{portfolio}`


<!-- END_07ca2a909df71abbf7aef3b2d730e81c -->

<!-- START_51a985992e6f7df30709d7f1227b1368 -->
## api/portfolios/{portfolio}

> Example request:

```bash
curl -X DELETE "http://localhost/api/portfolios/{portfolio}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/portfolios/{portfolio}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/portfolios/{portfolio}`


<!-- END_51a985992e6f7df30709d7f1227b1368 -->

