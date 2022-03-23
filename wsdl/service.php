<?php

require_once "src/nusoap.php";
include "classess/mysql.php";

class car_plate
{
    protected $classMysql;
    protected $db_name, $db_usr, $db_passwd, $br_connectionString;

    public function __construct()
    {
        $this->classMysql = new Mysql();
        $this->classMysql->dbConnect();
    }

    private function selectQr($qry)
    {
        return mysqli_query($this->br_connectionString, $qry);
    }

    private function freeRun($query)
    {
        if (mysqli_query($this->br_connectionString, $query)) {
            return mysqli_insert_id($this->br_connectionString);
        } else {
            return mysqli_affected_rows($this->br_connectionString);//mysqli_error($this->br_connectionString);
        }
    }

    private function branch_db_connect()
    {
        $this->br_connectionString = mysqli_connect('localhost', $this->db_usr, $this->db_passwd);
        mysqli_set_charset($this->br_connectionString, "utf8");
        if (mysqli_select_db($this->br_connectionString, $this->db_name)) {
            return true;
        } else {
            return mysqli_error($this->br_connectionString);
        }
    }

    private function dbDisconnect()
    {
        $this->br_connectionString = NULL;
        $this->db_name = NULL;
        $this->db_usr = NULL;
        $this->db_passwd = NULL;
    }

    private function doAuthenticate()
    {
        $returnValue = array("status" => true, "db_name" => "", "db_usr" => "", "db_passwd" => "");
        if (isset($_SERVER['PHP_AUTH_USER']) and isset($_SERVER['PHP_AUTH_PW'])) {
            //here I am hardcoding. You can connect to your DB for user authentication.
            $username = mysqli_real_escape_string($this->classMysql->connectionString, $_SERVER['PHP_AUTH_USER']);
            $password = mysqli_real_escape_string($this->classMysql->connectionString, $_SERVER['PHP_AUTH_PW']);
            $sqlAuth = "select `db_name`, `db_usr`, `db_passwd` from `web_service_users` where `usr_name` = '$username' and `usr_passwd` = '$password'";
            $qryAuth = $this->classMysql->selectQr($sqlAuth);
            $returnValue["db_name"] = $username . "-" . $password;
            if ($qryAuth->num_rows > 0) {
                foreach ($qryAuth as $item)
                    $returnValue["status"] = true;
                $returnValue["db_name"] = $item["db_name"];
                $returnValue["db_usr"] = $item["db_usr"];
                $returnValue["db_passwd"] = $item["db_passwd"];
                return $returnValue;
            } else {
                $returnValue["status"] = false;
                return $returnValue;
            }
        }
        $returnValue["status"] = false;
        return $returnValue;
    }

    public function postOrder($plate_type, $ip_address, $first_name, $last_name, $id_number, $phone_number, $mail_address, $cargo_address, $cargo_city, $cargo_state, $price, $quantity, $shipment_type, $payment_type, $utm_source, $utm_medium, $utm_campaign, $order_detail)
    {
        $returnedValue = array("status" => true, "message" => "", "order_uid" => "");
        $returnedValue = array("status" => true, "message" => "", "order_uid" => "");
        $authValue = $this->doAuthenticate();
        if ($authValue["status"] == true) {
            $this->db_usr = $authValue["db_usr"];
            $this->db_name = $authValue["db_name"] . $plate_type;
            $this->db_passwd = $authValue["db_passwd"];
            $databaseSelect = $this->branch_db_connect();
            $orderUID = uniqid();
            $returnedValue["order_uid"] = $orderUID;
            $ip_address = mysqli_real_escape_string($this->br_connectionString, $ip_address);
            $first_name = mysqli_real_escape_string($this->br_connectionString, $first_name);
            $last_name = mysqli_real_escape_string($this->br_connectionString, $last_name);
            $id_number = mysqli_real_escape_string($this->br_connectionString, $id_number);
            $phone_number = mysqli_real_escape_string($this->br_connectionString, $phone_number);
            $mail_address = mysqli_real_escape_string($this->br_connectionString, $mail_address);
            $cargo_address = mysqli_real_escape_string($this->br_connectionString, $cargo_address);
            $shipment_type = mysqli_real_escape_string($this->br_connectionString, $shipment_type);
            $payment_type = mysqli_real_escape_string($this->br_connectionString, $payment_type);
            $utm_source = mysqli_real_escape_string($this->br_connectionString, $utm_source);
            $utm_medium = mysqli_real_escape_string($this->br_connectionString, $utm_medium);
            $utm_campaign = mysqli_real_escape_string($this->br_connectionString, $utm_campaign);
            $orderDate = date("Y-m-d H:i:s");
            $sqlInsertOrder = "insert into plate_order (order_id, ip_address, first_name, last_name, id_number, phone_number, mail_address, cargo_address, cargo_city, cargo_state, price, quantity, shipment_type, payment_type, utm_source, utm_medium, utm_campaign, order_date) ";
            $sqlInsertOrder .= "values('$orderUID', '$ip_address', '$first_name', '$last_name', '$id_number', '$phone_number', '$mail_address', '$cargo_address', $cargo_city, $cargo_state, $price, $quantity, '$shipment_type', '$payment_type', '$utm_source', '$utm_medium', '$utm_campaign', '$orderDate')";
            $orderID = $this->freeRun($sqlInsertOrder);

//      $returnedValue["message"] .= "orderID: $orderID-";
            if ($orderID > 0) {
//        $returnedValue["message"] .= json_encode($order_detail);
                foreach ($order_detail as $item) {
//          $returnedValue["message"] .= "plate text: ".$item["plate_text"]."-";
                    $plateText = mysqli_real_escape_string($this->br_connectionString, $item["plate_text"]);
                    $style = mysqli_real_escape_string($this->br_connectionString, $item["style"]);
                    $styleColor = mysqli_real_escape_string($this->br_connectionString, $item["style_color"]);
                    $textAlign = mysqli_real_escape_string($this->br_connectionString, $item["text_align"]);
                    $textColor = mysqli_real_escape_string($this->br_connectionString, $item["text_color"]);
                    $plateColor = mysqli_real_escape_string($this->br_connectionString, $item["plate_color"]);
                    $fontFamily = mysqli_real_escape_string($this->br_connectionString, $item["font_family"]);

                    $sqlInsertOrderDetail = "insert into plate_order_detail(order_id, plate_text, style, style_color, text_align, text_color, plate_color, font_family) ";
                    $sqlInsertOrderDetail .= "values ($orderID, '$plateText','$style','$styleColor','$textAlign','$textColor','$plateColor','$fontFamily')";
                    $insertedID = $this->freeRun($sqlInsertOrderDetail);
//          $returnedValue["message"] .= $sqlInsertOrderDetail."-";
                    if ($insertedID > 0) {
                        $returnedValue["message"] .= "Sipariş Detay kayıt işlemi başarılı. " . $orderID;
                    } else {
                        $returnedValue["message"] .= "Sipariş Detay kaydı sırasında hata oluştu. " . $orderID;
                    }
                }
                return $returnedValue;
            } else {
                $returnedValue["status"] = false;
                $returnedValue["message"] .= "Sipariş Kayıt Edilemedi. ";
//        $returnedValue["message"] .= $this->db_name."-".$this->db_usr."-".$this->db_passwd;
                return $returnedValue;
            }
        } else {
            $returnedValue["status"] = false;
            $returnedValue["message"] = "API Yetkilendirme Hatası. ";
            return $returnedValue;
        }
    }

