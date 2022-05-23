<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
          <h3>Gösterge Paneli</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5  form-group pull-right top_search">


        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-6 col-sm-6">
        <div class="x_panel">
              
          <div class="x_content">
            <div class="col-md-12 col-sm-12 ">
              <input type="text" id="datepicker1" onclick="this.type='date'" data-date-format="DD-MM-YYYY" onfocus="this.type='date'" onblur="this.type='text'" class="date-picker form-control col-md-6 col-sm-6">
              <div id="currencyData"></div>
            </div>
            <div class="clearfix"></div>
            <div id="data" class="col-md-12 col-sm-12"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    var currencies = ["USD", "EUR", "GBP"];
    var currencyContainer = $('#currencyData');

    $(document).ready(function ()  {
      $.post('<?=SITE_URL;?>/ajax/dashboard.php', {action:'getCurrenciesMB', params:{day:0, month: 0, year:0, requestedCurr:''}}, function (data) {
        var jsonData = JSON.parse(data);
        console.log(jsonData);
        currencyContainer.html('');
        currencyContainer.append('<table class="table table-striped" id="currencyTable"><thead>'+
                    '<tr>'+
                      '<th>#</th>'+
                      '<th>Döviz Cinsi</th>'+
                      '<th>Döviz Alış</th>'+
                      '<th>Döviz Satış</th>'+
                      '<th>Efektif Alış</th>'+
                      '<th>Efektif Satış</th>'+
                    '</tr>'+
                  '</thead><tbody></tbody></table>');
        var currencyTable = $('#currencyTable tbody');
        $.each(jsonData.Currency, function(index, value){
          // console.log(value["@attributes"]["CurrencyCode"]);
          if($.inArray(value["@attributes"]["CurrencyCode"],currencies)>=0){
            currencyTable.append('<tr id="row'+index+'"></tr>')
            var row = $('#row'+index);
            row.append('<td>'+value["@attributes"]["CurrencyCode"]+'</td>');
            row.append('<td>'+value.Isim+'</td>');
            row.append('<td>'+value.ForexBuying+'</td>');
            row.append('<td>'+value.ForexSelling+'</td>');
            row.append('<td>'+value.BanknoteBuying+'</td>');
            row.append('<td>'+value.BanknoteSelling+'</td>');
          }
        });
      });
    });
    $('#datepicker1').change(function(e){
        var getDateValue = this.value;
        var splitValue = getDateValue.split('-');
        var _year = splitValue[0];
        var _month = splitValue[1];
        var _day = splitValue[2]
        this.type='text';
        this.value = _day+'.'+_month+'.'+_year;
        $.post('<?=SITE_URL;?>/ajax/dashboard.php', {action:'getCurrenciesMB', params:{day:_day, month: _month, year:_year}}, function (data) {
            var jsonData = JSON.parse(data);
            console.log(jsonData);
            currencyContainer.html('');
            currencyContainer.append('<table class="table table-striped" id="currencyTable"><thead>'+
                        '<tr>'+
                          '<th>#</th>'+
                          '<th>Döviz Cinsi</th>'+
                          '<th>Döviz Alış</th>'+
                          '<th>Döviz Satış</th>'+
                          '<th>Efektif Alış</th>'+
                          '<th>Efektif Satış</th>'+
                        '</tr>'+
                      '</thead><tbody></tbody></table>');
            var currencyTable = $('#currencyTable tbody');
            $.each(jsonData.Currency, function(index, value){
              // console.log(value["@attributes"]["CurrencyCode"]);
              if($.inArray(value["@attributes"]["CurrencyCode"],currencies)>=0){
                currencyTable.append('<tr id="row'+index+'"></tr>')
                var row = $('#row'+index);
                row.append('<td>'+value["@attributes"]["CurrencyCode"]+'</td>');
                row.append('<td>'+value.Isim+'</td>');
                row.append('<td>'+value.ForexBuying+'</td>');
                row.append('<td>'+value.ForexSelling+'</td>');
                row.append('<td>'+value.BanknoteBuying+'</td>');
                row.append('<td>'+value.BanknoteSelling+'</td>');
              }
            });
        });
    });

    function displayResult(xslLocation, xmlLocation) {
    //   var date = $('.calendar-picker').datepicker("getDate");
      $.ajax({
        type: "GET",
        url: xmlLocation,
        timeout: 20000,
        cache: false,
        //beforeSend: function (jqXHR) {
          //jqXHR.overrideMimeType('text/xml;charset=iso-8859-9');
        //},
        success: function (xml) {
          $.ajax({
            type: "GET",
            url: xslLocation,
            timeout: 20000,
            cache: false,
            //beforeSend: function (jqXHR) {
              // jqXHR.overrideMimeType('text/xml;charset=iso-8859-9');
            //},
            success: function (xsl) {
              if (window.ActiveXObject || "ActiveXObject" in window) {
                var xslt = new ActiveXObject("Msxml2.XSLTemplate.3.0");
                var xslDoc = new ActiveXObject("Msxml2.FreeThreadedDOMDocument.3.0");
                var xslProc;
                xslDoc.async = false;
                xslDoc.load(xsl);

                if (xslDoc.parseError.errorCode != 0) {
                  var myErr = xslDoc.parseError;
                  alert("Hata olustu." + myErr.reason);
                } else {
                  xslt.stylesheet = xslDoc;
                  var xmlDoc = new ActiveXObject("Msxml2.DOMDocument.3.0");
                  xmlDoc.async = false;
                  xmlDoc.load(xml);
                  if (xmlDoc.parseError.errorCode != 0) {
                    var myErr = xmlDoc.parseError;
                    alert("Hata olustu. " + myErr.reason);
                  } else {
                    xslProc = xslt.createProcessor();
                    xslProc.input = xmlDoc;
                    xslProc.transform();
                    document.getElementById("data").innerHTML = "";
                    $(xslProc.output).appendTo("#data");
                  }
                }
              } else {
                xsltProcessor = new XSLTProcessor();
                xsltProcessor.importStylesheet(xsl);
                resultDocument = xsltProcessor.transformToFragment(xml, document);
                document.getElementById("data").innerHTML = "";
                document.getElementById("data").appendChild(resultDocument);
              }
            }
          });
        },
        error: function (r, s, e) {
          document.getElementById("data").innerHTML = "";
          document.getElementById("data").innerHTML = "<p style='text-align: center;margin: 50px 0;'>Resmi tatil, hafta sonu ve yarım iş günü çalışılan günlerde gösterge niteliginde kur bilgisi yayımlanmamaktadır.</p>";
        }
      });
    }
</script>