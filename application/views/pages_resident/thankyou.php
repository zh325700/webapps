<html>
	<head>
		<title>Thank you!</title>
                <meta http-equiv="refresh" content="3;url=<?php echo base_url()."index.php/Welcome/Resident/menu"?>" />
		<style>
		html,
		body {
			margin: 0;
			padding: 0;
		}
		a {
			line-height: normal;
			font-family: 'Varela Round', sans-serif;
			font-weight: 600;
			text-decoration: none;
			font-size: 13px;
			color: #A7AAAE;
			position: absolute;
			left: 20px;
			bottom: 20px;
			border: 1px solid #A7AAAE;
			padding: 12px 20px 10px 20px;
			border-radius: 50px;
			transition: all .1s ease-in-out;
			text-transform: uppercase;
			z-index: 5;
		}
			a:hover {
			background: #A7AAAE;
			color: #fff;
		}
		.demos {
			position: absolute;
			height: 37px;
			left: 50%;
			bottom: 20px;
			z-index: 5;
			white-space: nowrap;
			-webkit-transform: translateX(-50%);
			transform: translateX(-50%);
		}
		.demos a {
			display: inline-block;
			position: static;
			left: auto;
			bottom: auto;
			border-radius: 0;
			margin-left: -1px;
		}
		.demos a:first-of-type {
			border-top-left-radius: 4px;
			border-bottom-left-radius: 4px;
			margin-left: 0;
		}
		.demos a:last-of-type {
			border-top-right-radius: 4px;
			border-bottom-right-radius: 4px;
		}

		/* Christmas */
		.xmas {
			width: 100%;
			height: 100%;
			position: relative;
			background: url('<?php echo base_url()?>/image/pictograms/thankyou2.jpg') no-repeat 50% 50%/cover;
		}
		.xmas:before {
			content: '';
			width: 100%;
			height: 100%;
			position: absolute;
			background: rgba(21,8,43,0.0);                
		}
		.xmas .xmas-message {
			position: absolute;
			left: 50%;
			top: 50%;
			z-index: 3;
			-ms-transform: translate(-50%, -50%);
			-webkit-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
			width: calc(90% - 6rem);
			height: calc(100% - 12rem);
			margin: 0 auto;
                        
		}
		.xmas #xmas {
			width: 100%;
			height: 100%;
			position: relative;
			z-index: 4;
			pointer-events: none;
		}
		</style>
	</head>
	<body>
		<section class="xmas">
			<div class="xmas-message"></div>
			
			<!-- Let it snow! -->
			<canvas id="xmas"></canvas>
		</section>

		

		

		<script>
		document.addEventListener("DOMContentLoaded", function(event) {
		  iProDevSnow();
		});

		// iProDevSnow Christmas! \o/
		var iProDevSnow = function(){

			(function() {
			    var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame ||
			    function(callback) {
			        window.setTimeout(callback, 1000 / 60);
			    };
			    window.requestAnimationFrame = requestAnimationFrame;
			})();

			var flakes = [],
			    canvas = document.getElementById("xmas"),
			    ctx = canvas.getContext("2d"),
			    parent = canvas.parentNode,
			    retina = window.devicePixelRatio > 1 ? 2 : 1,
			    flakeCount = 450;

			    if( parent.offsetWidth < 767 ){
			    	flakeCount = 125;
			    }

			    canvas.width = parent.offsetWidth * retina;
			    canvas.height = parent.offsetHeight * retina;

			function snowFrame() {
			    ctx.clearRect(0, 0, canvas.width, canvas.height);

			    for (var i = 0; i < flakeCount; i++) {
			        var flake = flakes[i],
			            x = flake.x,
			            y = flake.y;

		            flake.velX *= .98;
		            if (flake.velY <= flake.speed) {
		                flake.velY = flake.speed
		            }
		            flake.velX += Math.cos(flake.step += .05) * flake.stepSize;

			        ctx.fillStyle = "rgba(255,255,255," + flake.opacity + ")";
			        flake.y += flake.velY;
			        flake.x += flake.velX;
			            
			        if (flake.y >= canvas.height || flake.y <= 0) {
			            reset(flake);
			        }

			        if (flake.x >= canvas.width || flake.x <= 0) {
			            reset(flake);
			        }

			        ctx.beginPath();
			        ctx.arc(flake.x, flake.y, flake.size, 0, Math.PI * 2);
			        ctx.fill();
			    }
			    requestAnimationFrame(snowFrame);
			};

			function reset(flake) {
			    flake.x = Math.floor(Math.random() * canvas.width);
			    flake.y = 0;
			    flake.size = ((Math.random() * 3) + getRandomInt(2, 4)) * retina;
			    flake.speed = ((Math.random() * 1) + 0.2) * retina;
			    flake.velY = flake.speed;
			    flake.velX = 0;
			    flake.opacity = (Math.random() * 0.5) + 0.4;
			}

			function init() {
			    for (var i = 0; i < flakeCount; i++) {
			        var x = Math.floor(Math.random() * canvas.width),
			            y = Math.floor(Math.random() * canvas.height),
			            size = ((Math.random() * 3) + getRandomInt(2, 4)) * retina,
			            speed = ((Math.random() * 1) + 0.2) * retina,
			            opacity = (Math.random() * 0.5) + 0.4;

			        flakes.push({
			            speed: speed,
			            velY: speed,
			            velX: 0,
			            x: x,
			            y: y,
			            size: size,
			            stepSize: (Math.random()) / 30,
			            step: 0,
			            opacity: opacity
			        });
			    }

			    snowFrame();
			};

			window.addEventListener("resize",function(){
			    canvas.width = parent.offsetWidth * retina;
			    canvas.height = parent.offsetHeight * retina;
			})

			init();
		};
		// Returns a random integer between min (included) and max (excluded)
		// Using Math.round() will give you a non-uniform distribution!
		function getRandomInt(min, max) {
		  return Math.floor(Math.random() * (max - min)) + min;
		}
		</script>
	</body>
</html>
