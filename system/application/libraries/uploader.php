<?php

Class Uploader extends MX_Controller
{

	function upload($upload_path = NULL)
	{

			if ($_POST) 
			{	

				if( ! empty($_FILES['file']) ) 
				{		

					$valid_exts = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
					$max_size = 5242880; // max file size 5 MB
					$path = $upload_path; // upload directory
					$uniqueid = uniqid();
					$ext = "";

						// get uploaded file extension
						$ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
						    // looking for format and size validity
						if (in_array($ext, $valid_exts) AND $_FILES['file']['size'] < $max_size) 
						{		
							 
							  		$path = $path  . time() . '.' . $ext;	
							
						 	  
						 	    	// move uploaded file from temp to uploads directory
								    if (move_uploaded_file($_FILES['file']['tmp_name'], $path )) 
								    {

								      	return time() . '.' . $ext;
											
						      		}
						      		else
						      		{
						      			return 'error';

						      		}
					    } 
					    else 
					    {
		      		
								return 'error';		

					    }
				} else 
				{
					return 'error';	
				}

			} else 
			{
			  	
				return 'error';	

			}

	}

	function upload_single($file_name = NULL, $upload_path = NULL)
	{

			if ($_POST) 
			{		
								
				if( ! empty($_FILES['file']) ) 
				{		

					$valid_exts = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
					$max_size = 5242880; // max file size 5 MB
					$path = $upload_path; // upload directory
					$uniqueid = uniqid();
					$ext = "";


						// get uploaded file extension
						$ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
						
						// looking for format and size validity
						if (in_array($ext, $valid_exts) AND $_FILES['file']['size'] < $max_size) 
						{		
							  if($file_name)
							  {
							  	$path = $path  . $file_name . '.' . $ext;

							  }
							  else
							  {

							  	$path = $path  . time() . '.' . $ext;	
			
						 	  }

						 	    	// move uploaded file from temp to uploads directory
								    if (move_uploaded_file($_FILES['file']['tmp_name'], $path )) 
								    {

								      	return $file_name . '.' . $ext;
											
						      		}
						      		else
						      		{
						      			return 'error 1';

						      		}
						     
					    } 
					    else 
					    {
		      		
							return 'error 2';	

					    }

				} 
				else 
				{

					return 'error 3';

				}

			} else 
			{
			  	
				return 'error 4'; 
				

			}

	}

}

?>