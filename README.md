`ROUTE` ```/api/v1/lot```

`METHOD` ```POST```

`REQUEST`
```json 
{
    "supplier": "Delicious bananas LTD",
    "cultivar": "Red Dacca",
    "origin": "Costa Rica",
    "weight": 1500,
    "harvestingDate": "2018-07-27"
}
```

`RESPONSE`
```json
{
  "status": 200,
  "message": "your lot successfully created.",
  "data": {
    "id": 899,
    "supplier": "Delicious bananas LTD",
    "cultivar": "Red Dacca",
    "origin": "Costa Rica",
    "weight": 1500,
    "harvestingDate": "2018-07-27"
  }
}
```


	