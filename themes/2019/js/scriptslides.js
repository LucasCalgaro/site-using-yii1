jssor_1_slider_init = function() {
            
            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 1,
                $Align: 0,
                $NoDrag: true
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            // you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1380);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            // function ScaleSlider() {
            //     var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            //     if (refSize) {
            //         refSize = Math.min(refSize, 1000);
            //         jssor_1_slider.$ScaleWidth(refSize);
            //     }
            //     else {
            //         window.setTimeout(ScaleSlider, 30);
            //     }
            // }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };

            // jssor_2_slider_init = function() {
                
            //     var jssor_2_options = {
            //       $AutoPlay: true,
            //       $AutoPlaySteps: 4,
            //       $SlideDuration: 600,
            //       $SlideWidth: 280,
            //       $SlideSpacing: 1,
            //       $Cols: 4,
            //       $ArrowNavigatorOptions: {
            //         $Class: $JssorArrowNavigator$,
            //         $Steps: 4
            //       },
            //       $BulletNavigatorOptions: {
            //         $Class: $JssorBulletNavigator$,
            //         $SpacingX: 1,
            //         $SpacingY: 1
            //       }
            //     };
                
            //     var jssor_2_slider = new $JssorSlider$("jssor_2", jssor_2_options);
                
            //     //responsive code begin
            //     //you can remove responsive code if you don't want the slider scales while window resizing
            //     function ScaleSlider() {
            //         var refSize = jssor_2_slider.$Elmt.parentNode.clientWidth;
            //         if (refSize) {
            //             refSize = Math.min(refSize, 980);
            //             jssor_2_slider.$ScaleWidth(refSize);
            //         }
            //         else {
            //             window.setTimeout(ScaleSlider, 30);
            //         }
            //     }
            //     ScaleSlider();
            //     $Jssor$.$AddEvent(window, "load", ScaleSlider);
            //     $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            //     $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //     //responsive code end
            // };

              $(document).ready(function(){
                $(".owl-carousel").owlCarousel({
                  loop:true,
                  nav:false,
                  items:3,
                  dotsEach:1,
                  center:true,
                  autoplay:true,
                  autoplayHoverPause:true
                });
              });