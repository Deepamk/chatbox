<?php   $conn = mysqli_connect('localhost', 'root','','chatbox'); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>ADAGARD HEALTH CARE </title>
</head>

</html>

<?php include('db_source.php');
    ?>
	
	<?php
		if(isset($_POST['submitLang']) && !empty($_POST['submitLang']))
		{
            $languageQues = array();
            $languageName=htmlentities($_POST['languageInput']);
           // if($languageName == 'hindi' || $languageName == 'Hindi'){
                $sql = "select * from language WHERE `language_name` =  '".$languageName."' ";
               
                mysqli_set_charset( $conn , 'utf8');
                $result = mysqli_query($conn ,$sql);
               
                while($row = mysqli_fetch_assoc($result)){
                    //print_r($languageQues);
                    array_push( $languageQues  , $row );
                }
           
           
                
            // }else{
                   
            //         header("Content-type: text/html; charset=utf-8");
            //         $url = $weblink . "API.php/getQues";
            //     	$configParamsString = '{
            //     		"languageName":"'.$languageName.'"
                        
            //     							}';   
            //     	 // echo $configParamsString;
                    
            //     	// die;				
            //     	$response = request($url, array('Content-Type:application/json;charset=utf-unicode-8', 'Accept: application/json;charset=utf-unicode-8'), $configParamsString);
                    
            //     	$LanguageQues = json_decode($response);
            //     	$LanguageQues = json_encode($LanguageQues);
                
            //     	$LanguageQues = str_replace("\\", "", $LanguageQues);
            //     	$LanguageQues = str_replace("\"{", "{", $LanguageQues);
            //     	$LanguageQues = str_replace("}\"", "}", $LanguageQues);
            //     	$LanguageQues = str_replace("\"[", "[", $LanguageQues);
            //     	$LanguageQues = str_replace("]\"", "]", $LanguageQues);
            //         $LanguageQues = json_decode($LanguageQues, TRUE );
                  
            // }
            // 
           
            
           
}
	?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Hello, world!</title>
