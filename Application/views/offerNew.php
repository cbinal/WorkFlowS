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
                <div class="col-md-12 col-sm-12  form-group">
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
                        <li style="margin-left:20px;">
                            <a href="#" onclick="postForm();"><i class="fa fa-save"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div id="alert-container">
            
        </div>

            <div class="row">
                <div class="x_panel">
                    <div class="x_title" id="generalInformationTitle">
                        <h2>Genel Bilgiler<small> </small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <form id="offer-form" data-parsley-validate="" novalidate="">
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
                    </form>
                </div>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Genel Koşullar<small> </small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a><i class="fa fa-refresh"></i></a></li>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <form id="fgeneral_conditions">
                        <div class="x_content"  id="general_conditions">
                            <?php
                            echo '<ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">';
                            $activePanel = "4";
                            
                            foreach($params["conditions"] as $key=>$value){
                                $active="";
                                if($activePanel==$value["id"]){$active="active";}
                                echo '<li class="nav-item"><a class="nav-link '.$active.'" id="fgtab'.$value["id"].'-tab" data-toggle="tab" href="#fgtab'.$value["id"].'" role="tab" aria-controls="fgtab'.$value["id"].'" aria-selected="true">'.$value["feature_group_name"].'</a></li>';
                            }
                            echo '</ul>';
                            echo '<div class="tab-content" id="myTabContent">';
                            // echo json_encode($params["conditions"]);
                            foreach($params["conditions"] as $key0=>$value0){
                                // echo json_encode($value0)."<br><br>";
                                $active = "";
                                if($activePanel==$value0["id"]){$active="active";}
                                echo '<div class="tab-pane fade show '.$active.'" id="fgtab'.$value0["id"].'" role="tabpanel" aria-labelledby="fgtab'.$value0["id"].'-tab">';
                                foreach($value0["data"] as $key1=>$value1){
                                    // echo json_encode($value1)."....<br><br>";
                                    if(!empty($value1["data"]) && isset($value1["data"]) && is_array($value1["data"])) {
                                        // echo "burada";
                                        $fieldType = $value1["field_type"];
                                        echo "<div class='col-md-2' style='vertical-align:middle;'><h5>".$value1["condition_name"]."</h5></div>";
                                        echo "<div class='col-md-9'>";
                                        foreach($value1["data"] as $item2){
                                            if($item2["field_type"]!="radio"){
                                                echo "<input type='".$item2["field_type"]."' class='col-md-6' style='margin-bottom:0;' name='conditions-value-".$item2["id"]."' value='".$item2["value"]."'>";
                                                echo "<input type='".$item2["field_type"]."' class='col-md-5' style='margin-bottom:0;' name='conditions-description-".$item2["id"]."' value='".$item2["description"]."'>";
                                            } else {
                                                echo "<input type='".$item2["field_type"]."' onclick='getDependencies(this);' style='margin-bottom:0;' id='radio-".$item2["id"]."' name='conditions-value-".$value1["id"]."' value='".$item2["value"]."'><label for='radio-".$item2["id"]."'> ".$item2["description"]."</label><br>";
                                            }
                                        }    
                                        echo "</div><div class='clearfix'></div>";
                                    }
                                }
                                echo "</div>"; // Açılan son tablonun kapanışı....
                            }
                            echo '</div>';
                            ?>
                        </div>
                    </form>
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
                                    <select id="product_id" name="product_id" class="form-control">
                                        <option value="0">Ürün Seçiniz</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
                                    Adet <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <input type="number" id="quantity" name="quantity" class="form-control col-md-2">
                                </div>
                            </div>
                            </form>
                            <div class="clearfix"></div>
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
            </div>
        </div>  
