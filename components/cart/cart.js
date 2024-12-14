/* Set rates + misc */
var taxRate = 0.05;
var shippingRate = 15.00; 
var fadeTime = 300;

/* Assign actions */
$(document).ready(function() {
  $('.product-quantity input').change(function() {
    updateQuantity(this);
  });

  $('.product-removal button').click(function() {
    removeItem(this);
  });

  $('.product-checkbox').change(function() {
    recalculateCart();
  });

  // Initialize quantity control
  $('[data-quantity]').each(function() {
    var $this = $(this);
    var $quantityTarget = $this.find('[data-quantity-target]');
    var $quantityMinus = $this.find('[data-quantity-minus]');
    var $quantityPlus = $this.find('[data-quantity-plus]');
    var quantity = parseInt($quantityTarget.val(), 10);

    $quantityMinus.on('click', function() {
      if (quantity > 1) {
        quantity--;
        $quantityTarget.val(quantity);
        updateQuantity($quantityTarget);
      }
    });

    $quantityPlus.on('click', function() {
      quantity++;
      $quantityTarget.val(quantity);
      updateQuantity($quantityTarget);
    });

    $quantityTarget.on('input', function() {
      var value = parseInt($quantityTarget.val(), 10);
      if (!isNaN(value) && value > 0) {
        quantity = value;
        updateQuantity($quantityTarget);
      }
    });

    $quantityTarget.on('blur', function() {
      if ($quantityTarget.val() === '' || parseInt($quantityTarget.val(), 10) <= 0) {
        quantity = 1;
        $quantityTarget.val(quantity);
        updateQuantity($quantityTarget);
      }
    });
  });

  // Set initial totals to zero
  recalculateCart();
});

/* Recalculate cart with animation */
function recalculateCart() {
  var subtotal = 0;

  /* Sum up row totals for checked items */
  $('.product').each(function() {
    if ($(this).find('.product-checkbox').is(':checked')) {
      var linePrice = parseFloat($(this).find('.product-line-price').text());
      if (!isNaN(linePrice)) {
        subtotal += linePrice;
      }
    }
  });

  /* Calculate totals */
  var tax = subtotal * taxRate;
  var shipping = (subtotal > 0 ? shippingRate : 0);
  var total = subtotal + tax + shipping;

  /* Animate totals display */
  animateValue($('#cart-subtotal'), subtotal);
  animateValue($('#cart-tax'), tax);
  animateValue($('#cart-shipping'), shipping);
  animateValue($('#cart-total'), total);

  /* Show or hide checkout button */
  if (subtotal > 0) {
    $('.checkout').fadeIn(fadeTime);
  } else {
    $('.checkout').fadeOut(fadeTime);
  }
}

/* Animate value update */
function animateValue($element, newValue) {
  const currentValue = parseFloat($element.text()) || 0;
  $({ val: currentValue }).animate(
    { val: newValue },
    {
      duration: 500, // Animation duration in ms
      easing: 'swing', // Animation easing type
      step: function(now) {
        $element.text(now.toFixed(2));
      },
      complete: function() {
        $element.text(newValue.toFixed(2)); // Ensure final value is set
      }
    }
  );
}

/* Update quantity */
function updateQuantity(quantityInput) {
  /* Calculate line price */
  var productRow = $(quantityInput).closest('.product');
  var price = parseFloat(productRow.find('.product-price').text());
  var quantity = parseInt($(quantityInput).val(), 10);
  var linePrice = price * quantity;

  /* Update line price display */
  productRow.find('.product-line-price').text(linePrice.toFixed(2));

  /* Recalculate cart totals */
  recalculateCart();
}

/* Remove item from cart */
function removeItem(removeButton) {
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).closest('.product');
  
  console.log("Removing product row:", productRow);  // Debugging statement

  productRow.slideUp(fadeTime, function() {
    productRow.remove();  // Simplified removal for debugging
    recalculateCart();
  });
}
