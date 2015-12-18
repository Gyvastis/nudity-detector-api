# nudity-detector-api
Detects whether the submited image contains nudity.

## Usage
`$ git clone https://github.com/Gyvastis/nudity-detector-api.git`

`$ cd nudity-detector-api`

`$ composer install`

Request must be in `application/json`

Example `POST` request to `http://yourawesomehost.com/nudity-detector-api/check` with the image url you want to check:
```json
{
    "url":"https://pbs.twimg.com/media/CS9FQg8UsAAwybp.jpg"
}
```

Example `JSON` response:
```json
{
    "success": true,
    "message": "Image processed successfully",
    "data": {
        "nude": "9.15%",
        "minimal": "59.5%"
    }
}
```

* `nude` parameter shows how much nudity does the image expose
* `minimal` parameter identifies whether the subject in the image is minimally dressed

### Note
Use this at your own risk, as it depends on a third party. Consider using a proxy too.


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/Gyvastis/nudity-detector-api/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

