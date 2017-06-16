### 禁止浏览器缓存

* 添加meta标签

```
<meta http-equiv="Pragma" content="no-cache"> 
<meta http-equiv="Cache-Control" content="no-cache"> 
<meta http-equiv="Expires" content="0">
```

* 浏览器返回上一步强制刷新
  * js

```
window.onpageshow = function(event) {
    if (event.persisted) {
        window.location.reload();
    }
}
```

* JQuery

```
$(window).bind("pageshow", function(event) {
    if (event.originalEvent.persisted) {window.location.reload();}
});
```



