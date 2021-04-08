<!-- WHATSAPP POP-UP STYLE -->
<style type="text/css"> 
    #whatsapp { display: none; position: fixed; top: 0; left: 0; height: 100%; width: 100%; z-index: 2001; }
    #whatsapp:target { display: block; }
    #whatsapp .btn-close-bg { height: 9999px; width: 9999px; overflow: hidden; background-color: rgba(10, 10, 10, 0.5); }
    #whatsapp .btn-close { font-size: 30px; color: #183884; }
    #whatsapp .btn-close:hover { color: #112b67; }
    #whatsapp .uk-navbar-nav > li:hover { background-color: transparent; }
    #whatsapp .uk-navbar-nav > li > a.fone-txt-1 { color: #333; border: 1px solid #777;  border-radius: 4px; padding: 3px 15px; margin: 0 10px; font-size: 18px; }
    #whatsapp .uk-navbar-nav > li > a.fone-txt-1:hover { border: 1px solid #212529; background: #212529; color: #fff; }
    #whatsapp .fone-txt-0 { font-size: 18px; margin-top: 15px; font-style: italic; color: #57BA63; margin-bottom: 0; }
    #whatsapp .fone-txt { text-align: center; min-height: unset !important; text-transform: unset !important; }
   
    @media screen and (max-width: 770px) {
        #whatsapp .whatsapp-box{ position: absolute; top: 20%; left: 10%; width: 80%; background: #fff; border-radius: 10px; }
        #whatsapp .whatsapp-bar{ margin: 60px 0; padding: 0; }
    }
    @media screen and (min-width: 770px) {
        #whatsapp .whatsapp-box{ position: absolute; top: 30%; left: 35%; width: 25%; height: auto; background: #fff; border-radius: 10px; }
        #whatsapp .whatsapp-bar{ margin: 60px 0; padding: 0 30px; }
    }
</style>
<div id="whatsapp">
    <a href="#">
        <div class="btn-close-bg"></div>
    </a>
    <div class="whatsapp-box">
        <a class="btn-close" href="#"> 
            <i class="far fa-window-close"></i>
        </a>
        <div class="col-12 whatsapp-bar">
            <div>
                <ul class="uk-navbar-nav" style="display: block;"><?php 
                foreach(Yii::app()->params['Whatsapp'] as $key => $whats){ ?>
                    <li>
                        <p class="uniuansbold fone-txt fone-txt-0" style="font-size: 18px;margin-top: 15px;">
                            <?= $whats['Title'] ?>
                            <i class="fab fa-whatsapp-square" 
                               style="margin-left: 10px; font-size: 30px;"></i>
                        </p>
                        <a class="uniuansbold fone-txt fone-txt-1 fone-wpp-fixed" href="https://api.whatsapp.com/send?phone=<?= $whats['Link'] ?>" target="blank_">
                            <i class="fas fa-mobile-alt" 
                               style="margin: 10px; font-size: 20px;"></i>
                            <?= $whats['Number'] ?>
                        </a>
                    </li><?php 
                } ?>
                </ul> 
            </div>
        </div>
    </div>
</div>