    public function postOrderV1($plate_type, $ip_address, $first_name, $last_name, $id_number,
                                $phone_number, $mail_address, $cargo_address, $cargo_city,
                                $cargo_state, $price, $quantity, $shipment_type, $payment_type,
                                $utm_source, $utm_medium, $utm_campaign, $order_detail)
    {
        $returnedValue = array("status" => true, "message" => "", "order_uid" => "");
        $authValue = $this->doAuthenticate();
        if ($authValue["status"] == true) {
            $this->db_usr = $authValue["db_usr"];
            $this->db_name = $authValue["db_name"] . $plate_type;
            $this->db_passwd = $authValue["db_passwd"];
            $databaseSelect = $this->branch_db_connect();
            $orderUID = uniqid();
            $returnedValue["order_uid"] = $orderUID;
            $ip_address = mysqli_real_escape_string($this->br_connectionString, $ip_address);
            $first_name = mysqli_real_escape_string($this->br_connectionString, $first_name);
            $last_name = mysqli_real_escape_string($this->br_connectionString, $last_name);
            $id_number = mysqli_real_escape_string($this->br_connectionString, $id_number);
            $phone_number = mysqli_real_escape_string($this->br_connectionString, $phone_number);
            $mail_address = mysqli_real_escape_string($this->br_connectionString, $mail_address);
            $cargo_address = mysqli_real_escape_string($this->br_connectionString, $cargo_address);
            $shipment_type = mysqli_real_escape_string($this->br_connectionString, $shipment_type);
            $payment_type = mysqli_real_escape_string($this->br_connectionString, $payment_type);
            $utm_source = mysqli_real_escape_string($this->br_connectionString, $utm_source);
            $utm_medium = mysqli_real_escape_string($this->br_connectionString, $utm_medium);
            $utm_campaign = mysqli_real_escape_string($this->br_connectionString, $utm_campaign);
            $orderDate = date("Y-m-d H:i:s");
            $position = 0;
            if ($payment_type === 'CC') {
                $position = -3;
            }

            //New Server Synchronization Processes is Starting
            $order = array(
                'plate_type' => $plate_type,
                'ip_address' => $ip_address,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'id_number' => $id_number,
                'phone_number' => $phone_number,
                'mail_address' => $mail_address,
                'cargo_address' => $cargo_address,
                'cargo_city' => $cargo_city,
                'cargo_state' => $cargo_state,
                'price' => $price,
                'quantity' => $quantity,
                'shipment_type' => $shipment_type,
                'payment_type' => $payment_type,
                'utm_source' => $utm_source,
                'utm_medium' => $utm_medium,
                'utm_campaign' => $utm_campaign,
                'order_detail' => $order_detail
            );
//      $client = new nusoap_client("https://wsdl.parkerotomotiv.com/service.php?wsdl", true);
//      $client->setCredentials($_SERVER["PHP_AUTH_USER"],$_SERVER["PHP_AUTH_PW"],"basic");
//      $returnValue = $client->call("car_plate.postOrderV1", $order);
            $returnedValue["message"] .= json_encode($order);
            //New Server Synchronization Processes was ended

            $sqlSelectOrder = "select * from plate_order where (phone_number='$phone_number' and (`position`<3 and `position`>=-3)) or ((ip_address <> '81.215.208.204' and ip_address = '$ip_address') and `position`=0)";
            $qrySelectOrder = $this->selectQr($sqlSelectOrder);
//      $returnedValue["message"] .= $sqlSelectOrder;
            if ($qrySelectOrder->num_rows == 0) {
//        $returnedValue["message"] .= "->".json_encode($qrySelectOrder)."<-";
                // Daha önce verilmiş kargolanmamış bir sipariş yok.

                $sqlInsertOrder = "insert into plate_order (order_id, ip_address, first_name, last_name, id_number, phone_number, mail_address, cargo_address, cargo_city, cargo_state, `position`, price, quantity, shipment_type, payment_type, utm_source, utm_medium, utm_campaign, order_date) ";
                $sqlInsertOrder .= "values('$orderUID', '$ip_address', '$first_name', '$last_name', '$id_number', '$phone_number', '$mail_address', '$cargo_address', $cargo_city, $cargo_state, $position, $price, $quantity, '$shipment_type', '$payment_type', '$utm_source', '$utm_medium', '$utm_campaign', '$orderDate')";
                $orderID = $this->freeRun($sqlInsertOrder);

                //      $returnedValue["message"] .= "orderID: $orderID-";
                if ($orderID > 0) {
                    //        $returnedValue["message"] .= json_encode($order_detail);
                    foreach ($order_detail as $item) {
                        //          $returnedValue["message"] .= "plate text: ".$item["plate_text"]."-";
                        $plateText = mysqli_real_escape_string($this->br_connectionString, htmlspecialchars($item["plate_text"], ENT_QUOTES));//mysqli_real_escape_string($this->br_connectionString, $item["plate_text"]);
                        $style = mysqli_real_escape_string($this->br_connectionString, $item["style"]);
                        $styleColor = mysqli_real_escape_string($this->br_connectionString, $item["style_color"]);
                        $textAlign = mysqli_real_escape_string($this->br_connectionString, $item["text_align"]);
                        $textColor = mysqli_real_escape_string($this->br_connectionString, $item["text_color"]);
                        $plateColor = mysqli_real_escape_string($this->br_connectionString, $item["plate_color"]);
                        $fontFamily = mysqli_real_escape_string($this->br_connectionString, $item["font_family"]);

                        $sqlInsertOrderDetail = "insert into plate_order_detail(order_id, plate_text, style, style_color, text_align, text_color, plate_color, font_family) ";
                        $sqlInsertOrderDetail .= "values ($orderID, '$plateText','$style','$styleColor','$textAlign','$textColor','$plateColor','$fontFamily')";
                        $insertedID = $this->freeRun($sqlInsertOrderDetail);
                        //          $returnedValue["message"] .= $sqlInsertOrderDetail."-";
                        if ($insertedID > 0) {
                            $returnedValue["message"] .= "Sipariş Detay kayıt işlemi başarılı. " . $orderID;
                        } else {
                            $returnedValue["message"] = "Sipariş Detay kaydı sırasında hata oluştu. ";
                            $returnedValue["code"] = "E03";
                        }
                    }

                    return $returnedValue;
                } else {
                    $returnedValue["status"] = false;
                    $returnedValue["code"] = "E02" . $sqlInsertOrder;
//          $returnedValue["message"] .= $sqlInsertOrder."Sipariş Kayıt Edilemedi. DatabaseName: ".$this->db_name." Kayıt Sonuç: $orderID $databaseSelect.";
                    //        $returnedValue["message"] .= $this->db_name."-".$this->db_usr."-".$this->db_passwd;
                    return $returnedValue;
                }
            } else {
                // Daha önce verilmiş ve kargolanmamış bir sipariş var.
                foreach ($qrySelectOrder as $item) {
                    $data = $item;
                }
                if ($data["position"] == -1 || $data["position"] == -3) {
                    $sqlUpdateOrder = "update plate_order set `position`=0, ip_address='$ip_address', first_name='$first_name', last_name='$last_name', id_number='$id_number', phone_number='$phone_number', mail_address='$mail_address', cargo_address='$cargo_address', cargo_city=$cargo_city, cargo_state=$cargo_state, shipment_type='$shipment_type', payment_type='$payment_type', order_date='$orderDate' where id=" . $data["id"];
                    if ($payment_type == "CC") {
                        $sqlUpdateOrder = "update plate_order set `position`=-3, ip_address='$ip_address', first_name='$first_name', last_name='$last_name', id_number='$id_number', phone_number='$phone_number', mail_address='$mail_address', cargo_address='$cargo_address', cargo_city=$cargo_city, cargo_state=$cargo_state, shipment_type='$shipment_type',price=$price,quantity=$quantity, payment_type='$payment_type', order_date='$orderDate' where id=" . $data["id"];
                    }
                    if ($payment_type == "ATD" && $data["position"] == -3) {
                        $sqlUpdateOrder = "update plate_order set `position`=0, ip_address='$ip_address', first_name='$first_name', last_name='$last_name', id_number='$id_number', phone_number='$phone_number', mail_address='$mail_address', cargo_address='$cargo_address', cargo_city=$cargo_city, cargo_state=$cargo_state, price=$price,quantity =$quantity, shipment_type='$shipment_type', payment_type='$payment_type', order_date='$orderDate' where id=" . $data["id"];
                    }
                    $this->freeRun($sqlUpdateOrder);
                    $sqlDeleteOrderDetail = "delete from plate_order_detail where order_id = " . $data["id"];
                    $this->freeRun($sqlDeleteOrderDetail);
//          $returnedValue["message"] .= $sqlUpdateOrder."----".json_encode($order_detail);
//          $order_detail = json_decode($order_detail);
                    foreach ($order_detail as $item) {
                        //          $returnedValue["message"] .= "plate text: ".$item["plate_text"]."-";
                        $plateText = htmlspecialchars($item["plate_text"], ENT_QUOTES);//mysqli_real_escape_string($this->br_connectionString, htmlentities($item["plate_text"],ENT_QUOTES));
                        $style = mysqli_real_escape_string($this->br_connectionString, $item["style"]);
                        $styleColor = mysqli_real_escape_string($this->br_connectionString, $item["style_color"]);
                        $textAlign = mysqli_real_escape_string($this->br_connectionString, $item["text_align"]);
                        $textColor = mysqli_real_escape_string($this->br_connectionString, $item["text_color"]);
                        $plateColor = mysqli_real_escape_string($this->br_connectionString, $item["plate_color"]);
                        $fontFamily = mysqli_real_escape_string($this->br_connectionString, $item["font_family"]);
                        $sqlUpdateOrderDetail = "insert into plate_order_detail (plate_text, style, style_color, text_align, text_color, plate_color, font_family, order_id) values ('$plateText', '$style', '$styleColor', '$textAlign', '$textColor', '$plateColor', '$fontFamily', " . $data["id"] . ")";
                        $this->freeRun($sqlUpdateOrderDetail);
//            $returnedValue["message"] .= "******".$sqlUpdateOrderDetail;
                    }
                    $returnedValue["status"] = true;
                    $returnedValue["order_uid"] = $data["order_id"];
                    $returnedValue["message"] .= $price;
                    return $returnedValue;
                } else {
                    $returnedValue["status"] = false;
                    $returnedValue["order_uid"] = $data["order_id"];
                    if ($data["position"] == 0) {
                        $returnedValue["message"] = "Daha önce verilmiş bir sipariş var. Siparişinizi düzenleyebilirsiniz.";
                        $returnedValue["code"] = "E04";
                    } else {
                        $returnedValue["message"] = "Daha önce verilmiş bir sipariş var. Siparişiniz tamamlandıktan sonra yeni bir sipariş verebilirsiniz.";
                        $returnedValue["code"] = "E05";
                    }
                    return $returnedValue;
                }
            }
        } else {
            $returnedValue["status"] = false;
            $returnedValue["message"] = "API Yetkilendirme Hatası. " . json_encode($authValue);
            $returnedValue["code"] = "E01";
            return $returnedValue;
        }
    }

