<!DOCTYPE html>
<html>
<head>
    <title>上传视屏</title>
    <meta charset="utf-8">
</head>
<body>
@csrf
        <form action="/vedor/text1" method="post" enctype="multipart/form-data">
            视屏上传： <input type="file" name="voder_image">
            <input type="submit" value="上传">
        </form>
</body>
</html>

