<style>
    #modulesContainer h4 {
        text-align: center !important;
    }
</style>
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
                    <form id="offer-form" data-parsley-validate="" novalidate="" action="/offer/list" mothod="post">
                        <div class="x_content" id="generalInformation">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference_no">Referans No <span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <input type="text" id="reference_no" required="required" name="reference_no" class="form-control">
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-2">
                                    <input type="text" id="revision_no" name="revision_no" class="form-control" value=0 readonly>
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="city_name">Şehir <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="city_name" name="city_name" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">E-Posta <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="email" name="email" required="required" class="form-control">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="gsm_number">Mobil  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="gsm_number" name="gsm_number" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tax_office">V.D. / V.N. <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 ">
                                    <input type="text" id="tax_office" name="tax_office" required="required" class="form-control">
                                </div>
                                <div class="col-md-3 col-sm-3 ">
                                    <input type="text" id="tax_number" name="tax_number" required="required" class="form-control">
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
                                <select id="productSelect" name="product_id" class="form-control">
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
                        </form>
                        <div class="item form-group mb-3">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <div class="ln_solid"></div>
                                <button class="btn btn-primary" type="button" onclick="goTechnicalDetails();">Teknik Detayları Getir</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <form id="ftechnical_details">
                            <div class="form-group" id="modulesContainer">

                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        <div class="col-md-6 col-sm-6 offset-md-3">
            <div class="ln_solid"></div>
            <button class="btn btn-primary" type="button" onclick="postForm();">Kaydet</button>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="<?=BUILD_PATH;?>/jquery/dist/jquery.min.js"></script>
<script>
    function countElement(item,array) {
        var count = 0;
        $.each(array, function(i,v) {
            if (v.feature_group_name === item) {
            count++;
        } });
        return count;
    }

    function initElGroup (to, id, module_group_name) {
        // console.log($('#modulesContainer').find('#mcGroup-'+id));
        to.append('<h4 class="mt-3">'+module_group_name+'</h4><hr>');
        to.append('<div class="row" id="group-'+id+'"></div>');
        var elBlock = '<div class="col-md-8" id="fcGroup-'+id+'"></div><div class="col-md-4" style="background-color: #fafafa;" id="mcGroup-'+id+'"></div>';
        var group = $('#group-'+id);
        group.append(elBlock);
    }

    function createInputElementGroup(elements, to) {
        var elBlock = '';
        elBlock += '<div class="row">'
        elBlock += '<div class="col-md-12">'+elements[0].module_name+'</div>';
        $.each(elements, function(index, value) {
            if (value.isThere != 0) {
                elBlock += '<div class="col-md-'+value.size+'">';
                elBlock += '<label> / '+value.label+'</label>';
                    elBlock += '<div class="form-group">';
                        elBlock += '<div class="input-group">';
                            elBlock += '<input name="'+value.name+'-'+value.id+'" type="'+value.type+'" value="'+value.value+'" class="form-control">';
                        elBlock += '</div>';
                    elBlock += '</div>';
                elBlock += '</div>';
            }
        });
        elBlock += '</div></div>';
        $('#'+to).append(elBlock);
    }

    function goTechnicalDetails() {
        var productId = $('#productSelect option').filter(':selected').val();
        var quantity = $('#quantity').val();
        
        $.post('<?=SITE_URL;?>/ajax/offers.php', {action:'getFeatures', params:{productId: productId, quantity: quantity}}, function (data) {
            $.post('<?=SITE_URL;?>/ajax/offers.php', {action:'getModules', params:{productId: productId, quantity: quantity}}, function (data1) {
                var jsonData1 = JSON.parse(data1);
                var groupName = '';

                $.each(jsonData1, function (index, value) {
                    if (groupName !== value.feature_group_name) {
                        // initElGroup(modulesContainer, value.feature_group_id, value.feature_group_name);
                        groupName = value.feature_group_name;
                    }
                    var elBlock = [];
                    elBlock.push({'isThere':true, 'module_name': value.module_name, 'size': 6, 'name': 'details-quantity', 'id': value.module_id, 'label': 'Adet',  'value': '','type': 'number'});
                    elBlock.push({'isThere':true, 'module_name': value.module_name, 'size': 6, 'name': 'details-price',    'id': value.module_id, 'label': 'Fiyat', 'value': '','type': 'number'});
                    createInputElementGroup(elBlock, 'mcGroup-'+value.feature_group_id);
                });
            });
            var jsonData = JSON.parse(data);
            var featuresContainer = $('#modulesContainer');
            var groupName = '';

            featuresContainer.html('');
            $.each(jsonData, function(index, value) {
                if (groupName !== value.feature_group_name) {
                    initElGroup(featuresContainer, value.feature_group_id, value.feature_group_name);
                    groupName = value.feature_group_name;
                }
                var elBlock = [];
                elBlock.push({'isThere':true, 'module_name':value.feature_name, 'size':6, 'name':'features-value', 'id':value.feature_id, 'label': 'Değer', 'value':'', 'type': 'text'});
                elBlock.push({'isThere':true, 'module_name':value.feature_name, 'size':6, 'name':'features-description', 'id':value.feature_id, 'label': 'Açıklama', 'value':'', 'type': 'text'});
                createInputElementGroup(elBlock, 'fcGroup-'+value.feature_group_id);
            });
        });
        
    }

    function postForm() {
        var formElement = $('#offer-form');
        var technicalDetails = $('#ftechnical_details');
        var formData = {};
        var headData = {};
        var technicalDetailsData = {};
        $.each(formElement[0], function(index, value) {
            headData[value.name] = value.value;
        });
        formData['heads'] = headData;
        $.each(technicalDetails[0], function(index, value) {
            technicalDetailsData[value.name] = value.value;
        });
        formData['details'] = technicalDetailsData;
        // console.log(formData);
        $.post('<?=SITE_URL;?>/ajax/offers.php',{'action':'postData', params:formData}, function(returnValue){
            console.log(returnValue);
        });
    }
    var productSelect = $('#productSelect');
    $(document).ready(function ()  {
        productSelect.html('');
        $.post('<?=SITE_URL;?>/ajax/offers.php', {action:'allProducts', params:{}}, function (data) {
            var jsonData = JSON.parse(data);
            $.each(jsonData, function (index, value) {
                productSelect.append('<option value="'+value.id+'">'+value.product_name+'</option>')
            });
        });
    });
</script>