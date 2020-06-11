<?php
require('vendor/autoload.php');

// Upload a publicly accessible file. The file size and type are determined by the SDK.
// try {
//     $s3->putObject([
//         'Bucket' => 'my-bucket',
//         'Key'    => 'my-object',
//         'Body'   => fopen('/path/to/file', 'r'),
//         'ACL'    => 'public-read',
//     ]);
// } catch (Aws\S3\Exception\S3Exception $e) {
//     echo "There was an error uploading the file.\n";
// }
// this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars
$s3 = new Aws\S3\S3Client([
    'version'  => 'latest',
    'region'   => 'us-east-1',
]);
 $bucket = getenv('S3_BUCKET_UPLOADS')?: die('No "S3_BUCKET_UPLOADS" config var in found in env!');
// $bucket = '';
?>
<html>
    <head><meta charset="UTF-8"></head>
    <body>
        <h1>S3 upload example</h1>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['userfile']) && $_FILES['userfile']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['userfile']['tmp_name'])) {
    // FIXME: you should add more of your own validation here, e.g. using ext/fileinfo
    try {
        // FIXME: you should not use 'name' for the upload, since that's the original filename from the user's computer - generate a random filename that you then store in your database, or similar
        //$upload = $s3->upload($bucket, $_FILES['userfile']['name'], fopen($_FILES['userfile']['tmp_name'], 'rb'), 'public-read');
        $valid_extensions = array('jpeg', 'jpg', 'png');
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));    
        $key = array_keys($valid_extensions, $ext);
            $contentType = array(
               'jpeg' => 'image/jpeg',
               'jpg' => 'image/jpeg',
               'png' => 'image/png'
            );
        $Content_Type = $contentType[$key[0]];
         
        $upload = $s3->putObject([
            'Bucket' => $bucket,
            'Key'    => rand(1000,1000000).$_FILES['userfile']['name'],
            'Body'   => fopen($_FILES['userfile']['tmp_name'], 'r'),
            'ACL'    => 'public-read',
            'ContentType' => $Content_Type,
        ]);
?>
        <p>Upload <a href="<?=htmlspecialchars($upload->get('ObjectURL'))?>">successful</a> :</p>
<?php } catch(Exception $e) { ?>
        <p>Upload error :</p>
<?php } } ?>
        <h2>Upload a file</h2>
        <form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
            <input name="userfile" type="file"><input type="submit" value="Upload">
        </form>
    </body>
</html>
