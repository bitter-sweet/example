### 文件上传例子

> ```js
> const multiparty = require('multiparty');
> var form = new multiparty.Form({ uploadDir: './public/files' });
>     form.parse(req, function(err, fields, files) {
>         if (err) {
>             console.log('parse error: ' + err);
>             res.send("写文件操作失败。");
>         }
>         var inputFile = files.upfile[0];
>         var uploadedPath = inputFile.path;
>         var dstPath = './public/files/' + inputFile.originalFilename;
>         //重命名为真实文件名
>         fs.rename(uploadedPath, dstPath, function(err) {
>             if (err) {
>                 console.log('rename error: ' + err);
>             } else {
>                 console.log('rename ok');
>             }
>         });
>     });
> ```



