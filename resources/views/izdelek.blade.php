@extends('layouts.app')

@section('content')

<div class="container">


<?php

  //id pridobljen iz urlja
  $id_iz=(int)$id_iz;

  $conn=mysqli_connect('localhost', 'root','', 'spletnatrgovina') or die('Napaka pri povezavi z bazo');

  //če ni tega ne izpisuje šumnikov
  if (!mysqli_set_charset($conn, "utf8"))
  {
      printf("Error loading character set utf8: %s\n", mysqli_error($conn));
      exit();
  }


  $q="SELECT * from izdelki WHERE id=".$id_iz;
  $rs=mysqli_query($conn, $q);
  $izd=mysqli_fetch_assoc($rs);


  //izpis
  echo '
  <div class="row">
    <div class="col-md-4 col-lg-4" style="padding:0px;">
          <img class="img-fluid" alt="Responsive image" style="border-radius:5px;box-shadow: 0 3px 10px 0 rgba(0,0,0,0.05);" src="'.$izd['slikaPot'].'">
    </div>
    <div class="col-md-8 col-lg-8"  id="opisIzdelka2">
          <p><span class="nas">'.$izd['nas_izd'].'</span> <br><span class="podnas">'.$izd['podnas_izd'].'</span></p>
          <div>
          <p>'.$izd['odst1'].'</p>
          <p>'.$izd['odst2'].'</p>
          </div>
          <a class="btn btn-outline-primary btn-lg" id="nazajGumb" href="/"><i class="fa fa-angle-left"></i> Nazaj na seznam </a>
    </div>

  </div>';





  mysqli_close($conn);

 ?>

</div>
@endsection
