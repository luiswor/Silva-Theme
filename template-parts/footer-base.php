<footer class="footer">
    <div class="container footer-content">
        <div class="footer-column">
            <?php
                if(is_active_sidebar('footer_1')){
                    dynamic_sidebar('footer_1');
                }
            ?>	
        </div>

        <div class="footer-column">
            <?php
                if(is_active_sidebar('footer_2')){
                    dynamic_sidebar('footer_2');
                }
            ?>	
        </div>


        <div class="footer-column">
            <?php
                if(is_active_sidebar('footer_3')){
                    dynamic_sidebar('footer_3');
                }
            ?>	
        </div>

        <div class="footer-column">
            <?php
                if(is_active_sidebar('footer_4')){
                    dynamic_sidebar('footer_4');
                }
            ?>	
        </div>

    </div>
    <div class="footer_info">
        <p>
            <?php echo date('Y'); ?>
            <?php bloginfo('name'); ?>
            - Todos los derechos reservados | Powerade by 
            <a href="http://qoopala.com" target="_blank">Qoopala</a>
        </p>
    </div>
</footer>

<div id="splash" class="splash show">
    <div class="splash_loader">
        <span class="loader"></span>
        <p>Preparando su experiencia</p>
    </div>
    
    <span class="splash_row"></span>
    <span class="splash_row"></span>
    <span class="splash_row"></span>
    <span class="splash_row"></span>
    <span class="splash_row"></span>
</div>