
<footer class="admin-footer">
 <div class="container-fluid">
 	<ul class="list-unstyled list-inline">
	 	<li>
			<span class="pmd-card-subtitle-text">Linas Miskelis &copy; <span class="auto-update-year"></span></span>
			<h3 class="pmd-card-subtitle-text"><a href="https://codecanyon.net/item/ecommerce-online-shop-app/10442576" target="_blank">D-Link</a></h3>
        </li>
        <li class="pull-right for-support">
			<a href="mailto:linasmiskas@gmail.com">


            </a>
        </li>
    </ul>
 </div>
</footer>


<!-- Pradedami skriptai -->
<script src="assets/js/jquery-1.12.2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/propeller.min.js"></script>
<script src="assets/js/dropify.js"></script>
<script>
	$(document).ready(function() {
		var sPath=window.location.pathname;
		var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
		$(".pmd-sidebar-nav").each(function(){
			$(this).find("a[href='"+sPage+"']").parents(".dropdown").addClass("open");
			$(this).find("a[href='"+sPage+"']").parents(".dropdown").find('.dropdown-menu').css("display", "block");
			$(this).find("a[href='"+sPage+"']").parents(".dropdown").find('a.dropdown-toggle').addClass("active");
			$(this).find("a[href='"+sPage+"']").addClass("active");
		});
		$(".auto-update-year").html(new Date().getFullYear());
	});
</script> 
<!-- Select2 js-->
<script type="text/javascript" src="assets/plugins/select2/js/select2.full.js"></script>

<!-- Propeller Select2 -->
<script type="text/javascript">
	$(document).ready(function() {
		<!-- Simple Selectbox -->
		$(".select-simple").select2({
			theme: "bootstrap",
			minimumResultsForSearch: Infinity,
		});
		<!-- Selectbox with search -->
		$(".select-with-search").select2({
			theme: "bootstrap"
		});
		<!-- Select Multiple Tags -->
		$(".select-tags").select2({
			tags: false,
			theme: "bootstrap",
		});
		<!-- Select & Add Multiple Tags -->
		$(".select-add-tags").select2({
			tags: true,
			theme: "bootstrap",
		});
	});
</script>
<script type="text/javascript" src="assets/plugins/select2/js/pmd-select2.js"></script>
<script>
	$(document).ready(function() {
		var sPath=window.location.pathname;
		var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
		$(".pmd-sidebar-nav").each(function(){
			$(this).find("a[href='"+sPage+"']").parents(".dropdown").addClass("open");
			$(this).find("a[href='"+sPage+"']").parents(".dropdown").find('.dropdown-menu').css("display", "block");
			$(this).find("a[href='"+sPage+"']").parents(".dropdown").find('a.dropdown-toggle').addClass("active");
			$(this).find("a[href='"+sPage+"']").addClass("active");
		});
	});
</script>
<!-- prisijungimo puslapio skyriai rodo slėpti -->
<script type="text/javascript">
	$(document).ready(function(){
	 $('.app-list-icon li a').addClass("active");
		$(".login-for").click(function(){
			$('.login-card').hide()
			$('.forgot-password-card').show();
		});
		$(".signin").click(function(){
			$('.login-card').show()
			$('.forgot-password-card').hide();
		});
	});
</script>
<!-- Skriptai End -->

<script>
            $(document).ready(function(){
                // Pagrindinis
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                $('.dropify-image').dropify({
                    messages: {
                        default : '<center>Nuvilkite vaizdą čia arba spustelėkite</center>',
                        error   : 'Pridedamas kažkas negerai.'
                    },
                    error: {
                        'fileSize': '<center>Failo dydis yra per didelis ({{ value }} max).</center>',
                        'minWidth': '<center>Vaizdo plotis yra per didelis ({{ value }}}px min).</center>',
                        'maxWidth': '<center>Vaizdo plotis yra per mažas ({{ value }}}px max).</center>',
                        'minHeight': '<center>Vaizdo aukštis yra per mažas ({{ value }}}px min).</center>',
                        'maxHeight': '<center>Vaizdo aukštis yra per didelis ({{ value }}px max).</center>',
                        'imageFormat': '<center>Vaizdo formatas neleidžiamas ({{ value }} only).</center>',
                        'fileExtension': '<center>Failas neleidžiamas ({{ value }} only).</center>'
                    },
                });

                $('.dropify-video').dropify({
                    messages: {
                        default: '<center>Įkelkite vaizdo įrašą čia arba spustelėkite</center>'
                    }
                });

                $('.dropify-notification').dropify({
                    messages: {
                        default : '<center>Nuvilkite vaizdą čia arba spustelėkite<br>(Optional)</center>',
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Ar tikrai norite ištrinti \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('Failas ištrintas');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Klaida');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
</script>

</body>
</html>