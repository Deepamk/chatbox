<?php
     include('db_source.php');
     if(isset($_POST['submitBtn'])){
        $phone = htmlentities($_POST['phone']);
        $pin = htmlentities($_POST['pin']);
        $sqlRisk = "INSERT INTO `risk_users`( `phone`, `pin`) VALUES ( '".$phone."' , '".$pin."')";
        $riskAdd = mysqli_query($conn , $sqlRisk);
        
        if($riskAdd == '1'){ 
           $alert = '<div class="alert alert-success text-center">Response Recorded</div>';
        }else{
           $alert = '<div class="alert alert-success text-center">Failed to Record Response</div>';
        }
     }

     if(isset($_POST['submitForm'])){
        $state = htmlentities($_POST['state']);
        $age = htmlentities($_POST['age']);
        $city = htmlentities($_POST['city']);
        $gender = htmlentities($_POST['gender']);
        $temp = htmlentities($_POST['temp']);
        $htmlDiv = '';
        $sympt = htmlentities($_POST['sympt']);
        $travelhistory = htmlentities($_POST['travelhistory']);
        if(isset($_POST['medicalSym'])){
         $medicalSym = htmlentities($_POST['medicalSym']);
        }else{
         $medicalSym = '';
        }
       
        $alert = '';

        $sqlInsert = "INSERT INTO `user_info`( `state`, `city`, `gender`, `temp`, `sympt`, `travelhistory`, `medicalSym` ) 
                      VALUES ('".$state."' , '".$city."' , '".$gender."' , '".$temp."' , '".$sympt."' , '".$travelhistory."' ,'".$medicalSym."' )";

        mysqli_query($conn , $sqlInsert);

        if($temp == 'Feverish (98.6°F-101°F)' || $temp == 'High (101°F and above)' && 
              $sympt == 'Dry cough' || $sympt == 'Sore throat' || 
              $sympt == 'Loss or smell& taste' || $sympt == 'Weakness'){
              $alert = '<div class="alert alert-danger text-center">High Risk</div>';
              $htmlDiv .= '<div class="col-md-4 offset-4">';
              $htmlDiv .= '<form action="#" method="post">';

              $htmlDiv .= '<div class="form-group"><input type="text"  class="form-control" name="phone" required="required" placeholder="Phone"></div>';
              $htmlDiv .= '<div class="form-group"><input type="text"  class="form-control" name="pin"  required="required" placeholder="Pin"></div>';
              $htmlDiv .= '<div class="form-group"><input type="Submit"  class="btn btn-info" style="float:right" name="submitBtn" value="Submit" placeholder="Pin"></div>';
              $htmlDiv .= '</form>';

              $htmlDiv .= '</div>';

         }
         else if($travelhistory == 'Travelled to affected countries recently' || 
                 $travelhistory == 'Came into contact with someone from/or have travelled through the affected countries' || 
                 $travelhistory == 'No history of contact but feeling symptoms' || $age == '19-59' || $age == '60+' ){
                 $alert = '<div class="alert alert-danger text-center">High Risk</div>';
                 $htmlDiv .= '<div class="col-md-4 offset-4">';
                 $htmlDiv .= '<form action="#" method="post">';
   
                 $htmlDiv .= '<div class="form-group"><input type="text"  class="form-control" name="phone" required="required" placeholder="Phone"></div>';
                 $htmlDiv .= '<div class="form-group"><input type="text"  class="form-control" name="pin"  required="required" placeholder="Pin"></div>';
                 $htmlDiv .= '<div class="form-group"><input type="Submit"  class="btn btn-info" style="float:right" name="submitBtn" value="Submit" placeholder="Pin"></div>';
                 $htmlDiv .= '</form>';
   
                 $htmlDiv .= '</div>';
         }else if( $medicalSym  == 'Asthma / lung disease'  || $medicalSym  == 'Heart disease' || $medicalSym == 'Stroke' ||  $medicalSym == 'Kidney disease' ||  $medicalSym == 'Reduced immunity' ){
                // $medicalSym  == 'Diabetes'
                $alert = '<div class="alert alert-danger text-center">High Risk</div>';
                $htmlDiv .= '<div class="col-md-4 offset-4">';
                $htmlDiv .= '<form action="#" method="post">';
  
                $htmlDiv .= '<div class="form-group"><input type="text"  class="form-control" name="phone" required="required" placeholder="Phone"></div>';
                $htmlDiv .= '<div class="form-group"><input type="text"  class="form-control" name="pin"  required="required" placeholder="Pin"></div>';
                $htmlDiv .= '<div class="form-group"><input type="Submit"  class="btn btn-info" style="float:right" name="submitBtn" value="Submit" placeholder="Pin"></div>';
                $htmlDiv .= '</form>';
  
                $htmlDiv .= '</div>';
         }else if($sympt =='None of the above'){
                $alert = '<div class="alert alert-danger text-center">Low Risk</div>';
         }else{
                $alert = '<div class="alert alert-danger text-center">Moderate Risk</div>';
         }
        


     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   <title>Document</title>
</head>
<body>
<?php if(isset($htmlDiv)) { echo $alert; echo '<Br>'; echo $htmlDiv; }else if(isset($alert)){ echo $alert; }  ?>
   
</body>
</html>
