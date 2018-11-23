function HandleRemarks(name, disabled, index=0)
    {
        var formInput = document.getElementById(name);
        formInput.disabled = disabled;
        formInput.selectedIndex = index;
    };