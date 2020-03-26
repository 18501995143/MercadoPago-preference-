<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 2020/3/26
 * Time: 16:19
 */
file_put_contents("./rizhi/notify.txt", '返回数据：'.file_get_contents("php://input") . "\n", FILE_APPEND);
$type = $_REQUEST['type'];//是否为payment
$data_id = $_REQUEST['data_id'];//订单标识
if ($type == 'payment') {
    //然后根据返回订单查找mercadopago所生成的订单，里面会有详细信息
    MercadoPago\SDK::setAccessToken(AccessToken);
    $payment = MercadoPago\Payment::find_by_id($data_id);
    $external_reference = $payment->external_reference;//订单id
    file_put_contents('./rizhi/notify.txt',"查找订单id：".$external_reference . "\n",FILE_APPEND);
    $total_paid_amount = round($payment->transaction_details->total_paid_amount,2);//买方支付的总金额
    file_put_contents('./rizhi/notify.txt',"查找金额：".$total_paid_amount . "\n",FILE_APPEND);

    //你的处理逻辑
    $aa = '处理之后';
    if ($aa)
    {
        echo "OK";
    }else{
        $fail = '修改状态出错：';
        file_put_contents('./rizhi/notify.txt',$fail . "\n",FILE_APPEND);
        //file_put_contents(APP_ROOT_PATH."/alipaylog/2.txt","");
        echo "fail";
    }
}else{
    $fail = '状态错了';
    file_put_contents('./rizhi/notify.txt',$fail . "\n",FILE_APPEND);
    echo 'fail';
}
