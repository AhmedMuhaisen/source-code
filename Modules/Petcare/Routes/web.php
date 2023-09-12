<?php

use App\Exports\SaleCategoryExport;
use Illuminate\Support\Facades\Route;
use Modules\Petcare\Http\Controllers\SaleController;
use Modules\Petcare\Http\Controllers\CouponController;
use Modules\Petcare\Http\Controllers\ServiceController;
use Modules\Petcare\Http\Controllers\TrainerController;
use Modules\Petcare\Http\Controllers\GiftcardController;
use Modules\Petcare\Http\Controllers\ProductTaxController;
use Modules\Petcare\Http\Controllers\SaleReturnController;
use Modules\Petcare\Http\Controllers\ProductUnitController;
use Modules\Petcare\Http\Controllers\SaleExpenseController;
use Modules\Petcare\Http\Controllers\ProductBrandController;
use Modules\Petcare\Http\Controllers\SaleDeliveryController;
use Modules\Petcare\Http\Controllers\SalePurchaseController;
use Modules\Petcare\Http\Controllers\SaleTransferController;
use Modules\Petcare\Http\Controllers\SaleAdjusmentController;
use Modules\Petcare\Http\Controllers\SaleQuotationController;
use Modules\Petcare\Http\Controllers\SaleStockCountController;
use Modules\Petcare\Http\Controllers\ProductCategoryController;
use Modules\Petcare\Http\Controllers\ProductWarehouseController;
use Modules\Petcare\Http\Controllers\SaleCashRegisterController;
use Modules\Petcare\Http\Controllers\SaleReturnPurchaseController;
use Modules\Petcare\Http\Controllers\SaleExpenseCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */


 

    Route::resource('trainer',TrainerController::class); 
    Route::post('trainer/chick_time',[TrainerController::class ,'chick_time']);
    Route::group(['prefix' => ''], function () {
        // Route::get('category/list', [ProductCategoryController::class, 'index'])->name('saleProductCategory.index');
        // // Route::get('category/create', [ProductCategoryController::class, 'create'])->name('saleProductCategory.create');
        // // Route::post('category/store', [ProductCategoryController::class, 'store'])->name('saleProductCategory.store');
        // // Route::get('category/edit/{id}', [ProductCategoryController::class, 'edit'])->name('saleProductCategory.edit');
        // // Route::post('category/update/{id}', [ProductCategoryController::class, 'update'])->name('saleProductCategory.update');
        // Route::get('category/destroy', [ProductCategoryController::class, 'destroy'])->name('saleProductCategory.destroy');

        // Route::post('category/category-data', [ProductCategoryController::class, 'categoryData'])->name('saleProductCategory.categoryData');
        // Route::any('category/deletebyselection', [ProductCategoryController::class, 'deleteBySelection'])->name('saleProductCategory.deleteBySelection');

        // category
        Route::get('category/list', [ProductCategoryController::class, 'index'])->name('saleProductCategory.index');
        Route::post('category/store', [ProductCategoryController::class, 'store'])->name('saleProductCategory.store');
        Route::get('category/{id}/edit', [ProductCategoryController::class, 'edit'])->name('saleProductCategory.edit');
        Route::post('category/update', [ProductCategoryController::class, 'update'])->name('saleProductCategory.update');
        Route::delete('category/delete/{id}', [ProductCategoryController::class, 'destroy'])->name('saleProductCategory.destroy');
        Route::post('importcategory', [ProductCategoryController::class, 'importCategory'])->name('saleProductCategory.import');
        Route::post('category/deletebyselection', [ProductCategoryController::class, 'deleteBySelection']);
        // export
        Route::get('category/export', [ProductCategoryController::class, 'exportCsv'])->name('saleProductCategory.export');

        // Route::get('category/export', function () {
        //     return Excel::download(new SaleCategoryExport, 'SaleCategoryExport_' . time() . '.csv');
        // });

        // brand
        Route::get('brand/list', [ProductBrandController::class, 'index'])->name('saleProductBrand.index');
        Route::post('brand/store', [ProductBrandController::class, 'store'])->name('saleProductBrand.store');
        Route::get('brand/{id}/edit', [ProductBrandController::class, 'edit'])->name('saleProductBrand.edit');
        Route::post('brand/update', [ProductBrandController::class, 'update'])->name('saleProductBrand.update');
        Route::delete('brand/delete/{id}', [ProductBrandController::class, 'destroy'])->name('saleProductBrand.destroy');
        Route::post('importbrand', [ProductBrandController::class, 'importBrand'])->name('saleProductBrand.import');
        Route::post('brand/deletebyselection', [ProductBrandController::class, 'deleteBySelection']);

        // unit
        Route::get('unit/list', [ProductUnitController::class, 'index'])->name('saleProductUnit.index');
        Route::post('unit/store', [ProductUnitController::class, 'store'])->name('saleProductUnit.store');
        Route::get('unit/{id}/edit', [ProductUnitController::class, 'edit'])->name('saleProductUnit.edit');
        Route::post('unit/update', [ProductUnitController::class, 'update'])->name('saleProductUnit.update');
        Route::delete('unit/delete/{id}', [ProductUnitController::class, 'destroy'])->name('saleProductUnit.destroy');
        Route::post('importunit', [ProductUnitController::class, 'importUnit'])->name('saleProductUnit.import');
        Route::post('unit/deletebyselection', [ProductUnitController::class, 'deleteBySelection']);

        // Tax
        Route::get('tax/list', [ProductTaxController::class, 'index'])->name('saleProductTax.index');
        Route::post('tax/store', [ProductTaxController::class, 'store'])->name('saleProductTax.store');
        Route::get('tax/{id}/edit', [ProductTaxController::class, 'edit'])->name('saleProductTax.edit');
        Route::post('tax/update', [ProductTaxController::class, 'update'])->name('saleProductTax.update');
        Route::delete('tax/delete/{id}', [ProductTaxController::class, 'destroy'])->name('saleProductTax.destroy');
        Route::post('importtax', [ProductTaxController::class, 'importTax'])->name('saleProductTax.import');
        Route::post('tax/deletebyselection', [ProductTaxController::class, 'deleteBySelection']);

        // warehouse
        Route::get('warehouse/list', [ProductWarehouseController::class, 'index'])->name('saleProductWarehouse.index');
        Route::post('warehouse/store', [ProductWarehouseController::class, 'store'])->name('saleProductWarehouse.store');
        Route::get('warehouse/{id}/edit', [ProductWarehouseController::class, 'edit'])->name('saleProductWarehouse.edit');
        Route::post('warehouse/update', [ProductWarehouseController::class, 'update'])->name('saleProductWarehouse.update');
        Route::delete('warehouse/delete/{id}', [ProductWarehouseController::class, 'destroy'])->name('saleProductWarehouse.destroy');
        Route::post('importwarehouse', [ProductWarehouseController::class, 'importWarehouse'])->name('saleProductWarehouse.import');

        // supplier
        // Route::get('trainer/list', [TrainerController::class, 'index'])->name('trainer.index');
        // Route::get('trainer/create', [TrainerController::class, 'create'])->name('trainer.create');
        // Route::post('trainer/store', [TrainerController::class, 'store'])->name('trainer.store');
        // Route::get('trainer/{id}/edit', [TrainerController::class, 'edit'])->name('trainer.edit');
        // Route::post('trainer/update', [TrainerController::class, 'update'])->name('trainer.update');
        // Route::delete('trainer/delete/{id}', [TrainerController::class, 'destroy'])->name('trainer.destroy');
        // Route::post('import-trainer', [TrainerController::class, 'importsupplier'])->name('trainer.import');
        // Route::post('trainer/deletebyselection', [TrainerController::class, 'deleteBySelection']);
        // Route::post('trainer/clear-due', [TrainerController::class, 'clearDue'])->name('trainer.clearDue');

        // Service 
        Route::prefix('service')->group(function () {
            Route::get('', [ServiceController::class, 'index'])->name('service.index');
            Route::get('list', [ServiceController::class, 'index'])->name('service.index');
            Route::get('create', [ServiceController::class, 'create'])->name('service.create');

          

            Route::get('additional-services', [ServiceController::class, 'additionalServices'])->name('additional-services');
            Route::post('additional-services', [ServiceController::class, 'storeAdditionalServices'])->name('additional-services.store');

            Route::post('store', [ServiceController::class, 'store'])->name('service.store');
            Route::get('{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
            Route::post('{id}/update', [ServiceController::class, 'update'])->name('service.update');
            Route::post('service/change_check/{id}', [ServiceController::class, 'updateStatus'])->name('service.change_check');
           
            Route::delete('delete/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
        });

        Route::post('importproduct', [ServiceController::class, 'importproduct'])->name('service.import');
        Route::get('product/details-data/{id}', [ServiceController::class, 'productDetails'])->name('service.details');

        Route::get('product/saleunit/{id}', [ServiceController::class, 'saleUnit'])->name('service.saleUnit');
        Route::get('product/gencode', [ServiceController::class, 'generateCode']);

        Route::get('products/print_barcode', [ServiceController::class, 'printBarcode'])->name('saleProduct.printBarcode');
        Route::get('products/ot_crm_product_search', [ServiceController::class, 'ot_crmProductSearch'])->name('saleProduct.search');
        Route::get('products/history/{id}', [ServiceController::class, 'history'])->name('saleProduct.history');

        Route::post('products/product-data', 'ProductController@productData');
        Route::get('products/search', 'ProductController@search');
        Route::get('products/saleunit/{id}', 'ProductController@saleUnit');
        Route::get('products/getdata/{id}/{variant_id}', 'ProductController@getData');
        Route::get('products/product_warehouse/{id}', 'ProductController@productWarehouseData');
        // Route::post('importproduct', 'ProductController@importProduct')->name('product.import');
        Route::post('exportproduct', 'ProductController@exportProduct')->name('product.export');
        Route::post('products/deletebyselection', 'ProductController@deleteBySelection');
        Route::post('products/update', 'ProductController@updateProduct');
        Route::get('products/variant-data/{id}', 'ProductController@variantData');
        Route::post('products/sale-history-data', 'ProductController@saleHistoryData');
        Route::post('products/purchase-history-data', 'ProductController@purchaseHistoryData');
        Route::post('products/sale-return-history-data', 'ProductController@saleReturnHistoryData');
        Route::post('products/purchase-return-history-data', 'ProductController@purchaseReturnHistoryData');

        // adjustment
        Route::get('adjustment/list', [SaleAdjusmentController::class, 'index'])->name('saleAdjustment.index');
        Route::get('adjustment/create', [SaleAdjusmentController::class, 'create'])->name('saleAdjustment.create');
        Route::post('adjustment/store', [SaleAdjusmentController::class, 'store'])->name('saleAdjustment.store');
        Route::get('adjustment/{id}/edit', [SaleAdjusmentController::class, 'edit'])->name('saleAdjustment.edit');
        Route::post('adjustment/update/{id}', [SaleAdjusmentController::class, 'update'])->name('saleAdjustment.update');
        Route::delete('adjustment/delete/{id}', [SaleAdjusmentController::class, 'destroy'])->name('saleAdjustment.destroy');

        Route::get('adjustment/getproduct/{id}', [SaleAdjusmentController::class, 'getProduct'])->name('saleAdjustment.getproduct');
        Route::get('adjustment/ot_crm_product_search', [SaleAdjusmentController::class, 'ot_crmProductSearch'])->name('saleAdjustment.search');

        // Stock count
        Route::get('stock-count/list', [SaleStockCountController::class, 'index'])->name('saleStockCount.index');
        Route::post('stock-count/store', [SaleStockCountController::class, 'store'])->name('saleStockCount.store');

        Route::post('stock-count/finalize', [SaleStockCountController::class, 'finalize'])->name('saleStockCount.finalize');
        Route::get('stock-count/stockdif/{id}', [SaleStockCountController::class, 'stockDif']);
        Route::get('stock-count/{id}/qty_adjustment', [SaleStockCountController::class, 'qtyAdjustment'])->name('saleStockCount.adjustment');
    });
    // expense
    Route::group(['prefix' => 'expense'], function () {
        // category
        Route::get('category/list', [SaleExpenseCategoryController::class, 'index'])->name('saleProductExpenseCategory.index');
        Route::post('category/store', [SaleExpenseCategoryController::class, 'store'])->name('saleProductExpenseCategory.store');
        Route::get('category/{id}/edit', [SaleExpenseCategoryController::class, 'edit'])->name('saleProductExpenseCategory.edit');
        Route::post('category/update', [SaleExpenseCategoryController::class, 'update'])->name('saleProductExpenseCategory.update');
        Route::delete('category/delete/{id}', [SaleExpenseCategoryController::class, 'destroy'])->name('saleProductExpenseCategory.destroy');
        Route::post('importcategory', [SaleExpenseCategoryController::class, 'importcategory'])->name('saleProductExpenseCategory.import');
        Route::post('category/deletebyselection', [SaleExpenseCategoryController::class, 'deleteBySelection']);

        Route::get('category/gencode', [SaleExpenseCategoryController::class, 'generateCode']);

        // expense
        Route::get('list', [SaleExpenseController::class, 'index'])->name('saleExpense.index');
        Route::post('store', [SaleExpenseController::class, 'store'])->name('saleExpense.store');
        Route::get('{id}/edit', [SaleExpenseController::class, 'edit'])->name('saleExpense.edit');
        Route::post('update', [SaleExpenseController::class, 'update'])->name('saleExpense.update');
        Route::delete('delete/{id}', [SaleExpenseController::class, 'destroy'])->name('saleExpense.destroy');
    });

    Route::group(['prefix' => 'purchase'], function () {
        Route::get('list', [SalePurchaseController::class, 'index'])->name('salePurchase.index');
        Route::get('create', [SalePurchaseController::class, 'create'])->name('salePurchase.create');
        Route::post('store', [SalePurchaseController::class, 'store'])->name('salePurchase.store');
        Route::get('{id}/edit', [SalePurchaseController::class, 'edit'])->name('salePurchase.edit');
        Route::post('update/{id}', [SalePurchaseController::class, 'update'])->name('salePurchase.update');
        Route::delete('delete/{id}', [SalePurchaseController::class, 'destroy'])->name('salePurchase.destroy');

        Route::post('purchase-data', [SalePurchaseController::class, 'purchaseData'])->name('salePurchase.data');
        Route::get('product_purchase/{id}', [SalePurchaseController::class, 'productPurchaseData']);
        Route::get('ot_crm_product_search', [SalePurchaseController::class, 'ot_crmProductSearch'])->name('product_purchase.search');
        Route::post('add_payment', [SalePurchaseController::class, 'addPayment'])->name('salePurchase.add-payment');
        Route::get('getpayment/{id}', [SalePurchaseController::class, 'getPayment'])->name('salePurchase.get-payment');
        Route::post('updatepayment', [SalePurchaseController::class, 'updatePayment'])->name('salePurchase.update-payment');
        Route::post('deletepayment', [SalePurchaseController::class, 'deletePayment'])->name('salePurchase.delete-payment');
        Route::get('purchase_by_csv', [SalePurchaseController::class, 'purchaseByCsv'])->name('salePurchase.by_csv');
        Route::post('importpurchase', [SalePurchaseController::class, 'importPurchase'])->name('salePurchase.import');
    });

    // sale
    Route::group(['prefix' => 'sale'], function () {

        // sale
        Route::get('list', [SaleController::class, 'index'])->name('saleSale.index');
        Route::get('create', [SaleController::class, 'create'])->name('saleSale.create');
        Route::post('store', [SaleController::class, 'store'])->name('saleSale.store');
        Route::get('{id}/edit', [SaleController::class, 'edit'])->name('saleSale.edit');
        Route::post('update/{id}', [SaleController::class, 'update'])->name('saleSale.update');
        Route::delete('delete/{id}', [SaleController::class, 'destroy'])->name('saleSale.destroy');

        Route::post('sale-data', [SaleController::class, 'saleData']);
        Route::post('sendmail', [SaleController::class, 'sendMail'])->name('saleSale.sendmail');
        Route::get('sale_by_csv', [SaleController::class, 'saleByCsv']);
        Route::get('product_sale/{id}', [SaleController::class, 'productSaleData']);
        Route::post('importsale', [SaleController::class, 'importSale'])->name('saleSale.import');
        Route::get('pos', [SaleController::class, 'posSale'])->name('saleSale.pos');
        Route::get('ot_crm_sale_search', [SaleController::class, 'ot_crmSaleSearch'])->name('saleSale.search');
        Route::get('ot_crm_product_search', [SaleController::class, 'ot_crmProductSearch'])->name('product_saleSale.search');
        Route::get('getcustomergroup/{id}', [SaleController::class, 'getCustomerGroup'])->name('saleSale.getcustomergroup');
        Route::get('getproduct/{id}', [SaleController::class, 'getProduct'])->name('saleSale.getproduct');
        Route::get('getproduct/{category_id}/{brand_id}', [SaleController::class, 'getProductByFilter']);
        Route::get('getfeatured', [SaleController::class, 'getFeatured']);
        Route::get('get_gift_card', [SaleController::class, 'getGiftCard']);
        Route::get('paypalSuccess', [SaleController::class, 'paypalSuccess']);
        Route::get('paypalPaymentSuccess/{id}', [SaleController::class, 'paypalPaymentSuccess']);
        Route::get('gen_invoice/{id}', [SaleController::class, 'genInvoice'])->name('saleSale.invoice');
        Route::post('add_payment', [SaleController::class, 'addPayment'])->name('saleSale.add-payment');
        Route::get('getpayment/{id}', [SaleController::class, 'getPayment'])->name('saleSale.get-payment');
        Route::post('updatepayment', [SaleController::class, 'updatePayment'])->name('saleSale.update-payment');
        Route::post('deletepayment', [SaleController::class, 'deletePayment'])->name('saleSale.delete-payment');
        Route::get('{id}/create', [SaleController::class, 'createSale']);
        Route::post('deletebyselection', [SaleController::class, 'deleteBySelection']);
        Route::get('print-last-reciept', [SaleController::class, 'printLastReciept'])->name('sales.printLastReciept');
        Route::get('today-sale', [SaleController::class, 'todaySale']);
        Route::get('today-profit/{warehouse_id}', [SaleController::class, 'todayProfit']);
        Route::get('check-discount', [SaleController::class, 'checkDiscount']);

        Route::get('cash-register', [SaleCashRegisterController::class, 'index'])->name('cashRegister.index');
        Route::get('cash-register/check-availability/{warehouse_id}', [SaleCashRegisterController::class, 'checkAvailability'])->name('cashRegister.checkAvailability');
        Route::post('cash-register/store', [SaleCashRegisterController::class, 'store'])->name('cashRegister.store');
        Route::get('cash-register/getDetails/{id}', [SaleCashRegisterController::class, 'getDetails']);
        Route::get('cash-register/showDetails/{warehouse_id}', [SaleCashRegisterController::class, 'showDetails']);
        Route::post('cash-register/close', [SaleCashRegisterController::class, 'close'])->name('cashRegister.close');

        // coupon
        Route::get('coupon/list', [CouponController::class, 'index'])->name('saleCoupon.index');
        Route::post('coupon/store', [CouponController::class, 'store'])->name('saleCoupon.store');
        Route::get('coupon/{id}/edit', [CouponController::class, 'edit'])->name('saleCoupon.edit');
        Route::post('coupon/update', [CouponController::class, 'update'])->name('saleCoupon.update');
        Route::delete('coupon/delete/{id}', [CouponController::class, 'destroy'])->name('saleCoupon.destroy');
        Route::post('coupon/deletebyselection', [CouponController::class, 'deleteBySelection']);

        Route::get('coupon/gencode', [CouponController::class, 'generateCode']);

        // giftcard
        Route::get('giftcard/list', [GiftcardController::class, 'index'])->name('saleGiftcard.index');
        Route::post('giftcard/store', [GiftcardController::class, 'store'])->name('saleGiftcard.store');
        Route::get('giftcard/{id}/edit', [GiftcardController::class, 'edit'])->name('saleGiftcard.edit');
        Route::post('giftcard/update', [GiftcardController::class, 'update'])->name('saleGiftcard.update');
        Route::delete('giftcard/delete/{id}', [GiftcardController::class, 'destroy'])->name('saleGiftcard.destroy');
        Route::post('giftcard/deletebyselection', [GiftcardController::class, 'deleteBySelection']);

        Route::post('giftcard/recharge/{id}', [GiftcardController::class, 'recharge'])->name('saleGiftcard.recharge');

        Route::get('giftcard/gencode', [GiftcardController::class, 'generateCode']);

        // Delivery
        Route::get('delivery/list', [SaleDeliveryController::class, 'index'])->name('saleDelivery.index');
        Route::get('delivery/create/{id}', [SaleDeliveryController::class, 'create']);
        Route::post('delivery/store', [SaleDeliveryController::class, 'store'])->name('saleDelivery.store');
        Route::get('delivery/{id}/edit', [SaleDeliveryController::class, 'edit'])->name('saleDelivery.edit');
        Route::post('delivery/update', [SaleDeliveryController::class, 'update'])->name('saleDelivery.update');
        Route::delete('delivery/delete/{id}', [SaleDeliveryController::class, 'destroy'])->name('saleDelivery.destroy');
        Route::get('delivery/product_delivery/{id}', [SaleDeliveryController::class, 'productDeliveryData'])->name('saleDelivery.productDeliveryData');
        Route::post('delivery/sendmail', [SaleDeliveryController::class, 'sendMail'])->name('saleDelivery.sendMail');
    });

    // quotation
    Route::group(['prefix' => 'quotation'], function () {
        Route::get('list', [SaleQuotationController::class, 'index'])->name('saleQuotation.index');
        Route::get('create', [SaleQuotationController::class, 'create'])->name('saleQuotation.create');
        Route::post('store', [SaleQuotationController::class, 'store'])->name('saleQuotation.store');
        Route::get('{id}/edit', [SaleQuotationController::class, 'edit'])->name('saleQuotation.edit');
        Route::post('update/{id}', [SaleQuotationController::class, 'update'])->name('saleQuotation.update');
        Route::delete('delete/{id}', [SaleQuotationController::class, 'destroy'])->name('saleQuotation.destroy');

        Route::post('quotation-data', [SaleQuotationController::class, 'quotationData'])->name('saleQuotation.data');
        Route::get('product_quotation/{id}', [SaleQuotationController::class, 'productQuotationData'])->name('saleQuotation.data');
        Route::get('ot_crm_product_search', [SaleQuotationController::class, 'ot_crmProductSearch'])->name('saleQuotation.search');
        Route::get('getcustomergroup/{id}', [SaleQuotationController::class, 'getCustomerGroup'])->name('quotation.getcustomergroup');
        Route::get('getproduct/{id}', [SaleQuotationController::class, 'getProduct'])->name('saleQuotation.getproduct');
        Route::get('{id}/create_sale', [SaleQuotationController::class, 'createSale'])->name('saleQuotation.create_sale');
        Route::get('{id}/create_purchase', [SaleQuotationController::class, 'createPurchase'])->name('saleQuotation.create_purchase');
    });

    // return
    Route::group(['prefix' => 'return-sale'], function () {
        Route::get('list', [SaleReturnController::class, 'index'])->name('saleReturn.index');
        Route::get('create', [SaleReturnController::class, 'create'])->name('saleReturn.create');
        Route::post('store', [SaleReturnController::class, 'store'])->name('saleReturn.store');
        Route::get('{id}/edit', [SaleReturnController::class, 'edit'])->name('saleReturn.edit');
        Route::post('update/{id}', [SaleReturnController::class, 'update'])->name('saleReturn.update');
        Route::delete('delete/{id}', [SaleReturnController::class, 'destroy'])->name('saleReturn.destroy');

        Route::post('return-data', [SaleReturnController::class, 'returnData']);
        Route::get('getcustomergroup/{id}', [SaleReturnController::class, 'getCustomerGroup'])->name('return-sale.getcustomergroup');
        Route::post('sendmail', [SaleReturnController::class, 'sendMail'])->name('return-sale.sendmail');
        Route::get('getproduct/{id}', [SaleReturnController::class, 'getProduct'])->name('return-sale.getproduct');
        Route::get('ot_crm_product_search', [SaleReturnController::class, 'ot_crmProductSearch'])->name('product_return-sale.search');
        Route::get('product_return/{id}', [SaleReturnController::class, 'productReturnData']);
        Route::post('deletebyselection', [SaleReturnController::class, 'deleteBySelection']);
    });

    Route::group(['prefix' => 'return-purchase'], function () {
        Route::get('list', [SaleReturnPurchaseController::class, 'index'])->name('purchaseReturn.index');
        Route::get('create', [SaleReturnPurchaseController::class, 'create'])->name('purchaseReturn.create');
        Route::post('store', [SaleReturnPurchaseController::class, 'store'])->name('purchaseReturn.store');
        Route::get('{id}/edit', [SaleReturnPurchaseController::class, 'edit'])->name('purchaseReturn.edit');
        Route::post('update/{id}', [SaleReturnPurchaseController::class, 'update'])->name('purchaseReturn.update');
        Route::delete('delete/{id}', [SaleReturnPurchaseController::class, 'destroy'])->name('purchaseReturn.destroy');

        Route::post('return-data', [SaleReturnPurchaseController::class, 'returnData']);
        Route::get('getcustomergroup/{id}', [SaleReturnPurchaseController::class, 'getCustomerGroup'])->name('return-sale.getcustomergroup');
        Route::post('sendmail', [SaleReturnPurchaseController::class, 'sendMail'])->name('return-sale.sendmail');
        Route::get('getproduct/{id}', [SaleReturnPurchaseController::class, 'getProduct'])->name('return-sale.getproduct');
        Route::get('ot_crm_product_search', [SaleReturnPurchaseController::class, 'ot_crmProductSearch'])->name('product_return-sale.search');
        Route::get('product_return/{id}', [SaleReturnPurchaseController::class, 'productReturnData']);
        Route::post('deletebyselection', [SaleReturnPurchaseController::class, 'deleteBySelection']);
    });
    Route::group(['prefix' => 'transfer'], function () {
        Route::get('list', [SaleTransferController::class, 'index'])->name('saleTransfer.index');
        Route::get('create', [SaleTransferController::class, 'create'])->name('saleTransfer.create');
        Route::post('store', [SaleTransferController::class, 'store'])->name('saleTransfer.store');
        Route::get('{id}/edit', [SaleTransferController::class, 'edit'])->name('saleTransfer.edit');
        Route::post('update/{id}', [SaleTransferController::class, 'update'])->name('saleTransfer.update');
        Route::delete('delete/{id}', [SaleTransferController::class, 'destroy'])->name('saleTransfer.destroy');

        Route::post('transfer-data', [SaleTransferController::class, 'transferData'])->name('saleTransfer.data');
        Route::get('product_transfer/{id}', [SaleTransferController::class, 'productTransferData']);
        Route::get('transfer_by_csv', [SaleTransferController::class, 'transferByCsv']);
        Route::post('importtransfer', [SaleTransferController::class, 'importTransfer'])->name('transfer.import');
        Route::get('getproduct/{id}', [SaleTransferController::class, 'getProduct'])->name('transfer.getproduct');
        Route::get('ot_crm_product_search', [SaleTransferController::class, 'ot_crmProductSearch'])->name('product_transfer.search');
        Route::post('deletebyselection', [SaleTransferController::class, 'deleteBySelection']);
    });

