# Product model

We have a data about our products stored in both ElasticSearch and MySQL database. The data is same in both and we mainly query the ElasticSearch. However, from time to time we need to fetch the data directly from MySQL while we do some fancy experiments in ElasticSearch. We would like to access the data about a concrete product from our frontend so we can display it to customer.
As we do have quite some traffic we also need some kind of a caching to be implemented. A simple filesystem cache is sufficient for now but we need to be able to switch it for something more advanced in the future just by a modification of a config file.
Business always wants to know what are the most successful products. Therefore we also need to track the number of requests for each product. We are again ok with storing the information in a plain text file for now. Keep in mind that we will need to change the storage in future as well and swap it for something more robust.

## A basic workflow
- Request with product id comes in.
- If product is cached retrieve from cache.
- If product is not cached retrieve from ElasticSearch/MySQL and add to cache.
- Increment the number of requests for given product.
- Return product data in JSON.

## Example
echo (new ProductController())->detail(10);

## Author
[Dykyi Roman](https://github.com/dykyi-roman/), e-mail: [mr.dukuy@gmail.com](mailto:mr.dukuy@gmail.com)
