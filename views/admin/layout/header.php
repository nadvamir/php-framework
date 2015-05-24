<!DOCTYPE html>
<html>
<head>
<title>
<?php echo $headerInfo['title']; ?>
</title>
<!-- sylesheets and js -->
<?php  foreach ($headerInfo['css'] as $val): ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $_webPath.'css/'.$val; ?>" />
<?php endforeach; ?>
<?php  foreach ($headerInfo['js'] as $val): ?>
    <script type="text/javascript" language="javascript" src="<?php echo $_webPath.'js/'.$val; ?>"></script>
<?php endforeach; ?>
<meta charset="utf-8" />
</head>
<body onload="">
