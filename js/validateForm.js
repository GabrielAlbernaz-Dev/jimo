export default function initValidateForm () {
    const mainForm = document.querySelector('.main-form form');
    if(mainForm) {
        const mainFormInputs = mainForm.querySelectorAll('input');
        const mainFormSubmit = mainForm.querySelector('.main-form-submit');
        const mainFormBoxInvalid = mainForm.querySelector('.box-invalid.validation');

        mainFormInputs.forEach(input => {
            mainFormSubmit.addEventListener('click',(e) => {
                if(input.value.length === 0 || !input.checkValidity()) {
                    e.preventDefault();
                    input.nextElementSibling.classList.add('active');
                    input.classList.add('invalid');
                    mainFormBoxInvalid.classList.add('active');
                }
            })
        })
    }
}