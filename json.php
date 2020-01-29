<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600);

*, *:before, *:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background: #105469;
  font-family: 'Open Sans', sans-serif;
}
table {
  background: #012B39;
  border-radius: 0.25em;
  border-collapse: collapse;
  margin: 1em;
}
th {
  border-bottom: 1px solid #364043;
  color: #E2B842;
  font-size: 0.85em;
  font-weight: 600;
  padding: 0.5em 1em;
  text-align: left;
}
td {
  color: #fff;
  font-weight: 400;
  padding: 0.65em 1em;
}
.disabled td {
  color: #4F5F64;
}
tbody tr {
  transition: background 0.25s ease;
}
tbody tr:hover {
  background: #014055;
}
.text-input {
  position: relative;
  margin: 40px auto;

}
.text-input input[type="text"] {
    display: block;
    width: 500px;
    height: 40px;
    box-sizing: border-box;
    outline: none;
    border: 1px solid lightgray;
    border-radius: 3px;
    padding: 10px 10px 10px 10px;
    -webkit-transition: all 0.1s ease-out;
    transition: all 0.1s ease-out;
    margin: 0 auto;
}

  </style>
</head>
<body>

  <div class="text-input">
  <input type="text" id="SearchUser" placeholder="Try typing something in here!" >
</div>

<table class="table">
    <tbody>
      <tr>
          <th>Id</th>
           <th>Name</th>
           <th>username</th>
           <th>Email</th>
           <th>Address:street</th><th>Suite</th><th>city</th><th>Zipcode</th><th>Latitute</th><th>Longitude</th>
           <th>Phone</th>
           <th>Website</th>
           <th>Company: Name</th><th>CatchPhrase</th><th>BS</th>
       </tr>
  <?php 
$json = file_get_contents('https://jsonplaceholder.typicode.com/users'); 
  
$data = json_decode($json); 

// echo"<pre>";
// print_r($data);
// echo"</pre>";
// exit();
foreach ($data as $key => $user) {
  ?>
  
    <tr class="seqarchrow">
      <td><?php echo $user->id; ?></td>
      <td><?php echo $user->name;?></td>
      <td><?php echo $user->username;?></td>
      <td><?php echo $user->email;?></td>
      <td><?php echo $user->address->street;?></td>
      <td><?php echo $user->address->suite;?></td>
      <td><?php echo $user->address->city;?></td>
      <td><?php echo $user->address->zipcode;?></td>
      <td><?php echo $user->address->geo->lat;?></td>
      <td><?php echo $user->address->geo->lng;?></td>
      <td><?php echo $user->phone;?></td>
      <td><?php echo $user->website;?></td>
      <td><?php echo $user->company->name;?></td>
      <td><?php echo $user->company->catchPhrase;?></td>
      <td><?php echo $user->company->bs;?></td> 
    </tr>

  <?php
}
?> 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#SearchUser").on("keyup", function() {
    let value = $(this).val().toLowerCase();
    $(".table .seqarchrow").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
 
</script>
</body>
</html>
