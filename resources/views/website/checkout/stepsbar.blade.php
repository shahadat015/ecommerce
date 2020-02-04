<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
        <div class="work_process_item">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="work_process_icon {{ request()->is('shopping/cart') ? 'active' : ''}}"> <span><i class="icofont-cart-alt"></i></span> </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="work_process_content">
                        <p>Step 1</p>
                        <h4>Shopping Cart</h4> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
        <div class="work_process_item">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="work_process_icon {{request()->is('payment/method') ? 'active' : ''}}"> <span><i class="icofont-credit-card"></i></span> </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="work_process_content">
                        <p>Step 2</p>
                        <h4>Payment Method</h4> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
        <div class="work_process_item">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="work_process_icon {{request()->is('delivery/method') ? 'active' : ''}}"> <span><i class="icofont-car-alt-3"></i></span> </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="work_process_content">
                        <p>Step 3</p>
                        <h4>Delivery Methods</h4> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
        <div class="work_process_item">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="work_process_icon {{request()->is('order/confirm') ? 'active' : ''}}"> <span><i class="icofont-check-alt"></i></span> </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="work_process_content">
                        <p>Step 4</p>
                        <h4>Confirmation</h4> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>