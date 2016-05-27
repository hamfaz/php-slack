# PHP Hook Slack

## Example Code

```
// require class
require __DIR__ . '/class.slack.php';

// declaration class
$hook = new hookSlack();

// set slack api url
$hook->api_url = 'url hook slack';

// push data to slack
$text = 'hello world :)';
$hook->push($text);
```
