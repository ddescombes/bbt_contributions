function HandleTaxable(name, disabled, checked)
    {
        var formInput = document.getElementById(name);
        formInput.disabled = disabled;
        formInput.checked = checked;
    };