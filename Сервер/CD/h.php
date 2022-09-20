
<style>
  body { background: #F3F3F3;
        font:9pt Franklin Gothic Book;
        font-weight: normal;
      }

   h1 {
    margin-bottom: -20px;
    margin-top: 0px;
   }

    a {
    text-decoration: none; width:800px;
   }

    h3 {
    margin-bottom: 0px;
    margin-top: 0px;
   }

 h4 {
    margin-bottom: 0px;
    margin-top: 0px;
    background-color: #57ab8e;
   }


input#image-button{
    background: #FFF url('img/folder_closed.png') no-repeat left/5%;
    padding-left: 20px;


}




button {
  width:100px;
  height: 40px;
  background-color: #57ab8e;
  font:9pt Franklin Gothic Book;
  color: white;
  border-radius: 10pt;
}

.mkdir {
background:transparent url('img/mkdir.png')  no-repeat  center/60%;
}

.ins{
  background:transparent url('img/ins.png')  no-repeat  center/60%;
}

.uplo {
    width:100%;
  height: 30px;
  background-color: black;
  font:17pt Franklin Gothic Book;
  color: white;
}

.move{
  background:transparent url('img/move.png')  no-repeat  center/60%;
}

.fold {
background:transparent url('img/arrow.png')  no-repeat  center/100%;
}

.ren {
background:transparent url('img/edit.png')  no-repeat  center/90%;
width: 20px;

}

.log
{
position: absolute;
left: 15px;
bottom:2px;
z-index: 2;
 }

.copy {
background:transparent url('img/copy.png')  no-repeat  left/90%;
width: 20px;

}


.del {
background:transparent url('img/Trashcan.png')  no-repeat  center/80%;
width: 20px;

}

.direct {
background-color: white;

width: 25px;
height: 25px;
}


TABLE {
  table-layout: fixed;
  margin: 100px auto auto;
  border-collapse: collapse;
  background-color: white;


}
 TD, TH {
 /* Поля вокруг содержимого таблицы */
    border: 1px solid grey; /* Параметры рамки */
   }

TR {height:10px;}

TD {
border-right:0;
border-left:0;
word-wrap:break-word;

padding-top: 0px;
padding-bottom: 0px;
padding-left: 5px;
width: 30px;
}

input[type=submit] {
  border: 0;
  cursor: pointer;
  color: #775f48 ;
  font-weight:normal;
  text-align: left;

   font:20pt Franklin Gothic Book;
}




  </style>




<div style = "position: fixed;left: 0;top: 0; width:100%;height: 78px;text-align: center;background: #F3F3F3;">






<div style ='position:fixed;float: left;'>
<form action = 'view.php' method='post'>
    <p>
      <input type = 'submit' style = 'width:70px;height:45px;padding:0px;margin:0px auto;' name='followb' class = 'fold' value = ' '>
    </p>

  </form></div>



<div style="float: right;padding: 1%;  "><form action="entry.php" method="post"><button style = 'width:100%;height:53px;font:150% Franklin Gothic Book;'><h4>войти</h4></button></form></div>



<?php if(@$_COOKIE['access'] == file_get_contents('pass.txt', true)){

echo "

<div style='position:fixed;left:70px;float: left;'>
<form action = 'view.php' method='post'>
    <p>
      <input type = 'submit' style = 'width:70px;height:40px;padding:0;margin:0px auto;' name='mkdir' class = 'mkdir' value = ' '>
    </p>

  </form></div>

  <div style='position:fixed;left:140px;float: left;'>
<form action = 'view.php' method='post'>
    <p>
      <input type = 'submit' style = 'width:70px;height:40px;padding:0;margin:0px auto;' name='ins' class = 'ins' value = ' '>
    </p>

  </form></div>;


  <div style='position:fixed;left:210px;top:0px;float: left;'>
<form action = 'view.php' method='post'>
    <p>
      <input type = 'submit' style = 'width:70px;height:40px;padding:0;margin:0px auto;' name='move' class = 'move' value = ' '>
    </p>

  </form></div>";




echo "<div  style='position: relative;top:25px; margin:0px 0px;'>
 <form enctype='multipart/form-data' class= 'uplo'  action = '/view.php' method='POST'>
   <p><input type='file'  name='userfile'>
   <input type='hidden' name='dir'  value='$dir'>
   <input type='submit'  style = ' text-align: center;
font-size: 20px;
width:50px;
  background:orange;
    border-radius: 20pt;
  color:black;' value='+'></p>
  </form></div>";

echo "</div>";




}
?>




</div>