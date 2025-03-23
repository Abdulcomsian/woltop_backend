document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".submitForm").forEach((el) => {
        el.addEventListener("submit", function (e) {
            e.preventDefault();
            let formSubmit = true;
            let status = document.querySelector("input[name='status']:checked").value;
            let errorTab = null;
            let subErrorTab = null;

            if(status === "publish"){
                let nameField = document.querySelector("input[name='product_name']");
                let descriptionField = document.querySelector("textarea[name='description']");
                let featuredImage = document.querySelector("input[name='featured_image']");
                let galleryImage = document.querySelector("input[name='gallery_images[]']");
                let categories = document.querySelector("select[name='categories[]']");
                let product_type = document.querySelector("#productType");
                let simplePrice = document.querySelector("input[name='simple_price']");
                let simpleSalePrice = document.querySelector("input[name='simple_sale_price']");
                let simpleSku = document.querySelector("input[name='simple_sku']");
                let simpleUnits = document.querySelector("input[name='simple_units']");
                let attributeId = document.querySelectorAll(".attributeName");
                let attributeValue = document.querySelectorAll(".attribute-values");
                let variablePrice = document.querySelectorAll(".variable-price");
                let variableSalePrice = document.querySelectorAll(".variable-sale-price");
                let variableSku = document.querySelectorAll(".variable-sku");

                let ps1_tab = document.querySelector("#ps1-tab");
                let basic_info = document.querySelector("#description-tab");
                let featured_tab = document.querySelector("#featured-tab");
                let gallery_tab = document.querySelector("#gallery-tab");
                let categories_tab = document.querySelector("#categories-tab");
                let productTypeTab = document.querySelector("#product-type-tab");
                errorTab = ps1_tab;

                if(product_type.value.trim() === "simple"){
                    if(simplePrice.value.trim() === "" || simpleSalePrice.value.trim() === "" || simpleSku.value.trim() === "" || simpleUnits.value.trim() === ""){
                        formSubmit = false;
                        subErrorTab = productTypeTab;
                        showError(simplePrice, "Price is required");
                        showError(simpleSalePrice, "Sale Price is required");
                        showError(simpleSku, "Sku is required");
                        showError(simpleUnits, "Units is required");
                    }
                }else if(product_type.value.trim() === "variable"){
                    ({ formSubmit, subErrorTab } = variableForEach(attributeId, "Attribute is Required", productTypeTab, formSubmit, subErrorTab));
                    ({ formSubmit, subErrorTab } = variableForEach(attributeValue, "Attribute value is Required", productTypeTab, formSubmit, subErrorTab));
                    ({ formSubmit, subErrorTab } = variableForEach(variablePrice, "Price is required", productTypeTab, formSubmit, subErrorTab));
                    ({ formSubmit, subErrorTab } = variableForEach(variableSalePrice, "Sale price is required", productTypeTab, formSubmit, subErrorTab));
                    ({ formSubmit, subErrorTab } = variableForEach(variableSku, "Sku is required", productTypeTab, formSubmit, subErrorTab));
                }

                if(categories.value.trim() === ""){
                    formSubmit = false;
                    subErrorTab = categories_tab;
                    showError(categories, "Categories is required");
                }

                if(galleryImage.value.trim() === ""){
                    formSubmit = false;
                    subErrorTab = gallery_tab;
                    showError(galleryImage, "Gallery Image is required");
                }

                if(featuredImage.value.trim() === ""){
                    formSubmit = false;
                    subErrorTab = featured_tab;
                    showError(featuredImage, "Featured Image is required");
                }
        
                if (nameField.value.trim() === "" || descriptionField.value.trim() === "") {
                    formSubmit = false;
                    subErrorTab = basic_info;
                    showError(nameField, "Product field is required when publishing.");
                    showError(descriptionField, "Description field is required when publishing.");
                }
            }

            if (!formSubmit && errorTab) {
                errorTab.click();
                subErrorTab.click();
            } else {
                this.submit();
            }
        });
    });
});
function variableForEach(field, message, tab, formSubmit, subErrorTab){
    field.forEach((item) => {
        if(item.value === ""){
            formSubmit = false;
            subErrorTab = tab;
            showError(item, message);
        }
    })

    return { formSubmit, subErrorTab };
}

// Function to show error messages
function showError(inputField, message) {
    let existingError = inputField.nextElementSibling;
    if (existingError && existingError.classList.contains("error-message")) {
        existingError.remove();
    }

    let errorSpan = document.createElement("span");
    errorSpan.classList.add("error-message");
    errorSpan.style.color = "red";
    errorSpan.style.fontSize = "12px";
    errorSpan.innerText = message;
    inputField.after(errorSpan);
    inputField.focus();
}