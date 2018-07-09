# PHP Pagination function

Simplest php function for creating html to navigate through pages.

### Requirements

* PHP >= 5.4

### Installation

Download `pagination.php` and require in your project

```
require_once("pagination.php");
```

### Usage example

```
$options = [
    "page" => 1,
    "pages" => 3,
    "url" => "/blog.php"
];
echo pagination($options);
```
will be output
```
<ul class='pagination'>
    <li class='active'><span>1</span></li>
    <li><a href='/blog.php?page=2'>2</a></li>
    <li><a href='/blog.php?page=3'>3</a></li>
</ul>
```

### Function options

|Option    |Type| Default | Description |
| ---- | ---- | ---- | ---- |
| `page` | `Integer` | `1` | Current page number |
| `pages` | `Integer` | `1` | Total pages count |
| `show_pages` | `Integer` | `5` | Visible page numbers |
| `edges` | `Integer` | `3` | Visible page numbers  at the begin/end pagination |
| `url` | `String` | `'/'` | Current `URL` (without `GET` parameters) |
| `query` | `String` &#124; `Array` | `''` | `GET` parameters which must be added to `URL` |
| `class` | `String` | `'pagination'` | Class for `ul` tag |
| `class_active` | `String` | `'active'` | Class for active `li` tag |
| `page_as_query` | `Boolean` | `true` | Add page number to `GET` parameters  <br>Example:<br>`true`- `{url}?page={page}`<br>`false` - `{url}page/{page}`<br> |

### Visual explanation

![group 1](https://user-images.githubusercontent.com/16130442/42447879-05959efc-8384-11e8-9385-ebf8c9c49a2c.jpg)
