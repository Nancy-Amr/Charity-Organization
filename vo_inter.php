<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.gallery {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    padding: 20px;
}

.gallery a {
    position: relative;
}

.gallery img {
    width: 100%;
    max-width: 500px; 
    height: auto;
}

.caption {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery a:hover .caption {
    opacity: 1;
}
h1 {
        text-align: center; 
    }
</style>
</head>
<body>
<h1>Volunteerong Opportunities</h1>
    <div class="gallery">
        <a href="vo_form.php?image=قوافل خيرية"><img src="image1.jpg" alt="Image 1"><span class="caption">قوافل خيرية</span></a>
        <a href="vo_form.php?image=حملة اطعام محتاج"><img src="image2.jpg" alt="Image 2"><span class="caption">حملة اطعام محتاج</span></a>
        <a href="vo_form.php?image=اصلح شجرة"><img src="image3.jpg" alt="Image 3"><span class="caption">اصلح شجرة</span></a>
    </div>
</body>
</html>  
