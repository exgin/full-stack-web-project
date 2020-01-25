<!-- Dellius Alexander-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Wedgewood Pacific Corporation Demonstration Pages</title>
        <style>
		/* styles search and update form-box */ 
      
        p{
            max-width: 100%;
            height: auto;
        }
		.form-box-in{
            display: flex;
            flex-direction: column;
			justify-content: space-evenly;
        }
		.search-input-box{
			display: flex;
			flex-direction: column;
        }
		.form-label{
			width: 100%;
			height: auto;
			font-size: 1.5em;
			text-align: center;
		}
        .form-content{
			background-color: white;
			text-align: center;
			height: auto;
			width: 100%;
			font-size: 1.25em;
        }
		.search-button{
			font-size: 1.25em;
		}
		.form-box-wrapper{			
			top:1;
			width: 95%;
			height: auto;
			background-image: url("images/shiney2.jpg");
			margin: auto;
        }
	    </style> 
	</head>
	<body>
			<!-- Search box -->
           <form class="form-box-wrapper" method="post" action="form_upd_emp_proj.php">
                <div class="form-box-in">
                    <div class="search-input-box" >
                        <p class="form-label">Search<hr />	</p>
						<p><input class="form-content" type="text" placeholder="Enter A Search Word..." name="search" ></p>
                    </div>
					<p><input class="search-button" type="submit" name="submit-search" value="Search"></p> 
                </div>
			</form>
		
	</body>
</html>