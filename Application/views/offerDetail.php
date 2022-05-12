<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Satış Teklif Detayı</h3>
            </div>

            <div class="title_right">
                <div class="col-md-12 col-sm-12  form-group">
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="dropleft">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-bars"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?=SITE_URL.'/offer/list'?>">Teklif Listesi</a>
                                <a class="dropdown-item" href="<?=SITE_URL.'/offer/new'?>">Yeni Teklif</a>
                                <a class="dropdown-item" href="<?=SITE_URL.'/offer/revision'?>">Revize Et</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="x_panel">
                <div class="x_title" id="generalInformationTitle">
                <h2>Genel Bilgiler<small><?php echo $params["heads"][0]["reference_no"]."/".$params["heads"][0]["revision_no"]." - ".$params["heads"][0]["firm_name"] ?> </small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
                </div>
                <div class="x_content" id="generalInformation">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference_no">Referans No <span class="required">*</span>
                </label>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <input type="text" readonly value="<?php echo $params["heads"][0]["reference_no"] ?>" class="form-control">
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <input type="text" readonly value="<?php echo $params["heads"][0]["revision_no"] ?>" class="form-control" value=0 readonly>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="firm_name">Firma Adı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" readonly value="<?php echo $params["heads"][0]["firm_name"] ?>" class="form-control">
                </div>
            </div>
            <div class="item form-group">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Adres</label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea readonly class="form-control"><?php echo $params["heads"][0]["address"] ?></textarea>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="country">Ülke <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" readonly value="<?php echo $params["heads"][0]["country"] ?>" class="form-control">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="city_name">Şehir <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" readonly value="<?php echo $params["heads"][0]["city_name"] ?>" class="form-control">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone_number">Telefon <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" readonly value="<?php echo $params["heads"][0]["phone_number"] ?>" class="form-control">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="gsm_number">Mobil  <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" readonly value="<?php echo $params["heads"][0]["gsm_number"] ?>" class="form-control">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tax_office">V.D. / V.N. <span class="required">*</span>
                </label>
                <div class="col-md-3 col-sm-3 ">
                    <input type="text" readonly value="<?php echo $params["heads"][0]["tax_office"] ?>" class="form-control">
                </div>
                <div class="col-md-3 col-sm-3 ">
                    <input type="text" readonly value="<?php echo $params["heads"][0]["tax_number"] ?>" class="form-control">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="auth_person">Yetkili Kişi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" readonly value="<?php echo $params["heads"][0]["auth_person"] ?>" class="form-control">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="auth_person">Ürün Adı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" readonly value="<?php echo $params["details"][0]["product_name"] ?>" class="form-control">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="auth_person">Ürün Adedi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" readonly value="<?php echo $params["heads"][0]["quantity"] ?>" class="form-control">
                </div>
            </div>
            </div>
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Teknik Detaylar<small> </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content"  id="features">
                    <table id="featureTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                        <th>GRUP ADI</th>
                        <th>ÖZELLİK</th>
                        <th>DEĞER</th>
                        <th>AÇIKLAMA</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // echo json_encode($params["technical_details"]);
                        foreach ($params["features"] as $item) {
                        echo "<tr>";
                        echo "<td>".$item["feature_group_name"]."</td>";
                        echo "<td>".$item["feature_name"]."</td>";
                        echo "<td>".$item["value"]."</td>";
                        echo "<td>".$item["description"]."</td>";
                        echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Fiyat Tablosu<small> </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content"  id="details">
                    <table id="priceTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                        <th>GRUP ADI</th>
                        <th>MODUL ADI</th>
                        <th>AÇIKLAMA</th>
                        <th>ADET</th>
                        <th>FİYAT</th>
                        <th>TUTAR</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // echo json_encode($params["technical_details"]);
                        foreach ($params["details"] as $item) {
                        echo "<tr>";
                        echo "<td>".$item["feature_group_name"]."</td>";
                        echo "<td>".$item["module_name"]."</td>";
                        echo "<td>".$item["description"]."</td>";
                        echo "<td style='text-align:right'>".$item["quantity"]."</td>";
                        echo "<td style='text-align:right'>".$item["price"]."</td>";
                        echo "<td style='text-align:right'></td>";
                        echo "</tr>";
                        }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" style="text-align:right">Genel Toplam:</th>
                                <th style="text-align:right"></th>
                                <th style="text-align:right"></th>
                                <th style="text-align:right"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    tr.group,
    tr.group:hover {
        background-color: #00524b !important;
        color:#FFF;
    }
</style>
<script>
$(document).ready(function() {
    var groupColumn = 0;
    var table = $('#featureTable').DataTable({
        "columnDefs": [
            { "visible": false, "targets": groupColumn }
        ],
        "order": [[ groupColumn, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );

    var table = $('#priceTable').DataTable({
        "columnDefs": [
            { "visible": false, "targets": groupColumn },
            {"render": function ( data, type, row ) {
				return formatMoney(parseInt(row[3])*parseInt(row[4]));
			},
			"targets": -1}
        ],
        "order": [[ groupColumn, 'asc' ]],
        "displayLength": 25,
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api();
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            totalq = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            total = 0;
            $.each(data, function(index,value){
                total += value[3]*value[4];
            });
            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            pageTotalq = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            // Update footer
            $( api.column( 5 ).footer() ).html(
                formatMoney(total) +''
            );
            $( api.column( 3 ).footer() ).html(
                formatMoney(totalq) +''
            );
        },
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
    // Order by the grouping
    $('#priceTable tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
            table.order( [ groupColumn, 'desc' ] ).draw();
        }
        else {
            table.order( [ groupColumn, 'asc' ] ).draw();
        }
    } );
    // Order by the grouping
    $('#featureTable tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
            table.order( [ groupColumn, 'desc' ] ).draw();
        }
        else {
            table.order( [ groupColumn, 'asc' ] ).draw();
        }
    } );
} );

function formatMoney(n) {
    return "" + (Math.round(n * 100) / 100).toLocaleString();
}
</script>