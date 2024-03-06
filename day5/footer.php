<footer class="ftco-footer ftco-bg-dark ftco-section">
  <div class="container px-md-5">
    <div class="row mb-5">
      <div class="col-md">
        <div class="ftco-footer-widget mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Category</h2>
          <ul class="list-unstyled categories">
            <li><a href="#">Technology <span>(2)</span></a></li>
            <li><a href="#">Travel <span>(2)</span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Archives</h2>
          <ul class="list-unstyled categories">
            <li><a href="#">October 2018 <span>(6)</span></a></li>
            <li><a href="#">September 2018 <span>(6)</span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Have a Questions?</h2>
          <div class="block-23 mb-3">
            <ul>
              <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San
                  Francisco, California, USA</span></li>
              <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
              <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">

        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;
          <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i
            class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Aditya</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
    </div>
  </div>
</footer>
</div><!-- END COLORLIB-MAIN -->
</div><!-- END COLORLIB-PAGE -->

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
  <svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
  </svg>
</div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <!-- <script src="js/jquery.timepicker.min.js"></script> -->
  <script src="js/scrollax.min.js"></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
  <!-- <script src="js/google-map.js"></script> -->
  <script src="js/main.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    function viewaddress(item_id){
      $.ajax({
          url:"api.php",    //the page containing php script
          type: "post",    //request type,
          dataType: 'json',
          data: {slug: "address", id: item_id },
          success:function(result){
              $('#add_content').text(result);
              $('#exampleModalCentered').modal('show');
          }
      });
    }
    function deleteItem(item_id){
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url:"api.php",    //the page containing php script
            type: "post",    //request type,
            dataType: 'json',
            data: {slug: "delete", id: item_id },
            success:function(result){
              Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
              });
              setTimeout(function () {
                location.reload();
              }, 2500);
            }
          });
        }
      });
    }
    function addFamilySection(){
      var cnt = parseInt($('#addmore_count').val());
      if(cnt<5){
        var contentHtml = $('#familyContent').html();
        var appendHtml = $('#familyAppend').append(contentHtml);
        $(appendHtml).find(".change").html('<input type="button" value="Remove" class="btn btn-primary btn-sm py-2 px-3 remove ">');
        $('#addmore_count').val(cnt+1);
      } else {
        alert('maximum members reached!!!');
      }
    }
    $("body").on("click",".remove",function(){ 
        var cnt = parseInt($('#addmore_count').val());
        $(this).parents(".mg").remove();
        $('#addmore_count').val(cnt-1);
    });
    function approveUser(item_id){
      $.ajax({
          url:"api.php",    //the page containing php script
          type: "post",    //request type,
          dataType: 'json',
          data: {slug: "approve", id: item_id },
          success:function(result){
              location.reload();

          }
      });
    }
    function unapproveUser(item_id){
      $.ajax({
          url:"api.php",    //the page containing php script
          type: "post",    //request type,
          dataType: 'json',
          data: {slug: "unapprove", id: item_id },
          success:function(result){
              location.reload();

          }
      });
    }
    function deleteFamily(item_id){
      $.ajax({
          url:"api.php",    //the page containing php script
          type: "post",    //request type,
          dataType: 'json',
          data: {slug: "deleteFamily", id: item_id },
          success:function(result){
              location.reload();

          }
      });
    }
  </script>
    
  </body>
</html>