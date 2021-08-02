		<footer class="footer">
			<div class="copyright">
				<div class="container">
					<p>©‎ <?php echo date('Y')?>. Escola +Diversa, um produto CIEDS, Centro Integrado de Estudos e Programas de Desenvolvimento Sustentável</p>
					<p><a href="https://www.cieds.org.br/docs/Pol%C3%ADtica_de_Privacidade_-_Plataformas.pdf" target="_blank">Ver Política de Privacidade</a></p>
				</div>
			</div>
		</footer>
		<div class="fixed-left-bottom">
			<a href="<?php the_permalink(414); ?>" class="btn btn-purple btn-purple_outline btn-link btn-ajax_fancybox" id="btn-manifest">Confira nosso manifesto!</a>
		</div>
		<?php WP_MyFunctions::add_script(); ?>
		<?php wp_footer(); ?>
	</body>
</html>
