            </div>
		</div>

		<footer class="footer">
		            <span class="copyright" style="float:left">
		                ©
		                PROIECT CURS PHP 2021 - Petre Paul Dragos
		            </span>
		            <span class="copyright">
		           Pagina a fost generata in <?php echo(number_format(microtime(true) - $start_time, 4)); ?> secunde.
		           	</span>

		</footer>

    </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="elemente/style/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="elemente/style/js/core/popper.min.js" type="text/javascript"></script>
<script src="elemente/style/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="elemente/style/js/plugins/bootstrap-switch.js"></script>

</html>

<?php ob_end_flush(); // rezolva header already send ?>