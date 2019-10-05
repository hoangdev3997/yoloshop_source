<div class="bg-hidden">
    <div class="page-content">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link btn active" id="basic-info-tab" data-toggle="tab" href="#basic-info-tab-pane" role="tab" aria-controls="basic-info-tab-pane" aria-expanded="true">Basic Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn" id="product-images-tab" data-toggle="tab" href="#product-images-tab-pane" role="tab" aria-controls="product-images-tab-pane">Product Images</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn" id="pricing-tab" data-toggle="tab" href="#pricing-tab-pane" role="tab" aria-controls="pricing-tab-pane">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn" id="inventory-tab" data-toggle="tab" href="#inventory-tab-pane" role="tab" aria-controls="inventory-tab-pane">Inventory</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn" id="shipping-tab" data-toggle="tab" href="#shipping-tab-pane" role="tab" aria-controls="shipping-tab-pane">Shipping</a>
            </li>
            <li class="nav-item">
                <form action="#">
                    <button class="nav-link btn btn-form"><i class="icon-check-all"></i></button>
                </form>
            </li>
            <div class="close-div">
                <button class="btn-form btn-close"><i class="icon-close-circle-outline"></i></button>
            </div>
        </ul>
        
        <div class="tab-content">
            <div class="tab-pane fade show active" id="basic-info-tab-pane" role="tabpanel" aria-labelledby="basic-info-tab">

                <div class="card p-6">

                    <form>

                        <div class="form-group">
                            <input type="text" class="form-control" aria-describedby="product name" />
                            <label>Product Name</label>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" aria-describedby="product description" rows="5"></textarea>
                            <label>Product Description</label>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" aria-describedby="product categories" />
                            <label>Categories</label>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" aria-describedby="product tags" />
                            <label>Tags</label>
                        </div>

                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="product-images-tab-pane" role="tabpanel" aria-labelledby="product-images-tab">
                <div class="card p-6">
                    <div class="row">
                        <div class="product-image m-2 align-items-center d-flex">
                            <img class="w-100" src="../assets/images/ecommerce/product-image-placeholder.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="inventory-tab-pane" role="tabpanel" aria-labelledby="inventory-tab">
                <div class="card p-6">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" aria-describedby="sku" />
                            <label>SKU</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" aria-describedby="barcode" />
                            <label>Barcode</label>
                        </div>
                        <div class="form-group">
                            <input id="example-number-input" class="form-control" type="number" value="42" aria-describedby="quantity" />
                            <label for="example-number-input">Quantity</label>
                        </div>
                    </form>
                </div>
            </div>

            <div class="tab-pane fade" id="pricing-tab-pane" role="tabpanel" aria-labelledby="pricing-tab">
                <div class="card p-6">
                    <form>
                        <div class="input-group mb-8">
                            <span class="input-group-addon pt-4">$</span>
                            <div class="form-group">
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" />
                                <label>Tax Excluded Price</label>
                            </div>
                            <span class="input-group-addon pt-4">.00</span>
                        </div>
                        <div class="input-group mb-8">
                            <span class="input-group-addon pt-4">$</span>
                            <div class="form-group">
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" />
                                <label>Tax Included Price</label>
                            </div>
                            <span class="input-group-addon pt-4">.00</span>
                        </div>

                        <div class="input-group mb-8">
                            <span class="input-group-addon pt-4">%</span>
                            <div class="form-group">
                                <input type="text" class="form-control" aria-label="taxt rate" />
                                <label>Tax Rate</label>
                            </div>
                        </div>

                        <div class="input-group mb-8">
                            <span class="input-group-addon pt-4">$</span>
                            <div class="form-group">
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" />
                                <label>Compared Price</label>
                                <small class="form-text text-muted">Add a compare price to show next to the real price</small>
                            </div>
                            <span class="input-group-addon pt-4">.00</span>

                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="shipping-tab-pane" role="tabpanel" aria-labelledby="shipping-tab">
                <div class="card p-6">
                    <form>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" aria-describedby="width" />
                                    <label>Width</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" aria-describedby="height" />
                                    <label>Height</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" aria-describedby="depth" />
                                    <label>Depth</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" aria-describedby="weight" />
                            <label>Weight</label>
                        </div>
                        <div class="form-group">
                            <input id="example-number-input" class="form-control" type="number" value="42" aria-describedby="quantity" />
                            <label for="example-number-input">Quantity</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>