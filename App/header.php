<?php require $_SERVER['DOCUMENT_ROOT'].'/Core/db.php';?>
<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="utf-8" />
<meta name="csrf-token" content="VYh3D6s0iisN8RsR0WbWoZhRtjDf48HVPSLqbrGK">
<meta name="turbolinks-cache-control" content="no-cache">
<meta name="zalo-platform-site-verification" content="OVwFEx7J9W10sF9UjQOXUK_PjrsZhsG0CJCt" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" sizes="76x76" href="<?=$apiit['favicon'];?>">
<link rel="icon" type="image/png" href="<?=$apiit['favicon'];?>">
<meta property="og:description" content="<?=$apiit['description'];?>">
<meta property="og:type" content="website">
<meta property="og:image" content="<?=$apiit['logo_website'];?>" /> 
<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="315" />
<meta name="author" content="marketmmo" />

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://larathemes.pixelstrap.com/riho/assets/css/vendors/echart.css">
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<?php
    checkcac();
    require ('css.php');
?>
</head>

<noscript>
    <meta http-equiv="refresh" content="0;url=nojs">
</noscript>
