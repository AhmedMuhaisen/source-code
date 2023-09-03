<!-- start Sales -->
{{-- project management start --}}



@if (hasPermission('sales_purchase_menu'))
    <!-- Start Purchase -->
    <li class="nav-item {{ set_menu([route('salePurchase.index', 'salePurchase.create', 'salePurchase.by_csv')]) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#purchase" role="button"
            aria-expanded="{{ menu_active_by_route(['salePurchase.index', 'salePurchase.create', 'salePurchase.by_csv']) }}"
            aria-controls="purchase">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title"> {{ _trans('common.Purchase') }}</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>


        <div class="collapse {{ set_active(['sale/product/category*', 'sale/product/brand*', 'sale/product/unit*', 'sale/product/tax*', 'sale/product/warehouse*', 'sale/product/supplier*', 'sale/product/product*', 'sale/product/products*', 'sale/product/adjustment*', 'sale/product/stock-count*']) }}"
            id="purchase">
            <ul class="nav sub-menu">
                <!--  Start Purchase List menu  -->
                @if (hasPermission('sales_purchase_menu'))
                    <li class="nav-item {{ menu_active_by_route(['salePurchase.index']) }}">
                        <a href="{{ route('salePurchase.index') }}"
                            class="nav-link {{ set_active(route('salePurchase.index')) }}">
                            <span class="text-warp">{{ _trans('common.Purchase List') }}</span>
                        </a>
                    </li>
                @endif
                <!-- Start Purchase List menu  -->

                <!-- Start: Purchase Import menu  -->
                @if (hasPermission('sales_purchase_import'))
                    <li class="nav-item {{ menu_active_by_route(['salePurchase.by_csv']) }}">
                        <a href="{{ route('salePurchase.by_csv') }}"
                            class="nav-link {{ set_active(route('salePurchase.by_csv')) }}">
                            <span class="text-warp">{{ _trans('common.Import Purchase By CSV') }}</span>
                        </a>
                    </li>
                @endif
                <!-- END: Purchase Import menu  -->
            </ul>
        </div>


    </li>
    <!-- End Purchase -->
@endif



@if (hasPermission('sales_menu'))
    <!-- Start Sale -->

    <!-- Start Purchase -->
    <li
        class="nav-item {{ set_menu([route('saleSale.index', 'saleSale.create', 'saleSale.pos', 'saleGiftcard', 'saleCoupon', 'saleDelivery')]) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#sales" role="button"
            aria-expanded="{{ menu_active_by_route(['saleSale.index', 'saleSale.create', 'saleSale.pos', 'saleGiftcard', 'saleCoupon', 'saleDelivery']) }}"
            aria-controls="sales">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title"> {{ _trans('common.Sales') }}</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>


        <div class="collapse {{ set_active(['sale/sale*']) }}" id="sales">
            <ul class="nav sub-menu">

                <!-- Start Sale list /saleSale.index -->
                @if (hasPermission('sales_menu'))
                    <li class="nav-item {{ menu_active_by_route(['saleSale.index']) }}">
                        <a href="{{ route('saleSale.index') }}"
                            class="nav-link {{ set_active(route('saleSale.index')) }}">
                            <span>{{ _trans('common.Sale List') }}</span>
                        </a>
                    </li>
                @endif
                <!-- End Sale list -->

                <!-- Start POS list /saleSale.pos -->
                @if (hasPermission('sales_pos_menu'))
                    <li class="nav-item {{ menu_active_by_route(['saleSale.pos']) }}">
                        <a href="{{ route('saleSale.pos') }}"
                            class="nav-link {{ set_active(route('saleSale.pos')) }}">
                            <span>{{ _trans('common.POS') }}</span>
                        </a>
                    </li>
                @endif
                <!-- End POS list -->

                <!-- Start Add Sale list /saleSale.create -->
                @if (hasPermission('sales_create'))
                    <li class="nav-item {{ menu_active_by_route(['saleSale.create']) }}">
                        <a href="{{ route('saleSale.create') }}"
                            class="nav-link {{ set_active(route('saleSale.create')) }}">
                            <span>{{ _trans('common.Add Sale') }}</span>
                        </a>
                    </li>
                @endif
                <!-- End Add Sale list -->
                <!-- Start: Gift Card Menu -->
                @if (hasPermission('sales_giftcard_menu'))
                    <li class="nav-item {{ menu_active_by_route(['saleGiftcard.index']) }}">
                        <a href="{{ route('saleGiftcard.index') }}"
                            class="nav-link {{ set_active(route('saleGiftcard.index')) }}">
                            <span>{{ _trans('common.Gift Card List') }}</span>
                        </a>
                    </li>
                    <!-- END: Gift Card Menu -->
                    @endif
                    <!-- Start: Coupon List Menu -->
                    @if (hasPermission('sales_coupon_menu'))
                        <li class="nav-item {{ menu_active_by_route(['saleCoupon.index']) }}">
                            <a href="{{ route('saleCoupon.index') }}"
                                class="nav-link {{ set_active(route('saleCoupon.index')) }}">
                                <span>{{ _trans('common.Coupon List') }}</span>
                            </a>
                        </li>
                    @endif
                    <!-- END: Coupon List Menu -->

                    <!-- Start: Delivery List Menu -->
                    @if (hasPermission('sales_delivery_menu'))
                        <li class="nav-item {{ menu_active_by_route(['saleDelivery.index']) }}">
                            <a href="{{ route('saleDelivery.index') }}"
                                class="nav-link {{ set_active(route('saleDelivery.index')) }}">
                                <span>{{ _trans('common.Delivery List') }}</span>
                            </a>
                        </li>
                    @endif
                    <!-- END: Delivery List Menu -->
              

            </ul>
        </div>


    </li>
    <!-- End Sales -->

 
