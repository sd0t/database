<!---
    AUTHOR	DENISE THUY VY NGUYEN =^.,.^=
    DATE    	10/31/2017
    COURSE   	CIS444 
    PURPOSE  	{s.dot} Connection to Database
-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <title>{s.dot} homepage</title>
    <link rel="icon" href="../images/sdot.png" />
    
    <!--BOOTSTRAP-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/sdot.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>
  
  <body>
    <header>
      <!--TOP NAV-->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	<a class="navbar-brand" href="../html/index.html">
          <img src="../images/sdot.png" width="autp" height="25" align="text-center">
	  {s.dot}	
	</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon">
	  </span>
        </button>	
	<!--TOP NAV-->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../html/index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../html/newprojects.html">New Project</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../html/viewprojects.html">Choose Project</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../html/settings.html">User Preference</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../html/logout.html">Logout</a>
            </li>
          </ul>      
	</div>
      </nav>
    </header>
    
    
    <!--SIDE NAV-->
    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="../html/projectoverview.html">Overview</a>
            </li>       
          </ul>
	</nav>
	<!--SIDE NAV-->
	
	<!--================================================================================-->
	<!--MAIN CONTENT-->
	<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
	  <h1>{s.dot}</h1>
	  <section class="row text-center placeholders">
            <img src="../images/sdot.png" width="autp" height="400" align="text-center">
	  </section>
	  
	  <!--PHP-->	  
	  <?php
	     // CONNECT TO MYSQL
	     $db = mysqli_connect("localhost", "nguye208", "091292");
	     // TEST CONNECTION TO MYSQL
	     if(!$db){
	     print "●︿● ERROR - Unable to connect to MySQL.";
	     exit;
	     }

	     // Select my account on school server database
	     $my_account = mysqli_select_db($db, "USERS");
	     
	     //SELECT DATABASE
	     $er = mysql_select_db("USERS");
	     if(!$er){
	     print "●︿● ERROR: COULD NOT SELECT DATABASE";
	     }
	     //GET THE usernameID 
	     $UsernameIDq = $_POST['UsernameID'];
	     //CLEAN UP
	     $UsernameIDq = stripcslashes($UsernameID);
	     //DISPLAYS THE WHERE CLAUSE
	     $UsernameID_html = htmlspecialchars($UsernameIDq);
	     
	     //STORE QUERY
	     $query = "SELECT * FROM USERS WHERE Username ='$userID_html'";
	     //EXECUTE QUERY
	     $result = mysqli_query($db, $query);
	     //DISPLAY QUERY ERROR 
	     if(!result){
	     print"●︿● ERROR: Query not executable!";
	     $error = mysql_error();
	     print "<p>" . $error . "</p>";
	     exit;
	     }

	     //DISPLAY RESULTS IN A TABLE 
	     print "<table><caption><h1>USERS</h1>";
	     print "<h2>Username entered:" . $userID_html . "</h2></caption>";
	     print "<tr align='center'>";

	     //RETRIEVE THE # OF ROWS 
	     $num_rows = mysqli_num_rows($result);
	     //RESULTS WILL BE PUT INTO HTML TABLE
	     if($nums_rows > 0){
	     	//RETRIEVE FIRST ROW RESULT
	     	$fristRow = mysql_fetch_assoc($result);
	     	//RETRIEVE THE #  OF RESULTS
	     	$nums_feild = mysqli_num_feild($result);
	     	//RETIEVE COLUMN NAMES
	     	$keys = array_keys($fristRow);

	     	//DISPLAY COLUMN NAMES AS COLUMN HEADERS
	     	for($index=0; $index < $num_fields; $index++){
	     		print "<th>" . $keys[$index] . "</th>";
	     	}
	     	//END TABLE ROW FOR COLUMN HEADERS
	     	print "</tr>";


	     	//DISPLAY THE VALUES OF EACH FIELD IN THE ROW
	     	for($row_num=0; $row_num < $num_rows; $row_num++){
	     		print "<tr>";
	     		$values = array_values($fristRow);

	     		for($i=0; $i < $num_fields; $i++){
	     			$value = htmlspecialchars($values[$i]);
	     			print "<td>" . $value . "</td>";
	     		}
	     		//END ROW
	     		print "</tr>";
	     		//NEXT ROW
	     		$fristRow = mysqli_fetch_assoc($result);
	     	}
	     }
	     else{
	     	print "There was no such row!";
	     }

	     //CLOSE TABLE
	     print "</table>";
	     ?>
	  
	  
	  <form action="login.php" id="myForm" method="POST">
	    <h2>Enter in user ID and password</h2>
	    <div class="table-responsive">
	      <table class="table table-striped">
		<thead>
		  <tr>
		    <th>Username:</th>
		    <td>
		      <input type = "text" id="Username" size = "60" placeholder="Enter in username" onchange=""/>
		    </td>
		  </tr>
		</thead>
		
		<tbody>
		  <tr>
		    <th>Password:</th>
		    <td>
		      <input type = "text" id="Password" size = "60" placeholder="Enter in a password" onchange=""/>
		    </td>
		    
		  </tr>
		</tbody>
	      </table>
	      <a class="btn btn-lg btn-primary" href="../html/login.html" role="button">Login</a>
	      <a class="btn btn-lg btn-primary"  type="button" value="reset" onclick="clearProject()">
		Clear
	      </a>
	     </form>

	      <h1>PHP connect to MySQL</h1>
	      
	      
	      
	    </div>
        </main>
      </div>
    </div>
    
    
    
    <!-- Bootstrap core JavaScrip
	 ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
      <script src="../js/popper.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
  </body>
</html>