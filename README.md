route ```/api/v1/lot```

method ```POST```

request
```json 
{
    "supplier": "Delicious bananas LTD",
    "cultivar": "Red Dacca",
    "origin": "Costa Rica",
    "weight": 1500,
    "harvestingDate": "2018-07-27"
}
```

response
```json
{
  "status": 200,
  "message": "your lot created successfully.",
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


	