        <section id="page-title" class="page-title-mini">
            <div class="container clearfix">
                <h1>Visitor Management</h1>
                <ol class="breadcrumb">
                 	<li class="active">Visitor Management</li>
                </ol>
            </div>
        </section>

        <section id="content">
            <div class="content-wrap nopadding">
				<div class="container clearfix">

                <div class="col_full topmargin-sm">
					<div class="col_one_third">
                        <select name="data_per_page" id="data_per_page" class="sm-form-control fleft" style="padding:5px;width:auto;margin:3px;border-radius:3px;">
                            <option value="10">10 Records per page</option>
                            <option value="20">20 Records per page</option>
                            <option value="30">30 Records per page</option>
                            <option value="40">40 Records per page</option>
                            <option value="50">50 Records per page</option>
                        </select>
               		</div>
                 	<div class="col_two_third col_last">
                    <a href="<?=BASE_HREF; ?>myanmin/visitoregis/wexcel" class="button button-reveal button-dark button-small button-border button-rounded fright"><i class="icon-download"></i><span>Export to excel</span></a>
                    </div>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                      <th>
                      	<div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn-menu" data-toggle="dropdown">
                       	#
                        </a>
                        <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="javascript:void(0);" onclick="sortOrder('visitor_id','asc');">Asc</a></li>
                        <li><a tabindex="-1" href="javascript:void(0);" onclick="sortOrder('visitor_id','desc');">Desc</a></li>
                        </ul>
                        </div>
                      </th>
                      <th>
                        <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn-menu" data-toggle="dropdown">
                       	Fullname
                        </a>
                        <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="javascript:void(0);" onclick="sortOrder('visitor_firstname','asc');">Asc</a></li>
                        <li><a tabindex="-1" href="javascript:void(0);" onclick="sortOrder('visitor_firstname','desc');">Desc</a></li>
                        </ul>
                        </div>
                      </th>
                      <th>
                      	<div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn-menu" data-toggle="dropdown">
                       	Company
                        </a>
                        <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="javascript:void(0);" onclick="sortOrder('visitor_company','asc');">Asc</a></li>
                        <li><a tabindex="-1" href="javascript:void(0);" onclick="sortOrder('visitor_company','desc');">Desc</a></li>
                        </ul>
                        </div>
                      </th>
                      <th>
                        <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn-menu" data-toggle="dropdown">
                       	Country
                        </a>
                        <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="javascript:void(0);" onclick="sortOrder('visitor_country','asc');">Asc</a></li>
                        <li><a tabindex="-1" href="javascript:void(0);" onclick="sortOrder('visitor_country','desc');">Desc</a></li>
                        </ul>
                        </div>
                      </th>
                      <th class="center">
                      	<div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn-menu center" data-toggle="dropdown">
                       	Tel
                        </a>
                        <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="javascript:void(0);" onclick="sortOrder('visitor_phone1','asc');">Asc</a></li>
                        <li><a tabindex="-1" href="javascript:void(0);" onclick="sortOrder('visitor_phone1','desc');">Desc</a></li>
                        </ul>
                        </div>
                      </th>
                      <th class="center">
                      	<div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn-menu" data-toggle="dropdown">
                       	Email
                        </a>
                        <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="javascript:void(0);" onclick="sortOrder('visitor_email','asc');">Asc</a></li>
                        <li><a tabindex="-1" href="javascript:void(0);" onclick="sortOrder('visitor_email','desc');">Desc</a></li>
                        </ul>
                        </div>
                      </th>
                      <th class="center">
                      	<div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn-menu" data-toggle="dropdown">
                       	Date
                        </a>
                        <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="javascript:void(0);" onclick="sortOrder('visitor_datecreate','asc');">Asc</a></li>
                        <li><a tabindex="-1" href="javascript:void(0);" onclick="sortOrder('visitor_datecreate','desc');">Desc</a></li>
                        </ul>
                        </div>
                      </th>
                      <th style="width:130px;" class="center"><a>ดำเนินการ</a></th>
                    </tr>
                    </thead>
                    <tbody id="resultdata">
                    <tr>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                    </tr>

                    </tbody>
                </table>
                <input type="hidden" id="data_sort" value="" /><input type="hidden" id="data_order" value="" />
                <span id="pagination" class="fleft">..</span><span class="pull-right rightmargin-sm bottommargin-sm"><span id="total">0</span> Records</span>

                <script>

                  $(function(){
                    getData();
                  });
				          $("#search").click(function(){
                    getData();
                  });
  				        $("#data_per_page").change(function(){
                    getData();
                  });

          				function sortOrder(field,order){
          					$("#data_sort").val(field);
          					$("#data_order").val(order);
          					getData();
          				}

                  function getData(data_start_item){
                    if(data_start_item == "undefined"){
                        data_start_item = 0;
                    }
                    $.ajax({
                        type: 'POST',
                        url: "<?=BASE_HREF; ?>myanmin/visitoregis/visitorgislist/"+data_start_item,
                        data: {
            							visitor_id:$("#visitor_id").val(),
            							visitor_firstname:$("#visitor_firstname").val(),
            							visitor_company:$("#visitor_company").val(),
            							visitor_country:$("#visitor_country").val(),
            							visitor_phone1:$("#visitor_phone1").val(),
                          visitor_email:$("#visitor_email").val(),
            							data_start_item:data_start_item,
            							data_per_page:$("#data_per_page").val(),
            							data_sort:$("#data_sort").val(),
            							data_order:$("#data_order").val()
                        },
                        beforeSend: function(){
							            $("#content-loading").show();
                        },
                        success: function(data){
							            $("#content-loading").fadeOut();
                          datalist = data.split("#####");
                          $("#resultdata").html(datalist[0]);
                          $("#pagination").html(datalist[1]);
                          $("#total").html(datalist[2]);
                        }
                    });
                }

                function deleteItem(id){
        					$.confirm({
        						text: "Are you sure you want to delete ?",
        						title: "Confirmation",
        						confirm: function() {
        							$.ajax({
        								type: 'POST',
        								url: "<?=BASE_HREF; ?>myanmin/visitoregis/deletevisitor",
        								data: {
        									visitor_id: id,
        								},
        								beforeSend: function(){
        								},
        								success: function(data){
        									location.reload();
        								}
        							});
        						},
        						cancel: function() {
        						}
        					});
                }
                </script>

				</div>
			</div>
        </section>
