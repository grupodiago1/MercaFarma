
<!-- page-pagination-section
================================================== -->
<section class="page-pagination-section cont-catalogo">
  <div class="container">
  </div>
</div>
<!-- End page-pagination section -->


<!-- blog-page-section
================================================== -->

<?php
$count=0;
$items="";
if(have_posts()) :
  while(have_posts()) : the_post();
  $ID=get_the_ID();
  if($count==0){
    $categoria = wp_get_post_terms($ID, 'categoria', array("fields" => "all"));
    $c_fields=get_post_meta($ID, 'informacion_producto' , true);

    $compuesto = isset($c_fields['compuesto'])? $c_fields['compuesto']:'';
    $indicaciones = isset($c_fields['indicaciones'])?$c_fields['indicaciones']:'';
    $dosis = isset($c_fields['dosis'])?$c_fields['dosis']:'';
    $tema = isset($c_fields['tema'])?$c_fields['tema']:'blanco';
    ?>
    <section class="blog-page-section cont-catalogo <?php echo $tema?>">
      <div class="decoration "></div>
      <div class="container">

        <div class="row">
          <div class="col-xs-12 cont-catalogo-detalle">
            <h1 class="titulo <?php echo $tema?>"><?php echo $categoria[0]->name?></h1>
            <h3 class="subtitulo <?php echo $tema?>"><?php echo $categoria[0]->description?></h3>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right cont-img">
            <?php if ( has_post_thumbnail() ) {?>
              <img class="img-fluid img-producto" width="350" src="<?php echo get_the_post_thumbnail_url($ID, 'full');?>"/>
            <?php   }?>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6 ">
            <div class="product-box <?php echo $tema?>">
              <h1 class="title-box <?php echo $tema?>"><?php the_title(); ?></h1>
              <div class="text <?php echo $tema?>">
                <?php echo $compuesto;?>
              </div>
              <div class="info-box <?php echo $tema?>">
                <h2 class="title <?php echo $tema?>">Indicaciones: </h2>
                <div class="text <?php echo $tema?>">
                  <?php echo $indicaciones;?>
                </div>
              </div>
              <div class="info-box <?php echo $tema?>">
                <h2 class="title <?php echo $tema?>">Dosis: </h2>
                <div class="text <?php echo $tema?>">
                  <?php echo $dosis;?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
      }else{
        if ( has_post_thumbnail() ) {
          $thumbnail=get_the_post_thumbnail_url($ID, 'medium');
        }
        $items.='<a class="item" href="'.get_the_permalink($ID).'" style="background-image:url('.$thumbnail.');" alt="'.get_the_title($ID).'"></a>';
      }
      $count++;
    endwhile; ?>


    <div class="navegacion-catalogo owl-wrapper">
      <div class="owl-carousel" data-num="6" data-center="true">
        <?php echo $items;?>
      </div>
    </div>


  <?php else: ?>
    <section class="blog-page-section">
      <div class="decoration "></div>
      <div class="container">
    <div class="blog-post not-found">
      <h2 class="heading1">Categoría sin producto</h2>
      <p>Es probable que la dirección que esta visitando este incompleta o tiene un error.<br>
      Regrese a la portada haciendo click <a href="/">aquí</a></p>
    </div>
  </div>
</div>
  <?php endif; ?>



</div>

</section>


<!-- End news section -->
