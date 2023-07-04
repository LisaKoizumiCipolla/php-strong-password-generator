<?php 

$pswLength = null;

if (!empty($_GET['typeNumber'])){
    $pswLength = checkData($_GET['typeNumber']);
}

function checkData ($data){
    if (!is_numeric($data)){
        return false;
    }
    return $data;
}

function generatePsw ($length) {
    $password = '';
    $lowerLet = 'abcdefghijklmnopqrstuvwxyz';
    $capitalLet = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
    $numbers =  '0123456789' ;
    $specialChar = '!@#$%^&*()_+-={}[]|:;"<>,.?/';

    $allChar = [ $lowerLet , $capitalLet , $numbers , $specialChar ];


    
    foreach ($allChar as $char){
        $password .= $char[array_rand(str_split($char))];
    }

    while (strlen($password) < $length){
        $random = $allChar[array_rand($allChar)];
        $password .= $random[array_rand(str_split($random))];
    }

    return $password;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>PASSWORD GENERATOR</title>
</head>
<body>
    
    <form action="./index.php" method="GET">
        <div class="form-outline">
            <input type="number" name="typeNumber" class="form-control w-25 m-4" />
            <label class="form-label ms-4" for="typeNumber">Insert password lenght</label>
        </div>
        <button type="submit" class=" ms-4 btn btn-primary">
            Generate password
        </button>
    </form>

    
    <?php if ($pswLength === false ) { ?>
        <div class="alert alert-danger w-25 m-4" role="alert">
            Selection invalid. Please insert an integer number.
        </div>
    <?php } elseif (is_numeric($pswLength)) { ?>
        <div class="alert alert-primary w-25 m-4" role="alert">
            Your password is <?php echo generatePsw($pswLength) ?>
        </div>
    <?php } ?>

</body>
</html>