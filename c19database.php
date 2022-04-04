<!doctype html>
<html>
    <head>
        <title>Database</title>
        <script src="https://code.jqery.com/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta.3/js/bootstrap.min.js"></script>
        <style>
            /*body{
                background-image: url(https://img-lumas-avensogmbh1.netdna-ssl.com/showimg_jan09_desktop.jpg);
                background-repeat: no-repeat;
                background-size: 100%;
            }*/
            header{
                width: 100%;
                height: 100px;
                background: #2F323A;
                position: absolute;
            }
            img#logo {
                margin-left: 100px;
                margin-right: 100px;
                position: absolute;
                top: 12px;
                left: 0;
            }
    
            nav {
                display:inline-block;
                margin-left:600px;
                margin-top: 30px;
            }
            a {
                color:white;
                text-decoration: none;
                font-size: 2em;
                font-weight: 2em;
                font-family: 'roboto';
                margin-right: 20px;
                padding: 30px;
            }
            
            footer {
                width: 100%;
                height: 80px;
                background: #172035;
                position: absolute;
                top:1500px;
                left: 0;
            }
            p#footer {
                text-align: center;
                color: white;
                margin-top: 32px;
                font-size: 1em;
            }
        </style>
    </head>
    <body>
        
        <header>
            <a href="index.html"><img id="logo" src="demography.png" style="margin-top:-3%;width:150px;height:170px;margin-left:2%"></a>
            <nav>
                <a style="Color:#0D9DB0" class="b" href="2030.html">Predicted Data</a>
                <a style="Color:#0D9DB0" class="b" href="live.html">Live Prediction</a>
                <a style="Color:#0D9DB0" class="b" href="adminlog.html">Logout</a>
            </nav>
        </header>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>            
        
        
        <?php require_once 'process.php'; ?>
        
        <?php
         
        if(isset($_SESSION['message'])): ?>
        
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>
        <?php endif ?>
        <div class="container">
            
        <?php
            $mysqli=new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
            $result=$mysqli->query("SELECT * FROM data") or die($mysqli->error);
            //pre_r($result);
        ?>
        
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>YEAR</th>
                        <th>CITY</th>
                        <th>STATE</th>
                        <th>COUNTRY</th>
                        <th>POPULATION</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
        <?php
            while ($row=$result->fetch_assoc()):?>
                <tr>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['state']; ?></td>>
                    <td><?php echo $row['country']; ?></td>
                    <td><?php echo $row['ppl']; ?></td>
                    <td>
                        <a href="c19database.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a><br>
                        <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger ">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </table>
        </div>
             
        
        <?php
        function pre_r($array){
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
        ?>
            
        <div class="row justify-content-center">
            <form action="process.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
            <label>YEAR</label>
            <input type="text" name="year" class="form-control" value="<?php echo $year; ?>" placeholder="Enter the year">
            </div>
            <div class="form-group">
            <label>CITY</label>
            <input type="text" name="city" class="form-control" value="<?php echo $city; ?>" placeholder="Enter the city">
            </div>
            <div class="form-group">
            <label>STATE</label>
            <input type="text" name="state" class="form-control" value="<?php echo $state; ?>" placeholder="Enter the state">
            </div>
            <div class="form-group">
            <label>COUNTRY</label>
            <input type="text" name="country" class="form-control" value="<?php echo $country; ?>" placeholder="Enter the country ">
            </div>
            <div class="form-group">
            <label>POPULATION</label>
            <input type="text" name="ppl" class="form-control" value="<?php echo $ppl; ?>" placeholder="Enter the population">
            </div>
            <div class="form-group">
            <?php 
            if ($update==true):
            ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            <?php endif ?>
            </div>
        </form>
        </div>
        </div>
    
    </body>
</html>