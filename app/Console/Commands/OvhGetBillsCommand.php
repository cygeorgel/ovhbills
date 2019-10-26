<?php

namespace App\Console\Commands;

use App\OvhBill;
use App\OvhBillDetail;
use App\OvhConfig;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Ovh\Api;

class OvhGetBillsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ovh:getBills {from}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Ovh bills from date Y-m-d';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ovhConfigs = OvhConfig::where('active', true)->get();

        foreach ($ovhConfigs as $ovhConfig) {

            try {

                $api = new Api($ovhConfig->app_key, $ovhConfig->app_secret, $ovhConfig->app_endpoint, $ovhConfig->app_conskey);

                $nic = $api->get('/me')['nichandle'];

                $bills = $api->get('/me/bill?date.from=' . $this->argument('from') . '&date.to=' . now()->format('Y-m-d'));

                foreach ($bills as $bill) {

                    try {

                        $data = $api->get('/me/bill/' . $bill);

                        $filename = $data['billId'] . '.pdf';

                        $documentDate = Carbon::createFromFormat('Y-m-d', $data['date'])->format('Ym');

                        $disks = explode(',', config('ovhbills.disks'));

                        foreach ($disks as $disk) {

                            if (!Storage::disk($disk)->exists('ovhBills/' . $documentDate . '/' . $filename)) {

                                Storage::disk($disk)->makeDirectory('ovhBills/' . $documentDate);

                                $content = file_get_contents($api->get('/me/bill/' . $data['billId'])['pdfUrl']);

                                if (Storage::disk($disk)->put('ovhBills/' . $documentDate . '/' . $filename, $content)) {

                                    print 'Storage of ' . $filename . ' to ' . $disk . ': OK ' . PHP_EOL;

                                } else {

                                    print 'Storage of ' . $filename . ' to ' . $disk . ': KO ' . PHP_EOL;
                                }

                            } else {

                                print 'Storage of ' . $filename . ' to ' . $disk . ': file was already downloaded' . PHP_EOL;

                            }
                        }

                        $control = OvhBill::where('billId', $data['billId'])->count();

                        if (!$control) {

                            $ovhBill = OvhBill::create([

                                'billId' => $data['billId'],
                                'nic' => $nic,
                                'documentDate' => Carbon::createFromFormat('Y-m-d', $data['date']),
                                'url' => $data['url'],
                                'password' => $data['password'],
                                'currency' => $data['priceWithoutTax']['currencyCode'],
                                'priceWithoutTax' => $data['priceWithoutTax']['value'],
                                'tax' => $data['tax']['value'],
                                'priceWithTax' => $data['priceWithTax']['value'],

                            ]);

                            $outConsumption = 0;
                            $deposit = 0;

                            $ovhBillDetails = $api->get('/me/bill/' . $bill . '/details');

                            foreach ($ovhBillDetails as $ovhBillDetailId) {

                                $ovhBillDetail = $api->get('/me/bill/' . $bill . '/details/' . $ovhBillDetailId);

                                OvhBillDetail::create([

                                    'bill_id' => $ovhBill->id,
                                    'billId' => $ovhBill->billId,
                                    'billDetailId' => $ovhBillDetail['billDetailId'],
                                    'description' => $ovhBillDetail['description'],
                                    'domain' => $ovhBillDetail['domain'],
                                    'periodStart' => $ovhBillDetail['periodStart'],
                                    'periodEnd' => $ovhBillDetail['periodEnd'],
                                    'quantity' => $ovhBillDetail['quantity'],
                                    'currency' => $ovhBillDetail['unitPrice']['currencyCode'],
                                    'unitPrice' => $ovhBillDetail['unitPrice']['value'],
                                    'totalPrice' => $ovhBillDetail['totalPrice']['value'],

                                ]);

                                if ($ovhBillDetail['description'] === 'Communications non comprises dans vos forfaits') {

                                    $outConsumption += $ovhBillDetail['totalPrice']['value'];

                                }

                                if (substr($ovhBillDetail['description'], 0, 7) == 'Caution'
                                    || substr($ovhBillDetail['description'], 0, 11) == 'Remboursement caution') {

                                    $deposit += $ovhBillDetail['totalPrice']['value'];

                                }
                            }

                            $ovhBill->outConsumption = $outConsumption;
                            $ovhBill->outConsumptionSet = true;
                            $ovhBill->deposit = $deposit;
                            $ovhBill->depositSet = true;
                            $ovhBill->save();

                        }

                    } catch (\Exception $exception) {

                        print $exception->getMessage() . PHP_EOL;

                    }
                }

            } catch (\Exception $exception) {

                print $exception->getMessage() . PHP_EOL;

            }
        }
    }
}