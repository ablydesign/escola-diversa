
<div class="sidebar-item">
    <?php locate_template( ['componentes/search_form-blog.php'], true ); ?>
</div>

<div class="sticky" >
    <div class="sticky--column">
        <div class="sidebar-item">
            <?php locate_template( ['componentes/box_demostracao.php'], true ); ?>
        </div>

        <?php if ( get_field( 'options__ativar_banner_lateral', 'option' ) ) : ?>
            <div class="sidebar-item">
                <?php locate_template( ['componentes/box_banner.php'], true ); ?>
            </div>
        <?php endif; ?>
                
        <?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
            <div class="sidebar-item">
                <?php dynamic_sidebar( 'blog-sidebar' ); ?>
            </div>
        <?php endif; ?>
    </div>
</div>