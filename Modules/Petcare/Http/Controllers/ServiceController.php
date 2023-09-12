<?php

namespace Modules\Petcare\Http\Controllers;

use Exception;
use App\Models\User;
use Milon\Barcode\DNS1D;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Modules\Petcare\Entities\SaleTax;
use Modules\Petcare\Entities\Service;
use Modules\Petcare\Entities\SaleUnit;
use Modules\Petcare\Entities\SaleBrand;
use Modules\Petcare\Entities\SaleReturn;
use Modules\Petcare\Entities\SaleVariant;
use Modules\Petcare\Entities\SaleCategory;
use Modules\Petcare\Entities\SalePurchase;
use Modules\Petcare\Entities\SaleWarehouse;
use Modules\Petcare\Entities\SaleProductVariant;
use Modules\Petcare\Entities\SaleReturnPurchase;
use Modules\Petcare\Interfaces\ServiceRepositoryInterface;

class ServiceController extends Controller
{
    private ServiceRepositoryInterface $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index(Request $request)
    {
        Gate::authorize('Category.create');
        try {
            
            DB::beginTransaction();

            $data['services'] = $this->serviceRepository->getAllServices();
            DB::commit();

            return view('petcare::service.service.index', compact('data'));
        } catch (Exception $e) {
            DB::rollback();
            // return $this->sendError(__('auth.some_error'), $this->exMessage($e));
        }
    }
    public function create()
    {
        $data['title'] =  _trans('sale.Service Create');
        $tax_list = SaleTax::where('is_active', true)->get();
        return view('petcare::service.service.create', compact('data', 'tax_list'));
    }
    public function additionalServices()
    {
        try {
            DB::beginTransaction();
            $additional_service = 1;
            $data['services'] = $this->serviceRepository->getAllServices($additional_service);
            DB::commit();

            return view('petcare::service.service.additional-service', compact('data'));
        } catch (Exception $e) {
            DB::rollback();
            // return $this->sendError(__('auth.some_error'), $this->exMessage($e));
        }
    }


