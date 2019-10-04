* `Delicious bananas LTD` creating a lot

    route ```/api/v1/lot```
    
    method ```POST```
    
    request
    ```json 
    {
        "supplier": 899,
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
        "id": 41,
        "supplier": 899,
        "cultivar": "Red Dacca",
        "origin": "Costa Rica",
        "weight": 1500,
        "harvestingDate": "2018-07-27"
      }
    }
    ```
  <hr>
* `Delicious bananas LTD` trying to create an overweight lot package
  
  route ```/api/v1/lot```
  
  method ```POST```
  
  request
  ```json 
  {
      "supplier": 899,
      "cultivar": "Red Dacca",
      "origin": "Costa Rica",
      "weight": 500,
      "harvestingDate": "2018-07-27"
  }
  ```
  
  response
  ```json
  {
    "status": 422,
    "message": "Invalid input",
    "data": {
      "errors": [
        {
          "field": "weight",
          "message": "weight must be more than 1000"
        }
      ]
    }
  }
  ```
  <hr>
 * `Delicious bananas LTD` updates a resource
 
   route ```/api/v1/lot/41```
   
   method ```PUT```
   
   request
   ```json
    {
       "harvestingDate": "2018-09-04"
    }
   ```
   
   response
   ```json
    {
      "status": 200,
      "message": "your lot updated successfully.",
      "data": {
        "id": 41,
        "supplier": 899,
        "cultivar": "Red Dacca",
        "origin": "Costa Rica",
        "weight": 1500,
        "harvestingDate": "2018-09-04"
      }
    }
   ```
   <hr>
   
   
	