@endif



{{-- @if (hasPermission('sales_menu'))

    <li
        class="nav-item {{ set_menu([route('saleProductCategory.index', 'saleProductBrand.index', 'saleProductUnit.index', 'saleProductTax.index', 'saleProductWarehouse.index', 'trainer.index', 'service.index', 'service.create', 'service.printBarcode', 'saleAdjustment.index', 'saleAdjustment.create', 'saleStockCount.index', 'salePurchase.index', 'salePurchase.create', 'salePurchase.by_csv', 'saleExpense.index', 'saleProductExpenseCategory.index', 'saleQuotation.index', 'saleQuotation.create', 'saleTransfer.index', 'saleTransfer.create', 'saleReturn.index', 'purchaseReturn.index')]) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#sales" role="button"
            aria-expanded="{{ menu_active_by_route(['saleProductCategory.index', 'saleProductBrand.index', 'saleProductUnit.index', 'saleProductTax.index', 'saleProductWarehouse.index', 'trainer.index', 'service.index', 'service.create', 'service.printBarcode', 'saleAdjustment.index', 'saleAdjustment.create', 'saleStockCount.index', 'salePurchase.index', 'salePurchase.create', 'salePurchase.by_csv', 'saleExpense.index', 'saleProductExpenseCategory.index', 'saleQuotation.index', 'saleQuotation.create', 'saleTransfer.index', 'saleTransfer.create', 'saleReturn.index', 'purchaseReturn.index']) }}"
            aria-controls="sales">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title"> {{ _trans('common.Sales') }}</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ set_active(['sale/product*', 'sale/expense*', 'sale/purchase*', 'sale/sale*', 'sale/quotation*', 'sale/return-sale*', 'sale/return-purchase*', 'sale/transfer*']) }}"
            id="sales">
            <ul class="nav sub-menu">








                @if (hasPermission('sales_expense_menu'))
                    <!-- Start Expense -->
                    <li class="nav-item  {{ set_active(['sale/expense*']) }}">
                        <a href="javascript:void(0)"
                            class="parent-item-content has-arrow {{ menu_active_by_route(['saleExpense.index', 'saleProductExpenseCategory.index']) }}">
                            <span class="on-half-expanded">
                                {{ _trans('common.Expense') }}
                            </span>
                        </a>

                        <ul class="child-menu-list {{ set_active(['sale/expense*']) }}">
                            <!-- Start: Expense Category Menu -->
                            @if (hasPermission('sales_expense_category_menu'))
                                <li class="nav-item {{ menu_active_by_route(['saleProductExpenseCategory.index']) }}">
                                    <a href="{{ route('saleProductExpenseCategory.index') }}"
                                        class="  {{ set_active(route('saleProductExpenseCategory.index')) }}">
                                        <span>{{ _trans('common.Expense Category') }}</span>
                                    </a>
                                </li>
                            @endif
                            <!-- Start: Expense Category Menu -->

                            <!-- Start: Expense Category List Menu -->
                            @if (hasPermission('sales_expense_menu'))
                                <li class="nav-item {{ menu_active_by_route(['saleExpense.index']) }}">
                                    <a href="{{ route('saleExpense.index') }}"
                                        class="  {{ set_active(route('saleExpense.index')) }}">
                                        <span>{{ _trans('common.Expense List') }}</span>
                                    </a>
                                </li>
                            @endif
                            <!-- Start: Expense Category List Menu -->
                        </ul>
                    </li>
                    <!-- End Expense -->
                @endif

                @if (hasPermission('sales_quotation_menu'))
                    <!-- Start Quotation -->
                    <li class="nav-item {{ set_active(['sale/quotation*']) }}">
                        <a href="javascript:void(0)"
                            class="parent-item-content has-arrow {{ menu_active_by_route(['saleQuotation.index', 'saleQuotation.create']) }}">
                            <span class="on-half-expanded">
                                {{ _trans('common.Quotation') }}
                            </span>
                        </a>


                        <ul class="child-menu-list {{ set_active(['sale/quotation*']) }}">

                            @if (hasPermission('sales_quotation_menu'))
                                <li class="nav-item {{ menu_active_by_route(['saleQuotation.index']) }}">
                                    <a href="{{ route('saleQuotation.index') }}"
                                        class="  {{ set_active(route('saleQuotation.index')) }}">
                                        <span>{{ _trans('common.Quotation List') }}</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    <!-- End Quotation -->
                @endif

                @if (hasPermission('sales_transfer_menu'))
                    <!-- Start Transfer -->
                    <li class="nav-item ">
                        <a href="javascript:void(0)"
                            class="parent-item-content has-arrow {{ menu_active_by_route(['saleTransfer.index', 'saleTransfer.create']) }}">
                            <span class="on-half-expanded">
                                {{ _trans('common.Transfer') }}
                            </span>
                        </a>


                        <ul class="child-menu-list {{ set_active(['sale/transfer*']) }}">

                            <!--  Start Tranfer List menu  -->
                            @if (hasPermission('sales_transfer_menu'))
                                <li class="nav-item {{ menu_active_by_route(['saleTransfer.index']) }}">
                                    <a href="{{ route('saleTransfer.index') }}"
                                        class="  {{ set_active(route('saleTransfer.index')) }}">
                                        <span>{{ _trans('common.Transfer List') }}</span>
                                    </a>
                                </li>
                            @endif
                            <!-- Start Tranfer List menu  -->
                        </ul>
                    </li>
                    <!-- End Tranfer -->
                @endif


                @if (hasPermission('sales_return_menu'))
                    <!-- Start Return -->
                    <li class="nav-item ">
                        <a href="javascript:void(0)"
                            class="parent-item-content has-arrow {{ menu_active_by_route(['saleReturn.index', 'purchaseReturn.index']) }}">
                            <span class="on-half-expanded">
                                {{ _trans('common.Return') }}
                            </span>
                        </a>

                        <ul class="child-menu-list {{ set_active(['sale/return-sale*', 'sale/return-purchase*']) }}">
                            <!--  Start Return menu  -->
                            @if (hasPermission('sales_return_sale_menu'))
                                <li class="nav-item {{ menu_active_by_route(['saleReturn.index']) }}">
                                    <a href="{{ route('saleReturn.index') }}"
                                        class="  {{ set_active(route('saleReturn.index')) }}">
                                        <span>{{ _trans('common.Sale List') }}</span>
                                    </a>
                                </li>
                            @endif
                            <!-- Start Return menu  -->



                            <!-- Start Return menu  -->
                            @if (hasPermission('sales_return_purchase_menu'))
                                <li class="nav-item {{ menu_active_by_route(['purchaseReturn.index']) }}">
                                    <a href="{{ route('purchaseReturn.index') }}"
                                        class="  {{ set_active(route('purchaseReturn.index')) }}">
                                        <span>{{ _trans('common.Purchase List') }}</span>
                                    </a>
                                </li>
                            @endif
                            <!-- END Return menu  -->
                        </ul>
                    </li>
                    <!-- End Return -->
                @endif




            </ul>
        </div>
    </li>





@endif
<!-- End Sale --> --}}
