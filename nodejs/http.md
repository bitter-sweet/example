### 服务端发起HTTP请求

```js
var data = {
        firstname: 'james',
        lastname: "green"
    };
    data = require('querystring').stringify(data);
    data = new Buffer(data).toString('base64');
    var opt = {
        method: "POST",
        host: "test.com",
        port: 80,
        path: "/2.php",
        headers: {
            "Content-Type": 'application/x-www-form-urlencoded',
            "Content-Length": data.length
        }
    };
    var request = http.request(opt, function(serverFeedback) {
        if (serverFeedback.statusCode == 200) {
            var body = "";
            serverFeedback.on('data', function(chunk) {
                    body += chunk;
                    console.log('chunk');
                })
                .on('end', function() {
                    console.log('end');
                    // var enBody = new Buffer(body).toString('base64');
                    res.send(body);
                });
        } else {
            res.send(500, "error");
        }
    }).setTimeout(3000, function() {//设置请求超时
        request.end();
        console.log('net connect timeout');
        res.send('net connect timeout');
    });
    request.write(data + "\n");
    request.end();
```



