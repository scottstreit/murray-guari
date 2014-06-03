			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap clearfix">
					<div class="eightcol first clearfix">
						<h3>HOW CAN WE HELP</h3>
						<h4>Serving accident victims with dedication and understanding.</h4>
						<nav role="navigation">
								<?php bones_footer_links(); ?>
						</nav>
					</div>
					<div class="fourcol clearfix">
						<h3>AFFILIATIONS</h3>
						<div>
							<img src="<?php bloginfo('siteurl'); ?>/wp-content/uploads/2014/03/MG-Affiliations1.jpg">
						</div>
					</div>
					<div class="twelvecol">
						<p class="source-org copyright"><span class="caps">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> | ALL RIGHTS RESERVED</span>. Designed by <a href="http://www.bardmarketing.com">BARD Marketing</a></p>
					</div>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-25215514-1']);
			_gaq.push(['_trackPageview']);

			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>

	</body>

</html>