</head>
<body>

    <div class="container-fluid header position-fixed" style="z-index: 99999;">
        <div class="logo">
            <img src="logo.png" class="logoImg">
        </div>
    </div>
	<?php
     
		foreach($languageQues as $key => $value)
		{
          
		?>
          <form  action="submit.php" method="post">
    <div class="container-fluid">
        <div class="row">
          
            <div class="window" style="margin-top:12vh;">
                <div class="left" style="color:#fff">
                    <?= $value['stateQues'] ?>
                </div>
                <div class="right" style="color:#fff">
                    <div class="inputform" style="float:left;">

                        <div style="width:80%;float:left;padding:10px;"  id="inputarea">
                            <select name="state">
                                <option value="">Select one</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Assam">Assam</option>
                                <option value="Telangana">Telangana</option>
                            </select>
                        </div>
                        <div class="button-class" id="button" onclick="panel()">
                            Next
                        </div>
                    </div>
                </div>
                <br /><br />
                <div class="left" id="panelL" style="color:#fff">
                    <?= $value['cityQues'] ?>
                </div>
                <div class="right" id="panelR" style="color:#fff">
                    <div class="inputform" style="float:left;">
                        <div style="width:80%;float:left;padding:10px;" id="cityinputarea">
                            <input type="text" name="city" placeholder="City">
                        </div>
                        <div class="button-class" onclick="agepanel()" id="citybutton">
                            Next
                        </div>
                    </div>
                </div>
                <br /><br />
                <div class="left" id="agepanelL" style="color:#fff">
                    <?= $value['ageQues'] ?>
                </div>
                <div class="right" id="agepanelR" style="color:#fff">
                    <div class="row" onclick="genderpanel()">
                        <div class="col-md-4 agebox" id="agebox1" onclick="age1color()">
                            <input type="radio" name="age" value = "18" id="age1">
                            <label class="form-check-label" for="age1"><?= $value['age1'] ?></label>
                            
                        </div>
                        
                        <div class="col-md-4 agebox"  id="agebox2" onclick="age2color()" style="margin-left:10px;">
                        <input type="radio" name="age" id="age2" value = "18-59">
                        <label class="form-check-label" for="age2"><?= $value['age2'] ?></label>
                           
                        </div>
                        
                        <div class="col-md-3 agebox" name="age" id="agebox3" onclick="age3color()"  style="margin-left:10px;">
                        <input type="radio" name="age" id="age3" value = "60+">
                        <label class="form-check-label" for="age3"> <?= $value['age3'] ?></label>
                           
                        </div>
                        
                        <div class="ageTag"></div>
                    </div>

                </div>

                <div class="left" id="genderpanelL" style="color:#fff">
                    <?= $value['genderQues'] ?>
                </div>
                <div class="right" id="genderpanelR" style="color:#fff">
                    <div class="row" onclick="temppanel()">
                        <div class="col-md-3 genderbox" id="gbox1" onclick="gbox1fun()">
                            <input type="radio" name="gender" id="gender1" value="male">
                            <label class="form-check-label" for="gender1"><?= $value['gender1'] ?></label>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3 genderbox" id="gbox2" onclick="gbox2fun()">
                            <input type="radio" name="gender" id="gender2" value="female">
                            <label class="form-check-label" for="gender2"><?= $value['gender2'] ?></label>
                            
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3 genderbox" id="gbox3" onclick="gbox3fun()">
                            <input type="radio" name="gender" id="gender3" value="other">
                            <label class="form-check-label" for="gender3"><?= $value['gender3'] ?></label>
                            
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="left" id="temppanelL" style="color:#fff">
                    <?= $value['tempQues'] ?>
                </div>
                <div class="rightP" id="temppanelR" style="color:#fff">
                    <div class="row" onclick="symptpanel()">
                        <div class="col-md-3 genderbox" id="tempbox1" onclick="tempbox1fun()">
                            <input type="radio" name="temp" id="temp1" value="Normal(96°F-98.6°F)">
                            <label class="form-check-label" for="temp1"> <?= $value['temp1'] ?></label>
                           
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3 genderbox" id="tempbox2" onclick="tempbox2fun()">
                            <input type="radio" name="temp" id="temp2" value="Feverish (98.6°F-101°F)">
                            <label class="form-check-label" for="temp2"> <?= $value['temp2'] ?> </label>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3 genderbox" id="tempbox3" onclick="tempbox3fun()">
                            <input type="radio" name="temp" id="temp3" value="High (101°F and above)">
                            <label class="form-check-label" for="temp3"> <?= $value['temp3'] ?> </label>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>

                <div class="left" id="symptpanelL" style="color:#fff">
                    <?= $value['symptomsQues'] ?>
                </div>
                <div class="rightPSym" id="symptpanelR" style="color:#fff">
                    <div class="row">
                        <div class="form-check form-check-inline" style="width:90%;">
                            <div class="checkbx" style="">
                                <input class="form-check-input" type="checkbox" name="sympt" onclick="uncheckNoneFun()" id="inlineCheckbox1" value="Dry cough">
                                <label class="form-check-label" for="inlineCheckbox1"><?= $value['sympt1'] ?></label>
                            </div>

                            <div class=" checkbx" style="margin-left:20px;">
                                <input class="form-check-input" type="checkbox" name="sympt" onclick="uncheckNoneFun()" id="inlineCheckbox2" value="Loss or smell& taste">
                                <label class="form-check-label" for="inlineCheckbox2"><?= $value['sympt2'] ?></label>
                            </div>

                            <div class=" checkbx" style="margin-left:20px;">
                                <input class="form-check-input" type="checkbox" name="sympt" onclick="uncheckNoneFun()" id="inlineCheckbox3" value="Breathlessness">
                                <label class="form-check-label" for="inlineCheckbox3"><?= $value['sympt3'] ?></label>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="form-check form-check-inline" style="width:90%;">
                            <div class="checkbx" style="">
                                <input class="form-check-input" name="sympt" type="checkbox" onclick="uncheckNoneFun()" id="inlineCheckbox4" value="Difficulty breathing">
                                <label class="form-check-label" for="inlineCheckbox4"><?= $value['sympt4'] ?></label>
                            </div>

                            <div class=" checkbx" style="margin-left:20px;">
                                <input class="form-check-input"  name="sympt" type="checkbox" onclick="uncheckNoneFun()" id="inlineCheckbox5" value="Appetite decreased">
                                <label class="form-check-label" for="inlineCheckbox5"><?= $value['sympt5'] ?></label>
                            </div>

                            <div class=" checkbx" style="margin-left:20px;">
                                <input class="form-check-input"  name="sympt" type="checkbox" onclick="uncheckNoneFun()" id="inlineCheckbox6" value="Sore throat">
                                <label class="form-check-label" for="inlineCheckbox6"><?= $value['sympt6'] ?></label>
                            </div>

                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="form-check form-check-inline" style="width:90%;">
                            <div class="checkbx" style="">
                                <input class="form-check-input" name="sympt" type="checkbox" onclick="uncheckNoneFun()" id="inlineCheckbox7" value="Sneezing">
                                <label class="form-check-label" for="inlineCheckbox7"><?= $value['sympt7'] ?></label>
                            </div>

                            <div class=" checkbx" style="margin-left:20px;">
                                <input class="form-check-input" name="sympt" type="checkbox" onclick="uncheckNoneFun()" id="inlineCheckbox8" value="Weakness">
                                <label class="form-check-label" for="inlineCheckbox8"><?= $value['sympt8'] ?></label>
                            </div>

                            <div class=" checkbx" style="margin-left:20px;">
                                <input class="form-check-input"  name="sympt" type="checkbox" id="inlineCheckbox9" onclick="uncheckFun()" value="None of the above">
                                <label class="form-check-label" for="inlineCheckbox9">None of the above</label>
                            </div>

                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-9">

                        </div>
                        <div class="col-md-3">
                            <button type="button" onclick="travelpanel()" class="btn btn-info">Next</button>
                        </div>

                    </div>
                </div>

                <div class="left" id="travelL" style="color:#fff">
                    <?= $value['travelQues'] ?>
                </div>
                <div class="right" id="travelR" style="color:#fff">
                    <div class="inputform" style="float:left;">

                        <div style="width:80%;float:left;padding:10px;" id="travelinputarea">
                            <select name="travelhistory">
                                <option value="">Select one</option>
                                <option value="Travelled to affected countries recently"><?= $value['travel1'] ?></option>
                                <option value="Came into contact with someone from/or have travelled through the affected countries">
                                    <?= $value['travel2'] ?>
                                </option>
                                <option value="No history of contact but feeling symptoms"><?= $value['travel3'] ?></option>
                                <option value="No history of contact and symptoms"><?= $value['travel4'] ?></option>
                            </select>
                        </div>
                        <div class="button-class" id="travelbutton" onclick="medicalpanel()">
                            Next
                        </div>
                    </div>
                </div>
                <br /><br />
                <div class="left" id="medicalpanelL" style="color:#fff">
                    <?= $value['medicalQues'] ?>
                </div>
                <div class="rightPSym" id="medicalpanelR" style="color:#fff">
                    <div class="row">
                        <div class="form-check form-check-inline" style="width:95%;">
                            <div class="checkbx" style="width:28%;">
                                <input class="form-check-input" type="checkbox" name="medicalSym" id="inlineCheckbox10" value="Asthma / lung disease">
                                <label class="form-check-label" for="inlineCheckbox10"><?= $value['medical1'] ?></label>
                            </div>

                            <div class=" checkbx" style="width:28%;margin-left:20px;">
                                <input class="form-check-input" type="checkbox" name="medicalSym" id="inlineCheckbox11" value="Diabetes">
                                <label class="form-check-label" for="inlineCheckbox11"><?= $value['medical2'] ?></label>
                            </div>

                            <div class=" checkbx" style="width:28%;margin-left:20px;">
                                <input class="form-check-input" type="checkbox" name="medicalSym" id="inlineCheckbox12" value="Heart disease">
                                <label class="form-check-label" for="inlineCheckbox12"><?= $value['medical3'] ?></label>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="form-check form-check-inline" style="width:95%;">
                            <div class="checkbx" style="width:28%;">
                                <input class="form-check-input" name = "medicalSym"  type="checkbox" id="inlineCheckbox13" value="Stroke">
                                <label class="form-check-label" for="inlineCheckbox13"><?= $value['medical4'] ?> </label>
                            </div>

                            <div class=" checkbx" style="width:28%;margin-left:20px;">
                                <input class="form-check-input" name = "medicalSym"  type="checkbox" id="inlineCheckbox14" value="Kidney disease">
                                <label class="form-check-label" for="inlineCheckbox14"><?= $value['medical5'] ?></label>
                            </div>

                            <div class=" checkbx" style="width:28%;margin-left:20px;">
                                <input class="form-check-input" name = "medicalSym"  type="checkbox" id="inlineCheckbox15" value="Reduced immunity">
                                <label class="form-check-label" for="inlineCheckbox15"><?= $value['medical6'] ?></label>
                            </div>

                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-9">

                        </div>
                        <div class="col-md-3">
                            <button type="button" onclick="changesympanel()" class="btn btn-info">Next</button>
                        </div>

                    </div>
                </div>
                <div class="left" id="changesymL" style="color:#fff">
                    <?= $value['changeSymptQues'] ?>
                </div>
                <div class="right" id="changesymR" style="color:#fff">
                    <div class="inputform" style="float:left;">

                        <div style="width:80%;float:left;padding:10px;" id="travelinputarea">
                            <select>
                                <option value="">Select one</option>
                                <option value="Increased"><?= $value['changeSympt1'] ?></option>
                                <option value="Decreased">
                                    <?= $value['changeSympt2'] ?>
                                </option>
                                <option value="opel"><?= $value['changeSympt3'] ?>  </option>
                                <option value="audi"><?= $value['changeSympt4'] ?></option>
                            </select>
                        </div>
                        <div class="button-class" id="travelbutton" onclick="submitbutton()">
                            Next
                        </div>
                    </div>
                </div>

            </div>
            <br /><br /><br /><br />

        </div>
    </div>
    <br><br><br>
	<?php
		}
		?>
    <div class="container-fluid" id="submitbutton" style="width:100%;">
        <div class="container">
            <div class="row">
                <div class="col-md-4" style="margin-left:auto;margin-right:auto;">
                    <button type="submit" class="btn btn-success" name="submitForm" >Submit Your Response</button>
                </div>

            </div>
        </div>
    </div>
    </form>
    <script>
		function uncheckNoneFun()
		{
			document.getElementById("inlineCheckbox9").checked = false;
		}
		function uncheckFun()
		{
			document.getElementById("inlineCheckbox1").checked = false;
			document.getElementById("inlineCheckbox2").checked = false;
			document.getElementById("inlineCheckbox3").checked = false;
			document.getElementById("inlineCheckbox4").checked = false;
			document.getElementById("inlineCheckbox5").checked = false;
			document.getElementById("inlineCheckbox6").checked = false;
			document.getElementById("inlineCheckbox7").checked = false;
			document.getElementById("inlineCheckbox8").checked = false;
		}
        function panel() {
            document.getElementById("panelL").style.display = "block";
            document.getElementById("panelR").style.display = "block";
            document.getElementById("button").style.display = "none";
            document.getElementById("inputarea").style.width = "100%";
        }
        function submitbutton() {
            document.getElementById("submitbutton").style.display = "block";

        }
        function medicalpanel() {
            document.getElementById("medicalpanelL").style.display = "block";
            document.getElementById("medicalpanelR").style.display = "block";
            document.getElementById("travelbutton").style.display = "none";
            document.getElementById("travelinputarea").style.width = "100%";
        }
        function travelpanel() {
            document.getElementById("travelL").style.display = "block";
            document.getElementById("travelR").style.display = "block";
        }
        function changesympanel() {
            document.getElementById("changesymL").style.display = "block";
            document.getElementById("changesymR").style.display = "block";
        }
        function agepanel() {
            document.getElementById("agepanelL").style.display = "block";
            document.getElementById("agepanelR").style.display = "block";
            document.getElementById("citybutton").style.display = "none";
            document.getElementById("cityinputarea").style.width = "100%";
        }
        function genderpanel() {
            document.getElementById("genderpanelL").style.display = "block";
            document.getElementById("genderpanelR").style.display = "block";

        }
        function temppanel() {
            document.getElementById("temppanelL").style.display = "block";
            document.getElementById("temppanelR").style.display = "block";

        }
        function symptpanel() {
            document.getElementById("symptpanelL").style.display = "block";
            document.getElementById("symptpanelR").style.display = "block";

        }
        function age1color() {
            document.getElementById("agebox1").style.backgroundColor = "#339CFF";
            document.getElementById("agebox1").style.color = "#fff";
            document.getElementById("agebox2").style.backgroundColor = "#fff";
            document.getElementById("agebox3").style.backgroundColor = "#fff";
            document.getElementById("agebox2").style.color = "black";
            document.getElementById("agebox3").style.color = "black";
        }
        function age2color() {
            document.getElementById("agebox2").style.backgroundColor = "#339CFF";
            document.getElementById("agebox2").style.color = "#fff";
            document.getElementById("agebox1").style.backgroundColor = "#fff";
            document.getElementById("agebox3").style.backgroundColor = "#fff";
            document.getElementById("agebox1").style.color = "black";
            document.getElementById("agebox3").style.color = "black";
        }
        function age3color() {
            document.getElementById("agebox3").style.backgroundColor = "#339CFF";
            document.getElementById("agebox3").style.color = "#fff";
            document.getElementById("agebox1").style.backgroundColor = "#fff";
            document.getElementById("agebox2").style.backgroundColor = "#fff";
            document.getElementById("agebox1").style.color = "black";
            document.getElementById("agebox2").style.color = "black";
        }
        function gbox1fun() {
            document.getElementById("gbox1").style.backgroundColor = "#339CFF";
            document.getElementById("gbox1").style.color = "#fff";
            document.getElementById("gbox2").style.backgroundColor = "#fff";
            document.getElementById("gbox3").style.backgroundColor = "#fff";
            document.getElementById("gbox2").style.color = "black";
            document.getElementById("gbox3").style.color = "black";
        }
        function gbox2fun() {
            document.getElementById("gbox2").style.backgroundColor = "#339CFF";
            document.getElementById("gbox2").style.color = "#fff";
            document.getElementById("gbox1").style.backgroundColor = "#fff";
            document.getElementById("gbox3").style.backgroundColor = "#fff";
            document.getElementById("gbox1").style.color = "black";
            document.getElementById("gbox3").style.color = "black";
        }
        function gbox3fun() {
            document.getElementById("gbox3").style.backgroundColor = "#339CFF";
            document.getElementById("gbox3").style.color = "#fff";
            document.getElementById("gbox1").style.backgroundColor = "#fff";
            document.getElementById("gbox2").style.backgroundColor = "#fff";
            document.getElementById("gbox1").style.color = "black";
            document.getElementById("gbox2").style.color = "black";
        }
        function tempbox1fun() {
            document.getElementById("tempbox1").style.backgroundColor = "#339CFF";
            document.getElementById("tempbox1").style.color = "#fff";
            document.getElementById("tempbox2").style.backgroundColor = "#fff";
            document.getElementById("tempbox3").style.backgroundColor = "#fff";
            document.getElementById("tempbox2").style.color = "black";
            document.getElementById("tempbox3").style.color = "black";
        }
        function tempbox2fun() {
            document.getElementById("tempbox2").style.backgroundColor = "#339CFF";
            document.getElementById("tempbox2").style.color = "#fff";
            document.getElementById("tempbox1").style.backgroundColor = "#fff";
            document.getElementById("tempbox3").style.backgroundColor = "#fff";
            document.getElementById("tempbox1").style.color = "black";
            document.getElementById("tempbox3").style.color = "black";
        }
        function tempbox3fun() {
            document.getElementById("tempbox3").style.backgroundColor = "#339CFF";
            document.getElementById("tempbox3").style.color = "#fff";
            document.getElementById("tempbox1").style.backgroundColor = "#fff";
            document.getElementById("tempbox2").style.backgroundColor = "#fff";
            document.getElementById("tempbox1").style.color = "black";
            document.getElementById("tempbox2").style.color = "black";
        }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>