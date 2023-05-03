/* Script slúži na Unroll/roll kontent - Dvoch entít a to payment a transport */

const paymentUnrollHeaders = document.querySelectorAll('.payment_row .unroll-header');
const transportUnrollHeaders = document.querySelectorAll('.transport_row .unroll-header');

let activePaymentUnrollContainer = null;
let activeTransportUnrollContainer = null;

for (let i = 0; i < paymentUnrollHeaders.length; i++) {
    const label = document.createElement('label');
    label.classList.add('unroll-checkbox');
    label.innerHTML = `
    <input type="checkbox">
  `;
    paymentUnrollHeaders[i].insertBefore(label, paymentUnrollHeaders[i].firstChild);

    paymentUnrollHeaders[i].addEventListener('click', function () {
        const unrollContainer = this.parentNode;
        const unrollContent = this.nextElementSibling;
        const isActive = unrollContainer.classList.contains('show');
        // Opätovné kliknutie na aktivný kontainer ho zavrie
        if (isActive && activePaymentUnrollContainer) {
            activePaymentUnrollContainer.classList.remove('show');
            activePaymentUnrollContainer.querySelector('.unroll-content').classList.remove('show');
            activePaymentUnrollContainer.querySelector('.unroll-checkbox input').checked = false;
            activePaymentUnrollContainer = null;
        } else {
            // Zatvor aktivný container a otvor novo otvorený
            if (activePaymentUnrollContainer) {
                activePaymentUnrollContainer.classList.remove('show');
                activePaymentUnrollContainer.querySelector('.unroll-content').classList.remove('show');
                activePaymentUnrollContainer.querySelector('.unroll-checkbox input').checked = false;
            }
            unrollContainer.classList.add('show');
            unrollContent.classList.add('show');
            activePaymentUnrollContainer = unrollContainer;
            unrollContainer.querySelector('.unroll-checkbox input').checked = true;
        }
    });
}

for (let i = 0; i < transportUnrollHeaders.length; i++) {
    const label = document.createElement('label');
    label.classList.add('unroll-checkbox');
    label.innerHTML = `
    <input type="checkbox">
  `;
    transportUnrollHeaders[i].insertBefore(label, transportUnrollHeaders[i].firstChild);

    transportUnrollHeaders[i].addEventListener('click', function () {
        const unrollContainer = this.parentNode;
        const unrollContent = this.nextElementSibling;
        const isActive = unrollContainer.classList.contains('show');
        // Opätovné kliknutie na aktivný kontainer ho zavrie
        if (isActive && activeTransportUnrollContainer) {
            activeTransportUnrollContainer.classList.remove('show');
            activeTransportUnrollContainer.querySelector('.unroll-content').classList.remove('show');
            activeTransportUnrollContainer.querySelector('.unroll-checkbox input').checked = false;
            activeTransportUnrollContainer = null;
        } else {
            // Zatvor aktivný container a otvor novo otvorený
            if (activeTransportUnrollContainer) {
                activeTransportUnrollContainer.classList.remove('show');
                activeTransportUnrollContainer.querySelector('.unroll-content').classList.remove('show');
                activeTransportUnrollContainer.querySelector('.unroll-checkbox input').checked = false;
            }
            unrollContainer.classList.add('show');
            unrollContent.classList.add('show');
            activeTransportUnrollContainer = unrollContainer;
            unrollContainer.querySelector('.unroll-checkbox input').checked = true;
        }
    });
}

/* End Script */