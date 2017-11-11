<!DOCTYPE html>
<html>
<body>

<form action="{{url('upload')}}" method="post" enctype="multipart/form-data">
{!! csrf_field() !!}
    Select image to upload:
    <input type="file" name="image" id="fileToUpload">
    <input type="submit" value="Upload Image" name="上傳">
</form>

</body>
</html>
