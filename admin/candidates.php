<?php
    session_start();
    require('../connection.php');
    $result= $koneksi->query("SELECT * FROM tbCandidates")
    or die("There are no records to display ... \n"  ); 
    if (mysqli_num_rows($result)<1){
        $result = null;
    }
?>
<?php
if (isset($_POST['Submit']))
{

    $newCandidateName = addslashes( $_POST['name'] ); //prevents types of SQL injection
    

    $sql = $koneksi->query( "INSERT INTO tbCandidates(candidate_name) VALUES ('$newCandidateName')" )
            or die("Could not insert candidate at the moment");

    // redirect back to candidates
     header("Location: candidates.php");
    }
?>

<?php
     if (isset($_GET['id']))
     {
     // get id value
     $id = $_GET['id'];
     
     // delete the entry
     $result =  $koneksi->query("DELETE FROM tbCandidates WHERE candidate_id='$id'")
     or die("The candidate does not exist ... \n"); 
     
     // redirect back to candidates
     header("Location: candidates.php");
     }
     else
     // do nothing   
?>

<!DOCTYPE html>

<html>
<head>
<title>online voting</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

<script language="JavaScript" src="js/user.js">
</script>

</head>
<body id="top">

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul class="faico clear">
        <li><a class="faicon-instagram" href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="nospace inline pushright">
        <li><i class="fa fa-phone"></i> +6285816081685</li>
        <li><i class="fa fa-envelope-o"></i> 21082010154@student.upnjatim.ac.id</li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    
    <div id="logo" class="fl_left">
      <h1><a href="index.html">ONLINE VOTING</a></h1>
    </div>
    
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="admin.php">Home</a></li>
        <li><a class="drop" href="#">Admin Panel Pages</a>
          <ul>
            <li><a href="candidates.php">Manage Candidates</a></li>
            <li><a href="refresh.php">Results</a></li>
          </ul>
        </li>        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    
  </header>
</div>

<div >
<table width="380" align="center">
<CAPTION><h3>ADD NEW CANDIDATE</h3></CAPTION>
<form name="fmCandidates" id="fmCandidates" action="candidates.php" method="post" onsubmit="return candidateValidate(this)">
<tr>
    <td bgcolor="#FAEBD7">Candidate Name</td>
    <td bgcolor="#FAEBD7"><input type="text" name="name" /></td>
</tr>

<tr>
    </td>
</tr>
<tr>
    <td bgcolor="#BDB76B">&nbsp;</td>
    <td bgcolor="#BDB76B"><input type="submit" name="Submit" value="Add" /></td>
</tr>
</table>
<hr>
<table border="0" width="620" align="center">
<CAPTION><h3>AVAILABLE CANDIDATES</h3></CAPTION>
<tr>
<th>Candidate ID</th>
<th>Candidate Name</th>
</tr>

<?php
    //loop through all table rows
    while ($row= mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['candidate_id']."</td>";
    echo "<td>" . $row['candidate_name']."</td>";
    echo '<td><a href="candidates.php?id=' . $row['candidate_id'] . '">Delete Candidate</a></td>';
    echo "</tr>";
    }
    mysqli_free_result($result);
    mysqli_close($koneksi);
?>

</table>
<hr>
</div>

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>








