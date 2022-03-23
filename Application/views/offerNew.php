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
                                <select id="productSelect" class="form-control">
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
                                <hr>

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
            if (v.module_group_name === item) {
            count++;
        } });
        return count;
    }

    function initElGroup (to, num, module_group_name) {
        var elBlock = '';
        elBlock += '<div class="row"><div class="col-md-12" id="mcChild-'+num+'"></div></div>';
        to.append(elBlock);
        childEl = $('#mcChild-'+num);
        childEl.append('<h4 class="mt-3">'+module_group_name+'</h4><hr>');
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
        $('#mcChild-'+to).append(elBlock);
    }

    function goTechnicalDetails() {
        var productId = $('#productSelect option').filter(':selected').val();
        var quantity = $('#quantity').val();
        $.post('<?=SITE_URL;?>/ajax/offers.php', {action:'getModules', params:{productId: productId, quantity: quantity}}, function (data) {
            // console.log(data);
            var jsonData = JSON.parse(data);
            var modulesContainer = $('#modulesContainer');

            var groupName = '';
            modulesContainer.html('');
            $.each(jsonData, function (index, value) {
                if (groupName !== value.module_group_name) {
                    initElGroup(modulesContainer, value.module_group_id, value.module_group_name);
                    groupName = value.module_group_name;
                }
                var elBlock = [];
                elBlock.push({
                    'isThere':true, 
                    'module_name': value.module_name, 
                    'size': 4, 
                    'name': 'value', 
                    'id': value.id, 
                    'label': 'Özellik', 
                    'value':'',
                    'type': 'text'
                });
                elBlock.push({
                    'isThere':true, 
                    'module_name': value.module_name, 
                    'size': 4, 
                    'name': 'description', 
                    'id': value.id, 
                    'label': 'Açıklama', 
                    'value':'',
                    'type': 'text'
                });
                elBlock.push({
                    'isThere':parseInt(value.module_quantity_inf)*parseInt($('#quantity').val()), 
                    'module_name': value.module_name, 
                    'size': 2, 
                    'name': 'quantity', 
                    'id': value.id, 
                    'label': 'Adet', 
                    'value':parseInt(value.module_quantity_inf)*parseInt($('#quantity').val()),
                    'type': 'number'
                });
                elBlock.push({
                    'isThere':parseInt(value.module_price_inf)*parseInt($('#quantity').val()), 
                    'module_name': value.module_name, 
                    'size': 2, 
                    'name': 'price', 
                    'id': value.id, 
                    'label': 'Fiyat', 
                    'value':parseInt(value.module_price_inf)*parseInt($('#quantity').val()),
                    'type': 'number'
                });
                createInputElementGroup(elBlock, value.module_group_id);
            });
        });
    }

    function postForm() {
        var formElement = $('#offer-form');
        var technicalDetails = $('#ftechnical_details');
        // console.log(formElement);
        var formData = {};
        var headData = {};
        var technicalDetailsData = {};
        $.each(formElement[0], function(index, value) {
            // console.log(value.name+' - '+value.value);
            headData[value.name] = value.value;
        });
        formData['heads'] = headData;
        $.each(technicalDetails[0], function(index, value) {
            technicalDetailsData[value.name] = value.value;
        });
        formData['details'] = technicalDetailsData;
        
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