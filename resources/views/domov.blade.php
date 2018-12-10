@extends('layouts.app')

@section('content')


      <?php
      $conn=mysqli_connect('localhost', 'root','', 'spletnatrgovina') or die('Napaka pri povezavi z bazo');
      $q="SELECT * from izdelki";

      if (!mysqli_set_charset($conn, "utf8"))
      {
          printf("Error loading character set utf8: %s\n", mysqli_error($conn));
          exit();
      }

      $rs=mysqli_query($conn, $q);
        while($tab[]=mysqli_fetch_assoc($rs));

      $q="SELECT count(id) FROM izdelki";
    	$rs=mysqli_query($conn, $q);
    	$s=mysqli_fetch_assoc($rs);
      $stevec=$s['count(id)'];

      echo '<div class="container">';

        echo '<div class="row">';

        for($i=0;$i<$stevec;$i++)
        {
          echo '
            <div class="col-lg-6 col-xs-12 col-xl-4" >
              <div id="izdelek">
                <img class="img-fluid" style="width:100%;" alt="Responsive image" src="'.$tab[$i]['slikaPot'].'">
                  <div id=naslov>
                    <p><span class="nas">'.$tab[$i]['nas_izd'].'</span> <br><span class="podnas">'.$tab[$i]['podnas_izd'].'</span></p>
                  </div>
                  <div id="opisIzdelka">
                    <p>'.$tab[$i]['odst1'].'</p>
                    <p>'.$tab[$i]['odst2'].'</p>
                  </div>
                  <div class="gumb">
                    <a class="btn btn-outline-primary btn-lg" id="vecGumb" href="/izdelek/'.($i+1).'"><i class="fa fa-plus" style="font-size:14px"></i> VEČ O '.$tab[$i]['nas_izd'].' </a>
                  </div>
              </div>
            </div>';
        }

          echo '</div>';


      echo '</div>';

      mysqli_close($conn);
      ?>


@endsection
