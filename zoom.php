<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/vendor/components/normalize.css/normalize.css"/>
        <style>
            * {
                box-sizing: border-box;
            }
            body {
                background: url('images/47271092-images-background.jpg') fixed 0 0;
            }
            .window {
                position: absolute;
                min-width: 100%;
                min-height: 100%;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
            }
            .page {
                width: 0;
                height: 0;
                overflow: hidden;
                transform: rotate(0deg) translate(50%, 50%) scale(0,0)
                transition-property: all;
                transition-duration: 1s;
                opacity: 0;
                position: absolute;
                border: 1px solid #ccc;
                background: #fff;
                top: 50%;
                left: 50%;
            }
            .page.current {
                max-width: 100%;
                max-height: 100%;
                width: 100%;
                height: 100%;
                opacity: 1.0;
                transform: translate(0,0) scale(1,1);
                top: 0;
                left: 0;
            }
            section {
                width: 100%;
                height: 100%;
                background: gainsboro;
            }
        </style>
    </head>
    <body>
        <div class="window">
        <div class="page current">
            <section>

            <h1>Page 1</h1>
            </section>
            
        </div>
        <div class="page">
            <h1>Page 2</h1>
            
        </div>
        <div class="page">
            <h1>Page 3</h1>
            
        </div>
        <div class="page">
            <h1>Page 4</h1>
            
        </div>
        <div class="page">
            <h1>Page 5</h1>
            
        </div>
        </div>
        

        <script src="/vendor/components/jquery/jquery.js"></script>
        <script src="/vendor/newerton/jquery-mousewheel/jquery.mousewheel.min.js"></script>
        <script>
            (function() {
            	var images = [
                    '', <?php foreach (glob('images/backgrounds/*.jpg') as $fileName) { echo ",'/$fileName'"; } ?>
                ];
            	var currentPage = 1;
            	
                $(window).on('mousewheel', function(event) {
                	var $ol = $('.page.current');
                    if (event.deltaY > 0) {
                    	if ($ol.prev().length) {
		                    $('.page.current').removeClass('current');
		                    $ol.prev().addClass('current');
		                    currentPage--;
                        }
                    } else {
	                    if ($ol.next().length) {
		                    $('.page.current').removeClass('current');
		                    $ol.next().addClass('current')
                            currentPage++;
	                    }
                    }
	                $('body').css('background-image', "url('" + images[currentPage] + "')");
                });
            })();
        </script>
    </body>

</html>