# get-repo
A simple PHP script to get all repositories of a specific user
# Usage
The getRepositories function will return an associative array with the key being the repository's name and the value the description of it.
```php 
$list = getRepositories('username');
```
after that, you can just iterate through the array with a foreach loop, just like:
```php 
foreach($list as $name => $description){
  echo "$name: $description<br>";
}
```
