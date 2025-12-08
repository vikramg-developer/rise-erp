
const inputs = document.querySelectorAll('.required-input');
const createBtn = document.getElementById('createBtn');

function validateInputs() {
  let allFilled = true;

  inputs.forEach(input => {
    if (input.value.trim() === '') {
      allFilled = false;
    }
  });

  createBtn.disabled = !allFilled;
}

// Run validation whenever the user types
inputs.forEach(input => {
  input.addEventListener('input', validateInputs);
});
