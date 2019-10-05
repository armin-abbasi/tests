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
  
* `German Retailer GmbH` makes a bid on auction
  
    route ```/api/v1/lots/41/bids```
    
    method ```POST```
    
    request
    ```json
     {
        "buyer": 72,
        "offer": "1.35"
     }
    ```
    
    response
    ```json
     {
       "status": 200,
       "message": "bid created successfully.",
       "data": {
         "id": 52,
         "buyer_id": 72,
         "offer": "1.35"
       }
     }
    ```

 <hr>
 
 * `Delicious bananas LTD` wants to see a list of bids on his lot
      
    route ```/api/v1/lots/41/bids```
    
    method ```GET```
    
    request
    ```
    query parameter: page
    ```
    
    response
    ```json
    {
     "code": 200,
     "message": "all bids retrieved successfully.",
     "data": {
        "current_page": 1,
        "data": [
            {
                "id": 52,
                "offer": "1.35",
                "buyer": {
                   "id": 72,
                   "name": "German Retailer GmbH"
                }
            }
        ],
        "first_page_url": "/api/v1/lots/41/bids?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "/api/v1/lots/41/bids?page=1",
        "next_page_url": null,
        "path": "/api/v1/lots/41/bids",
        "per_page": 5,
        "prev_page_url": null,
        "to": 5,
        "total": 5
       }
     }
    ```
    
* `Delicious bananas LTD` wants to remove sold lot
  
    route ```/api/v1/lots/41```
    
    method ```DELETE```
    
    request
    
    ```none```
    
    response
    ```json
     {
       "status": 200,
       "message": "lot deleted successfully.",
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