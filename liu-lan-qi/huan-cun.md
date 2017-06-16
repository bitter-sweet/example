### 禁止浏览器缓存

> HTML添加meta标签

```html
<meta http-equiv="Pragma" content="no-cache"> 
<meta http-equiv="Cache-Control" content="no-cache"> 
<meta http-equiv="Expires" content="0">
```

> PHP 添加header

```php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT'); 
header('Cache-Control: no-cache,no-store, must-revalidate,max-age=0');
header("Cache-Control: post-check=0, pre-check=0", false);
header('Pragma: no-cache');
```



### 浏览器返回上一步强制刷新

```js
//JS
window.onpageshow = function(event) {
    if (event.persisted) {
        window.location.reload();
    }
};
//JQuery
$(window).bind("pageshow", function(event) {
    if (event.originalEvent.persisted) {window.location.reload();}
});
```



