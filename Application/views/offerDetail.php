<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Satış Teklif Detayı</h3>
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
                    <h2>Genel Bilgiler<small><?php echo $params["general_information"][0]["reference_no"]."/".$params["general_information"][0]["revision_no"]." - ".$params["general_information"][0]["firm_name"] ?> </small></h2>
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
                        <input type="text" readonly value="<?php echo $params["general_information"][0]["reference_no"] ?>" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <input type="text" readonly value="<?php echo $params["general_information"][0]["revision_no"] ?>" class="form-control" value=0 readonly>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="firm_name">Firma Adı <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" readonly value="<?php echo $params["general_information"][0]["firm_name"] ?>" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Adres</label>
                    <div class="col-md-6 col-sm-6 ">
                      <textarea readonly class="form-control"><?php echo $params["general_information"][0]["address"] ?></textarea>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="country">Ülke <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" readonly value="<?php echo $params["general_information"][0]["country"] ?>" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="city_name">Şehir <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" readonly value="<?php echo $params["general_information"][0]["city_name"] ?>" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone_number">Telefon <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" readonly value="<?php echo $params["general_information"][0]["phone_number"] ?>" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fax_number">Faks <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" readonly value="<?php echo $params["general_information"][0]["fax_number"] ?>" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="gsm_number">Mobil  <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" readonly value="<?php echo $params["general_information"][0]["gsm_number"] ?>" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="tax_office">V.D. / V.N. <span class="required">*</span>
                    </label>
                    <div class="col-md-3 col-sm-3 ">
                        <input type="text" readonly value="<?php echo $params["general_information"][0]["tax_office"] ?>" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-3 ">
                        <input type="text" readonly value="<?php echo $params["general_information"][0]["tax_number"] ?>" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="auth_person">Yetkili Kişi <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" readonly value="<?php echo $params["general_information"][0]["auth_person"] ?>" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="auth_person">Ürün Adı <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" readonly value="<?php echo $params["technical_details"][0]["product_name"] ?>" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="auth_person">Ürün Adedi <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" readonly value="<?php echo $params["general_information"][0]["quantity"] ?>" class="form-control">
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
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>GRUP ADI</th>
                  <th>MODUL ADI</th>
                  <th>DEĞER</th>
                  <th>AÇIKLAMA</th>
                  <th>ADET</th>
                  <th>FİYAT</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // echo json_encode($params["technical_details"]);
                foreach ($params["technical_details"] as $item) {
                  echo "<tr>";
                  echo "<td>".$item["module_group_name"]."</td>";
                  echo "<td>".$item["module_name"]."</td>";
                  echo "<td>".$item["value"]."</td>";
                  echo "<td>".$item["description"]."</td>";
                  echo "<td>".$item["quantity"]."</td>";
                  echo "<td>".$item["price"]."</td>";
                  echo "</tr>";
                }
                ?>
                </tbody>
              </table>
                    </div>
                </div>
            </div>
        
    </div>
</div>
