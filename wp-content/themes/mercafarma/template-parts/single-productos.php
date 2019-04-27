
<section class="page-pagination-section cont-catalogo">
  <div class="container">
  </div>
</section>
<?php
global $ID;
while ( have_posts() ) : the_post();
$ID=get_the_ID();
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

    <?php endwhile; ?>

<div class="navegacion-catalogo owl-wrapper">
  <div class="owl-carousel" data-num="6" data-center="true">
    <?php
    $args = array(
      'post_type' => 'productos',
      'posts_per_page' => -1,
      'post__not_in' => array($ID),
    );

    $query = new WP_Query($args);

    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
        $query->the_post();

        $ID2=$query->get_the_ID();
        if ( has_post_thumbnail() ) {
          $thumbnail=get_the_post_thumbnail_url($ID2, 'full');
        }
        echo '<a class="item" href="'.get_the_permalink($ID2).'" style="background-image:url('.$thumbnail.');" alt="'.get_the_title($ID2).'"></a>';

      }
      wp_reset_postdata();
    }

    ?>
  </div>
</div>

</div>

</section>


<!-- End news section -->
