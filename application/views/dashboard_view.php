<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>

<div class="container">
        <h1>Dashboard</h1>
        <br>
        <h3><?php echo $this->session->userdata('email');?></h3>
        <br>
        <h3><?php echo $this->session->userdata('firstname');?></h3>
        <br>
        <h3><?php echo $this->session->userdata('lastname');?></h3>
        <br>
        <a href="<?php echo site_url('login/logout/');?>"><h4>logout</h4></a>


</div>
    
</body>
</html>