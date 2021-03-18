<?php


$media = $this->getMedia();
echo "<pre>";
print_r($media);
die();

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="contact">
        <h1>Media</h1>
        <hr>
        <form action="<?php echo $this->getUrl('productMedia'); ?>" enctype="multipart/form-data" method="POST">

        <input type="submit" name="update" value="Update" style="margin-left:800px; margin-bottom:20px;">
        <input type="submit" name="remove" value="Remove" style="margin-left:20px; margin-bottom:20px">


        <div class="tables">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Label</th>
                    <th>Small</th>
                    <th>Thumb</th>
                    <th>Base</th>
                    <th>Gallery</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!$media) : ?>
                    <tr>
                        <td>No Media Available</td>
                    </tr>
                <?php else : ?>
                
                <?php foreach ($media as $key => $value): ?>
                <tr>
                    <td><image src="<?php echo $value['image']; ?>" height="100" width="100"></td>
                     <td><input type="text" name="label[<?php echo $value['mediaId'] ?>]" value="<?php echo $value['label'];?>"></td>       
                <td><input type="radio" name="small" value="<?php echo $value['mediaId'] ?>" <?php if($value['small'])echo "checked";?>></td>
                <td><input type="radio" name="thumb" value="<?php echo $value['mediaId'] ?>" <?php if($value['thumb'])echo "checked";?>></td>
                <td><input type="radio" name="base" value="<?php echo $value['mediaId'] ?>" <?php if($value['base'])echo "checked";?>></td>
                <td><input type="checkbox" name="gallery[<?php echo $value['mediaId'] ?>]" <?php if($value['gallery'])echo "checked";?>></td>
                <td><input type="checkbox" name="delete[<?php echo $value['mediaId'] ?>]"></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
            </tbody>
        </table>
    </div>
        <input type="file" name="imagefile" required="required">
        <input type="submit" name="image" value="Upload" class="btn btn-primary">
    </div>

</body>
</html>