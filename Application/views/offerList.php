<div class="right_col" role="main" style="min-height: 500px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Satış Teklifleri</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group">
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="dropleft">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-bars"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?=SITE_URL.'/offer/new'?>">Yeni Teklif</a>
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
                <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Referans No</th>
                            <th>Tarih</th>
                            <th>Firma Adı</th>
                            <th>Cep Tel</th>
                            <th>Telefon</th>
                            <th>E-Posta</th>
                            <th>Son İşlem Tar.</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($params as $item) {
                            echo "<tr>";
                            echo "<td>".$item["reference_no"]."/".$item["revision_no"]."</td>";
                            echo "<td>".$item["created_date"]."</td>";
                            echo "<td>".$item["firm_name"]."</td>";
                            echo "<td><a href='tel:".$item["gsm_number"]."'>".$item["gsm_number"]."</a></td>";
                            echo "<td><a href='tel:".$item["phone_number"]."'>".$item["phone_number"]."</a></td>";
                            echo "<td><a href='mailto:".$item["email"]."'>".$item["email"]."</a></td>";
                            echo "<td>Burayı Hallet</td>";
                            echo "<td><a href='".SITE_URL."/offer/detail/".$item["id"]."'> DETAY </a> | <a href='".SITE_URL."/offer/revision/".$item["id"]."'> REVİZE </a> | <a href='".SITE_URL."/offer/print/".$item["id"]."'> YAZDIR </a></td>";
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
