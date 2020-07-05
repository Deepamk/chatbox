<?php
    include('db_source.php');
    ?>
	
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>ADAGARD HEALTH CARE </title>
</head>
<body>
<form method="post" action="./chat.php"  enctype="multipart/form-data">
    <div class=" container-fluid">
        <div class=" container">
            <div class=" row" >
                <?php
					$url = $weblink . "./API.php/allLanguages_input";
					$configParamsString = '{
					
						
											}';   
					//echo $configParamsString;                                           
					$response = request($url, array('Content-Type:application/json', 'Accept: application/json'), $configParamsString);
					
					$allLanguages = json_decode($response);
					$allLanguages = json_encode($allLanguages);
					
					$allLanguages = str_replace("\\", "", $allLanguages);
					$allLanguages = str_replace("\"{", "{", $allLanguages);
					$allLanguages = str_replace("}\"", "}", $allLanguages);
					$allLanguages = str_replace("\"[", "[", $allLanguages);
					$allLanguages = str_replace("]\"", "]", $allLanguages);
					$allLanguages = json_decode($allLanguages, TRUE);
				?>
				
                <div  class="col-md-12">
                    <img src="logo.png" style="display: block;margin-left: auto;margin-right: auto;width: 50%;margin-top:25vh;" />
                    <div class="row ">
                        <div class=" col-md-4"></div>
						
                        <div class="col-md-3" style="display: block;margin-left: auto;margin-right: auto;margin-top:5vh;">
                            <label for="exampleFormControlSelect1">Please Select Your language</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="languageInput" value="<?= $value['language_name'] ?>">
								
								<?php
									foreach($allLanguages as $value)
									{
										
								?>
                                <option value="<?= $value['language_name'] ?>">
									<?= $value['language_name'] ?>
								</option>
								<?php
									}
								?>
                                
                            </select>

                        </div>
                        <div class="col-md-1">
                            <button type="submit" name="submitLang" value="Submit" class="btn btn-success" style="margin-top:10vh;">Submit</button>
                        </div>
						</form>
                        <div class=" col-md-4"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>