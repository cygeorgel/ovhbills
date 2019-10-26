<?php


namespace App\BlueRock;


use App\OvhBill;
use App\OvhBillDetail;
use Carbon\Carbon;

class OvhBillGet
{
//    public function __construct($billId)
//    {
//        $this->billId = $billId;
//    }
//
//    public function download($disks)
//    {
//
//    }
//
//
//    public function getBillData($api, $billId)
//    {
//        $data = $api->get('/me/bill/' . $bill);
//
//
//
//
//        $control = OvhBill::where('billId', $billId)->count();
//
//        if ( ! $control) {
//
//            $ovhBill = OvhBill::create([
//
//                'billId' => $data['billId'],
//                'nic' => $nic,
//                'documentDate' => Carbon::createFromFormat('Y-m-d', $data['date']),
//                'url' => $data['url'],
//                'password' => $data['password'],
//                'currency' => $data['priceWithoutTax']['currencyCode'],
//                'priceWithoutTax' => $data['priceWithoutTax']['value'],
//                'tax' => $data['tax']['value'],
//                'priceWithTax' => $data['priceWithTax']['value'],
//
//            ]);
//
//            $outConsumption = 0;
//            $deposit = 0;
//
//            $ovhBillDetails = $api->get('/me/bill/'. $bill . '/details');
//
//            foreach ($ovhBillDetails as $ovhBillDetailId) {
//
//                $ovhBillDetail = $api->get('/me/bill/' . $bill . '/details/' . $ovhBillDetailId);
//
//                OvhBillDetail::create([
//
//                    'bill_id' => $ovhBill->id,
//                    'billId' => $ovhBill->billId,
//                    'billDetailId' => $ovhBillDetail['billDetailId'],
//                    'description' => $ovhBillDetail['description'],
//                    'domain' => $ovhBillDetail['domain'],
//                    'periodStart' => $ovhBillDetail['periodStart'],
//                    'periodEnd' => $ovhBillDetail['periodEnd'],
//                    'quantity' => $ovhBillDetail['quantity'],
//                    'currency' => $ovhBillDetail['unitPrice']['currencyCode'],
//                    'unitPrice' => $ovhBillDetail['unitPrice']['value'],
//                    'totalPrice' => $ovhBillDetail['totalPrice']['value'],
//
//                ]);
//
//
//                if ($ovhBillDetail['description'] === 'Communications non comprises dans vos forfaits') {
//                    $outConsumption += $ovhBillDetail['totalPrice']['value'];
//
//                }
//
//                if (substr($ovhBillDetail['description'], 0, 7) == 'Caution'
//                    || substr($ovhBillDetail['description'], 0, 11) == 'Remboursement caution') {
//                    $deposit += $ovhBillDetail['totalPrice']['value'];
//
//                }
//
//            }
//
//
//            $ovhBill->outConsumption = $outConsumption;
//            $ovhBill->outConsumptionSet = true;
//            $ovhBill->deposit = $deposit;
//            $ovhBill->depositSet = true;
//            $ovhBill->save();
//
//    }

}