<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Yeni Satış Teklif</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group">
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="dropleft">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-bars"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?=SITE_URL.'/offer/list'?>">Teklif Listesi</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <form id="demo-form2" data-parsley-validate="" novalidate="">
            <div class="clearfix"></div>
        <div class="row">
                <div class="x_panel">
                <div class="x_title" id="generalInformationTitle">
                    <h2>Genel Bilgiler<small> </small></h2>
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
                                <input type="text" id="reference_no" required="required" name="reference_no" class="form-control ">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <input type="text" id="revision_no" required="required" class="form-control " readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="firm_name">Firma Adı <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="firm_name" name="firm_name" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Adres</label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea id="middle-name" class="form-control" type="text" name="address"></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="country">Ülke <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="country" name="country" required="required" class="form-control" value="Türkiye">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="city">Şehir <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="city" name="city" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone_number">Telefon <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="phone_number" name="phone_number" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="fax_number">Faks <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="fax_number" name="fax_number" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile_number">Mobil  <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="mobile_number" name="mobile_number" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tax_office">V.D. / V.N. <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-3 ">
                                <input type="text" id="tax_office" name="tax_office" required="required" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-3 ">
                                <input type="text" id="tex_number" name="tax_number" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="auth_person">Yetkili Kişi <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="auth_person" name="auth_person" required="required" class="form-control">
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

                <div class="x_content"  id="technical_details">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
                            Ürün Seçiniz <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="product_id" id="productSelect" class="form-control">
                                <option value="0">Ürün Seçiniz</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
                            Adet <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <input type="number" id="quantity" name="quantity" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <div class="ln_solid"></div>
                            <button class="btn btn-primary" type="button" onclick="goTechnicalDetails();">Teknik Detayları Getir</button>
                        </div>
                    </div>

                    <div class="form-group" id="modulesContainer">

                    </div>

                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- jQuery -->
<script src="<?=BUILD_PATH;?>/jquery/dist/jquery.min.js"></script>
<script>
    function countElement(item,array) {
        var count = 0;
        $.each(array, function(i,v) {
            console.log('UP:'+v.module_group_name+' === '+item);
            if (v.module_group_name === item) {
            // console.log(v+' === '+item);
            count++;
        } });
        return count;
    }

    function goTechnicalDetails() {
/*
        $('#generalInformation').attr('style','display: none;');
        $('#generalInformationTitle ul li .collapse-link i').removeClass('fa-chevron-up');
        $('#generalInformationTitle ul li .collapse-link i').addClass('fa-chevron-down');
*/
        var productId = $('#productSelect option').filter(':selected').val();
        var quantity = $('#quantity').val();
        $.post('<?=SITE_URL;?>/ajax/getProducts.php', {action:'getModules', params:{productId: productId, quantity: quantity}}, function (data) {
            console.log(data);
            var jsonData = JSON.parse(data);

            var html = '<table class="col-md-12">';
            html += '<tr style="border-bottom: solid thin #333;">' +
                '<th style="width: 1% !important;">GR</th>' +
                '<th style="width: 20% !important;">ÖZELLİK ADI</th>' +
                '<th style="width: 30% !important;">DEĞER</th>' +
                '<th style="width:10%;">ADET</th>' +
                '<th style="width: 15% !important;">FİYAT</th>' +
                '<th style="width: 25% !important;">AÇIKLAMA</th>' +
                '</tr>';
            var groupName = '';
            $.each(jsonData, function (index, value) {
                html += ('<tr style="border-bottom: solid thin #333;">');
                if (groupName!==value.module_group_name) {
                    groupName = value.module_group_name;

                    html += ('<td style="white-space: nowrap !important;" rowspan="'+countElement(groupName,jsonData)+'"><p class="rotate">'+value.module_group_name+'</p></td>');
                }
                html += ('<td>'+value.module_name+'</td>');
                html += ('<td><input type="text" class="form-control" name=value_"'+value.id+'"/></td>');
                if (value.price_inf && value.module_price_inf) {
                    html += '<td style="width:10%;"><input type="number" name="module_'+value.id+'" class="form-control" value='+parseInt($('#quantity').val()*value.module_quantity_inf).toString()+'></td>';
                }
                html += '<td><input type="number" name="price_'+value.id+'" class="form-control"></td>';
                html += ('<td><input type="text" class="form-control" name="desc_'+value.id+'"></td>');
                html += ('</tr>');
                // moduleContainer.append('<div class="clearfix"></div>');
            });
            html += ('</table>');
            $('#modulesContainer').html(html);
        });
    }
    var productSelect = $('#productSelect');
    $(document).ready(function ()  {
        productSelect.html('');
        $.post('<?=SITE_URL;?>/ajax/getProducts.php', {action:'allProducts', params:{}}, function (data) {
            var jsonData = JSON.parse(data);
            $.each(jsonData, function (index, value) {
                productSelect.append('<option value="'+value.id+'">'+value.product_name+'</option>')
            });
        });
    });
</script>