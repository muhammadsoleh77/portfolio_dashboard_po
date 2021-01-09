<style media="screen">
  .main-menu {
    text-align:center;
    padding:10px;
  }
  .menu {
    font-size:16px;
    background-color:#e0af1b;
    border:2px solid #e0af1b;
    border-radius:6px;
    padding:10px;
    color:#fff;
  }
  .menu:hover {
    background-color:#fff;
    color:#e0af1b;
    cursor:pointer;
    border:2px solid #e0af1b;
  }
  .disabled {
    border: 2px solid #ddd;
    background-color: #ddd;
    cursor: pointer;
  }
</style>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?php echo base_url('admin/dashboard') ?>"><b>Home</b></a></li>
    <li class="active"><b>Crew</b></li>
</ul>
<!-- END BREADCRUMB -->

<div class="widgets">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default bootstrap-panel">
        <div>
          <div class="panel-body">

            <?php echo form_open(base_url('admin/crew/tampil'), 'class="form-horizontal"'); ?>
            <div class="row">
            <div class="col-md-12">
              <div class="form-horizontal">
                <div class="form-group">

                      <div class="col-lg-3">
                        <input class="form-control inputPerPage" type="number" name="inputPerPage" placeholder="Input Total Row">
                        <span style="color:red;"><?php echo form_error('inputPerPage'); ?></span>
                      </div>

                      <div class="col-lg-1">
                        <button class="btn btn-warning tampil" type="submit" name="submit" value="tampilCrew">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                      </div>

                </div>
                <!-- <span id="tampilData">
                <div id="listingTable"></div>
                              <a href="javascript:prevPage()" id="btn_prev">Prev</a>
                              <a href="javascript:nextPage()" id="btn_next">Next</a>
                              page: <span id="page"></span> -->
                </span>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // // $(document).ready(function(){
  //   $("#tampilData").hide();
  //   // $(".tampil").click(function(){
      
  //   // });

  //     //       console.log(data);
            

  //           // var html = '';
  //           // html += '<div id="listingTable"></div>' +
  //           //         '<a href="javascript:prevPage()" id="btn_prev">Prev</a>' +
  //           //         '<a href="javascript:nextPage()" id="btn_next">Next</a>' +
  //           //         'page: <span id="page"></span>';
  //           // $("#tampilData").show();

  //           $(".tampil").click(function() {
  //             $("#tampilData").show();
  //             var inputPage = $(".inputPerPage").val();
  //     var idPo = "<?= $dataPo->id ?>";
  //     var token = "<?= $dataUser->token ?>";
  //     var base_url = "<?= $this->config->item('endpoint') ?>";

  //     var param = {
  //       idPo: idPo,
  //       orderBy: "id",
  //       pageNo: 0,
  //       pageRow: inputPage
  //     }

  //     $.ajax({
  //         contentType: 'application/json',
  //         type : 'POST',
  //         url : base_url + '/bumel/po/crew',
  //         data: JSON.stringify(param),
  //         beforeSend : function(xhr) {
  //           xhr.setRequestHeader('Authorization', 'Bearer ' + token);
  //         },
  //         success : function(data){
  //           // console.log(data);

  //           var objJson = data.content;
            
          
              
            
            

  //           var current_page = 1;
  //           var records_per_page = 10;

            
  // //           var objJson = [
  // //     { adName: "AdName 1"},
  // //     { adName: "AdName 2"},
  // //     { adName: "AdName 3"},
  // //     { adName: "AdName 4"},
  // //     { adName: "AdName 5"},
  // //     { adName: "AdName 6"},
  // //     { adName: "AdName 7"},
  // //     { adName: "AdName 8"},
  // //     { adName: "AdName 9"},
  // //     { adName: "AdName 10"}
  // // ];
  // //             console.log(objJson);
            

  //           function prevPage()
  //           {
  //               if (current_page > 1) {
  //                   current_page--;
  //                   changePage(current_page);
  //               }
  //           }
            

  //           function nextPage()
  //           {
  //               if (current_page < numPages()) {
  //                   current_page++;
  //                   changePage(current_page);
  //               }
  //           }

  //           function changePage(page)
  //           {
  //             console.log(objJson);
              
  //               var btn_next = document.getElementById("btn_next");
  //               var btn_prev = document.getElementById("btn_prev");
  //               var listing_table = document.getElementById("listingTable");
  //               var page_span = document.getElementById("page");

  //               // Validate page
  //               if (page < 1) page = 1;
  //               if (page > numPages()) page = numPages();

  //               listing_table.innerHTML = "";

  //               for (var i = (page-1) * records_per_page; i < (page * records_per_page); i++) {
  //                   listing_table.innerHTML += objJson[i].nik + "<br>";
  //               }
  //               page_span.innerHTML = page;

  //               if (page == 1) {
  //                   btn_prev.style.visibility = "hidden";
  //               } else {
  //                   btn_prev.style.visibility = "visible";
  //               }

  //               if (page == numPages()) {
  //                   btn_next.style.visibility = "hidden";
  //               } else {
  //                   btn_next.style.visibility = "visible";
  //               }
  //           }

  //           function numPages()
  //           {
  //               return Math.ceil(objJson.length / records_per_page);
  //           }

  //           // window.onload = function() {
  //               changePage(1);
  //           // };

  //       }
  //     });
  //   });

  //           // window.onload = function() {
  //           //     changePage(1);
  //           // };
            

          
  //   // })
    
  // // })
</script>
