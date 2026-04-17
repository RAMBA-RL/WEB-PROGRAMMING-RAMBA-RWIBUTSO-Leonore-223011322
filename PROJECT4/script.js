

const style = document.createElement('style');
style.textContent = `
  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: Arial, sans-serif;
    background: #e0e0e0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }

  #app {
    background: #d6d6d6;
    width: 420px;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 2px 2px 8px rgba(0,0,0,0.2);
  }

  #app h2 {
    text-align: center;
    font-size: 20px;
    margin-bottom: 25px;
    color: #222;
  }

  .row {
    display: flex;
    align-items: center;
    margin-bottom: 18px;
  }

  .row label {
    width: 140px;
    font-size: 13px;
    color: #333;
    text-align: right;
    padding-right: 14px;
  }

  .row input,
  .row select {
    flex: 1;
    padding: 8px 10px;
    font-size: 14px;
    border: 1px solid #bbb;
    border-radius: 4px;
    background: #fff;
    outline: none;
  }

  #convertBtn {
    width: 100%;
    padding: 13px;
    margin: 12px 0 18px;
    background: #3ab0f0;
    color: #fff;
    font-size: 15px;
    font-weight: bold;
    letter-spacing: 1px;
    border: none;
    border-radius: 25px;
    cursor: pointer;
  }

  #convertBtn:hover { background: #1a9de0; }

  #resultLabel {
    font-size: 13px;
    color: #333;
    margin-bottom: 6px;
  }

  #result {
    background: #111;
    border-radius: 6px;
    padding: 14px;
    min-height: 70px;
    color: #aaa;
    font-style: italic;
    font-size: 14px;
  }
`;
document.head.appendChild(style);

const app = document.createElement('div');
app.id = 'app';
document.body.appendChild(app);

const title = document.createElement('h2');
title.textContent = 'Currency Converter APP';
app.appendChild(title);

const amountRow = document.createElement('div');
amountRow.className = 'row';

const amountLabel = document.createElement('label');
amountLabel.textContent = 'Enter Amount IN FRW';

const amountInput = document.createElement('input');
amountInput.type = 'number';
amountInput.placeholder = 'Enter amount';

amountRow.appendChild(amountLabel);
amountRow.appendChild(amountInput);
app.appendChild(amountRow);

const currencyRow = document.createElement('div');
currencyRow.className = 'row';

const currencyLabel = document.createElement('label');
currencyLabel.textContent = 'Select Currency';

const currencySelect = document.createElement('select');
['Select...', 'USD', 'EURO', 'KES', 'UGX'].forEach(function(cur, i) {
  const opt = document.createElement('option');
  opt.value = i === 0 ? '' : cur;
  opt.textContent = cur;
  if (i === 0) { opt.disabled = true; opt.selected = true; }
  currencySelect.appendChild(opt);
});

currencyRow.appendChild(currencyLabel);
currencyRow.appendChild(currencySelect);
app.appendChild(currencyRow);


const rateRow = document.createElement('div');
rateRow.className = 'row';

const rateLabel = document.createElement('label');
rateLabel.textContent = 'Rate';

const rateInput = document.createElement('input');
rateInput.type = 'number';
rateInput.placeholder = 'Enter rate';

rateRow.appendChild(rateLabel);
rateRow.appendChild(rateInput);
app.appendChild(rateRow);


const convertBtn = document.createElement('button');
convertBtn.id = 'convertBtn';
convertBtn.textContent = 'CONVERT';
app.appendChild(convertBtn);

// --- Result label ---
const resultLabel = document.createElement('div');
resultLabel.id = 'resultLabel';
resultLabel.textContent = 'Result';
app.appendChild(resultLabel);

// --- Result box ---
const resultBox = document.createElement('div');
resultBox.id = 'result';
resultBox.textContent = 'Result Here ....';
app.appendChild(resultBox);



convertBtn.addEventListener('click', function() {
  const amount   = parseFloat(amountInput.value);
  const currency = currencySelect.value;
  const rate     = parseFloat(rateInput.value);

  if (!amount || amount <= 0) {
    resultBox.textContent = 'Please enter a valid amount.';
    return;
  }
  if (!currency) {
    resultBox.textContent = 'Please select a currency.';
    return;
  }
  if (!rate || rate <= 0) {
    resultBox.textContent = 'Please enter a valid rate.';
    return;
  }

  const converted = (amount / rate).toFixed(2);
  resultBox.textContent = amount.toLocaleString() + ' FRW  =  ' + converted + ' ' + currency;
  resultBox.style.color = '#fff';
  resultBox.style.fontStyle = 'normal';
  resultBox.style.fontWeight = 'bold';
  resultBox.style.fontSize = '16px';
});