    public function storeAdditionalServices(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['services'] = $this->serviceRepository->createService($data);
            DB::commit();

            return response()->json(['success' => 'Got Simple Ajax Request.']);;
        } catch (Exception $e) {
            DB::rollback();
            // return $this->sendError(__('auth.some_error'), $this->exMessage($e));
        }
    }

    public function generateCode()
    {
        $code = random_int(100000, 999999);
        return $code;
    }

    // productDetails 
    public function serviceDetails($id)
    {
        $service = Service::find($id);
        $data['service'] = [

            'id' => $service->id,
            'code' => $service->code,
            'name' => $service->name,
            'image' => asset('public/images/product') . '/' . $service->image,
            'price' => $service->price,
            'alert_quantity' => $service->alert_quantity,
            'tax' => $service->tax->name ?? 'N/A',
            'product_details' => $service->servicedetails,
            'type' => $service->type,
        ];

        return json_encode($data);
    }

    public function store(Request $request)
    {

        // $request->validate(
        //     [
        //         'name' => 'required',
        //         'code' => 'required|unique:services,code',
        //         'type' => 'required',
        //         'price' => 'required',
        //     ],
        //     [
        //         'name.required' => 'Name field is required!',
        //         'code.required' => 'Code field is required and must be unique!',
        //         'price.required' => 'Price field is required!'
        //     ]
        // );


        $data = $request->except('image', 'file');


        $data['name'] = preg_replace('/[\n\r]/', "<br>", htmlspecialchars(trim($data['name'])));

        $data['service_details'] = str_replace('"', '@', $data['service_details']);


        $data['is_active'] = true;
        $images = $request->image;
        $image_names = [];
        if ($images) {
            foreach ($images as $key => $image) {
                $imageName = $image->getClientOriginalName();
                $image->move('public/images/service', $imageName);
                $image_names[] = $imageName;
            }
            $data['image'] = implode(",", $image_names);
        } else {
            $data['image'] = 'blank_small.png';
        }
        if ($data['tax_id'] == null) {
            $data['tax_id'] = 0;
        }
        $data['slug'] = Str::slug($data['name']);
        $file = $request->file;
        if ($file) {
            $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fileName = strtotime(date('Y-m-d H:i:s'));
            $fileName = $fileName . '.' . $ext;
            $file->move('public/service/files', $fileName);
            $data['file'] = $fileName;
        }
        //return $data;

        $data['created_by'] = Auth::user()->id;
        $service = Service::create($data);

        Toastr::success(_trans('response.Product created successfully'), 'Success');
        return redirect()->route('service.index');
    }


    public function edit($id)
    {

        $service = $this->serviceRepository->getServiceById($id);

        $data['tax_list'] = SaleTax::where('is_active', true)->get();

        $additional_service = 1;
        $data['services'] = $this->serviceRepository->getAllServices($additional_service);

        return view('petcare::service.service.edit')->with('service', $service)->with('data', $data);
    }

    public function importProduct(Request $request)
    {
        //get file
        $upload = $request->file('file');
        $ext = pathinfo($upload->getClientOriginalName(), PATHINFO_EXTENSION);
        if ($ext != 'csv')
            return redirect()->back()->with('message', 'Please upload a CSV file');

        $filePath = $upload->getRealPath();
        //open and read
        $file = fopen($filePath, 'r');
        $header = fgetcsv($file);
        $escapedHeader = [];
        //validate
        foreach ($header as $key => $value) {
            $lheader = strtolower($value);
            $escapedItem = preg_replace('/[^a-z]/', '', $lheader);
            array_push($escapedHeader, $escapedItem);
        }
        //looping through other columns
        while ($columns = fgetcsv($file)) {
            foreach ($columns as $key => $value) {
                $value = preg_replace('/\D/', '', $value);
            }
            $data = array_combine($escapedHeader, $columns);

            if ($data['brand'] != 'N/A' && $data['brand'] != '') {
                $ot_crm_brand_data = SaleBrand::firstOrCreate(['title' => $data['brand'], 'is_active' => true]);
                $brand_id = $ot_crm_brand_data->id;
            } else
                $brand_id = null;

            $ot_crm_category_data = SaleCategory::firstOrCreate(['name' => $data['category'], 'is_active' => true]);

            $ot_crm_unit_data = SaleUnit::where('unit_code', $data['unitcode'])->first();
            if (!$ot_crm_unit_data)
                return redirect()->back()->with('not_permitted', 'Unit code does not exist in the database.');

            $product = Service::firstOrNew(['name' => $data['name'], 'is_active' => true]);
            if ($data['image'])
                $product->image = $data['image'];
            else
                $product->image = 'blank_small.png';

            $product->name = htmlspecialchars(trim($data['name']));
            $product->code = $data['code'];
            $product->type = strtolower($data['type']);
            $product->barcode_symbology = 'C128';
            $product->brand_id = $brand_id;
            $product->category_id = $ot_crm_category_data->id;
            $product->unit_id = $ot_crm_unit_data->id;
            $product->purchase_unit_id = $ot_crm_unit_data->id;
            $product->sale_unit_id = $ot_crm_unit_data->id;
            $product->cost = str_replace(",", "", $data['cost']);
            $product->price = str_replace(",", "", $data['price']);
            $product->tax_method = 1;
            $product->qty = 0;
            $product->product_details = $data['productdetails'];
            $product->is_active = true;
            $product->save();

            if ($data['variantname']) {
                //dealing with variants
                $variant_names = explode(",", $data['variantname']);
                $item_codes = explode(",", $data['itemcode']);
                $additional_prices = explode(",", $data['additionalprice']);
                foreach ($variant_names as $key => $variant_name) {
                    $variant = SaleVariant::firstOrCreate(['name' => $variant_name]);
                    if ($data['itemcode'])
                        $item_code = $item_codes[$key];
                    else
                        $item_code = $variant_name . '-' . $data['code'];

                    if ($data['additionalprice'])
                        $additional_price = $additional_prices[$key];
                    else
                        $additional_price = 0;

                    SaleProductVariant::create([
                        'product_id' => $product->id,
                        'variant_id' => $variant->id,
                        'position' => $key + 1,
                        'item_code' => $item_code,
                        'additional_price' => $additional_price,
                        'qty' => 0
                    ]);
                }

                $product->is_variant = true;
                $product->save();
            }
        }
        Toastr::success(_trans('message.Operation Successful'), 'Success');
        return redirect()->route('service.index');
    }


    public function update(Request $request, $id)
    {

        dd($request->all());
        $service = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'price' => 'required',
            'tax_id' => 'required',
            'type' => 'required',
            'featured' => 'required',
            'image' => 'required |image |enum:png,jpg',
            'service_details' => 'required'
        ]);

        $service['slug'] = Str::slug($request->name);
        $data['services'] = $this->serviceRepository->updateService($id, $service);
        return redirect()->route('petcare::service.service.index');
    }

    public function destroy($id)
    {
        Service::where('id', $id)->delete();

        Toastr::success(_trans('response.Service deleted successfully'), 'Success');
        return response()->json(['status' => 'success']);
    }

    public function updateStatus(Request $request, $id)
    {
     
        if ($this->serviceRepository->updateStatus($id,$request->status)) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'success']);
        }
    }

    public function printBarcode(Request $request)
    {
        if ($request->input('data'))
            $preLoadedproduct = $this->ot_crmProductSearch($request);
        else
            $preLoadedproduct = null;
        $ot_crm_product_list_without_variant = $this->productWithoutVariant();
        $ot_crm_product_list_with_variant = $this->productWithVariant();
        $data['title'] = 'Print Barcode';

        return view('petcare::product.product.print_barcode', compact('data', 'ot_crm_product_list_without_variant', 'ot_crm_product_list_with_variant', 'preLoadedproduct'));
    }

    public function ot_crmProductSearch(Request $request)
    {
        $product_code = explode("(", $request['data']);
        $product_code[0] = rtrim($product_code[0], " ");
        $ot_crm_product_data = Service::where([
            ['code', $product_code[0]],
            ['is_active', true]
        ])->first();
        if (!$ot_crm_product_data) {
            $ot_crm_product_data = Service::join('sale_product_variants', 'services.id', 'sale_product_variants.product_id')
                ->select('services.*', 'sale_product_variants.item_code', 'sale_product_variants.variant_id', 'sale_product_variants.additional_price')
                ->where('product_variants.item_code', $product_code[0])
                ->first();

            $variant_id = $ot_crm_product_data->variant_id;
            $additional_price = $ot_crm_product_data->additional_price;
        } else {
            $variant_id = '';
            $additional_price = 0;
        }
        $product[] = $ot_crm_product_data->name;
        if ($ot_crm_product_data->is_variant)
            $product[] = $ot_crm_product_data->item_code;
        else
            $product[] = $ot_crm_product_data->code;

        $product[] = $ot_crm_product_data->price + $additional_price;
        $product[] = DNS1D::getBarcodePNGPath($ot_crm_product_data->code, $ot_crm_product_data->barcode_symbology);
        $product[] = $ot_crm_product_data->promotion_price;
        $product[] = config('currency');
        $product[] = config('currency_position');
        $product[] = $ot_crm_product_data->qty;
        $product[] = $ot_crm_product_data->id;
        $product[] = $variant_id;
        return $product;
    }

    public function history($id)
    {
        $data['title'] = 'Product History';
        $product_data = Service::select('name', 'code')->find($id);
        $ot_crm_warehouse_list = SaleWarehouse::where('is_active', true)->get();


        $sales = petcare::whereHas('saleSingleProduct', function ($q) use ($id) {
            $q->where('product_id', $id);
        })->with('warehouse', 'customer', 'saleSingleProduct')->orderBy('id', 'desc')->get();

        $data['sales'] = $sales->map(function ($sale) {
            return [
                'id' => $sale->id,
                'date' => $sale->created_at->format('Y-m-d'),
                'reference_no' => $sale->reference_no,
                'warehouse' => $sale->warehouse->name,
                'customer' => $sale->customer->name,
                'qty' => $sale->saleSingleProduct->qty,
                'unit_price' => $sale->saleSingleProduct->total / $sale->saleSingleProduct->qty,
                'sub_total' => $sale->saleSingleProduct->total,
            ];
        });


        $purchases = SalePurchase::whereHas('purchaseSingleProduct', function ($q) use ($id) {
            $q->where('product_id', $id);
        })->with('warehouse', 'supplier', 'purchaseSingleProduct')->orderBy('id', 'desc')->get();

        $data['purchases'] = $purchases->map(function ($purchase) {
            return [
                'id' => $purchase->id,
                'date' => $purchase->created_at->format('Y-m-d'),
                'reference_no' => $purchase->reference_no,
                'warehouse' => $purchase->warehouse->name,
                'supplier' => $purchase->supplier->name,
                'qty' => $purchase->purchaseSingleProduct->qty,
                'unit_price' => $purchase->purchaseSingleProduct->total / $purchase->purchaseSingleProduct->qty,
                'sub_total' => $purchase->purchaseSingleProduct->total,
            ];
        });

        // sale return 
        $sale_returns = SaleReturn::whereHas('saleReturnSingleProduct', function ($q) use ($id) {
            $q->where('product_id', $id);
        })->with('warehouse', 'customer', 'saleReturnSingleProduct')->orderBy('id', 'desc')->get();


        $data['sale_returns'] = $sale_returns->map(function ($sale_return) {
            return [
                'id' => $sale_return->id,
                'date' => $sale_return->created_at->format('Y-m-d'),
                'reference_no' => $sale_return->reference_no,
                'warehouse' => $sale_return->warehouse->name,
                'customer' => $sale_return->customer->name,
                'qty' => $sale_return->saleReturnSingleProduct->qty,
                'unit_price' => $sale_return->saleReturnSingleProduct->total / $sale_return->saleReturnSingleProduct->qty,
                'sub_total' => $sale_return->saleReturnSingleProduct->total,
            ];
        });


        // purchase return 
        $purchase_returns = SaleReturnPurchase::whereHas('purchaseReturnSingleProduct', function ($q) use ($id) {
            $q->where('product_id', $id);
        })->with('warehouse', 'supplier', 'purchaseReturnSingleProduct')->orderBy('id', 'desc')->get();

        $data['purchase_returns'] = $purchase_returns->map(function ($purchase_return) {
            return [
                'id' => $purchase_return->id,
                'date' => $purchase_return->created_at->format('Y-m-d'),
                'reference_no' => $purchase_return->reference_no,
                'warehouse' => $purchase_return->warehouse->name,
                'supplier' => $purchase_return->supplier->name,
                'qty' => $purchase_return->purchaseReturnSingleProduct->qty,
                'unit_price' => $purchase_return->purchaseReturnSingleProduct->total / $purchase_return->purchaseReturnSingleProduct->qty,
                'sub_total' => $purchase_return->purchaseReturnSingleProduct->total,
            ];
        });

        return view('petcare::product.product.history', compact('data', 'product_data', 'ot_crm_warehouse_list'));
    }
}
