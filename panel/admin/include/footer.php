<?php 

 include '../assets/constant/config.php';
 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt=$conn->prepare("SELECT * FROM `web` ");
		$stmt->execute();
		$record=$stmt->fetchAll();
      }

        catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
?>

		<?php 
		$stmt=$conn->prepare("SELECT * FROM `web` ");
		$stmt->execute();
		$record=$stmt->fetchAll();?>
		<?php foreach($record as $key) {?>
        <div class="footer" >
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank"><?php echo $key['fnote']; ?>
                	<?php } ?>
                </a> <?php echo $key['year']; ?></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end

        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../assets/vendor/global/global.min.js"></script>
	<script src="../assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>


    
	<script src="../assets/js/deznav-init.js"></script>
     <!------Select2----->
   <script src="../assets/js/select2.js"></script>

    <script type="text/javascript">
        $('.postName1').select2({
               });
    </script>



	<script src="../assets/vendor/owl-carousel/owl.carousel.js"></script>
	<!----------sweetalert---------------------->
	
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  
  <!----------datatables-------------->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js
"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js
"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js
"></script>


  <script src="../assets/js/custom.min.js"></script>







 
   <!-----CKEDITOR------>
      <script src="//cdn.ckeditor.com/4.19.1/basic/ckeditor.js"></script>


    <!-------datatables------->
    <script type="text/javascript">
    $(document).ready(function() {
    $('#datatables').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>
      

<!--------Google Translator------>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<!--------Preloader------>
<script>
function onReady(callback) {
    var intervalID = window.setInterval(checkReady, 1000);
    function checkReady() {
        if (document.getElementsByTagName('body')[0] !== undefined) {
            window.clearInterval(intervalID);
            callback.call(this);
        }
    }
}

function show(id, value) {
    document.getElementById(id).style.display = value ? 'block' : 'none';
}

onReady(function () {
    show('page', true);
    show('loading', false);
});
</script>
    <!--------Set Time Out for logout------->
<script type="text/javascript">
    setTimeout(function() {

      location.href='../logout.php';
  }
    ,5000000000)
</script>
    
<style>
.dataTables_wrapper .dataTables_paginate .paginate_button.current{
    color: #fff !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active{
    color: #fff !important;
}
</style>
 
  
</body>
</html>