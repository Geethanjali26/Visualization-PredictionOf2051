<!doctype html>
<html>
    <head>
        <title>Predictions </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body{
                font-family: roboto;
                background-size: 100%;
                background-repeat: no-repeat;
            }
            header{
                width: 100%;
                height: 100px;
                background: #172035;
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
                margin-left:800px;
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

            #para{
                text-align: justify;
                text-justify: inter-word;
                margin-left: 25px;
                margin-right: 25px;
            }
            footer {
                width: 100%;
                height: 80px;
                background: #172035;
                position: absolute;
                top: 2500px;
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
        <header style="background:black;">
            <a href="index.html"><img id="logo" src="demography.png" style="margin-top:-3%;width:150px;height:170px;margin-left:2%"></a>
        </header>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            <h4>Enter the year for prediction</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" class="pin" name="year" value="<?php if(isset($_GET['year'])){
                                        echo $_GET['year'];}?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <?php
                                        $con= mysqli_connect('localhost','root','','crud');
                                        
                                        if(isset($_GET['year']))
                                        {
                                            $year = $_GET['year'];
                                            $query = "SELECT * FROM data WHERE year='$year' ";
                                            $query_run = mysqli_query($con,$query);
                                            if(mysqli_num_rows($query_run)>0){
                                                foreach ($query_run as $row)
                                                {
                                                    ?>
                                                    <div class="form-group mb-3">
                                                        <label>CITY</label>
                                                        <input type="text" value="<?= $row['city']; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>STATE</label>
                                                        <input type="text" value="<?= $row['state']; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>COUNTRY</label>
                                                        <input type="text" value="<?= $row['country']; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>POPULATION</label>
                                                        <input type="text" value="<?= $row['ppl']; ?>" class="form-control">
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            else{
                                                echo 'Not available';
                                            }
                                        }
                                        
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <hr>
        <br>
        <p>Population projections are attempts to show how the human population living today will change in the future.[1] These projections are an important input to forecasts of the population's impact on this planet and humanity's future well-being.[2] Models of population growth take trends in human development, and apply projections into the future.[3] These models use trend-based-assumptions about how populations will respond to economic, social and technological forces to understand how they will affect fertility and mortality, and thus population growth.[3]

The 2019 forecast from the United Nation's Population Division (made before the COVID-19 pandemic) shows that world population growth peaked at 2.1% per year in 1968, has since dropped to 1.1%, and could drop even further to 0.1% by 2100, a growth rate not seen since pre-industrial revolution days.[4] Based on this, the UN Population Division expects the world population, which is at 7.8 billion as of 2020, to level out around 2100 at 10.9 billion (the median line),[5][6] assuming a continuing decrease in the global average fertility rate from 2.5 births per woman during the 2015–2020 period to 1.9 in 2095–2100, according to the medium-variant projection.[7]

However, estimates outside of the United Nations have put forward alternative models based on additional downward pressure on fertility (such as successful implementation of education and family planning goals in the Sustainable Development Goals) which could result in peak population during the 2060-2070 period rather than later.[3][8]

According to the UN, about two-thirds of the predicted growth in population between 2020 and 2050 will take place in Africa.[9] It is projected that 50% of births in the 5-year period 2095-2100 will be in Africa.[10] Other organizations project lower levels of population growth in Africa based particularly on improvement in women’s education and met needs for family planning.[11]

By 2100, the UN projects the population in Sub-Saharan Africa will reach 3.8 billion, IHME projects 3.1 billion, and IIASA is the lowest at 2.6 billion. In contrast to the UN projections, the models of fertility developed by IHME and IIASA incorporate women’s educational attainment, and in the case of IHME, also consider met need for family planning.[12]


World population prospects, 2019
Because of population momentum the global population will continue to grow, although at a steadily slower rate, for the remainder of this century, but the main driver of long-term future population growth will be the evolution of the global average fertility rate.[7]</p>
        

    </body>
</html>