    public function customerMessage($plate_type, $order_id, $message)
    {
        $authValue = $this->doAuthenticate();
        if ($authValue["status"] == true) {
            $this->db_usr = $authValue["db_usr"];
            $this->db_name = $authValue["db_name"] . $plate_type;
            $this->db_passwd = $authValue["db_passwd"];
            $connection = $this->branch_db_connect();
            if ($connection === true) {
                $sqlText = "insert into customer_msg (`message`, `order_id`) values ('$message',$order_id)";
                $query = $this->freeRun($sqlText);
                if ($query > 0) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    public function getOrder($order_uid, $plate_type)
    {
        $trackError = "$order_uid --- $plate_type";
        $returnedValue = array("status" => true, "message" => "", "code" => "");
        $authValue = $this->doAuthenticate();
        if ($authValue["status"] == true) {
            $this->db_usr = $authValue["db_usr"];
            $this->db_name = $authValue["db_name"] . $plate_type;
            $this->db_passwd = $authValue["db_passwd"];
//      $order_uid = mysqli_real_escape_string($this->br_connectionString, $order_uid);
            $trackError .= "--db connet olacak--";
            $connection = $this->branch_db_connect();
            if ($connection === true) {
                $trackError .= "--db connet oldu--";
                $sqlSelectOrder = "select * from plate_order where order_id='$order_uid' or confirmation_code = '$order_uid'";
                $qrySelectOrder = $this->selectQr($sqlSelectOrder);

                $trackError .= "--plate_order: " . $sqlSelectOrder . "--";
                $trackError .= "--plate_order kayıt sayısı: " . $qrySelectOrder->num_rows . "--";
                if ($qrySelectOrder->num_rows > 0) {
                    foreach ($qrySelectOrder as $item) {
                        $data = $item;
                    }
                    $sqlSelectOrderDetail = "select * from plate_order_detail where order_id = " . $data["id"];
                    $qrySelectOrderDetail = $this->selectQr($sqlSelectOrderDetail);
                    $trackError .= "ışıklı kayıt bulundu mu? " . $qrySelectOrderDetail->num_rows;
                    if ($qrySelectOrderDetail->num_rows > 0) {
                        foreach ($qrySelectOrderDetail as $items) {
                            $data["detail"][] = $items;
                        }
                    } else {
                        $returnedValue["status"] = false;
                        $returnedValue["message"] = "Sipariş detay kaydı bulunamadı ";
                        $returnedValue["code"] = "E08";
                    }
                }
            } else {
                $returnedValue["status"] = false;
                $returnedValue["message"] = "Database bağlantı hatası " . $this->db_name . ". $connection . $trackError";
                $returnedValue["code"] = "E06";
            }
        } else {
            $returnedValue["status"] = false;
            $returnedValue["message"] = "API Yetkilendirme Hatası. ";
            $returnedValue["code"] = "E01";
        }
        if (!empty($data)) {
            $returnedValue["id"] = $data["id"];
            $returnedValue["plate_type"] = $plate_type;
            $returnedValue["ip_address"] = $data["ip_address"];
            $returnedValue["first_name"] = $data["first_name"];
            $returnedValue["last_name"] = $data["last_name"];
            $returnedValue["id_number"] = $data["id_number"];
            $returnedValue["phone_number"] = $data["phone_number"];
            $returnedValue["mail_address"] = $data["mail_address"];
            $returnedValue["cargo_address"] = $data["cargo_address"];
            $returnedValue["cargo_city"] = $data["cargo_city"];
            $returnedValue["cargo_state"] = $data["cargo_state"];
            $returnedValue["price"] = $data["price"];
            $returnedValue["quantity"] = $data["quantity"];
            $returnedValue["position"] = $data["position"];
            $returnedValue["shipment_type"] = $data["shipment_type"];
            $returnedValue["payment_type"] = $data["payment_type"];
            $returnedValue["utm_source"] = $data["utm_source"];
            $returnedValue["utm_medium"] = $data["utm_medium"];
            $returnedValue["utm_campaign"] = $data["utm_campaign"];
            $ind = 0;
            foreach ($data["detail"] as $detail) {
                $returnedValue["order_detail"][$ind]["plate_text"] = $detail["plate_text"];
                $returnedValue["order_detail"][$ind]["style"] = $detail["style"];
                $returnedValue["order_detail"][$ind]["style_color"] = $detail["style_color"];
                $returnedValue["order_detail"][$ind]["text_align"] = $detail["text_align"];
                $returnedValue["order_detail"][$ind]["text_color"] = $detail["text_color"];
                $returnedValue["order_detail"][$ind]["plate_color"] = $detail["plate_color"];
                $returnedValue["order_detail"][$ind]["font_family"] = $detail["font_family"];
                $ind++;
            }
        }
        return json_encode($returnedValue);
    }

    public function thnxOrderV1($order_uid, $plate_type)
    {
        $trackError = "$order_uid ---";
        $plateType = "";
        $returnedValue = array("status" => true, "message" => "", "code" => "");
        $authValue = $this->doAuthenticate();
        if ($authValue["status"] == true) {
            $this->db_usr = $authValue["db_usr"];
            $this->db_name = $authValue["db_name"] . $plate_type;
            $this->db_passwd = $authValue["db_passwd"];
            $trackError .= $this->db_usr . ".";
            $trackError .= $this->db_name . ".";
            $trackError .= $this->db_passwd . ".";
//      $order_uid = mysqli_real_escape_string($this->br_connectionString, $order_uid);
            $trackError .= "--db connet olacak--";
            if ($this->branch_db_connect() === true) {
                $trackError .= "--db connet oldu--";
                $sqlSelectOrder = "select * from plate_order where order_id='$order_uid'";
                $qrySelectOrder = $this->selectQr($sqlSelectOrder);

                $trackError .= "--plate_order: " . $sqlSelectOrder . "--";
                $trackError .= "--plate_order kayıt sayısı: " . $qrySelectOrder->num_rows . "--";
                if ($qrySelectOrder->num_rows > 0) {
                    foreach ($qrySelectOrder as $item) {
                        $data = $item;
                    }
                    $sqlSelectOrderDetail = "select * from plate_order_detail where order_id = " . $data["id"];
                    $qrySelectOrderDetail = $this->selectQr($sqlSelectOrderDetail);
                    $trackError .= "ışıklı kayıt bulundu mu? " . $qrySelectOrderDetail->num_rows;
                    if ($qrySelectOrderDetail->num_rows > 0) {
                        $plateType = "isikli";
                        foreach ($qrySelectOrderDetail as $items) {
                            $data["detail"][] = $items;
                        }
                    } else {
                        $returnedValue["status"] = false;
                        $returnedValue["message"] = "Sipariş detay kaydı bulunamadı ";
                        $returnedValue["code"] = "E08";
                    }
                } else {
                    $this->db_name = $authValue["db_name"] . "isiksiz";
                    $order_uid = mysqli_real_escape_string($this->br_connectionString, $order_uid);
                    if ($this->branch_db_connect() === true) {
                        $sqlSelectOrder = "select * from plate_order where order_id='$order_uid'";
                        $qrySelectOrder = $this->selectQr($sqlSelectOrder);
                        if ($qrySelectOrder->num_rows > 0) {
                            foreach ($qrySelectOrder as $item) {
                                $data = $item;
                            }
                            $sqlSelectOrderDetail = "select * from plate_order_detail where order_id = '" . $data["id"] . "'";
                            $qrySelectOrderDetail = $this->selectQr($sqlSelectOrderDetail);
                            if ($qrySelectOrderDetail->num_rows > 0) {
                                $plateType = "isiksiz";
                                foreach ($qrySelectOrderDetail as $items) {
                                    $data["detail"][] = $items;
                                }
                            } else {
                                $returnedValue["status"] = false;
                                $returnedValue["message"] = "Sipariş detay kaydı bulunamadı ";
                                $returnedValue["code"] = "E08";
                            }
                        } else {
                            $returnedValue["status"] = false;
                            $returnedValue["message"] = "Sipariş kaydı bulunamadı." . $trackError;
                            $returnedValue["code"] = "E07";

                        }
                    } else {
                        $returnedValue["status"] = false;
                        $returnedValue["message"] = "Database bağlantı hatası - $plate_type -";
                        $returnedValue["code"] = "E06";
                    }
                }
            } else {
                $returnedValue["status"] = false;
                $returnedValue["message"] = "Database bağlantı hatası  - $plate_type -" . $this->db_name;
                $returnedValue["code"] = "E06";
            }
        } else {
            $returnedValue["status"] = false;
            $returnedValue["message"] = "API Yetkilendirme Hatası. ";
            $returnedValue["code"] = "E01";
        }
        if (!empty($data)) {
            $returnedValue["plate_type"] = $plateType;
            $returnedValue["ip_address"] = $data["ip_address"];
            $returnedValue["first_name"] = $data["first_name"];
            $returnedValue["last_name"] = $data["last_name"];
            $returnedValue["id_number"] = $data["id_number"];
            $returnedValue["phone_number"] = $data["phone_number"];
            $returnedValue["mail_address"] = $data["mail_address"];
            $returnedValue["cargo_address"] = $data["cargo_address"];
            $returnedValue["cargo_city"] = $data["cargo_city"];
            $returnedValue["cargo_state"] = $data["cargo_state"];
            $returnedValue["price"] = $data["price"];
            $returnedValue["quantity"] = $data["quantity"];
            $returnedValue["shipment_type"] = $data["shipment_type"];
            $returnedValue["payment_type"] = $data["payment_type"];
            $returnedValue["utm_source"] = $data["utm_source"];
            $returnedValue["utm_medium"] = $data["utm_medium"];
            $returnedValue["utm_campaign"] = $data["utm_campaign"];
            $ind = 0;
            foreach ($data["detail"] as $detail) {
                $returnedValue["order_detail"][$ind]["plate_text"] = $detail["plate_text"];
                $returnedValue["order_detail"][$ind]["style"] = $detail["style"];
                $returnedValue["order_detail"][$ind]["style_color"] = $detail["style_color"];
                $returnedValue["order_detail"][$ind]["text_align"] = $detail["text_align"];
                $returnedValue["order_detail"][$ind]["text_color"] = $detail["text_color"];
                $returnedValue["order_detail"][$ind]["plate_color"] = $detail["plate_color"];
                $returnedValue["order_detail"][$ind]["font_family"] = $detail["font_family"];
                $ind++;
            }
        }
        return json_encode($returnedValue);
    }

    public function thnxOrder($order_uid)
    {
        $trackError = "$order_uid ---";
        $plateType = "";
        $returnedValue = array("status" => true, "message" => "", "code" => "");
        $authValue = $this->doAuthenticate();
        if ($authValue["status"] == true) {
            $this->db_usr = $authValue["db_usr"];
            $this->db_name = $authValue["db_name"] . "isikli";
            $this->db_passwd = $authValue["db_passwd"];
            $trackError .= $this->db_usr . ".";
            $trackError .= $this->db_name . ".";
            $trackError .= $this->db_passwd . ".";
//      $order_uid = mysqli_real_escape_string($this->br_connectionString, $order_uid);
            $trackError .= "--db connet olacak--";
            if ($this->branch_db_connect() === true) {
                $trackError .= "--db connet oldu--";
                $sqlSelectOrder = "select * from vw_all_orders where order_uid='$order_uid'";
                $qrySelectOrder = $this->selectQr($sqlSelectOrder);

                $trackError .= "--plate_order: " . $sqlSelectOrder . "--";
                $trackError .= "--plate_order kayıt sayısı: " . $qrySelectOrder->num_rows . "--";
                if ($qrySelectOrder->num_rows > 0) {
                    foreach ($qrySelectOrder as $item) {
                        $data = $item;
                    }
                    $sqlSelectOrderDetail = "select * from plate_order_detail where order_id = " . $data["id"];
                    $qrySelectOrderDetail = $this->selectQr($sqlSelectOrderDetail);
                    $trackError .= "ışıklı kayıt bulundu mu? " . $qrySelectOrderDetail->num_rows;
                    if ($qrySelectOrderDetail->num_rows > 0) {
                        $plateType = "isikli";
                        foreach ($qrySelectOrderDetail as $items) {
                            $data["detail"][] = $items;
                        }
                    } else {
                        $returnedValue["status"] = false;
                        $returnedValue["message"] = "Sipariş detay kaydı bulunamadı ";
                        $returnedValue["code"] = "E08";
                    }
                } else {
                    $this->db_name = $authValue["db_name"] . "isiksiz";
                    $order_uid = mysqli_real_escape_string($this->br_connectionString, $order_uid);
                    if ($this->branch_db_connect() === true) {
                        $sqlSelectOrder = "select * from vw_all_orders where order_uid='$order_uid'";
                        $qrySelectOrder = $this->selectQr($sqlSelectOrder);
                        if ($qrySelectOrder->num_rows > 0) {
                            foreach ($qrySelectOrder as $item) {
                                $data = $item;
                            }
                            $sqlSelectOrderDetail = "select * from plate_order_detail where order_id = '" . $data["id"] . "'";
                            $qrySelectOrderDetail = $this->selectQr($sqlSelectOrderDetail);
                            if ($qrySelectOrderDetail->num_rows > 0) {
                                $plateType = "isiksiz";
                                foreach ($qrySelectOrderDetail as $items) {
                                    $data["detail"][] = $items;
                                }
                            } else {
                                $returnedValue["status"] = false;
                                $returnedValue["message"] = "Sipariş detay kaydı bulunamadı ";
                                $returnedValue["code"] = "E08";
                            }
                        } else {
                            $returnedValue["status"] = false;
                            $returnedValue["message"] = "Sipariş kaydı bulunamadı." . $trackError;
                            $returnedValue["code"] = "E07";

                        }
                    } else {
                        $returnedValue["status"] = false;
                        $returnedValue["message"] = "Database bağlantı hatası ";
                        $returnedValue["code"] = "E06";
                    }
                }
            } else {
                $returnedValue["status"] = false;
                $returnedValue["message"] = "Database bağlantı hatası ";
                $returnedValue["code"] = "E06";
            }
        } else {
            $returnedValue["status"] = false;
            $returnedValue["message"] = "API Yetkilendirme Hatası. ";
            $returnedValue["code"] = "E01";
        }
        if (!empty($data)) {
            $returnedValue["plate_type"] = $plateType;
            $returnedValue["ip_address"] = $data["ip_address"];
            $returnedValue["first_name"] = $data["first_name"];
            $returnedValue["last_name"] = $data["last_name"];
            $returnedValue["id_number"] = $data["id_number"];
            $returnedValue["phone_number"] = $data["phone_number"];
            $returnedValue["mail_address"] = $data["mail_address"];
            $returnedValue["cargo_address"] = $data["cargo_address"];
            $returnedValue["cargo_city"] = $data["city_name"];
            $returnedValue["cargo_state"] = $data["state_name"];
            $returnedValue["price"] = $data["price"];
            $returnedValue["quantity"] = $data["quantity"];
            $returnedValue["shipment_type"] = $data["shipment_type"];
            $returnedValue["payment_type"] = $data["payment_type"];
            $returnedValue["utm_source"] = $data["utm_source"];
            $returnedValue["utm_medium"] = $data["utm_medium"];
            $returnedValue["utm_campaign"] = $data["utm_campaign"];
            $ind = 0;
            foreach ($data["detail"] as $detail) {
                $returnedValue["order_detail"][$ind]["plate_text"] = $detail["plate_text"];
                $returnedValue["order_detail"][$ind]["style"] = $detail["style"];
                $returnedValue["order_detail"][$ind]["style_color"] = $detail["style_color"];
                $returnedValue["order_detail"][$ind]["text_align"] = $detail["text_align"];
                $returnedValue["order_detail"][$ind]["text_color"] = $detail["text_color"];
                $returnedValue["order_detail"][$ind]["plate_color"] = $detail["plate_color"];
                $returnedValue["order_detail"][$ind]["font_family"] = $detail["font_family"];
                $ind++;
            }
        }
        return json_encode($returnedValue);
    }

    public function getShipmentKey2OrderId($order_uid)
    {
        $trackError = "$order_uid ---";
        $plateType = "";
        $returnedValue = array("status" => true, "message" => "", "code" => "");
        $authValue = $this->doAuthenticate();
        if ($authValue["status"] == true) {
            $this->db_usr = $authValue["db_usr"];
            $this->db_name = $authValue["db_name"] . "isikli";
            $this->db_passwd = $authValue["db_passwd"];
            $trackError .= $this->db_usr . ".";
            $trackError .= $this->db_name . ".";
            $trackError .= $this->db_passwd . ".";
//      $order_uid = mysqli_real_escape_string($this->br_connectionString, $order_uid);
            $trackError .= "--db connet olacak--";
            if ($this->branch_db_connect() === true) {
                $trackError .= "--db connet oldu--";
                $sqlSelectOrder = "select * from plate_order where order_id='$order_uid'";
                $qrySelectOrder = $this->selectQr($sqlSelectOrder);

                $trackError .= "--plate_order: " . $sqlSelectOrder . "--";
                $trackError .= "--plate_order kayıt sayısı: " . $qrySelectOrder->num_rows . "--";
                if ($qrySelectOrder->num_rows > 0) {
                    foreach ($qrySelectOrder as $item) {
                        $data = $item;
                    }
                } else {
                    $this->db_name = $authValue["db_name"] . "isiksiz";
                    $order_uid = mysqli_real_escape_string($this->br_connectionString, $order_uid);
                    if ($this->branch_db_connect() === true) {
                        $sqlSelectOrder = "select * from plate_order where order_id='$order_uid'";
                        $qrySelectOrder = $this->selectQr($sqlSelectOrder);
                        if ($qrySelectOrder->num_rows > 0) {
                            foreach ($qrySelectOrder as $item) {
                                $data = $item;
                            }
                        } else {
                            $returnedValue["status"] = false;
                            $returnedValue["message"] = "Sipariş kaydı bulunamadı." . $trackError;
                            $returnedValue["code"] = "E07";

                        }
                    } else {
                        $returnedValue["status"] = false;
                        $returnedValue["message"] = "Database bağlantı hatası ";
                        $returnedValue["code"] = "E06";
                    }
                }
            } else {
                $returnedValue["status"] = false;
                $returnedValue["message"] = "Database bağlantı hatası ";
                $returnedValue["code"] = "E06";
            }
        } else {
            $returnedValue["status"] = false;
            $returnedValue["message"] = "API Yetkilendirme Hatası. ";
            $returnedValue["code"] = "E01";
        }
        if (!empty($data)) {
            $returnedValue["position"] = $data["position"];
            $returnedValue["cargo_key"] = $data["cargo_key"];
            $returnedValue["source"] = $data["source"];
            $returnedValue["shipment_key"] = $data["shipment_key"];
        }
        return json_encode($returnedValue);
    }

    public function getCities()
    {
        $returnedValue = array("status" => true, "message" => "", "data" => array());
        $authValue = $this->doAuthenticate();
        if ($authValue["status"] == true) {
            $this->db_usr = $authValue["db_usr"];
            $this->db_name = "onlineyonetici__management";
            $this->db_passwd = $authValue["db_passwd"];

            $sqlGetCities = "select * from city";
        } else {
            $returnedValue["status"] = false;
            $returnedValue["message"] = "API Yetkilendirme Hatası. ";
            $returnedValue["code"] = "E01";
        }
        return json_encode($returnedValue);
    }

    public function orderQuery($orderUID, $plate_type = "isikli")
    {
        $returnValue = array("type" => "", "detail" => array());
        $authValue = $this->doAuthenticate();
        if ($authValue["status"] == true) {
            $this->db_usr = $authValue["db_usr"];
            $this->db_name = $authValue["db_name"] . $plate_type;
            $this->db_passwd = $authValue["db_passwd"];
//      $returnValue["type"] = json_encode($this->branch_db_connect());
            $sqlText = "select * from plate_order where order_id = '$orderUID'";
            $query = $this->selectQr($sqlText);
            $data = array();
            if ($query->num_rows > 0) {
                $returnValue["type"] = $plate_type;
                foreach ($query as $item) {
                    $data = $item;
                }
                $returnValue["detail"][] = array("date" => $data["order_date"], "status" => "Sipariş Tarihi");
                $returnValue["detail"][] = array("date" => $data["cargo_date"], "status" => "Üretim Tarihi");
            }
            $this->db_name = $authValue["db_name"] . $plate_type;
            $this->branch_db_connect();
            $sqlText = "select * from plate_order where order_id = '$orderUID'";
            $query = $this->selectQr($sqlText);
//      $data = array();
            if ($query->num_rows > 0) {
                $returnValue["type"] = $plate_type;
                foreach ($query as $item) {
                    $data = $item;
                }
                $returnValue["detail"][] = array("date" => $data["order_date"], "status" => "Sipariş Tarihi");
                $returnValue["detail"][] = array("date" => $data["cargo_date"], "status" => "Üretim Tarihi");
            }
            include "classess/yurtici.php";
            include "classess/yurtici_definations.php";
            $kullaniciadi = $sifreler[$data["shipment_type"]]["kullaniciadi"];
            $kullaniciadi = $sifreler[$data["shipment_type"]]["kullaniciadi"];
            $sifre = $sifreler[$data["shipment_type"]]["sifre"];
            $yurticiparams = [
                "wsUserName" => $kullaniciadi,
                "wsPassword" => $sifre,
                "userLanguage" => "TR"
            ];
            $yurtici = new yurtici($yurticiparams);
            $OrderList = $yurtici->queryShipmentDetail($keys = [$data["shipment_key"]], $keyType = "0", $addHistoricalData = true, $onlyTracking = false, $jsonData = true);
            $resultData = json_decode($OrderList->ShipmentDeliveryResultVO->deliveryResultData);
            $arrayEvents = ($resultData[0]->shipmentDeliveryItemDetailVO->invDocCargoVOArray);
//      $returnValue["type"] .= json_encode($OrderList->ShipmentDeliveryResultVO->deliveryResultData);
            foreach ($arrayEvents as $item) {
                $returnValue["detail"][] = array(
                    "date" => substr($item->eventDate, 0, 4) . "-" . substr($item->eventDate, 4, 2) . "-" . substr($item->eventDate, 6, 2) . " " . date("H:i:s", $item->eventTime),
                    "status" => $item->eventName . " / " . $item->reasonName . " (" . $item->cityName . " / " . $item->townName . ")"
                );
            }
        }
        return ($returnValue);
    }

    public function cancelOrder($confirmation_code, $plate_type = "isikli")
    {
        $returnValue = array("status" => "", "message" => "", "data" => "");
        $authValue = $this->doAuthenticate();
        if ($authValue["status"] == true) {
            $this->db_usr = $authValue["db_usr"];
            $this->db_name = $authValue["db_name"] . $plate_type;
            $this->db_passwd = $authValue["db_passwd"];
            $this->branch_db_connect();
            $sqlText = "update plate_order set position=99, confirmation_code='' where confirmation_code = '$confirmation_code' and position=-2";
            $query = $this->freeRun($sqlText);
            if ($query >= 0) {
                $returnValue = array("status" => "true", "message" => "Siparişiniz başarıyla iptal edilmiştir.", "data" => "");
            } else {
                $returnValue["message"] = $sqlText;
            }
        }
        return ($returnValue);
    }

    public function getConfirmationCode($orderUID, $plateType = "isikli", $process)
    {
        $returnValue = array("status" => true, "message" => "", "data" => "");
        $authValue = $this->doAuthenticate();
        $affectedRow = 1975;
        if ($authValue["status"] == true) {
            $this->db_usr = $authValue["db_usr"];
            $this->db_name = $authValue["db_name"] . $plateType;
            $this->db_passwd = $authValue["db_passwd"];
            $this->branch_db_connect();
            $orderUID = mysqli_real_escape_string($this->br_connectionString, $orderUID);
            $sqlText = "select * from plate_order where order_id = '$orderUID' and position=0";
            $query = $this->selectQr($sqlText);
            $confirmationCodeDate = date("Y-m-d H:i:s");
            if ($query->num_rows > 0) {
                foreach ($query as $items) {
                    $data = $items;
                }
                $confirmCode = md5(uniqid());
                $appendTransaction = "insert into `plate_order_transaction` (`order_id`, `transaction_date`, `position`, `user_name`, `explanation`) values (" . $data["id"] . ", '$confirmationCodeDate', $process, 'owner', '$confirmCode')";
                $updateAuthCode = "update `plate_order` set `confirmation_code` = '$confirmCode', `position` = $process where order_id='$orderUID'";
                $affectedRow = $this->freeRun($updateAuthCode);
                if ($affectedRow >= 0) {
                    $this->freeRun($appendTransaction);
                    $returnValue["message"] = "Onay kodu başarıyla oluşturuldu.";
                    $returnValue["data"] = json_encode(array("confirmCode" => $confirmCode, "firstName" => $data["first_name"], "lastName" => $data["last_name"], "phoneNumber" => $data["phone_number"]));
                }
            } else {
                $returnValue["status"] = false;
                $returnValue["message"] = "Onaylanmamış böyle bir sipariş bulunamadı. Siparişinizin üretim aşaması başlamıştır.";
                $returnValue["confirmCode"] = "";
            }
        }
        $returnValue["message"] .= "$affectedRow - $updateAuthCode";
        return $returnValue;
    }

    public function updateRiskScore($orderUID, $risk_score, $plate_type)
    {
        $returnValue = array("status" => "", "message" => "", "data" => "");
        $authValue = $this->doAuthenticate();
        if ($authValue["status"] == true) {
            $this->db_usr = $authValue["db_usr"];
            $this->db_name = $authValue["db_name"] . $plate_type;
            $this->db_passwd = $authValue["db_passwd"];
            $this->branch_db_connect();
            $sqlText = "update plate_order set risk_score=risk_score+$risk_score where order_id = '$orderUID'";
            $query = $this->freeRun($sqlText);
            if ($query >= 0) {
                $returnValue = array("status" => "true", "message" => "Risk puanı başarıyla güncellenmiştir.", "data" => $risk_score);
            } else {
                $returnValue["message"] = $sqlText;
            }
        }
        return ($returnValue);
    }

    public function updateDescription($order_uid, $description, $plate_type)
    {
        $returnValue = array("status" => "", "message" => "", "data" => "");
        $authValue = $this->doAuthenticate();
        if ($authValue["status"] == true) {
            $this->db_usr = $authValue["db_usr"];
            $this->db_name = $authValue["db_name"] . $plate_type;
            $this->db_passwd = $authValue["db_passwd"];
            $this->branch_db_connect();
            $sqlText = "update `plate_order` set `description` = '$description' where `order_id` = '$order_uid'";
            $query = $this->freeRun($sqlText);
            if ($query >= 0) {
                $returnValue = array("status" => "true", "message" => "Siparişiniz başarıyla güncellenmiştir.", "data" => $sqlText);
            } else {
                $returnValue["message"] = $sqlText;
            }
        }
        return ($returnValue);
    }

    public function changePosition($plate_type, $orderUID, $from, $to)
    {
        $returnValue = array("status" => "", "message" => "", "data" => "");
        $authValue = $this->doAuthenticate();
        if ($authValue["status"] == true) {
            $this->db_usr = $authValue["db_usr"];
            $this->db_name = $authValue["db_name"] . $plate_type;
            $this->db_passwd = $authValue["db_passwd"];
            $this->branch_db_connect();
            $sqlText = "update plate_order set position=$to where order_id = '$orderUID' and position = $from";
            $query = $this->freeRun($sqlText);
            if ($query >= 0) {
                $returnValue = array("status" => "true", "message" => "Pozisyon değeri başarıyla güncellenmiştir.", "data" => $to);
            } else {
                $returnValue["message"] = $sqlText;
            }
        }
        return ($returnValue);
    }

    public function __destruct()
    {
        $this->classMysql->dbDisconnect();
        $this->dbDisconnect();
    }
}

$server = new soap_server();
$server->configureWSDL("car_plateService", "https://wsdl.ledplakacim.com/car_plateService");

$server->wsdl->addComplexType(
    'typeOrderDetail',
    'complexType',
    'array',
    'sequence',
    '',
    array(
        'plate_text' => 'xsd:string',
        'style' => 'xsd:string',
        'style_color' => 'xsd:string',
        'text_align' => 'xsd:string',
        'text_color' => 'xsd:string',
        'plate_color' => 'xsd:string',
        'font_family' => 'xsd:string'
    )
); //typeOrderDetail
$server->wsdl->addComplexType(
    'typeReturn',
    'complexType',
    'struct',
    'sequence',
    '',
    array(
        'status' => 'xsd:string',
        'message' => 'xsd:string',
        'order_uid' => 'xsd:string'
    )
); //typeReturn
$server->wsdl->addComplexType(
    'typeReturnV1',
    'complexType',
    'struct',
    'sequence',
    '',
    array(
        'status' => 'xsd:string',
        'message' => 'xsd:string',
        'order_uid' => 'xsd:string',
        'code' => 'xsd:string'
    )
); //typeReturnV1
$server->wsdl->addComplexType(
    'typeStandardReturn',
    'complexType',
    'struct',
    'sequence',
    '',
    array(
        'status' => 'xsd:string',
        'message' => 'xsd:string',
        'data' => 'xsd:string'
    )
); //typeStandardReturn
$server->wsdl->addComplexType(
    'typeReturnOrderDetail',
    'complexType',
    'array',
    'sequence',
    '',
    array(
        'date' => 'xsd:string',
        'status' => 'xsd:string'
    )
); //typeReturnOrderDetail
$server->wsdl->addComplexType(
    'typeReturnOrderQuery',
    'complexType',
    'struct',
    'sequence',
    '',
    array(
        'type' => 'xsd:string',
        'detail' => 'tns:typeReturnOrderDetail'
    )
); //typeReturnOrderQuery

$server->register("car_plate.postOrder",
    array(
        'plate_type' => 'xsd:string',
        'ip_address' => 'xsd:string',
        'first_name' => 'xsd:string',
        'last_name' => 'xsd:string',
        'id_number' => 'xsd:string',
        'phone_number' => 'xsd:string',
        'mail_address' => 'xsd:string',
        'cargo_address' => 'xsd:string',
        'cargo_city' => 'xsd:integer',
        'cargo_state' => 'xsd:integer',
        'price' => 'xsd:decimal',
        'quantity' => 'xsd:integer',
        'shipment_type' => 'xsd:string',
        'payment_type' => 'xsd:string',
        'utm_source' => 'xsd:string',
        'utm_medium' => 'xsd:string',
        'utm_campaign' => 'xsd:string',
        'order_detail' => array(
            'plate_text' => 'xsd:string',
            'style' => 'xsd:string',
            'style_color' => 'xsd:string',
            'text_align' => 'xsd:string',
            'text_color' => 'xsd:string',
            'plate_color' => 'xsd:string',
            'font_family' => 'xsd:string'
        )
    ),
    array("return" => 'tns:typeReturn'),
    "https://wsdl.ledplakacim.com/car_plateService",
    "https://wsdl.ledplakacim.com/car_plateService#postOrder",
    "rpc",
    "encoded",
    "post car plate order"
); //car_plate.postOrder
$server->register("car_plate.postOrderV1",
    array(
        'plate_type' => 'xsd:string',
        'ip_address' => 'xsd:string',
        'first_name' => 'xsd:string',
        'last_name' => 'xsd:string',
        'id_number' => 'xsd:string',
        'phone_number' => 'xsd:string',
        'mail_address' => 'xsd:string',
        'cargo_address' => 'xsd:string',
        'cargo_city' => 'xsd:integer',
        'cargo_state' => 'xsd:integer',
        'price' => 'xsd:decimal',
        'quantity' => 'xsd:integer',
        'shipment_type' => 'xsd:string',
        'payment_type' => 'xsd:string',
        'utm_source' => 'xsd:string',
        'utm_medium' => 'xsd:string',
        'utm_campaign' => 'xsd:string',
        'order_detail' => array(
            'plate_text' => 'xsd:string',
            'style' => 'xsd:string',
            'style_color' => 'xsd:string',
            'text_align' => 'xsd:string',
            'text_color' => 'xsd:string',
            'plate_color' => 'xsd:string',
            'font_family' => 'xsd:string'
        )
    ),
    array("return" => 'tns:typeReturnV1'),
    "https://wsdl.ledplakacim.com/car_plateService",
    "https://wsdl.ledplakacim.com/car_plateService#postOrderV1",
    "rpc",
    "encoded",
    "revision:\n appended error code to return value, appended editable order control"
); //car_plate.postOrderV1
$server->register("car_plate.getOrder",
    array(
        'order_uid' => 'xsd:string',
        'plate_type' => 'xsd:string'
    ),
    array('return' => 'xsd:string'),
    /*  array('return'    => array(
        'status'        => 'xsd:string',
        'message'       => 'xsd:string',
        'code'          => 'xsd:string',
        'plate_type'    => 'xsd:string',
        'ip_address'    => 'xsd:string',
        'first_name'    => 'xsd:string',
        'last_name'     => 'xsd:string',
        'id_number'     => 'xsd:string',
        'phone_number'  => 'xsd:string',
        'mail_address'  => 'xsd:string',
        'cargo_address' => 'xsd:string',
        'cargo_city'    => 'xsd:integer',
        'cargo_state'   => 'xsd:integer',
        'price'         => 'xsd:decimal',
        'quantity'      => 'xsd:integer',
        'shipment_type' => 'xsd:string',
        'payment_type'  => 'xsd:string',
        'utm_source'    => 'xsd:string',
        'utm_medium'    => 'xsd:string',
        'utm_campaign'  => 'xsd:string',
        'order_detail'  => array(
          'plate_text'  => 'xsd:string',
          'style'       => 'xsd:string',
          'style_color' => 'xsd:string',
          'text_align'  => 'xsd:string',
          'text_color'  => 'xsd:string',
          'plate_color' => 'xsd:string',
          'font_family' => 'xsd:string'
        )
      )),*/
    "https://wsdl.ledplakacim.com/car_plateService",
    "https://wsdl.ledplakacim.com/car_plateService#getOrder",
    "rpc",
    "encoded",
    "get order with details"
); //car_plate.getOrder
$server->register("car_plate.thnxOrder",
    array('order_uid' => 'xsd:string'),
    array('return' => 'xsd:string'),
    "https://wsdl.ledplakacim.com/car_plateService",
    "https://wsdl.ledplakacim.com/car_plateService#thnxOrder",
    "rpc",
    "encoded",
    "get order with details"
); //car_plate.thnxOrder
$server->register("car_plate.customerMessage",
    array(
        'plate_type' => 'xsd:string',
        'order_id' => 'xsd:integer',
        'message' => 'xsd:string'
    ),
    array('return' => 'xsd:integer'),
    "https://wsdl.ledplakacim.com/car_plateService",
    "https://wsdl.ledplakacim.com/car_plateService#customerMessage",
    "rpc",
    "encoded",
    "put message for customers"
); //car_plate.customerMessage
$server->register("car_plate.thnxOrderV1",
    array('order_uid' => 'xsd:string', 'plate_type' => 'xsd:string'),
    array('return' => 'xsd:string'),
    "https://wsdl.ledplakacim.com/car_plateService",
    "https://wsdl.ledplakacim.com/car_plateService#thnxOrderV1",
    "rpc",
    "encoded",
    "get order with details"
); //car_plate.thnxOrderV1
$server->register("car_plate.getShipmentKey2OrderId",
    array('order_uid' => 'xsd:string'),
    array('return' => 'xsd:string'),
    "https://wsdl.ledplakacim.com/car_plateService",
    "https://wsdl.ledplakacim.com/car_plateService#getShipmentKey2OrderId",
    "rpc",
    "encoded",
    "get order with details"
); //car_plate.getShipmentKey2OrderId
$server->register("car_plate.cancelOrder",
    array(
        'confirmation_code' => 'xsd:string',
        'plate_type' => 'xsd:string'
    ),
    array('return' => 'tns:typeStandardReturn'),
    "https://wsdl.ledplakacim.com/car_plateService",
    "https://wsdl.ledplakacim.com/car_plateService#cancelOrder",
    "rpc",
    "encoded",
    "cancel order using order_uid"
); //car_plate.cancelOrder
$server->register("car_plate.update_risk_score",
    array(
        'orderUID' => 'xsd:string',
        'risk_score' => 'xsd:integer',
        'plate_type' => 'xsd:string'
    ),
    array('return' => 'tns:typeStandardReturn'),
    "https://wsdl.ledplakacim.com/car_plateService",
    "https://wsdl.ledplakacim.com/car_plateService#update_risk_score",
    "rpc",
    "encoded",
    "set risk score using order_uid"
); //car_plate.update_risk_score
$server->register("car_plate.updateDescription",
    array(
        'order_uid' => 'xsd:string',
        'description' => 'xsd:string',
        'plate_type' => 'xsd:string'
    ),
    array('return' => 'tns:typeStandardReturn'),
    "https://wsdl.ledplakacim.com/car_plateService",
    "https://wsdl.ledplakacim.com/car_plateService#updateDescription",
    "rpc",
    "encoded",
    "set description using order_uid"
); //car_plate.update_risk_score
$server->register("car_plate.changePosition",
    array(
        'plate_type' => 'xsd:string',
        'orderUID' => 'xsd:string',
        'from' => 'xsd:integer',
        'to' => 'xsd:integer'
    ),
    array('return' => 'tns:typeStandardReturn'),
    "https://wsdl.ledplakacim.com/car_plateService",
    "https://wsdl.ledplakacim.com/car_plateService#changePosition",
    "rpc",
    "encoded",
    "set risk score using order_uid"
); //car_plate.changePosition
$server->register("car_plate.getConfirmationCode",
    array(
        'order_uid' => 'xsd:string',
        'plate_type' => 'xsd:string',
        'process' => 'xsd:integer'
    ),
    array('return' => 'tns:typeStandardReturn'),
    "https://wsdl.ledplakacim.com/car_plateService",
    "https://wsdl.ledplakacim.com/car_plateService#getConfirmationCode",
    "rpc",
    "encoded",
    "get confirmation code to order transaction"
); //car_plate.getConfirmationCode
$server->register("car_plate.orderQuery",
    array(
        'order_uid' => 'xsd:string',
        'plate_type' => 'xsd:string'
    ),
    array("return" => 'tns:typeReturnOrderQuery'), //'xsd:string'
    "https://wsdl.ledplakacim.com/car_plateService",
    "https://wsdl.ledplakacim.com/car_plateService#orderQuery",
    "rpc",
    "encoded",
    "query order detail"
); //car_plate.orderQuery

//@$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));
