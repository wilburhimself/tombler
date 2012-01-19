<?php 
	require_once 'Humblr.php';
	$url = 'micro.retrorock.info';
	$key = 'VlqgtOFkFKeOdGFPAqiSUaOTcAO2DHWKRDbf6JbeDLEvOJfdYZ';
	$humblr = new Humblr($url, $key);
	$posts = $humblr->getPosts(array ('type' => 'photo'));
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset=utf-8" />
<title>Bienvenido a Tombler</title>
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="colorbox.css" />
</head>

<body>
	<div id="header"><h1><a href="/tombler/">Tombler</a></h1></div>
	<?php if (empty($_GET) and empty($_GET['id'])): ?>
        <ul id="photoblog">
			<?php foreach ($posts as $post):  ?>
                <li class="item"><a href="<?php print $post->photos[0]->original_size->url ?>" class="group1" title=""><img src="<?php print $post->photos[0]->alt_sizes[2]->url ?>" alt="" /></a></li>
            <?php endforeach; ?>
            
        </ul>
	<li>Sigue viendo fotos y m&aacute;s en <a href="http://micro.retrorock.info/">micro.retrorock.info</a></li>
    <?php else: ?>
		<?php foreach ($posts as $post): include 'templates/'.$post['type'].'.php'; endforeach; ?>
    <?php endif; ?>
    
    <div id="footer">Este es un ejemplo de como usar el api de tumblr para leer los posts de tu blog. En este caso estoy leyendo solo las fotos en <a href="http://micro.retrorock.info/">mi blog en Tumblr</a>.
<p>Hay m&aacute;s informaci&oacute;n de como funciona <a href="http://retrorock.info/2010/06/jugando-con-el-api-de-tumblr/">aqu&iacute;</a></p></div>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="jquery.colorbox-min.js"></script>
    <script src="jquery.masonry.min.js"></script>
    <script>
	$(function(){
		$(".group1").colorbox({rel:'group1'});
	});
    </script>
</body>
</html>