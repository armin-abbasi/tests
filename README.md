* `Delicious bananas LTD` creating a lot

    route ```/api/v1/lots```
    
    method ```POST```
    
    request
    ```json 
    {
        "supplier": 899,
        "cultivar": "Red Dacca",
        "origin": "Costa Rica",
        "weight": 1500,
        "harvesting_date": "2018-07-27"
    }
    ```
    
    response
    ```json
    {
      "status": 200,
      "message": "lot created successfully.",
      "data": {
        "id": 41,
        "supplier_id": 899,
        "cultivar": "Red Dacca",
        "origin": "Costa Rica",
        "weight": 1500,
        "harvesting_date": "2018-07-27"
      }
    }
    ```
  <hr>
* `Delicious bananas LTD` trying to create an overweight lot package
  
  route ```/api/v1/lots```
  
  method ```POST```
  
  request
  ```json 
  {
      "supplier_id": 899,
      "cultivar": "Red Dacca",
      "origin": "Costa Rica",
      "weight": 500,
      "harvesting_date": "2018-07-27"
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
 
   route ```/api/v1/lots/41```
   
   method ```PUT```
   
   request
   ```json
    {
       "harvesting_date": "2018-09-04"
    }
   ```
   
   response
   ```json
    {
      "status": 200,
      "message": "lot updated successfully.",
      "data": {
        "id": 41,
        "supplier_id": 899,
        "cultivar": "Red Dacca",
        "origin": "Costa Rica",
        "weight": 1500,
        "harvesting_date": "2018-09-04"
      }
    }
   ```
   <hr>
* `Delicious bananas LTD` starts an auction

  route ```/api/v1/lots/41/auctions```
  
  method ```POST```
  
  request
  ```json
   {
      "starting_date": "2018-09-04",
      "finishing_date": "2018-09-05",
      "initial_price": "1.20"
   }
  ```
  
  response
  ```json
   {
     "status": 200,
     "message": "auction created successfully.",
     "data": {
       "id": 35,
       "lot_id": 41,
       "supplier_id": 899,
       "starting_date": "2018-09-04",
       "finishing_date": "2018-09-05",
       "initial_price": "1.20"
     }
   }
  ```
  <hr>
   
	