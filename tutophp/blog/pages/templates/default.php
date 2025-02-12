

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="https://getbootstrap.com/2.0.3/assets/css/bootstrap.css" rel="stylesheet">


    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
    </style>


<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Project name</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><a href="#">Home</a></li>

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">

    <div class="starter-template" style="padding-top: 100px;">

    <?= $content ; ?>

    </div>

</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


</body>
</html>
