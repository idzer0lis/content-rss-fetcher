# PHP content, RSS fetcher

###### some usage


```
$involvery = new contentReader('http://involvery.com/thoughtful-hostess-gifts-affordable-unique-hostess-gift-ideas/');

$article = $involvery->filterContent('<article id="', 'article>');

var_dump($article);

```
