# nudity-detector-api
Detects whether the submited image contains nudity.

## Usage
Install composer components `composer install`

Request must be in `application/json`

Example `POST` request to `http://yourawesomehost.com/nudity-detector/check` with the image url you want to check:
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
