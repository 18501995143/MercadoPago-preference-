<?php
/**
 * Created by PhpStorm.
 * User: 74791
 * Date: 2020/3/18
 * Time: 13:59
 */
// Mercado Pago SDK
require __DIR__ .  '/vendor/autoload.php';

// Add Your credentials
MercadoPago\SDK::setAccessToken(AccessToken);
// Create a preference object
$preference = new MercadoPago\Preference();

//// Create a preference item
$item = new MercadoPago\Item();
$item->id = 1;//Nuestra identificación de la orden
$item->title = 'Recarga';
$item->description = 'description';
$item->quantity = 1;
$item->unit_price = 10.0000;
$item->currency_id = 'MXN';
$preference->external_reference = '123456';//自己平台订单号
$preference->notification_url = "http://www.baidu.com";//回调
$preference->items = array($item);
//$preference->auto_return = "http://www.jindouerp.cn";//完成购买重定向到网站
//var_dump($preference->items);die;
$aa = $preference->save();
//var_dump($aa);die;
//var_dump($aa->init_point);die;
if ($aa->init_point != null) {
    $url = $aa->init_point;
    header("location:".$url);
}
if ($aa['init_point'] != null) {
    $url = $aa['init_point'];
    header("location:".$url);
}

//订单查询
//$payment = MercadoPago\Payment::find_by_id('24348377');//Encuentra tu pedido
//var_dump(round($payment->transaction_details->total_paid_amount,2));
?>