<!-- jQuery -->
<script src="<?=BUILD_PATH;?>/jquery/dist/jquery.min.js"></script>
<script>
    var elementStatus = {"S":false, "M":true};

    function countElement(item,array) {
        var count = 0;
        $.each(array, function(i,v) {
            if (v.feature_group_name === item) {
            count++;
        } });
        return count;
    }

    function initElGroup (to, id, module_group_name) {
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
                        if (value.type=='text' || value.type=='number'){
                            elBlock += '<input name="'+value.name+'-'+value.id+'" type="'+value.type+'" value="'+value.value+'" class="form-control">';
                        } else {
                            $.each(value.data, function(index2, value2){
                                var checked = '';
                                if(value2.default_value!=0){checked='checked';}
                                console.log(value2.default_value+'-'+value2.value);
                                elBlock += '<div class="col-md-6"><label> ';
                                elBlock += '<input name="'+value.name+'-'+value.id+'" type="'+value.type+'" '+checked+' value="'+value2.value+'">';
                                elBlock += value2.value+'</label></div>';
                            });
                        }
                        elBlock += '</div>';
                    elBlock += '</div>';
                elBlock += '</div>';
            }
        });
        elBlock += '</div></div>';
        $('#'+to).append(elBlock);
        $.each(elements, function(index, value){
            askDB4ModuleID2ConditonID(value.id);
        });
    }

    function goTechnicalDetails() {
        var productId = $('#product_id option').filter(':selected').val();
        var conditions = $('#fgeneral_conditions');
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
                $.post('<?=SITE_URL;?>/ajax/offers.php', {action:'getFeatureValues', params:{featureID:value.feature_id}}, function (data2) {
                    jsonData2 = JSON.parse(data2);
                    var elBlock = [];
                    elBlock.push({'isThere':true, 'module_name':value.feature_name, 'size':6, 'name':'features-value', 'id':value.feature_id, 'label': 'Değer', 'value':'', 'type': value.field_type, 'data': jsonData2});
                    elBlock.push({'isThere':true, 'module_name':value.feature_name, 'size':6, 'name':'features-description', 'id':value.feature_id, 'label': 'Açıklama', 'value':'', 'type': 'text'});
                    createInputElementGroup(elBlock, 'fcGroup-'+value.feature_group_id);
                });
            });
        });        
    }

    function askDB4ModuleID2ConditonID(moduleID){
        $.post('<?=SITE_URL;?>/ajax/offers.php',{action:'getAffectingCondition', params:{module_id:moduleID}}, function(data){
            jsonData = JSON.parse(data);
            if(jsonData[0]!=undefined){
                var checkedCondition = $('input[name="conditions-value-'+jsonData[0].affecting_condition+'"]:checked');
                if(checkedCondition[0]!=undefined){
                    $('input[name=details-quantity-'+moduleID+']').prop('disabled', elementStatus[checkedCondition[0].value]);
                    $('input[name=details-price-'+moduleID+']').prop('disabled', elementStatus[checkedCondition[0].value]);
                }
            }
        });
    }

    function getDependencies(element) {
        if(element.name != '') {var splitElement = element.name.split('-');} else {element.name='';}
        var conditionID = splitElement[splitElement.length-1];
        $.post('<?=SITE_URL;?>/ajax/offers.php',{action:'getAffectedModule', params:{condition_id:conditionID}}, function(data){
            var jsonData = JSON.parse(data);
            var affectedModule = jsonData[0]["affected_module"];
            var $inputPrice = $('input[name=details-price-'+affectedModule+']');
            var $inputQuantity = $('input[name=details-quantity-'+affectedModule+']');
            $inputPrice.prop('disabled', elementStatus[element.value]);
            $inputQuantity.prop('disabled', elementStatus[element.value]);
        });
    }

    function postForm() {
        var formElement = $('#offer-form');
        var technicalDetails = $('#ftechnical_details');
        var conditions = $('#fgeneral_conditions');
        console.log(conditions[0]);
        var formData = {};
        var headData = {};
        var conditionsData = {};
        var technicalDetailsData = {};
        $.each(formElement[0], function(index, value) {
            headData[value.name] = value.value;
        });
        headData['product_id'] = $('#product_id').val();
        headData['quantity'] = $('#quantity').val();
        formData['heads'] = headData;
        $.each(technicalDetails[0], function(index, value) {
            technicalDetailsData[value.name] = value.value;
        });
        $.each(conditions[0], function(index, value){
            
            console.log(value.type);
            if(value.type=='radio'){
                console.log(value);
                console.log('radio if');
                console.log(value.checked);
                if(value.checked) {
                    console.log('radio if checked');
                    console.log($('#radio-15')); //value.id
                    var splitCondition = value.name.split('-');
                    technicalDetailsData[value.name] = value.value;
                    var radioElement = $('#'+value.id);
                    technicalDetailsData['conditions-description-'+splitCondition[2]] = radioElement[0].labels[0].innerText;
                }
            } else {
                technicalDetailsData[value.name] = value.value;
            }
        });
        formData['details'] = technicalDetailsData;

        console.log(formData);

        $.post('<?=SITE_URL;?>/ajax/offers.php',{action:'postData', params:formData}, function(returnValue){
            var jsonValue = JSON.parse(returnValue);
            var actions = {};
            var actionsUI = {"heads":"Üst Bilgiler", "features":"Özellikler", 'details':'Detay Bilgiler', 'conditions':'Koşul Bilgiler'}
            var alertLevel = {true:'alert-success', false:'alert-danger'};
            $.each(jsonValue, function(key,value){
                actions[key] = {};
                actions[key]['status'] = true;
                if($.isArray(value)){
                    $.each(value, function(index1, value1) {

                        actions[key]["status"] = actions[key]['status']&&value1["status"];
                    });
                } else {actions[key]["status"] = actions[key]['status']&&value["status"];}
                if(actions[key]['status']){actions[key]['message'] = 'Kayıt Başarılı';} else {actions[key]['message'] = 'Kayıt Yapılamadı';}

                // <div class="alert alert-success alert-dismissible d-block" role="alert" id="alert-box">
                // <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                // </button>
                // <span id="alert-message">deneme</span>
                // </div>
                // $('#alert-box').remove
            });
            var counter = 0;
            $.each(actions, function(key, value){
                var $alertBox = $('<div>', {'id':key, 'class':'alert alert-dismissible '+alertLevel[value['status']], 'role':'alert'});
                var $alertButton = $('<button>', {'class':'close', 'data-dismiss':'alert', 'aria-label':'Kapat','aria-hidden':'true' , 'type':'button', 'text':'x'});
                var $alertMessage = $('<span>', {'id':'alert-message', 'text':actionsUI[key]+': '+value['message']});
                $alertBox.append($alertButton).append($alertMessage);
                $('#alert-container').append($alertBox);
            });
        });
    }
    var productSelect = $('#product_id');
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