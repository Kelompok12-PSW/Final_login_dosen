<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="style.css" rel="stylesheet">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 100%;
  background-color: rgba(227, 241, 18, 0.938);
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: rgb(17, 16, 16);
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: rgb(31, 128, 219);
}

.active {
  background-color: #e5e912;
}


/* THERESYA */
{box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: rgba(227, 241, 18, 0.938);
  width: 15%;
  height: 700px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: rgb(31, 128, 219);
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: rgb(31, 128, 219);
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid rgb(31, 128, 219);
  width: 85%;
  border-left: none;
  height: 700px;
} 


</style>
<body>
<div class="navbar">
  <a class="active" href="#"><i class="fa fa-fw fa-university"></i> E-campus </a> 
  <a href="home.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="modul.php"><i class="fa fa-fw fa-book"></i> Modul</a> 
  <a href="data_mahasiswa_akademis.php"><i class="fa fa-fw fa-graduation-cap"></i> Data Mahasiswa</a>
  <a href="#"><i class="fa fa-fw fa-user"></i>Data Akademik</a> 
  <a href="../login/index.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
</div>

<!-- THERESYA -->

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Home</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Data Induk Mahasiswa</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Kartu Rencana Studi</button>
</div>

<div id="London" class="tabcontent">
  <h1>Hello World</h1>
</div>

<div id="Paris" class="tabcontent">
<h1>Mantap</h1>
</div>

<div id="Tokyo" class="tabcontent">

</div>

  <script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
  </script>



  
</body>

</html>