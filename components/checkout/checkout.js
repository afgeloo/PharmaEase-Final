document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tab-link');
    const content = document.querySelector('.payment-content');
    const paymentTabs = document.querySelector('.payment-tabs');
    let completedTabs = new Set(['cart']);
    let orderDetails = {
        cart: [],
        customerInfo: {},
        shippingInfo: {},
        paymentMethod: ''
    };

    function loadTabContent(tabContent) {
        content.innerHTML = ''; // Clear content
        if (tabContent === 'cart') {
            content.innerHTML = `
                <div class="cart-container">
                    <div class="shopping-cart">
                        <div class="product">
                            <div class="product-image-container">
                                <img src="/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/ANTIGEN.png" class="product-image">
                            </div>
                            <div class="product-details">
                                <div class="product-name"><strong>Antigen</strong></div>
                                <div class="product-price">Price: 150.00</div>
                                <div class="product-quantity">Quantity: 1</div>
                                <div class="product-line-price">Total: 150.00</div>
                            </div>
                        </div>
                        <hr>
                        <div class="product">
                            <div class="product-image-container">
                                <img src="/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/face shield.png" class="product-image">
                            </div>
                            <div class="product-details">
                                <div class="product-name"><strong>Face Shield</strong></div>
                                <div class="product-price">Price: 12.05</div>
                                <div class="product-quantity">Quantity: 1</div>
                                <div class="product-line-price">Total: 12.05</div>
                            </div>
                        </div>
                        <hr>
                        <div class="product">
                            <div class="product-image-container">
                                <img src="/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/GILLETTE SHAVING CREAM.png" class="product-image">
                            </div>
                            <div class="product-details">
                                <div class="product-name"><strong>Gillete</strong></div>
                                <div class="product-price">Price: 133.00</div>
                                <div class="product-quantity">Quantity: 1</div>
                                <div class="product-line-price">Total: 133.00</div>
                            </div>
                        </div>
                        <hr>
                        <div class="totals">
                            <div class="totals-item">
                                <label>Subtotal</label>
                                <div class="totals-value" id="cart-subtotal">58.98</div>
                            </div>
                            <div class="totals-item">
                                <label>Tax (5%)</label>
                                <div class="totals-value" id="cart-tax">2.95</div>
                            </div>
                            <div class="totals-item">
                                <label>Shipping</label>
                                <div class="totals-value" id="cart-shipping">5.00</div>
                            </div>
                            <div class="totals-item totals-item-total">
                                <label>Grand Total</label>
                                <div class="totals-value" id="cart-total">66.93</div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-actions">
                        <a class="return" href="../cart/cart.php">Back</a>
                        <a class="next" href="javascript:void(0);" data-next-tab="customer-info">Customer Information <ion-icon name="arrow-forward-outline"></ion-icon></a>
                    </div>
                </div>
            `;
        } else if (tabContent === 'customer-info') {
            content.innerHTML = `
                <div class="customer-info">
                    <h2>Customer Information</h2>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" type="text" name="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact No.</label>
                        <input id="contact" class="form-control" type="text" name="contact" placeholder="Enter your contact number">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="email" name="email" placeholder="Enter your email">
                    </div>
                    <h2>Saved Addresses</h2>
                    <div class="form-group">
                        <label for="address">Select Address</label>
                        <select id="address" class="form-control">
                            <option value="address1">123 Main St, City, Country</option>
                        </select>
                    </div>
                    <div class="address-actions">
                        <button class="add-address">Add Address</button>
                        <button class="remove-address">Remove Address</button>
                    </div>
                    <div class="customer-info-actions">
                        <a class="return" href="javascript:void(0);" data-prev-tab="cart">Return to Cart</a>
                        <a class="next" href="javascript:void(0);" data-next-tab="shipping">Shipping <ion-icon name="arrow-forward-outline"></ion-icon></a>
                    </div>
                </div>
            `;
        } else if (tabContent === 'shipping') {
            const estimatedDate = new Date();
            estimatedDate.setDate(estimatedDate.getDate() + 3);
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            const formattedDate = estimatedDate.toLocaleDateString(undefined, options);

            content.innerHTML = `
                <div class="shipping-info">
                    <h2>Estimated Delivery Date</h2>
                    <p>${formattedDate}</p>
                    <h2>Delivery Information</h2>
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Contact No.:</strong> 123-456-7890</p>
                    <p><strong>Email:</strong> john.doe@example.com</p>
                    <p><strong>Address:</strong> 123 Main St, City, Country</p>
                    <div class="shipping-actions">
                        <a class="return" href="javascript:void(0);" data-prev-tab="customer-info">Return to Customer Information</a>
                        <a class="next" href="javascript:void(0);" data-next-tab="payment">Proceed to Payment <ion-icon name="arrow-forward-outline"></ion-icon></a>
                    </div>
                </div>
            `;
        } else if (tabContent === 'payment') {
            content.innerHTML = `
                <div class="payment-method">
                    <h2>Choose your payment method</h2>
                    <div class="pm-item">
                        <input id="mpp" type="radio" name="payment-method">
                        <label for="mpp" class="pm-label">
                            <div class="pm-text">
                                <h5>Paypal</h5>
                                <p>Safe payment online. Credit card needed. Paypal account is not necessary.</p>
                            </div>
                            <div class="pm-thumb">
                                <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_37x23.jpg">
                            </div>
                        </label>
                    </div>
                    <div class="pm-item">
                        <input id="mcc" type="radio" name="payment-method" checked>
                        <label for="mcc" class="pm-label">
                            <div class="pm-text">
                                <h5>Credit Card</h5>
                                <p>Safe money transfer using your bank account. Safe payment online. Credit card needed. Visa, Maestro, Discover, American Express</p>
                            </div>
                            <div class="pm-thumb">
                                <img src="https://static.cdnlogo.com/logos/v/71/visa.svg">
                            </div>
                        </label>
                    </div>
                    <div class="pm-item">
                        <input id="cod" type="radio" name="payment-method">
                        <label for="cod" class="pm-label">
                            <div class="pm-text">
                                <h5>Cash on Delivery</h5>
                                <p>Pay with cash upon delivery.</p>
                            </div>
                            <div class="pm-thumb">
                                <ion-icon name="cash-outline" class="cash-icon" style="font-size: 24px;"></ion-icon>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="payment-input" id="payment-input">
                    <div class="form-group success">
                        <label for="ccnum">Credit Card Number</label>
                        <input id="ccnum" class="form-control is-valid" type="text" name="ccnum" placeholder="1234 XXXX XXXX XXXX">
                    </div>
                    <div class="form-group half pr-3">
                        <label for="ccexp">Expiry Date</label>
                        <div class="row mx-0">
                            <div class="col-4 pl-0 pr-2">
                                <select id="ccmonth" class="form-control">
                                    ${Array.from({ length: 12 }, (_, i) => `<option value="${i + 1}">${i + 1}</option>`).join('')}
                                </select>
                            </div>
                            <div class="col-4 pl-2 pr-2">
                                <select id="ccday" class="form-control">
                                    ${Array.from({ length: 31 }, (_, i) => `<option value="${i + 1}">${i + 1}</option>`).join('')}
                                </select>
                            </div>
                            <div class="col-4 pl-2 pr-0">
                                <select id="ccyear" class="form-control">
                                    ${Array.from({ length: 7 }, (_, i) => `<option value="${2024 + i}">${2024 + i}</option>`).join('')}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group half pl-3">
                        <label for="cccode">CVV Code <span class="question"></span></label>
                        <input id="cccode" class="form-control is-invalid" type="text" name="cccode">
                    </div>
                    <div class="form-group">
                        <label for="ccname">Name on Card</label>
                        <input id="ccname" class="form-control" type="text" name="ccname">
                    </div>
                </div>
                <div class="payment-actions">
                    <a class="return" href="javascript:void(0);" data-prev-tab="shipping">Return to Shipping</a>
                    <a class="finish" href="javascript:void(0);">Finish Order <ion-icon name="arrow-forward-outline"></ion-icon></a>
                </div>
            `;
        }
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const tabContent = this.getAttribute('data-tab');
            const currentTabIndex = Array.from(tabs).findIndex(t => t.classList.contains('active'));
            const targetTabIndex = Array.from(tabs).findIndex(t => t.getAttribute('data-tab') === tabContent);

            if (completedTabs.has(tabContent) || targetTabIndex === currentTabIndex + 1) {
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                loadTabContent(tabContent);
            }
        });
    });

    // Handle "Customer Information" button click
    document.addEventListener('click', function(event) {
        if (event.target.matches('.next')) {
            const nextTab = event.target.getAttribute('data-next-tab');
            const currentTab = document.querySelector('.tab-link.active').getAttribute('data-tab');
            completedTabs.add(currentTab);
            tabs.forEach(tab => tab.classList.remove('active'));
            document.querySelector(`.tab-link[data-tab="${nextTab}"]`).classList.add('active');
            loadTabContent(nextTab);
        }
    });

    // Handle "Return to Cart" button click
    document.addEventListener('click', function(event) {
        if (event.target.matches('.return') && event.target.getAttribute('data-prev-tab')) {
            const prevTab = event.target.getAttribute('data-prev-tab');
            const currentTab = document.querySelector('.tab-link.active').getAttribute('data-tab');
            completedTabs.add(currentTab);
            tabs.forEach(tab => tab.classList.remove('active'));
            document.querySelector(`.tab-link[data-tab="${prevTab}"]`).classList.add('active');
            loadTabContent(prevTab);
        }
    });

    // Handle "Add Address" button click
    document.addEventListener('click', function(event) {
        if (event.target.matches('.add-address')) {
            const addressSelect = document.getElementById('address');
            const newAddress = prompt('Enter new address:');
            if (newAddress) {
                const option = document.createElement('option');
                option.value = newAddress;
                option.textContent = newAddress;
                addressSelect.appendChild(option);
                addressSelect.value = newAddress;
            }
        }
    });

    // Handle "Remove Address" button click
    document.addEventListener('click', function(event) {
        if (event.target.matches('.remove-address')) {
            const addressSelect = document.getElementById('address');
            if (addressSelect.value) {
                addressSelect.remove(addressSelect.selectedIndex);
            }
        }
    });

    document.addEventListener('change', function(event) {
        if (event.target.matches('input[name="payment-method"]')) {
            const paymentInput = document.getElementById('payment-input');
            if (event.target.id === 'cod') {
                paymentInput.style.display = 'none';
            } else {
                paymentInput.style.display = 'flex';
            }
        }
    });

    document.addEventListener('click', function(event) {
        if (event.target.matches('.finish')) {
            const orderNumber = 'ORD-' + Math.floor(Math.random() * 1000000);
            const orderDate = new Date().toLocaleDateString();
            const orderStatus = 'Pending';

            // Collect order details
            orderDetails.paymentMethod = document.querySelector('input[name="payment-method"]:checked').nextElementSibling.querySelector('.pm-text h5').innerText;

            // Hide tabs
            paymentTabs.style.display = 'none';

            // Display invoice
            content.innerHTML = `
                <div class="invoice">
                    <div class="invoice-header">
                        <img src="/PharmaEase/PharmaEase-Final/assets/PharmaEaseLogo.png" alt="PharmaEase Logo" class="invoice-logo">
                        <h2>PharmaEase Receipt</h2>
                    </div>
                    <p><strong>Order Number:</strong> ${orderNumber}</p>
                    <p><strong>Order Date:</strong> ${orderDate}</p>
                    <p><strong>Order Status:</strong> ${orderStatus}</p>
                    <h3>Customer Information</h3>
                    <p><strong>Name:</strong> ${orderDetails.customerInfo.name}</p>
                    <p><strong>Contact No.:</strong> ${orderDetails.customerInfo.contact}</p>
                    <p><strong>Email:</strong> ${orderDetails.customerInfo.email}</p>
                    <p><strong>Address:</strong> ${orderDetails.customerInfo.address}</p>
                    <h3>Shipping Information</h3>
                    <p><strong>Estimated Delivery Date:</strong> ${orderDetails.shippingInfo.estimatedDate}</p>
                    <p><strong>Delivery Information:</strong></p>
                    <p><strong>Name:</strong> ${orderDetails.shippingInfo.name}</p>
                    <p><strong>Contact No.:</strong> ${orderDetails.shippingInfo.contact}</p>
                    <p><strong>Email:</strong> ${orderDetails.shippingInfo.email}</p>
                    <p><strong>Address:</strong> ${orderDetails.shippingInfo.address}</p>
                    <h3>Payment Method</h3>
                    <p>${orderDetails.paymentMethod}</p>
                    <div class="invoice-actions">
                        <a href="../homepage/homepage.php" class="done-button">Done</a>
                    </div>
                </div>
            `;
        }
    });

    // Load the default tab content
    loadTabContent('cart');
});
