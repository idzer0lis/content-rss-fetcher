# PHP content stealer

###### some usage


```
$involvery = new blogReader('http://involvery.com/' . 'thoughtful-hostess-gifts-affordable-unique-hostess-gift-ideas/');

$article = $involvery->filterContent('<article id="', 'article>');

var_dump($article);

```


    
#### To do
- To do list